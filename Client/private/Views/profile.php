<?php
   $Solicitado = PerfilSolicitado($REQUEST_URI_PASTA = substr($REQUEST_URI, 1), $ConnOK);
   $UrlAqui = clean($URL[1]);
   $Visitante = clean(@$URL[2]);
   $PaginaHref = SomenteNumero(@$URL[2]);
   $ConexaoPB = ConexaoPB();
   $AcaoVisitante = ProfileVisitante($Visitante,@$Logado,$UrlAqui);
   $PaginaAtual = $PaginaHref;
   if (!$PaginaAtual){ $pc = "1"; }else{ $pc = $PaginaAtual; }
   $inicio = $pc - 1; $inicio = $inicio * 70;
   ?>
<div class="container-fluid">
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
               <?php echo $Solicitado[0]; ?>
            </li>
         </ol>
      </div>
   </div>
   <?php 
      if($AcaoVisitante !== 0){
      if(@$Sessao[0] === $UrlAqui){ ?>
   <div class="block-profile">
      <div class="avatar">
         <?php if($Solicitado[4] !== null){
            echo '<div class="molder">
                  <img src="/template/imgs/UI_V12/Molders_Profiles/'.$Solicitado[4].'" alt="casedrop.com">
             </div>';
                 } ?>
         <img src="<?php echo $Sessao[5]; ?>" alt="casedrop.com">
      </div>
      <div class="user-info" style="background-image: url(/template/imgs/UI_V12/Banners_Profiles/<?php echo $Solicitado[3]; ?>.gif);background-repeat: no-repeat; background-size: contain; background-position: top;">
         <div class="name">  <?php echo $Solicitado[0]; ?></div>
         <a class="link" href="https://steamcommunity.com/profiles/76561199053976464" target="_blank">Perfil</a>
         <div class="balance-buttons">
            <a href="#" class="btn-action btn-big" data-toggle="modal" data-target="#modal-balance" onclick="ga('send', 'event', 'Add Funds', 'click', 'Profile');"><span>Adicionar fundos</span></a>
            <span class="balance "><i class="fa fa-usd"></i> <?php echo $Sessao[3]; ?></span>
            <a href="#" class="btn-action btn-big" data-toggle="modal" data-target="#profileedit" onclick="ga('send', 'event', 'Add Funds', 'click', 'Profile');"><span>Personalizar Perfil</span></a>
         </div>
      </div>
      <!--- 
         <div class="trade-block">
             <div class="head">
                 <div class="title"><span class="fa fa-link mr-1"></span>Url da sua Imagem</div>
                 <a href="https://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url" target="_blank" class="link">Como funciona?</a>
             </div>
         
                         <div>
                     <div class="trade-link">
                         <i class="fa fa-close"></i>
                         <div class="text">Inserir sua URL Para Imagem</div>
                         <span>CLIQUE PARA EDITAR</span>
                     </div>
                     <div class="trade-form hidden">
                         <input type="text" value="" id="input-tradeurlXXX" placeholder="http://urldaimage.com/imagem.jpg">
                         <a href="#" class="btn-action" id="btn-saveurlXXX"><span>SALVAR</span></a>
                     </div> 
                     </div>
                       </div>
                     --->
   </div>
   <?php }else{
      $VipArrays = PerfilSolicitadoVIP($Solicitado[0],$ConnOK,$Solicitado[5]);  
          if($VipArrays[0] !== null){
             if($VipArrays[3] !== null){
                
             }
          $Arrumando = explode(";", $VipArrays[1]);
          $Pxs = $Arrumando[0].'px '.$Arrumando[1].'px';
          $Arrumando2 = explode(";", $VipArrays[2]);
          echo '<div class="block-profile center background" style="background-image: url('.$VipArrays[0].'); background-position: '.$Pxs.';">';
      }else{
      echo '<div class="block-profile center">';
      }
      if($VipArrays[2] != null){
         echo '<style>
         .MoveYourProfile.Real{
            display: block;
           left: '.$Arrumando2[1].'px; 
           top: '.$Arrumando2[0].'px;
           }
           @media screen and (max-width: 575px) {
              .MoveYourProfile.Real{
                 position: sticky;
                 display: block;
                 left: 0px; 
                 top: 0px;
             }
          }
        

           </style>';
        echo '<div id="MoveYourProfile" class="MoveYourProfile Real">';
        if($Solicitado[3] != null){
            echo '<div class="user-info banner" style="background-image: url(/template/imgs/UI_V12/Banners_Profiles/'.$Solicitado[3].'.gif);">';
          }else{
              echo '<div class="user-info"">';
          }
          echo '<div class="avatar">';
          if($Solicitado[4] != null){ 
              echo '<div class="molderModificado">
              <img src="/template/imgs/UI_V12/Molders_Profiles/'.$Solicitado[4].'" alt="casedrop.com">
              </div>'; }
             echo '<img src="'.$Solicitado[1].'" alt="">
          </div>
          <div class="name">'.$Solicitado[0].'</div>
          <a class="link" href="https://steamcommunity.com/profiles/76561198011062597" target="_blank">Perfil</a>
        </div>
      </div>
    </div>';
      }else{
      if($Solicitado[3] != null){
      
        echo '<div class="user-info banner" style="background-image: url(/template/imgs/UI_V12/Banners_Profiles/'.$Solicitado[3].'.gif);">';
      }else{
          echo '<div class="user-info"">';
      }
            echo '<div class="avatar">';
            if($Solicitado[4] != null){ 
                echo '<div class="molder">
                <img src="/template/imgs/UI_V12/Molders_Profiles/'.$Solicitado[4].'" alt="casedrop.com">
                </div>'; }
               echo '<img src="'.$Solicitado[1].'" alt="">
            </div>
            <div class="name">'.$Solicitado[0].'</div>
            <a class="link" href="https://steamcommunity.com/profiles/76561198011062597" target="_blank">Perfil</a>
      
        </div>
      </div>';
      }}
      }else{
      if($Solicitado[3] != null){
      echo '  <div class="block-profile center" id="BackGroundDiv" style="height: 218;width: 100%;">
      <div id="MoveYourProfile" style="position: absolute;">
      <div class="user-info" id="mydivheader" style="
      background-image: url(/template/imgs/UI_V12/Banners_Profiles/'.$Solicitado[3].'.gif);
      background-repeat: no-repeat;
      background-size: contain;
      background-position: bottom;
      width: 400px;
      ">';
      }else{
        echo '<div class="block-profile center">
      <div class="user-info">';
      }
          echo '<div class="avatar">';
          if($Solicitado[4] != null){ echo '<div class="molder" style="top: -7px;">
      <img src="/template/imgs/UI_V12/Molders_Profiles/'.$Solicitado[4].'" alt="casedrop.com">
      </div>'; }
             echo '<img src="'.$Solicitado[1].'" alt="">
          </div>
          <div class="name">'.$Solicitado[0].'</div>
          <a class="link" href="https://steamcommunity.com/profiles/76561198011062597" target="_blank">Perfil</a>
      </div>
      </div>
      </div>
      <div id="PerF" Class="PerrF" style="margin: 0px 0px; display: inline-flex;">
      <div class="trade-block" id="ImgemFD">
      <div class="head">
      <div class="title"><span class="fa fa-link mr-1"></span>Imagem de Fundo</div>
      </div>
      
              <div>
          <div class="trade-link">
              <i class="fa fa-close"></i>
              <div class="text">Inserir sua URL Para Imagem</div>
              <span>CLIQUE PARA EDITAR</span>
          </div>
          <div class="trade-form hidden">
              <input type="text" value="" id="ImageUrl" placeholder="http://urldaimage.com/imagem.jpg">
              <a href="#" class="btn-action" id="ButonUrl"><span>Testar</span></a>
              <a href="#" class="btn-action" id="ButaoUrl2" style="display: none;"><span>Salvar</span></a>
              <a href="#" class="btn-action" id="ButaoUrl3" style="display: none;"><span>Cancelar</span></a>
          </div> 
          </div>
            </div>
            <div id="Butao">
            <a href="#" class="btn-action btn-big" id="PosicaoPerfil" style="margin: 32px 0px 1px 15px;"><span id="SpanPB">Posição Perfil</span></a>
            </div>
            <div id="Butao2" style="display: none;">
            <a href="#" class="btn-action btn-big" id="SalvarPBS" style="margin: 32px 0px 1px 15px;"><span>Salvar</span></a>
            <a href="#" class="btn-action btn-big" id="SpanPBCancel" style="margin: 32px 0px 1px 15px;"><span>Cancelar</span></a>
            </div>
      </div>
      <input id="StatusD" value="false" style="display: none;">
      ';
      }
      ?>
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
      </style>
      <div class="trade-info" style="display:none">
         <table class="table-trade">
            <tr>
               <th>Item</th>
               <th width="60%">Status</th>
            </tr>
         </table>
         <br>
         <div class="contacts">
            If you have any questions contact us <a href="/cdn-cgi/l/email-protection#b4c7c1c4c4dbc6c0f4d7d5c7d1d0c6dbc49ad7dbd9"><span class="__cf_email__" data-cfemail="64171114140b1610240705170100160b144a070b09">[email&#160;protected]</span></a>
         </div>
      </div>
   </div>
   <?php if($AcaoVisitante == 0){
      echo '<div class="case-contains" style="filter: blur(8px); display: block;">';
      }else{
          echo '<div class="case-contains">';
      } ?>
   <div class="heading">
      <ul class="nav" role="tablist">
         <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#items" role="tab">ITENS CAIXAS</a>
         </li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#itemsex" role="tab">ITENS EXCLUSIVOS</a>
         </li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#itemspb" role="tab">INVENTÁRIO</a>
         </li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#amigos" role="tab">AMIGOS</a>
         </li>
      </ul>
      <div class="row-info">
         <span><?php echo $Solicitado[2]; ?></span> caixas abertas
      </div>
   </div>
   <div class="tab-content">
      <div class="tab-pane active" id="items">
         <div class="list-small-cases">
            <?php PerfilSolicitadoArmas($ConnOK, $UrlAqui, $inicio)?>
         </div>
      </div>
      <div class="tab-pane" id="itemspb">
         <div class="list-small-cases">
            <?php SolicitacaoArmasPB($ConexaoPB, PerfilLogado($UrlAqui, $ConnOK)[4])?>
         </div>
      </div>
      <div class="tab-pane" id="amigos">
         <div class="list-small-cases">
            <?php AmigosPB($ConexaoPB, PerfilLogado($UrlAqui, $ConnOK)[4], $ConnOK)?>
         </div>
      </div>
      <div class="tab-pane" id="itemsex">
         <div class="list-small-cases">
            <?php PerfilSolicitadoArmasExclusivas($ConnOK, $UrlAqui)?>
         </div>
      </div>
      <ul class="pagination">
         <?php PerfilSolicitadoArmasPaginacao($PaginaAtual,PerfilSolicitadoArmasCount($ConnOK,$UrlAqui),$UrlAqui); ?>
      </ul>
   </div>
</div>
<?php include 'private/Views/extra/footer.php'; ?>
<script src="/template/vendor/noty/velocity.min.js" type="text/javascript"></script>
<script src="/template/vendor/noty/noty.min.js" type="text/javascript"></script>
<script src="/template/vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js" type="text/javascript"></script>
<script defer src="/template/vendor/bootstrap4beta/js/popper.min.js"></script>
<script defer src="/template/vendor/bootstrap4beta/js/bootstrap.min.js" type="text/javascript"></script>
<script defer src="/template/vendor/js.cookie/js.cookie.js" type="text/javascript"></script>
<script src="/template/vendor/animateNumber/jquery.animateNumber.min.js"></script>
<script> 
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
<script defer src="/template/js/livedrop.js?v=2.0.1" type="text/javascript"></script>
<script defer src="/template/js/giveaway.js?v=2.0.1" type="text/javascript"></script>
<script src="/template/js/app.js?v=2.0.1" type="text/javascript"></script>
<script src="/template/js/auth.js?v=2.0.1" type="text/javascript"></script>
<script>
   var translation = {
       sold: "Vendido",
       waiting: "Aguardando",
       accepted: "Aceito",
       wrongTradeURL: "URL de troca incorreta"
   };
   var routes = {
       "sell": "/giveaway/sell",
       "send": "https://casedrop.com/br/prize/send",
       "saveTradeURL": "/giveaway/newphoto",
       "order": "https://casedrop.com/br/prize/order",
       "marketReorder": "https://casedrop.com/br/prize/market/reorder",
       "sendOrder": "https://casedrop.com/br/prize/sendOrder",
       "sellRequested": "https://casedrop.com/br/prize/sellRequested",
       "csell": "https://casedrop.com/br/cprize/sell",
       "csend": "https://casedrop.com/br/cprize/send",
       "corder": "https://casedrop.com/br/cprize/order",
       "cmarketReorder": "https://casedrop.com/br/cprize/market/reorder",
       "csendOrder": "https://casedrop.com/br/cprize/sendOrder",
       "csellRequested": "https://casedrop.com/br/cprize/sellRequested",
       "backXY": "/settings/backXY",
       "userXY": "/settings/userXY",
       "leiloar": "/giveaway/leiloar",
       "newbanner": "/giveaway/buybanner",
       "usebanner": "/giveaway/usebanner",
       "newframe": "/giveaway/buyframe",
       "useframe": "/giveaway/useframe"
   };
   
   var profile = {};
   profile.templates = {
       "row": '<tr data-row=""><td class="item-name"></td><td class="item-status"></td></tr>',
       "error": '<span class="table-error"></span>',
       "storage": {
           "sell": "",
           "send": '<span class="table-good">Your Item is now unlocked and ready for Trade.</span><a href="#" class="btn-case-action send btn-send-order" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Send">Send</a>'
       },
       "request": {
           "sell": '<a href="#" class="btn-case-action sell action-sell-requested" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Sell item">Sell for<i class="fa fa-usd"></i><span class="price"></span></a>',
           "send": '<a href="#" class="btn-case-action send  btn-send-order" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Send item">Re-send</a>'
       },
       "withdraw": {
           "sell": '<a href="#" class="btn-case-action sell action-sell-requested" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Sell item">Sell for<i class="fa fa-usd"></i><span class="price"></span></a>',
           "send": '<a href="#" class="btn-case-action send  btn-send-order" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Send item">Re-send</a>'
       },
       "market": {
           "again":'<a href="#" class="btn-case-action send action-market-reorder" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="">Try again</a>',
           "sell": '<a href="#" class="btn-case-action sell action-sell" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Sell item">Sell for<i class="fa fa-usd"></i><span class="price"></span></a>',
           "send": '<a href="#" class="btn-case-action send action-send" data-id="" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="">Order</a>'
       }
   };
   
</script>
<script defer src="/template/js/profile.js?v=2.0.1"></script>
<script defer src="/template/js/profile_v12.js?v=3.0.222"></script>
<script>
  profile = $('.name').first().text();
  document.title = 'PAN+ '+profile; 
   document.getElementById("LeilaoPreco").onblur =function (){    
       this.value = parseFloat(this.value.replace(/,/g, ""))
                       .toFixed(2)
                       .toString()
                       .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
       
       
   }
   
       function cookies_ok() {
           Cookies.set('cookiesLaw', 'true');
           $('#cookies-law').attr("style", "display:none");
           return false;
       }
   
       $(function () {
           if (!Cookies.get('cookiesLaw') === true) {
               $('#cookies-law').attr("style", "display:block");
           }
       });
   
   
</script>
<!-- /Yandex.Metrika counter -->
</body>
</html>