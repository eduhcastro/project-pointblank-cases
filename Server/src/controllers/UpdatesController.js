const chalk = require('chalk');
const { PostgreService } = require('../services/PostgresService')
const postgreService =  new PostgreService().connect()


class UpdatesController{
  handler(lowDbController) {
        postgreService.connect((err, client, release) => {
            if (err) {
              return console.log(chalk.red('Error acquiring client', err.stack))
            }
            client.query('SELECT * FROM cases_users;', (err, result) => {
                if (err) {
                  return console.log(chalk.red('Error executing query', err.stack))
                }

              lowDbController.sstss.find({id: 1}).assign({usersco: lowDbController.sstss.find({id: 1}).value().usersco = result.rowCount}).write()
            })
            client.query('SELECT SUM(used) AS total FROM cases_detalhes;', (err, result) => {
                if (err) {
                  return console.log(chalk.red('Error executing query', err.stack))
                }
                 lowDbController.sstss.find({id: 1}).assign({totalcasesopen: lowDbController.sstss.find({id: 1}).value().totalcasesopen = result.rows[0].total}).write();
            })

            if (err) {
              return console.log(chalk.red('Error executing query', err.stack))
            }
            client.query('SELECT * FROM cases_session;', (err, result) => {
                if (err) {
                  return console.log(chalk.red('Error executing query', err.stack))
                }
                 lowDbController.sstss.find({id: 1}).assign({TotalSessions: lowDbController.sstss.find({id: 1}).value().TotalSessions = result.rowCount}).write()
            })

            if (err) {
              return console.log(chalk.red('Error executing query', err.stack))
            }
            client.query("SELECT * FROM cases_users WHERE id_user = 'CASA'", (err, result) => {
                if (err) {
                    return console.error('Error executing query', err.stack)
                }
                 lowDbController.sstss.find({id: 1}).assign({moneyhouse: lowDbController.sstss.find({id: 1}).value().moneyhouse = result.rows[0].saldo}).write();
            })
            if (err) {
              return console.error('Error executing query', err.stack)
            }
            client.query("SELECT * FROM cases_users WHERE master != true ORDER BY countabertas DESC LIMIT 1", (err, result) => {
                release()
                if (err) {
                  return console.error('Error executing query', err.stack)
                }

                var melhorD = result.rows[0].id_user;
                var imgmD =   result.rows[0].userimg;
                var bannerD = result.rows[0].banner;
                var frameD =  result.rows[0].frame;
                var csdbx =   lowDbController.sstss.find({id: 1}).value().besatn;
                var csdby =   lowDbController.sstss.find({id: 1}).value().beastimg;
                var csdbw =   lowDbController.sstss.find({id: 1}).value().beastbanner;
                var csdbz =   lowDbController.sstss.find({id: 1}).value().beastframe;

                lowDbController.sstss.find({id: 1}).assign({
                    besatn:       csdbx = melhorD,
                    beastimg:     csdby = imgmD,
                    beastbanner:  csdbw = bannerD,
                    beastframe:   csdbz = frameD
                }).write();

            })
            if (err) {
              return console.error('Error executing query', err.stack)
            }
        });

        var timeElapsed2 = Date.now();
        var Today = new Date(timeElapsed2);
        var Data = Today.toLocaleDateString('pt-BR', {
            year: 'numeric',
            month: 'numeric',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric'
        });
        console.log(chalk.redBright('\n[ UPDATE ' + Data + ']'))
    }

  }

  module.exports = {UpdatesController}