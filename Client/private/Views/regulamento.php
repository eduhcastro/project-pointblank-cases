<style>
.imagemr {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
}
</style>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-4 text-white mt-3">
                <div class="headline">Perguntas Frequentes</div>
                <div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
                    <div class="card">
    <div class="card-header" role="tab">
        <p class="mb-0"> <a class="text-white collapsed" data-toggle="collapse" data-parent="#accordion" href="#question1" aria-expanded="false"> <i class="fa fa-angle-down fa-lg mr-2"></i> Como posso arrumar creditos para o Site?</a> </p>
    </div>
    <div id="question1" class="collapse" role="tabpanel" aria-expanded="false">
        <div class="card-block"> Você pode obter creditos atraves de VIP,ou comprando direto do nosso site principal.</div>
    </div>
</div>

<div class="card">
    <div class="card-header" role="tab">
        <p class="mb-0"> <a class="text-white collapsed" data-toggle="collapse" data-parent="#accordion" href="#question2" aria-expanded="false"> <i class="fa fa-angle-down fa-lg mr-2"></i> Após retirar meu item,quanto tempo demora para ser inserido na conta?</a> </p>
    </div>
    <div id="question2" class="collapse" role="tabpanel" aria-expanded="false">
        <div class="card-block"> O Tempo comum são 24 horas após a reivindicação.</div>
    </div>
</div>

<div class="card">
    <div class="card-header" role="tab">
        <p class="mb-0"> <a class="text-white collapsed" data-toggle="collapse" data-parent="#accordion" href="#question3" aria-expanded="false"> <i class="fa fa-angle-down fa-lg mr-2"></i> Como funciona o LuckCard?</a> </p>
    </div>
    <div id="question3" class="collapse" role="tabpanel" aria-expanded="false">
        <div class="card-block">  O LuckCard foi criado com o intuito do usuário poder compartilhar seu Saldo com seus amigos. Aviso: Cobranças extras serão feitas quando usado. Use O LuckCard para abrir caixas,Fast Buy e muito mais!</div>
    </div>
</div>

<div class="card">
    <div class="card-header" role="tab">
        <p class="mb-0"> <a class="text-white collapsed" data-toggle="collapse" data-parent="#accordion" href="#question4" aria-expanded="false"> <i class="fa fa-angle-down fa-lg mr-2"></i> O que é exigido para ter um LuckCard?</a> </p>
    </div>
    <div id="question4" class="collapse" role="tabpanel" aria-expanded="false">
        <div class="card-block"> Sua patente deve ser maior que Major, e deve ter gastado no Minimo $30(Creditos) no Site. (Usuarios VIPS Tem acesso Livre)</div>
    </div>
</div>

<div class="card">
    <div class="card-header" role="tab">
        <p class="mb-0"> <a class="text-white collapsed" data-toggle="collapse" data-parent="#accordion" href="#question5" aria-expanded="false"> <i class="fa fa-angle-down fa-lg mr-2"></i> O que é Fast Buy?</a> </p>
    </div>
    <div id="question5" class="collapse" role="tabpanel" aria-expanded="false">
        <div class="card-block"> O FastBuy é uma loja rapida,aonde você pode comprar armas raras(Normalmente todas são 30 Dias),um usuario tem direito de comprar somente uma unidade. (30D = 30Dias).
        <img src="/template/imgs/fastbuy.png" class="imagemr">

        </div>
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
  document.title = 'PAN+ Regulamento'; 
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
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-103608860-1"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments)};
   gtag('js', new Date());
   
   gtag('config', 'UA-103608860-1');
</script>
<!-- Google Analytics -->
<script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
   
   ga('create', 'UA-103608860-1', 'auto');
   ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function (d, w, c) {
       (w[c] = w[c] || []).push(function() {
           try {
               w.yaCounter46099161 = new Ya.Metrika({
                   id:46099161,
                   clickmap:true,
                   trackLinks:true,
                   accurateTrackBounce:true,
                   webvisor:true
               });
           } catch(e) { }
       });
   
       var n = d.getElementsByTagName("script")[0],
           s = d.createElement("script"),
           f = function () { n.parentNode.insertBefore(s, n); };
       s.type = "text/javascript";
       s.async = true;
       s.src = "https://mc.yandex.ru/metrika/watch.js";
   
       if (w.opera == "[object Opera]") {
           d.addEventListener("DOMContentLoaded", f, false);
       } else { f(); }
   })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
   <div><img src="https://mc.yandex.ru/watch/46099161" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>