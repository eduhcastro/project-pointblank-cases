<div class="container-fluid">
   <div class="row row-bg hidden-xs-down" id="live-stats" style="display: none">
      <div class="col-sm-8 col-lg-3">
         <div class="stat-block success">
            <h5 class="title">
               <i class="fa fa-star-o"></i>
               TOTAL DE CAIXAS ABERTAS                    
            </h5>
            <p class="text" id="live-stats-caseopenedtotal">0</p>
         </div>
      </div>
      <div class="col-sm-8 col-lg-4">
         <div class="stat-block danger">
            <h5 class="title">
               <i class="fa fa-calendar-check-o"></i>
               DINHEIRO NA BANCA                    
            </h5>
            <p class="text" id="live-stats-caseopenedtoday">0  </p> <p class="text">  $</p>
         </div>
      </div>
      <div class="col-sm-8 col-lg-3">
         <div class="stat-block warning">
            <h5 class="title">
               <i class="fa fa-user-o"></i>
               USUÁRIOS                    
            </h5>
            <p class="text" id="live-stats-users">0</p>
         </div>
      </div>
      <div class="col-sm-8 col-lg-2">
         <div class="stat-block primary">
            <h5 class="title">
               <i class="fa fa-wifi"></i>
               ONLINE                    
            </h5>
            <p class="text" id="live-stats-online">0</p>
         </div>
      </div>

      <div class="col-sm-8 col-lg-3">
         <div class="stat-block supreme">
            <h5 class="title">
               <i class="fa fa-user-o"></i>
               MAIOR USUARIO                   
            </h5>
             <p class="text" id="live-stats-supreme">ROOT
             <div id="live-stats-banner" class="bannertop"></div> 
         </div>
      </div>


   </div>
   <div class="giveaway-list" style="color: #fff;">
      
      <?php CompraRapida($ConnOK,$Logado); ?>
      
   </div>
   <div class="rows-striped">
      <div class="row">
         <div class="col-sm-16">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">
                     <i class="fa fa-gift mr-1"></i>
                     Ultimas Caixas Lançadas
                  </h5>
               </div>
               <div class="list-cases">
                  <?php echo CasesHome($ConnOK); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-16">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">
                     <i class="fa fa-gift mr-1"></i>
                   Caixas Raras Do Mês
                  </h5>
               </div>
               <div class="list-cases">
               <?php echo Raros($ConnOK); ?>
            </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-16">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">
                     <i class="fa fa-gift mr-1"></i>
                     Caixas Comuns Do Mês
                  </h5>
               </div>
               <div class="list-cases">
               <?php echo Padroes($ConnOK); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-16">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">
                     <i class="fa fa-gift mr-1"></i>
                     Personagens/Acessórios
                  </h5>
               </div>
               <div class="list-cases">
               <?php echo Person_Itens($ConnOK); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-16">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">
                     <i class="fa fa-gift mr-1"></i>
                     Cases In Cases
                  </h5>
               </div>
               <div class="list-cases">
                  
               </div>
            </div>
         </div>
      </div>
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

<!-- /Yandex.Metrika counter -->
</body>
