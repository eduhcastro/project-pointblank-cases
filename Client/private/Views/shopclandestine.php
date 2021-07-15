<div class="case-contains">
            <h3 class="shop">Bem vindo a Loja Clandestina!</h3>
    <h6 class="shop">A Loja Clandestina é um lugar para você vender comprar/vender itens exclusivos! por um preço abaixo ou acima do que comprou. Anuncio totalmente gratis, e não há taxas de vendas,ou de compra!</h6></br>
            <div class="list-small-cases">
               
	





<?php Leilao($ConnOK, $Logado); ?>


    
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
function sum(input){
             
             if (toString.call(input) !== "[object Array]")
                return false;
                  
                        var total =  0;
                        for(var i=0;i<input.length;i++)
                          {                  
                            if(isNaN(input[i])){
                            continue;
                             }
                              total += Number(input[i]);
                           }
                         return total;
                        }

<?php if(@$_SESSION['username'] != null){
  echo "function MyDiv(Sessao,Dono,ImgWeapon,NameW,UltimoL,PrecoL) {
  $('#caseWin2').modal('show');
  $('#DedorLeilao').text(Dono+' ');
  $('#ValueL').text(PrecoL);
  $('#NameWFeast').text(NameW+' 30 Dias');
  $('#SessL').attr('value', Sessao);
  $('#imgweapon').attr('src', '/template/imgs/weapons_drops/fast_buy/'+ImgWeapon+'.png');
$('#urlperfil').attr('href', '/profile/'+Dono);
  }";
}else{
    echo "function MyDiv(Sessao,Dono,ImgWeapon,NameW,UltimoL,PrecoL) {
        $('#login').modal('show');
    }";
} ?>
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
  document.title = 'PAN+ Clandestino';
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