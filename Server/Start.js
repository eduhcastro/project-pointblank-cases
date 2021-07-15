/**
 * Servidor para o Future Cases 15/07/2021
 * @description Servidor WebSocket para o Future cases
 * @author Castro<Skillerm>
 */
const app = require('express')()
const http = require('http').Server(app)
const io = require('socket.io')(http,{
  cors: {
    origin: "http://127.0.0.1",
    methods: ["GET", "POST"]
  }
})

const chalk = require('chalk')
const cors = require('cors')

const { DropsController } =   require("./src/controllers/DropsController")
const { UpdatesController } = require("./src/controllers/UpdatesController")
const { LowDBController } =   require("./src/controllers/LowDBController")

const lowDBController =   new LowDBController().acess()
const dropsController =   new DropsController()
const updatesController = new UpdatesController()

app.options('*', cors())
lowDBController.db.read()
app.disable('etag');



require('./src/socket')(io, lowDBController)

setInterval(() => { dropsController.handler(io, lowDBController) }, 12000)

setInterval(() => { updatesController.handler(lowDBController) }, 40000)


http.listen(8080, function() {
  console.log(chalk.green('Iniciado'))
})