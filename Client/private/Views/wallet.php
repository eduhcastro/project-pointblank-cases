<style>
   *{
   box-sizing:border-box;
   }
   .title {
   margin-bottom: 30px;
   color: #162969;
   }
   .card2{
   width: 400px;
   -webkit-perspective: 600px;
   -moz-perspective: 600px;
   perspective:600px;
   }
   .card__part{
   box-shadow: 1px 1px #aaa3a3;
   top: 0;
   /*position: absolute; */
   z-index: 1000;
   left: 0;
   display: inline-block;
   /* width: 320px;*/
   background-image: url('/template/imgs/card.png'), linear-gradient(to right bottom, #000000, #ad165b, #d44f64, #401720, #ec4879); /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
   background-repeat: no-repeat;
   background-position: center;
   background-size: cover;
   border-radius: 8px;
   -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
   -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
   -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
   -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
   transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
   -webkit-transform-style: preserve-3d;
   -moz-transform-style: preserve-3d;
   -webkit-backface-visibility: hidden;
   -moz-backface-visibility: hidden;
   }
   .card__front{
   padding: 18px;
   -moz-transform: rotateY(0);
   }
   .card__black-line {
   margin-top: 5px;
   height: 38px;
   background-color: #303030;
   }
   .card__logo {
   height: 16px;
   }
   .card__front-logo{
   position: absolute;
   top: 18px;
   right: 18px;
   }
   .card__square {
   border-radius: 5px;
   height: 30px;
   }
   .card_numer {
   display: block;
   width: 100%;
   word-spacing: 4px;
   font-size: 25px;
   letter-spacing: 2px;
   color: #fff;
   margin-bottom: 20px;
   margin-top: 20px;
   }
   .card__space-75 {
   width: 75%;
   float: left;
   }
   .card__space-25 {
   width: 25%;
   float: left;
   }
   .card__label {
   font-size: 14px;
   text-transform: uppercase;
   color: rgba(255,255,255,0.8);
   letter-spacing: 1px;
   }
   .card__info {
   margin-bottom: 0;
   margin-top: 5px;
   font-size: 20px;
   line-height: 18px;
   color: #fff;
   letter-spacing: 1px;
   text-transform: uppercase;
   }
   .card__back-content {
   padding: 15px 15px 0;
   }
   .card__secret--last {
   color: #303030;
   text-align: right;
   margin: 0;
   font-size: 14px;
   }
   .card__secret {
   padding: 5px 12px;
   background-color: #fff;
   position:relative;
   }
   .card__secret:before{
   content:'';
   position: absolute;
   top: -3px;
   left: -3px;
   height: calc(100% + 6px);
   width: calc(100% - 42px);
   border-radius: 4px;
   background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
   }
   .card__back-logo {
   position: absolute;
   bottom: 15px;
   right: 15px;
   }
   .card__back-square {
   position: absolute;
   bottom: 15px;
   left: 15px;
   }
</style>
<?php @PerfilLogado($Logado, $ConnOK);  ?>
<div class="container-fluid" style="margin: 0 -190px 0 0;">
<div class="row">
   <div class="col-sm-16">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item">
            <a href="/">
            <i class="fa fa-home mr-1"></i>
            Página inicial                        </a>
         </li>
         <li class="breadcrumb-item active">
            <i class="fa fa-user mr-1"></i>
            <?php  echo $Logado ?>
         </li>
      </ol>
   </div>
</div>
<?php // if(@$Sessao[0] == $UrlAqui){ ?>
<div class="block-profile">
   <div class="avatar">
      <img src="<?php echo $ImagemUsuarioL ?>" alt="casedrop.com">
   </div>
   <div class="user-info">
      <div class="name">   <?php  echo $Logado ?></div>
      <a class="link" href="https://steamcommunity.com/profiles/76561199053976464" target="_blank">Perfil</a>
      <div class="balance-buttons">
         <a href="#" class="btn-action btn-big" data-toggle="modal" data-target="#modal-balance" onclick="ga('send', 'event', 'Add Funds', 'click', 'Profile');"><span>Adicionar fundos</span></a>
         <span class="balance "><i class="fa fa-usd"></i>  <?php  echo $Saldo ?></span>
      </div>
   </div>
   <div class="trade-block">
      <div class="head">
      </div>
      <div>
         <div>
         </div>
         <div class="trade-form hidden">
            <input type="text" value="" id="input-tradeurl" placeholder="Inserir sua URL de troca">
            <a href="#" class="btn-action" id="btn-saveurl"><span>SALVAR</span></a>
         </div>
      </div>
   </div>
</div>
<div class="trade-info-table">
<style>
   .trade-info {
   color: #dedede;
   margin-top: 10px;
   }
   .trade-info .contacts {
   width: 100%;
   margin: auto;
   }
   .table-trade {
   width: 100%;
   }
   .table-trade th {
   padding: 8px;
   font-weight: 600;
   color: #FCFFFF;
   text-align: left;
   text-transform: uppercase;
   }
   .table-trade tr {
   background: #232323;
   }
   .table-trade tr:nth-child(2n+1) {
   background: #1d1d1d;
   }
   .table-trade td {
   padding: 8px;
   font-weight: 600;
   color: #FCFFFF;
   text-align: left;
   }
   .table-trade td span {
   color: #8F989F;
   }
   .table-trade td:last-child {
   /*text-align: right;*/
   }
   .table-trade td i {
   font-style: normal;
   background: linear-gradient(to left,rgb(105,231,85) 10%,rgb(0,161,91));
   background-clip: border-box;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   }
   .table-trade .table-error {
   color: #9f3a38;
   }
   .table-trade .table-good {
   color: #1b7e5a;
   }
   .table-trade .btn-case-action.sell {
   right: 3px;
   border: 2px solid #FF9800;
   background: rgb(44, 40, 18)
   }
   .table-trade .btn-case-action {
   font-size: 11px;
   line-height: 16px;
   padding: 0 6px;
   cursor: pointer;
   transition: all .2s ease;
   color: #e2e2e2;
   border-radius: 7px;
   }
   .table-trade .btn-case-action.send {
   left: 3px;
   border: 2px solid #6c8bef;
   background: rgb(44, 40, 18)
   }
   .table-trade .btn-case-action {
   font-size: 11px;
   line-height: 16px;
   padding: 0 6px;
   cursor: pointer;
   transition: all .2s ease;
   color: #e2e2e2;
   border-radius: 7px;
   }
   .btn-case-action.sell:hover {
   background: #FF9800;
   z-index: 1;
   }
   .btn-case-action.send:hover {
   background: #6c8bef;
   z-index: 1;
   }
   .button1{
   height: 40px;
   }
   #container{
   text-align: center;
   }
