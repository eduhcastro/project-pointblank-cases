const chalk = require('chalk');
const { PostgreService } = require('../services/PostgresService')
const postgreService =  new PostgreService().connect()


class DropsController{

handler(io, lowDbController) {

  var quantx = 0
  var matriz = 0

  postgreService.connect((err, client, release) => {
      if (err) {
          return console.log(chalk.red('Error acquiring client', err.stack))
      }
      client.query("SELECT * FROM cases_session ORDER BY id DESC LIMIT 10", (err, result) => {
          if (err) {
            return console.log(chalk.red('Error executing query', err.stack))
          }

          result.rows.forEach(function(items) {
              matriz++
              quantx++
              var X = lowDbController.drops.find({ _sessao: items.session}).value()
              if (typeof X === 'undefined') {
                  var maa = matriz - 1;
                  var quant = quantx - 1;

                  var userwIN =    result.rows[maa].id_user;
                  var userWINIMG = result.rows[maa].userimg;
                  var weaponI =    result.rows[maa].weaponimg;
                  var caseI =      result.rows[maa].caseimg;
                  var weaponTC =   result.rows[maa].weaponclasse;
                  var weaponNAM =  result.rows[maa].weaponname;
                  var weaponRARI = result.rows[maa].nivelweapon;
                  var weaponPRICE =result.rows[maa].wpprice;
                  var casePRICE =  result.rows[maa].cxprice;
                  var weaponDIAS = result.rows[maa].weapondias;
                  var userBanner = result.rows[maa].banner;
                  var userSession =result.rows[maa].session;
                  var userFrame =  result.rows[maa].frame;

                  if(weaponPRICE > casePRICE){
                    lowDbController.hotweapons.push({
                        _id: quant,
                        _ownerName:     userwIN,
                        _ownerImageURL: userWINIMG,
                        _weaponImageId: weaponI,
                        _caseImage:     caseI,
                        _weaponType:    weaponTC,
                        _weaponName:    weaponNAM,
                        _weaponRarity:  weaponRARI,
                        _weaponPrice:   weaponPRICE,
                        _casePrice:     casePRICE,
                        _weapondias:    weaponDIAS,
                        _banner:        userBanner,
                        _sessao:        userSession,
                        _frame:         userFrame
                    }).write();
                  }

                  lowDbController.dropnew.push({
                      _id:            quant,
                      _ownerName:     userwIN,
                      _ownerImageURL: userWINIMG,
                      _weaponImageId: weaponI,
                      _caseImage:     caseI,
                      _weaponType:    weaponTC,
                      _weaponName:    weaponNAM,
                      _weaponRarity:  weaponRARI,
                      _weaponPrice:   weaponPRICE,
                      _casePrice:     casePRICE,
                      _weapondias:    weaponDIAS,
                      _banner:        userBanner,
                      _sessao:        userSession,
                      _frame:         userFrame
                  }).write();
              }
          });
      });

      client.query("SELECT * FROM cases_session ORDER BY id DESC LIMIT 10", (err, result) => {
          release()
          if (err) {
              return console.error('Error executing query', err.stack)
          }

          for (var ixa = 0; ixa < 10; ixa++) {

            var userwIN =     result.rows[ixa].id_user;
            var userWINIMG =  result.rows[ixa].userimg;
            var weaponI =     result.rows[ixa].weaponimg;
            var caseI =       result.rows[ixa].caseimg;
            var weaponTC =    result.rows[ixa].weaponclasse;
            var weaponNAM =   result.rows[ixa].weaponname;
            var weaponRARI =  result.rows[ixa].nivelweapon;
            var weaponPRICE = result.rows[ixa].wpprice;
            var casePRICE =   result.rows[ixa].cxprice;
            var weaponDIAS =  result.rows[ixa].weapondias;
            var userBanner =  result.rows[ixa].banner;
            var userSession = result.rows[ixa].session;
            var userFrame =   result.rows[ixa].frame;
            var AtualW =        lowDbController.drops.find({_id:ixa}).value()._ownerName;
            var AtualWI =       lowDbController.drops.find({_id:ixa}).value()._ownerImageURL;
            var AtualWEI =      lowDbController.drops.find({_id:ixa}).value()._weaponImageId;
            var AtualCASI =     lowDbController.drops.find({_id:ixa}).value()._caseImage;
            var AtualTYPECLASS =lowDbController.drops.find({_id:ixa}).value()._weaponType;
            var AtualWENA =     lowDbController.drops.find({_id:ixa}).value()._weaponName;
            var AtualRARI =     lowDbController.drops.find({_id:ixa}).value()._weaponRarity;
            var AtualPRICE =    lowDbController.drops.find({_id:ixa}).value()._weaponPrice;
            var casePRice =     lowDbController.drops.find({_id:ixa}).value()._casePrice;
            var Atualdias =     lowDbController.drops.find({_id:ixa}).value()._weapondias;
            var BannerUser =    lowDbController.drops.find({_id:ixa}).value()._banner;
            var SessaoUs =      lowDbController.drops.find({_id:ixa}).value()._sessao;
            var FrameUser =     lowDbController.drops.find({_id:ixa}).value()._frame;


            lowDbController.drops.find({_id:ixa}).assign({_ownerName:AtualW = userwIN}).write();
            lowDbController.drops.find({_id:ixa}).assign({_ownerImageURL:AtualWI = userWINIMG}).write();
            lowDbController.drops.find({_id:ixa}).assign({_weaponImageId:AtualWEI = weaponI}).write();
            lowDbController.drops.find({_id:ixa}).assign({_caseImage:AtualCASI = caseI}).write();
            lowDbController.drops.find({_id:ixa}).assign({_weaponType:AtualTYPECLASS = weaponTC}).write();
            lowDbController.drops.find({_id:ixa}).assign({_weaponName:AtualWENA = weaponNAM}).write();
            lowDbController.drops.find({_id:ixa}).assign({_weaponRarity:AtualRARI = weaponRARI}).write();
            lowDbController.drops.find({_id:ixa}).assign({_weaponPrice:AtualPRICE = weaponPRICE}).write();
            lowDbController.drops.find({_id:ixa}).assign({_casePrice:casePRice = casePRICE}).write();
            lowDbController.drops.find({_id:ixa}).assign({_weapondias:Atualdias = weaponDIAS}).write();
            lowDbController.drops.find({_id:ixa}).assign({_banner:BannerUser = userBanner}).write();
            lowDbController.drops.find({_id:ixa}).assign({_sessao:SessaoUs = userSession}).write();
            lowDbController.drops.find({_id:ixa}).assign({_frame:FrameUser = userFrame}).write();

          }
      });
  });

  var timeElapsed = Date.now();
  var Today = new Date(timeElapsed);
  var Data = Today.toLocaleDateString('pt-BR', {
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric'
  });


  function NewDropExistente() {
      if (typeof lowDbController.dropnew.value()[0] !== 'undefined') {
          io.sockets.emit('drops', lowDbController.dropnew.value());
          return true
      } 
      return false
  }

  if (NewDropExistente()) {
      console.log(chalk.cyanBright('[ NOVO DROP EMITIDO ' + Data + ']'));
      lowDbController.dropnew.remove().write();
  }else{
    console.log(chalk.cyanBright('[ SEM DROPS NOVOS ' + Data + ']'));
  }
  
}

}

module.exports = {DropsController}