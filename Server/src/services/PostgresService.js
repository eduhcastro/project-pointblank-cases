const { Pool } = require('pg')

class PostgreService{
  
  connect () {
    return new Pool({
      host: 'localhost',
      user: 'postgres',
      database : 'painel',
      password : '123456'})
  }

}

module.exports = { PostgreService }