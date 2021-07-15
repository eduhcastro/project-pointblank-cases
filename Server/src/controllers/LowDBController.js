const low = require('lowdb')
const FileSync = require('lowdb/adapters/FileSync')

class LowDBController{

  connect(){
    const adapter = new FileSync('./src/database/lowdb.json')
    return low(adapter)
  }

  acess(){
    const db = this.connect()
    db.read()
    db.defaults({sstss: [], drops: [], dropnew: [], hotweapons: []}).write()
    const sstss = db.get('sstss')
    const drops = db.get('drops')
    const dropnew = db.get('dropnew')
    const hotweapons = db.get('hotweapons')
    return {sstss,drops,dropnew,hotweapons,db}
  }

}

module.exports = {LowDBController}