</style>
<div class="case-contains">
<div class="heading">
   <ul class="nav" role="tablist">
      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#items" role="tab">Minha Carteira</a>
      </li>
   </ul>
</div>
<div class="tab-content">
   <div class="tab-pane active" id="items">
      <div class="list-small-cases">
         <div class="row row-bg hidden-xs" style="margin:0 0 10px 0.5%;">
            <div class="col-sm-10">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">
                        Bem vindo ao LuckCard!
                     </h5>
                  </div>
                  <p class="card-text Nova">O uso do seu LuckCard, é livre! Não há restrições de uso, pessoal ou compartilhado. O LuckCard foi criado com o intuito do usuário poder compartilhar seu Saldo com seus amigos.
                     Aviso: Cobranças extras serão feitas quando usado.
                  </p>
               </div>
            </div>
         </div>
         <?php if($Carteira[0] != null){ ?>
         <div class="row row-bg hidden-xs" style="margin:0 0 10px 0.5%;">
            <table class="table table-bordered">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">
                        Atividade da Carteira
                     </h5>
                     <h8 class="Nova">
                        6 Informações dos ultimos dias
                     </h8>
                  </div>
                  <thead>
                     <tr class="Nova">
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Gastou</th>
                        <th scope="col">Data</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php Wallet($ConnOK, $Carteira[0]); ?>
                  </tbody>
            </table>
            </div>
            <div class="row row-bg hidden-xs" style="margin:0 0 10px 0.5%;">
               <div class="card">
                  <div class="card2">
                     <div class="card-header">
                        <h5 class="card-title">
                           Seu LuckCard
                        </h5>
                     </div>
                     <div class="card__front card__part">
                        <img class="card__front-square card__square" src="https://image.ibb.co/cZeFjx/little_square.png">
                        <img class="card__front-logo card__logo" src="https://www.fireeye.com/partners/strategic-technology-partners/visa-fireeye-cyber-watch-program/_jcr_content/content-par/grid_20_80_full/grid-20-left/image.img.png/1505254557388.png">
                        <p class="card_numer" id="ccnumber" style="text-shadow: 2px 2px 4px #000000;"><?php echo $Carteira[0]; ?></p>
                        <div class="card__space-75">
                           <span class="card__label" style="text-shadow: 2px 2px 4px #000000;">LuckCard</span>
                           <p class="card__info" style="text-shadow: 2px 2px 4px #000000;"><?php echo $Logado ?></p>
                        </div>
                        <div class="card__space-25">
                           <span class="card__label" style="text-shadow: 2px 2px 4px #000000;">COD SC</span>
                           <p class="card__info" id="cod" style="text-shadow: 2px 2px 4px #000000;"><?php echo $Carteira[1] ?></p>
                        </div>
                        <p class="Nova2" style="text-shadow: 2px 2px 4px #000000;"></br></br></br>Ae! Você já tem o seu cartão, agora você pode compartilhar seu saldo com os seus amigos! basta ter saldo em sua conta, e enviar o Numero e o Cod para seu amigo.</p>
                        <div id="container">
                           <a href="javascript:" onclick="detalhes('<?php echo $Carteira[0]; ?>');" class="btn btn-secondary button1" id="button1">Ver Detalhes</a>
                           <a href="javascript:" onclick="GetNewCard();" class="btn btn-primary button1" id="button2">Gerar Novo Card</a>
                           <?php if($Carteira[3] == 1){?>
                           <a href="javascript:" onclick="CardOffline();"  class="btn btn-danger button1" id="button3">Bloquear Card</a>
                           <?php }else{?>
                           <a href="javascript:" onclick="CardOffline();"  class="btn btn-warning button1" id="button3">Desbloquear Card</a>
                           <?php }?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane" id="itemsex">
         <div class="list-small-cases">
            <?php echo $Logado;?>
         </div>
      </div>
   </div>
</div>
<?php }else{
   //echo '<p class="card-text Nova">Sua conta ainda não atende aos requisitos para ter o LuckCard</p>';
   echo '<div class="row row-bg hidden-xs" style="margin:0 0 10px 0.5%;">
   <div class="col-sm-16">
     <div class="card">
     <div class="card-header">
     <h5 class="card-title">
      AVISO
     </h5>
     </div>
         <p class="card-text Nova">Sua conta não ainda não possui cartão,caso sua conta tenha atingido o nescessario para ter um cartão, contate um Moderador, caso você tenha comprado VIP/CASH, tem acesso instantaneo ao Cartão Luck!</p>
         <div class="card-header">
         <h5 class="card-title">
          Requisitos
         </h5>
          </div>
         <p class="card-text Nova">Patente : Major 1.</p>
       </div>
     </div>
   </div>
   <div class="row row-bg hidden-xs" style="margin:0 0 10px 0.5%;">
   <div class="col-sm-15">
     <div class="card">
     <div class="card-header">
             <h5 class="card-title">
              Saiba mais sobre
             </h5>
             </div>
     <div class="card-header">
     <h5 class="card-title">
     Oque o LuckCard Faz?
    </h5>
         </div>
         <p class="card-text Nova">Bom, suponhamos que você tenha 500 de saldo na conta,e seu amigo tem 0,e você quer ajudar seu amigo, com o LuckCard, você pode dar saldo para seu amigo! É Simples,basta enviar os dados do seu cartão para seu amigo(Numero do Cartão e o CSV) E seu amigo poderar usar o seu saldo disponivel,livrimente.</p>
         <div class="card-header">
         <h5 class="card-title">
         Mas posso restringir o cartão?
        </h5>
         </div>
         <p class="card-text Nova">Sim! Bom, após você enviar seu cartão para seu amigo, e ele usar a onde queria,você pode simplismente bloquear o cartão, quando bloqueado,não pode ser usado. Em caso de emergencia, você pode gerar outro cartão virtual(Limite incluso)</p>
       </div>
     </div>
   </div>
   ';
   }?>
