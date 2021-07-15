<?php
   require 'private/Neuron/_connect.php';
   require 'private/Neuron/_infousers.php';
   require 'private/Neuron/_bloqueio.php';
   require 'private/Neuron/plugins/_RankValues.php';
   ?>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <meta name="csrf-token" content="">
   <meta name="google-site-verification" content="RTdUGrZ1mMpdFYIehuw1S6ycVrzLO1Hj9cpZ83oHLBM" />
   <title>FUTURE+ Caixas</title>
   <link rel="shortcut icon" href="/favicon.png" type="image/png">
   <?php
      if(@$_COOKIE['thema'] == 'dark'){
      echo '<link rel="stylesheet" href="/template/css/dark/index.css" type="text/css">';
      echo '<link rel="stylesheet" href="/template/vendor/noty/noty.css" type="text/css">';
      echo '<link rel="stylesheet" href="/template/css/dark/all.css?v=2.0.1" type="text/css">';
      echo '<link rel="stylesheet" href="/template/css/dark/snow.css?v=2.0.1" type="text/css">';
      }elseif(@$_COOKIE['thema'] == 'V12'){
      echo '<link rel="stylesheet" href="/template/css/V12/index.css" type="text/css">';
      echo '<link rel="stylesheet" href="/template/vendor/noty/noty.css" type="text/css">';
      echo '<link rel="stylesheet" href="/template/css/V12/all.css?v=2.0.1" type="text/css">';
      echo '<link rel="stylesheet" href="/template/css/V12/snow.css?v=2.0.1" type="text/css">';
      }else{
      echo '<link rel="stylesheet" href="/template/css/light/index.css" type="text/css">';
      echo '<link rel="stylesheet" href="/template/vendor/noty/noty.css" type="text/css">';
      echo '<link rel="stylesheet" href="/template/css/light/all.css?v=2.0.1" type="text/css">';
      echo '<link rel="stylesheet" href="/template/css/light/snow.css?v=2.0.1" type="text/css">';
      }?>
   <link rel="stylesheet" href="/template/css/V12More/More.css?v=2.0.1" type="text/css">
   <script src="/template/config.js" type="text/javascript"></script>
   <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
   <style>
      .swap-currency {
      display: inline-block;
      direction: rtl;
      }
      .aviso{
      color: red;
      }
   </style>
