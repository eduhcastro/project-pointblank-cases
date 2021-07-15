<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.container {
  color: #333;
  margin: 0 auto;
  text-align: center;
}

h1 {
  font-weight: normal;
  letter-spacing: .125rem;
  text-transform: uppercase;
}

.lia {
  display: inline-block;
  font-size: 1.9em;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}

.lia-span {
  display: block;
  font-size: 4.5rem;
}

.message {
  font-size: 4rem;
}

#content {
  display: none;
  padding: 1rem;
}

.emoji {
  padding: 0 .25rem;
}

@media all and (max-width: 768px) {
  h1 {
    font-size: 1.5rem;
  }
  
  .lia {
    font-size: 1.100rem;
    padding: .75rem;
  }
  
  .lia-span {
    font-size: 3.375rem;
  }
}

.centered {
  position: relative;
  display: block;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}

@media only screen and (max-width: 768px) {
.centered {
  position: relative;
  display: block;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}
}

.modifi{
  color: white;
}
</style>
<div class="case-contains">    
    <img src="/imgs/luckcat.png" class="center"></img></br>
    <div id="countdown">
    <h2 class="centered modifi">O Evento acontecera daqui há</h2>
    <ul class="centered modifi">
      <li class="lia span"><span id="days"></span>Dias</li>
      <li class="lia span"><span id="hours"></span>H</li>
      <li class="lia span"><span id="minutes"></span>M</li>
      <li class="lia span"><span id="seconds"></span>S</li>
    </ul>
  </div>
  <h5 class="modifi">Participantes</h5>
            <div class="list-small-cases">




<?php AllUsers($ConnOK, $Logado); ?>


    
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


    <!-- custom scripts -->
    <script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
    <script defer src="/template/js/main.js?v=2.0.1" type="text/javascript"></script>
    <script defer src="/template/js/livedrop.js?v=2.0.1" type="text/javascript"></script>
    <script defer src="/template/js/giveaway.js?v=2.0.1" type="text/javascript"></script>
    <script src="/template/js/app.js?v=2.0.1" type="text/javascript"></script>
    <script src="/template/js/auth.js?v=2.0.1" type="text/javascript"></script>

<script>

(function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  let birthday = "Nov 28, 2020 22:00:00",
      countDown = new Date(birthday).getTime(),
      x = setInterval(function() {    

        let now = new Date().getTime(),
            distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          let headline = document.getElementById("headline"),
              countdown = document.getElementById("countdown"),
              content = document.getElementById("content");

          headline.innerText = "It's my birthday!";
          countdown.style.display = "none";
          content.style.display = "block";

          clearInterval(x);
        }
        //seconds
      }, 0)
  }());



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