<?php // include 'core/extra/footer.php'; ?>
<script src="/template/vendor/noty/velocity.min.js" type="text/javascript"></script>
<script src="/template/vendor/noty/noty.min.js" type="text/javascript"></script>
<script src="/template/vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js" type="text/javascript"></script>
<script defer src="/template/vendor/bootstrap4beta/js/popper.min.js"></script>
<script defer src="/template/vendor/bootstrap4beta/js/bootstrap.min.js" type="text/javascript"></script>
<script defer src="/template/vendor/js.cookie/js.cookie.js" type="text/javascript"></script>
<script src="/template/vendor/animateNumber/jquery.animateNumber.min.js"></script>
<script>
   document.title = 'PAN+ Carteira';  
  $(window).load(function() {
        $("#LoadWebSiteScreen").css("opacity", "0");
        var counter = 0;
        var looper = setInterval(function(){ counter++;
            if (counter >= 2){
                clearInterval(looper);
                $("#LoadWebSiteScreen").css("display", "none");
            }
        }, 1000);
       
    });
   function GetNewCard(){
       $.ajax({
           url: "http://127.0.0.1/wallet/NwCard",
           type: "POST",
           data: {
   			nivel: 1
   		},
           success: function (response) {
               if (response.result){
                   document.getElementById("ccnumber").innerHTML = response.cartao;
                   document.getElementById("cod").innerHTML = response.cvc;
                   showMessage('success', response.msg);
               
               }else{
                   showMessage('error', response.msg);
               }
   
           },
           error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
           }
       });
   };
   
   function CardOffline(){
       $.ajax({
           url: "http://127.0.0.1/wallet/CardOff",
           type: "POST",
           data: {
   			nivel: 1
   		},
           success: function (response) {
               if (response.result){
                   if(response.status == 0){
                       document.getElementById("button3").classList.remove('btn-danger');
                       document.getElementById("button3").classList.add('btn-warning');
                   document.getElementById("button3").innerHTML = 'Desbloquear Card';
                   showMessage('success', response.msg);
                   }else{
                       document.getElementById("button3").classList.remove('btn-warning');
                       document.getElementById("button3").classList.add('btn-danger');
                       document.getElementById("button3").innerHTML = 'Bloquear Card';
                   showMessage('success', response.msg);
                   }
               
               }else{
                   showMessage('error', response.msg);
               }
   
           },
           error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
           }
       });
   };
   
   
   
   function detalhes(card){
       var valor = document.getElementById("button1").innerHTML;
       if(valor == 'Ver Detalhes'){
           document.getElementById("ccnumber").innerHTML = card;
           document.getElementById("button1").innerHTML = 'Ocultar Detalhes';
       }
       if(valor == 'Ocultar Detalhes'){
           $('#ccnumber').text(function(_, card) {
     return card.replace(/\d(?=\d{3})/g, "*");
   
   })
           document.getElementById("button1").innerHTML = 'Ver Detalhes';
       }   
   };
   
   $('#ccnumber').text(function(_, val) {
     return val.replace(/\d(?=\d{3})/g, "*");
   
   });
       $(document).ready(function() {
           $.ajaxPrefilter(function( options ) {
               if ( !options.beforeSend) {
                   options.beforeSend = function (xhr) {
                       xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                   }
               }
           });
       });
</script>
<!-- custom scripts -->
<script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
<script defer src="/template/js/main.js?v=2.0.1" type="text/javascript"></script>
<script defer src="/template/js/giveaway.js?v=2.0.1" type="text/javascript"></script>
<script src="/template/js/app.js?v=2.0.1" type="text/javascript"></script>
<script src="/template/js/auth.js?v=2.0.1" type="text/javascript"></script>

<script>
   function cookies_ok() {
       Cookies.set('cookiesLaw', 'true');
       $('#cookies-law').attr("style", "display:none");
       return false;
   }
   
   $(function () {
       if (!Cookies.get('cookiesLaw') == true) {
           $('#cookies-law').attr("style", "display:block");
       }
   });
   
   
</script>