</head>
<body>
   <?php if(@$_SESSION['username'] !== null){?>
   <script>
      var lang = "br";
   
      var currency = {
          "name": "USD",
          "symbol": "$",
          "html": '<i class="fa fa-usd"></i>',
          "exchange": "1"
      };
      
      var curr = '$';
      var live = Server
      
      var local = {
          "opencase":"ABRIR ESTA CAIXA",
          "sellitem":"Vender item",
          "sellitemfor":"Vender item por",
          "sellallfor":"Vender tudo por ",
          "itemsold": "VENDIDO"
      };
      
      var locationSkins = `/template/imgs/weapons_drops/193/`;

      var mainRoutes = {
         "balance":        `/giveaway/balance`,
         "redeem":         `/giveaway/redeem`,
         "giveaway_join":  `/giveaway/fast_buy`,
         "leilao":         `/giveaway/goleilao`,
         "retirar":        `/giveaway/retirar`,
      };
      var min_refill = parseFloat('0.1');

   </script>
   <?php }else{ ?>
   <script>
      var lang = "pt";
      
      var currency = {
          "name": "USD",
          "symbol": "$",
          "html": '<i class="fa fa-usd"></i>',
          "exchange": "1"
      };
      
      var curr = '$';
      var live = Server
      
      var local = {
          "opencase":   "ABRIR ESTA CAIXA",
          "sellitem":   "Vender item",
          "sellitemfor":"Vender item por",
          "sellallfor": "Vender tudo por",
          "itemsold":   "VENDIDO"
      };
      
      var locationSkins = BaseURL+"/template/imgs/weapons_drops/193/";
      var mainRoutes = {
         "giveaway_join":"/giveaway/fast_buy"
      };

   </script>

   <?php } ?>
   <nav class="navbar">
      <button class="btn btn-open-menu hidden-md-up" type="button"><span class="fa fa-bars"></span></button>
      <a class="navbar-brand" href="/">
         <?php 
            if(@$_COOKIE['thema'] != 'V12'){
               echo ' <img src="/template/imgs/logo.png" width="150">
               </a>';
            }else{
              echo '<img src="/template/imgs/LogoV12.png" width="200">
              </a>';
            }
            if(@$_COOKIE['thema'] == 'V12' && @$_SESSION['username'] == null){ echo '<div class="top-menu" style="padding: .75rem;">';}else{echo '<div class="top-menu">';} ?>
         <div class="mobile-head-menu">
            <div class="socials">
      <a href="#" target="_blank" class="item"><i class="fa fa-facebook"></i></a>
      <a href="#" target="_blank" class="item"><i class="fa fa-steam"></i></a>
      <a href="#" target="_blank" class="item"><i class="fa fa-twitter"></i></a>
      <a href="#" target="_blank" class="item"><i class="fa fa-youtube"></i></a>
      <a href="#" target="_blank" class="item"><i class="fa fa-snapchat"></i></a>
      </div>
      <button class="btn btn-close-menu"><span class="fa fa-close"></span></button>
      </div>
      <ul class="navbar-nav">
         <?php if(@$_COOKIE['thema'] == 'V12'){
            echo '<li class="nav-item stock NavBarListB"> 
            <a onclick="Clicked(\'/brinde\')"><img class="ImgeBtns" src="/template/imgs/UI_V12/Tools/BONUS.png" onmouseover="hover(this,'."'BTBOnus'".');" onmouseout="unhover(this,'."'BTBOnus'".');"></a></li>
            <li class="nav-item stock NavBarListB"> 
            <a onclick="Clicked(\'/shopclandestine\')"><img class="ImgeBtns" src="/template/imgs/UI_V12/Tools/LOJA.png" onmouseover="hover(this,'."'BTLoja'".');" onmouseout="unhover(this,'."'BTLoja'".');"></a></li>
            <li class="nav-item stock NavBarListB"> 
            <a onclick="Clicked(\'/regulamento\')"><img class="ImgeBtns" src="/template/imgs/UI_V12/Tools/REGULAMENTO.png" onmouseover="hover(this,'."'BTRegu'".');" onmouseout="unhover(this,'."'BTRegu'".');"></a></li>
            <li class="nav-item stock NavBarListB"> 
            <a href="#"><img class="ImgeBtns" src="/template/imgs/UI_V12/Tools/PARCERIA.png" onmouseover="hover(this,'."'BRPa'".');" onmouseout="unhover(this,'."'BRPa'".');"></a></li>';
            }else{
            echo '<li class="nav-item stock"> <a class="nav-link" href="/brinde"><i class="fa fa-gift"></i> BÔNUS DIÁRIO</a> </li>
            <li class="nav-item stock"> <a class="nav-link" href="/shopclandestine"><i class="fa fa-gg-circle"></i> LOJA CLANDESTINA</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/regulamento"><i class="fa fa-commenting-o"></i> REGULAMENTO</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-handshake-o"></i> PARCERIA</a> </li>';
            } ?>
      </ul>
      <div class="form-user">
         <?php if(@$_SESSION['username'] != null){  ?>
         <div class="user-menu">
            <div class="user-holder">
               <button class="user dropdown-toggle" data-toggle="dropdown">
               <span class="avatar"><img src="<?php echo $Sessao[5]; ?>" alt="user pic"></span>
               </button>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="/profile/<?php echo $Sessao[0]; ?>">Meu perfil</a>
                  <a class="dropdown-item" href="/wallet/<?php echo $Sessao[0]; ?>">Minha Carteira</a>
                  <a class="dropdown-item" href="/logout">Sair</a>
               </div>
            </div>
            <span class="balance ">
            <?php if(@$_COOKIE['thema'] == 'V12'){
               $Cash = number_format($_SESSION["money"], 0);
               $GP  = number_format($_SESSION["gp"], 0);
               echo '<div class="user-menu-2" style="display: grid; align-items: stretch;">
               <span id="G3" style="margin: 0 0 2;"><img src="/template/imgs/UI_V12/Tools/G3.png" style="width: 80px;height: 20px;"><variable id="user-balanceG" style="color: #759ce0;font-family: Arial;font-size: 12px;font-weight: 900; margin: 4px;">'.$GP.'</variable></span>
               
               <span id="C3"><img src="/template/imgs/UI_V12/Tools/C3.png" style="width: 80px;height: 20px;"><variable id="user-balanceC" style="color: #fbbb8e;font-family: Arial;font-size: 12px;font-weight: 900; margin: 4px;">'.$Cash.'</variable></span>
               
               <span id="S3"><img src="/template/imgs/UI_V12/Tools/S3.png" style="width: 80px;height: 20px;">
               <variable id="user-balance" style="color: #2be0ad;font-family: Arial;font-size: 12px;font-weight: 900;">'.$Sessao[3].'</variable></span>
               </div></div>'
               ;
               }else{
                echo '<i class="fa fa-usd"></i> 
                <variable id="user-balance">'.$Sessao[3].'</variable>
               </span>';
               ?>
         </div>
         <a href="#" class="btn btn-login" data-toggle="modal" data-target="#modal-balance" onclick="ga('send', 'event', 'Add Funds', 'click', 'MiniProfile', window.location.pathname);">
         <span class="fa fa-plus mr-1"></span>Adicionar fundos
         </a>
         <?php   }}else{
            echo '<a href="/login" data-type="login1" class="btn btn-login">
            <i class="fa fa-grav mr-0"></i>
            <span class="ml-1">Entre com sua conta do PB</span>
            </a>';
            }
            
            ?>
         <?php if(@$_COOKIE['thema'] == 'dark'){
            echo '<div class="btn-group">
               <button type="button" class="btn-lang dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img class="mr-1" src="https://cdn.onlinewebfonts.com/svg/img_39469.png" alt="" style="width: 28px">
               </button>
               <div class="dropdown-menu right">';
            }elseif(@$_COOKIE['thema'] == 'V12'){
            echo '<div class="btn-group">
            <button type="button" class="btn-lang dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="mr-1" src="http://127.0.0.1/template/imgs/UI_V12/Tools/v12.png" alt="" style="width: 28px">
            </button>
            <div class="dropdown-menu right">';
            }else{
            echo '<div class="btn-group">
            <button type="button" class="btn-lang dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="mr-1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Emoji_u2600.svg/1200px-Emoji_u2600.svg.png" alt="" style="width: 28px">
            </button>
            <div class="dropdown-menu right">';
            }?>                    
         <a class="dropdown-item" href="#" onclick="Thema('Dark')">
         <img class="mr-1"  src="https://cdn.onlinewebfonts.com/svg/img_39469.png" alt="" style="width: 28px">
         Modo Dark
         </a>
         <a class="dropdown-item" href="#" onclick="Thema('Light')">
         <img class="mr-1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Emoji_u2600.svg/1200px-Emoji_u2600.svg.png" alt="" style="width: 28px">
         Modo Light
         </a>
         <?php if(@$Vip == true){ ?>
         <a class="dropdown-item" href="#" onclick="Thema('V12')">
         <img class="mr-1" src="/template/imgs/UI_V12/Tools/v12.png" alt="" style="width: 28px">
         Modo Evolution
         </a>
         <?php } ?>
      </div>
      </div>
      <?php if(@$_COOKIE['thema'] == 'V12' && @$_SESSION['username'] != null){ 
         $Nick = $_SESSION['nick'];
         $MeuXPAtual = $_SESSION["exp"];
         $LimiteParaUp = ValueLevels2($MeuXPAtual)[0];
         @$MeuXPAcumulado = abs(ValueLevels2(@$MeuXPAtual)[1]);
         @$Porcentagem = round((@$MeuXPAcumulado * 100) / @$LimiteParaUp, 1);
         if(@$Porcentagem > 100){
            $Porcentagem = 100;
         }
                     echo '<style>
                     @keyframes load {
                        0% { width: 0; }
                        100% { width: '.$Porcentagem.'%; }
                      }
                      </style>';
                    
                     echo'<div class="PlayerVipBar" id="PlayerVipBar">
                     <div class="progressplayer">';
                     if($BannerLogado != null){
                        echo ' <img class="PlayerVipBar Banner" src="/template/imgs/UI_V12/Banners_Profiles/'.$BannerLogado.'.gif">';
                     }
                     if($MeuXPAtual > 100000000){
                     echo '<span class="PlayerVipBar ExpP">Entre os 0.1% Dos Melhores</span>';
                     }else{
                        echo '<span class="PlayerVipBar ExpP">'.$MeuXPAcumulado.'/'.$LimiteParaUp.' ('.$Porcentagem.'%)</span>';
                     }
                     echo '<div class="progressplayer-value"></div></div>
                     <img class="PlayerVipBar Level" src="/template/imgs/UI_V12/Patentes/'.$_SESSION["nivel"].'.png">
                     <img class="PlayerVipBar BackExp" src="/template/imgs/UI_V12/Tools/Exp.png">
                     <img class="PlayerVipBar Bar" src="/template/imgs/UI_V12/Tools/Bar.png"><span class="PlayerVipBar Nick">'.$Nick.'</span>
                     </div>'; } ?>
      </div>
      </div>
   </nav>
   <nav class="navbar2" style="
      height: 21px;
      position: inherit;
      display: flex;
      flex-direction: column;
      padding: .75rem;
      ">
      <div id="AlertWinner" class="Announcer">
         <h3 id="TextAlertWinner"><span class="NavBarWelcome" id="TextAlertWinnerReady">Welcome to FUTURE+ Luck</span>
         </h3>
      </div>
   </nav>
   <div class="modal fade modal-discount show" id="LoadWebSiteScreen" tabindex="-1" role="dialog" aria-labelledby="modal-discount" style="background-color: currentColor;display: block; opacity: 1;" >
      <img src="/template/imgs/load.gif">     
   </div>
   <?php BrindeDiario($ConnOK, @$BrindeDataVip); ?>
   <div class="modal fade modal-discount modal-email" id="PlayerInfo" tabindex="-1" role="dialog" aria-labelledby="modal-email" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Enter your email so we will notify you about the winning!</h5>
            </div>
            <div class="modal-body balance-holder form-group">
               <input class="textfield" type="email" placeholder="Enter email" name="email" id="123A" data-bv-notempty="true"
                  data-bv-notempty-message="The email address is required and cannot be empty"
                  data-bv-emailaddress="true"
                  data-bv-emailaddress-message="This is not a valid email address.">
            </div>
            <div class="modal-footer">
               <button class="btn btn-primary btn-block" id="123B" data-game-id=""><span>Join</span></button>
            </div>
         </div>
      </div>
   </div>
   <?php if(@$_SESSION['username'] != null){
      echo '<div class="modal case-modal fade" id="caseWin" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  <div class="modal-title"><span>Seu prêmio</span></div>
                  <div class="items">
                  </div>
                  <div class="buttons">
                     <div class="buttons-holder">
                        <button type="button" class="btn-default btn-replay"><span><i class="fa fa-refresh"></i>tentar novamente</span></button>
                        <a href="/profile/'.$Logado.'" class="btn-default"><span><i class="fa fa-crosshairs"></i>meus items</span></a>
                     </div>
                     <div class="buttons-holder">
                        <button type="button" class="btn-action btn-big btn-mass-sell"><span><i class="fa fa-shopping-cart"></i>Sell all for</span></button>
                     </div>
                  </div>
                  <div class="bottom-text">O item deve ser retirado dentro de <span>24 horas</span></div>
               </div>
            </div>
         </div>
      </div>
      
      
      <div class="modal fade" id="modal-balance" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <div class="modal-body">
               <div class="balance-holder">
                  <div class="title">Filling up the balance</div>
                  <form method="post" action="https://casedrop.com/br/user/refill" id="refill-form">
                     <div class="balance-input">
                        <input class="textfield" type="text" id="refill-amount" value="1" placeholder="Enter the amount">
                        <i class="fa fa-usd"></i>
                     </div>
                     <input type="hidden" name="amount" id="refill-amount-hidden">
                     <input type="hidden" name="_token" value="">
                     <div class="row-holder">
                        <a href="#" class="btn-action" id="refillButton"><span>PAY NOW</span></a>
                     </div>
                  </form>
                  <div class="row-holder">
                     <span class="text">OR</span>
                  </div>
                  <div class="row-holder">'; ?>
   <a href="https://casedrop.com/items/deposit" target="_blank" class="button-info" onclick="ga('send', 'event', 'Pay', 'click', 'Pay by Steam skins')"><span>PAY BY STEAM SKINS! (SkinPay)</span></a>
   <?php echo '</div>
      <div class="notice">Attention! Payments could be delayed for 5-10 minutes!</div>
      <div class="bottom-block">
         <div class="title">Adicione um Codigo Promocional ou um Gift Card:</div>
         <div class="promo-holder">
            <input class="textfield" type="text" id="redeemInput" placeholder="Coloque o Codigo aqui">
            <a href="#" class="btn-action" id="redeemButton"><span>Usar Agora</span></a>
         </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      
      
      
      
      <div class="modal fade" id="modal-balance2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      <div class="modal-body">
      <div class="balance-holder">
      <div class="title">Você está sem saldo!</div>
      <form method="post" action="https://casedrop.com/br/user/refill" id="refill-form">
         <div class="balance-input">
            <input class="textfield" type="text" id="refill-amount" value="1" placeholder="Enter the amount">
            <i class="fa fa-usd"></i>
         </div>
         <input type="hidden" name="amount" id="refill-amount-hidden">
         <input type="hidden" name="_token" value="">
         <div class="row-holder">
            <a href="#" class="btn-action" id="refillButton"><span>COMPRAR AGORA VIA MERCADO LIVRE!</span></a>
         </div>
      </form>
      <div class="row-holder">
         <span class="text">OR</span>
      </div>
      <div class="row-holder">'; ?>
   <a href="https://casedrop.com/items/deposit" target="_blank" class="button-info" onclick=""><span>COMPRAR VIA ATENDENTE (Discord)</span></a>
   <?php echo '</div>
      <div class="notice">Attention! Payments could be delayed for 5-10 minutes!</div>
      <div class="bottom-block">
         <div class="title">Compre usando o LuckCard!<p class="aviso"> Sera Cobrado 01.182% de Taxa Sobre o Produto</p></div>
         <div class="promo-holder">
            <input class="textfield" type="text" id="LuckCard" placeholder="LUCKCARD">
            <input class="textfield" type="text" id="sc" placeholder="COD SC">
            <input  type="hidden" id="quant" value="1">
            <input  type="hidden" id="case2" value="Nothing">
            <a href="#" class="btn-action" id="btnCard"><span>Abrir Caixa</span></a>
         </div>
         <div class="bottom-block">
         <div class="title">Ou Adicione um Codigo Promocional ou um Gift Card:</div>
         <div class="promo-holder">
            <input class="textfield" type="text" id="redeemInput" placeholder="Coloque o Codigo aqui">
            <a href="#" class="btn-action" id="redeemButton"><span>Usar Agora</span></a>
         </div>
         </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      
      <div class="modal case-modal" id="caseWin2" tabindex="-1" role="dialog" style="a">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      <div class="modal-title"><span id="DedorLeilao">asd </span><span>Esta vendendo</span></div>
      <div class="items"><div class="item-big-weapon" id="prize-83"><div class="big-title" id="NameWFeast">Tarantula (30 Dias) | Army Chich</div><div class="image milspec"><img id="imgweapon" src="http://127.0.0.1/template/imgs/weapons_drops/193/TARANTULA_ARMYCHICH.png"></div></div></div>
      <div class="buttons">
      <div class="buttons-holder">
      <a id="urlperfil" href="/profile/" <button type="button" class="btn-lance btn-replay"><span id="Ganhandol">Ver Perfil do Vendedor</span></button></a>
      </div>
      <div class="buttons-holder">
      <input class="textfield" type="hidden" id="SessL" value="teste">
      <button type="button" id="Lance" class="btn-action btn-big btn-mass-sell"><span><i class="fa fa-shopping-cart"></i>Comprar Por <span class=""><i class="fa fa-usd"></i> <span id="ValueL">9.84</span></span></span></button>
      </div>
      </div>
      
      </div>
      </div>
      </div>
      </div>
      
      <div class="modal fade" id="LeilolarItem" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      <div class="modal-body">
      <div class="balance-holder">
      <div class="title">Anunciar Um Item</div>
      <form method="post" action="https://casedrop.com/br/user/refill" id="refill-form">
      <div class="balance-input">
      <div class="items"><div class="item-big-weapon" id="prize-83"><div class="big-title" id="NameWFeast">Tarantula (30 Dias) | Army Chich</div><div class="image milspec"><img width="200" height="200" id="llimg" src="http://127.0.0.1/template/imgs/weapons_drops/193/TARANTULA_ARMYCHICH.png"></div></div></div>
      </div>
      </form>
      <div class="row-holder">
      <span class="text">Se o item não for vendido em 7 dias,ele é devolvido a você.</span>
      </div>
      
      <div class="notice">Atenção, após por seu item na loja, não sera possível retirá-lo enquanto não for vendido,caso não seja vendido  em 7 Dias,sera devolvido..</div>
      <div class="bottom-block">
      <div class="title">Qual será Preço?:</div>
      <div class="promo-holder">
      <input class="textfield" name="pricell" type="text" id="LeilaoPreco" placeholder="5.00" maxlength="5" pattern="[0-9]*">
      <input type="hidden" name="sessaoll" id="LeilaoSes" value="">
      <a href="#" class="btn-action" id="Leilol"><span>Anunciar</span></a>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      
      
      <div class="modal case-modal fade" id="balanceWin" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      <div class="modal-title"><span>Seu prêmio</span></div>
      <div class="items">
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="modal fade modal-discount modal-email" id="modal-email" tabindex="-1" role="dialog" aria-labelledby="modal-email" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Enter your email so we will notify you about the winning!</h5>
      </div>
      <div class="modal-body balance-holder form-group">
      <input class="textfield" type="email" placeholder="Enter email" name="email" id="input-email" data-bv-notempty="true"
         data-bv-notempty-message="The email address is required and cannot be empty"
         data-bv-emailaddress="true"
         data-bv-emailaddress-message="This is not a valid email address.">
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary btn-block" id="button-save-email" data-game-id=""><span>Join</span></button>
      </div>
      </div>
      </div>
      </div>
      <div id="modal-giveaway-hourly2" class="modal modal-giveaway fade" tabindex="-1" role="dialog" aria-labelledby="modal-discount" aria-hidden="true">
      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-body">
      <h2>To participat in the giveaway</h2>
      <div class="modal-info">
         <strong>-You must refill your account for at least <i>$5</i> </strong>
         <p>If you follow this condition, you will get access to all hourly giveaways forever.</p>
         <strong>How it works:</strong>
         <p>We have a free giveaway hour timer. For participation you need to click the "JOIN THIS GIVEAWAY" tab. When it ends, the system selects one winner randomly.</p>
         <p>Winner will find his prize in the use profile inventory.</p>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="modal case-modal fade" id="profileedit" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 600px;">
      <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"><span
         aria-hidden="true">×</span></button>
      <div class="balance-holder order-holder">
         <div class="modal-title"><span>Edite Seu Perfil</span></div>
         <div class="title">Url da sua Imagem</div>
         <div class="title">Ei! para sua imagem ficar perfeita,use uma imagem com 600 de altura e largura, ou maior que isso.</div>
         <div class="email-holder">
            <input class="textfield order-email" type="text" id="input-tradeurl" placeholder="http://urldaimage.com/imagem.jpg">
         </div>
      </div>
      <div class="buttons">
         <div class="buttons-holder">
         <a href="#" class="btn-action" id="btn-saveurl"><span>SALVAR</span></a>
         </div>
      </div>
      <div class="modal-title" style="margin: 15px;"><span>Banners</span></div>
      <div class="items">'; ?>
   <?php Banners($ConnOK, $Logado, $BannerLogado); echo '</div>'?>
   <?php echo
      '<div class="modal-title"><span>Molduras</span></div>
      <div class="buttons">
      <div class="buttons-holder">
      <a href="#" class="btn-action" id="ExibirMolduras"><span id="BExibirM">Exibir</span></a>
      </div>
      </div>
      <div class="items TTeste" id="MoldurasLista" style="display: none;"> '; ?>
   <?php Frames($ConnOK, $Logado, $MolduraLogado); echo '</div>'?>
   <?php echo '</div>
      </div>
      </div>
      </div>
      ';
            }else{
               echo '<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                       <div class="modal-body">
                           <div class="login-holder">
                               <p>Para abrir caixas ou realizar ações, inicie sessão com sua conta.<br>Isto é necessário para obter os seus ganhos</p>
                               <a href="#" data-type="login" class="btn btn-login">
                                   <i class="fa fa-free-code-camp mr-0"></i>
                                   <span class="ml-1">Iniciar sessão</span>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
               <div class="modal fade modal-discount" id="modal-discount" tabindex="-1" role="dialog" aria-labelledby="modal-discount" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title"><i class="fa fa-usd mr-1"></i>20.00 de graça!</h5>
                       </div>
                       <div class="modal-body">
                           <p class="modal-text">Obtenha 20$ No site para gastar como quiser!. Adicione o codigo apos se registrar!</p>
                       </div>
                       <div class="modal-footer" style="display: flow-root;">
                           <p class="modal-text" style="color: #62dcf3;font-size: 22px;">2020</p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="modal fade modal-discount modal-email" id="modal-email" tabindex="-1" role="dialog" aria-labelledby="modal-email" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Você precisa logar primeiro!</h5>
      </div>
      <div class="modal-footer">
         <button class="btn btn-primary btn-block" onclick="location.href=\'/login\';" ><span>Entrar</span></button>
      </div>
      </div>
      </div>
      </div>
      <div class="modal fade modal-discount modal-email show" id="dark" tabindex="-1" role="dialog" aria-labelledby="modal-email" style="display: ; background-color: rgba(31, 1, 11, 0.38); padding-right: 5px;">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Eae, qual vai ser hoje?</h5>
      </div>
      <div class="modal-footer" style="    align-items: baseline;">
         <button class="btn btn-secundary btn-block" onclick="Thema(\'Dark\')"><span>Modo Dark</span></button>
         <button class="btn btn-secundary btn-block" onclick="Thema(\'Light\')"><span>Modo Light</span></button>
      </div>
      </div>
      </div>
      </div>
      '
      ;
      
            }
            if(@$_COOKIE['thema'] == 'V12'){
               echo '<div class="col-2 NovidadesBox"><img id="NewsBG" src="/template/imgs/UI_V12/Tools/News.png" style="position: absolute;">
                        <div id="WeaponsNws">';                       
                              echo NewsDrops($ConnOK);
                              echo '</div>
                           </div>';
            }
            ?>
   <?php if(@$URL[0] == 'wallet'){
      echo '<div class="wrapper-content2">';
      }else{
      echo '<div class="wrapper-content">';
      }
      ?>
   <?php
      $URL[0] = ($URL[0] != '' ? $URL[0] : 'home');
       
      if (file_exists('private/Views/' . $URL[0] . '.php')):
          require('private/Views/' . $URL[0] . '.php');
      elseif (is_dir('private/Views/' . $URL[0])):
          if (isset($URL[1]) && file_exists('private/Views/' . $URL[0] . '.php')):
              require('private/Views/' . $URL[0] .'.php');
          else:
            echo '<script>window.location.replace("/home");</script>';
                  die();
          endif;
      else:
         echo '<script>window.location.replace("/home");</script>';
                  die();
      endif;    
      
      if(@$_COOKIE['thema'] == 'V12'){
         echo '<script src="/template/js/more.js?v=1.0.1" type="text/javascript"></script>';
      }
              ?>
   <script>
      function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
      }
      
      
      function Thema(Select) {
         const Themes = ["dark","light","v12"]
         if(Themes.find(thema => thema === Select.toLowerCase()) !== -1){
            document.cookie = `thema=${Select.toLowerCase()}; path=/`;
            location.reload();
         }
      }

      
      <?php if(!isset($_COOKIE['thema'])){
         echo 'var x = document.getElementById("dark");
               if (x.style.display === "") {
                  x.style.display = "block";
               } else {
                  x.style.display = "none";
               }
         ';
         }
         ?>
      
      
   </script>