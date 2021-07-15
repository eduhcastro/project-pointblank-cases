<?php
if (@$URL[1] == 'token') {
    header('Content-Type: application/json');
    if ((@$_SESSION['username'])) {
        echo '{"result":true}';
        exit;
    } else {
        echo '{"result":false}';
        exit;
    }
}
if ((@$_SESSION['username'])) {
    echo "<script>window.location = '/';</script>";
    exit;
}
if ($_POST) {
    $Usuario = $_POST['user'];
    $Senha = $_POST['senha'];
    $Token = $_POST['token'];
    Login($Usuario, $Senha, $Token, ConexaoPB(), $ConnOK);
}
?>
<html lang="pt">
   <head>
      <meta charSet="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
         />
      <!--&lt;!&ndash; SpeedCurve LUX &ndash;&gt;-->
      <script>
         LUX=(function(){var a=("undefined"!==typeof(LUX)&&"undefined"!==typeof(LUX.gaMarks)?LUX.gaMarks:[]);var d=("undefined"!==typeof(LUX)&&"undefined"!==typeof(LUX.gaMeasures)?LUX.gaMeasures:[]);var j="LUX_start";var k=window.performance;var l=("undefined"!==typeof(LUX)&&LUX.ns?LUX.ns:(Date.now?Date.now():+(new Date())));if(k&&k.timing&&k.timing.navigationStart){l=k.timing.navigationStart}function f(){if(k&&k.now){return k.now()}var o=Date.now?Date.now():+(new Date());return o-l}function b(n){if(k){if(k.mark){return k.mark(n)}else{if(k.webkitMark){return k.webkitMark(n)}}}a.push({name:n,entryType:"mark",startTime:f(),duration:0});return}function m(p,t,n){if("undefined"===typeof(t)&&h(j)){t=j}if(k){if(k.measure){if(t){if(n){return k.measure(p,t,n)}else{return k.measure(p,t)}}else{return k.measure(p)}}else{if(k.webkitMeasure){return k.webkitMeasure(p,t,n)}}}var r=0,o=f();if(t){var s=h(t);if(s){r=s.startTime}else{if(k&&k.timing&&k.timing[t]){r=k.timing[t]-k.timing.navigationStart}else{return}}}if(n){var q=h(n);if(q){o=q.startTime}else{if(k&&k.timing&&k.timing[n]){o=k.timing[n]-k.timing.navigationStart}else{return}}}d.push({name:p,entryType:"measure",startTime:r,duration:(o-r)});return}function h(n){return c(n,g())}function c(p,o){for(i=o.length-1;i>=0;i--){var n=o[i];if(p===n.name){return n}}return undefined}function g(){if(k){if(k.getEntriesByType){return k.getEntriesByType("mark")}else{if(k.webkitGetEntriesByType){return k.webkitGetEntriesByType("mark")}}}return a}return{mark:b,measure:m,gaMarks:a,gaMeasures:d}})();LUX.ns=(Date.now?Date.now():+(new Date()));LUX.ac=[];LUX.cmd=function(a){LUX.ac.push(a)};LUX.init=function(){LUX.cmd(["init"])};LUX.send=function(){LUX.cmd(["send"])};LUX.addData=function(a,b){LUX.cmd(["addData",a,b])};LUX_ae=[];window.addEventListener("error",function(a){LUX_ae.push(a)});LUX_al=[];if("function"===typeof(PerformanceObserver)&&"function"===typeof(PerformanceLongTaskTiming)){var LongTaskObserver=new PerformanceObserver(function(c){var b=c.getEntries();for(var a=0;a<b.length;a++){var d=b[a];LUX_al.push(d)}});try{LongTaskObserver.observe({type:["longtask"]})}catch(e){}};
      </script>
      <script src="https://www.google.com/recaptcha/api.js?render=6Ld6k6kZAAAAAFHbKGC5CUE0e1jTy9FFiiEl2cyW"></script>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6Ld6k6kZAAAAAFHbKGC5CUE0e1jTy9FFiiEl2cyW', {action: 'userForm'}).then(function(token) {
         // console.log(token);
         document.getElementById("token").value = token;
		 
      });
  });
  
  </script>
      <script src="https://cdn.speedcurve.com/js/lux.js?id=94578851" async defer crossorigin="anonymous"></script>
      <title data-rh="true">Caixas Point Blank - Missao Luck</title>
      <meta data-rh="true" name="description" content="Entre e faça uma aposta - lucro turbinado diariamente, altos limites de aposta e saques instantâneos te aguardam!"/>
      <meta data-rh="true" property="og:image:width" content="1200"/>
      <meta data-rh="true" property="og:image:height" content="1200"/>
      <meta data-rh="true" property="og:url" content="https://sportsbet.io"/>
      <meta data-rh="true" property="og:image" content="https://sportsbet.io/sports/assets/favicons/open-graph-1200x1200.png"/>
      <!-- <link rel="preload | preconnect | dns-prefetch | preftech"/> -->
      <link rel="preload" as="font" href="https://sportsbet.io/sportsbet-io/files/fonts/averta-std/regular.woff2" type="font/woff2"  crossorigin />
      <link rel="preload" as="font" href="https://sportsbet.io/sportsbet-io/files/fonts/averta-std/semibold.woff2" type="font/woff2"  crossorigin />
      <link rel="preload" as="font" href="https://sportsbet.io/sportsbet-io/files/fonts/averta-std/bold.woff2" type="font/woff2"  crossorigin />
      <link rel="preload" href="/id/bundles/runtime~main.0de5a6005b79560baed8.bundle.js" as="script"/>
      <link rel="preload" href="/id/bundles/main.e0cc42d5a8b8cf5498ba.bundle.js" as="script"/>
      <link rel="preload" href="/id/bundles/vendors~Forgot~Login~Login2fa~Reset~Signup~SocialSignup~Success~Verify.bdce2045525ab6802ecd.bundle.js" as="script"/>
      <link rel="preload" href="/id/bundles/vendors~Forgot~Login~Login2fa~Reset~Signup~SocialSignup~Success.e1f4593c64741b182125.bundle.js" as="script"/>
      <link rel="preload" href="/id/bundles/vendors~AuthCallback~Login~Login2fa~PopupAuthCallback~Signup.02a1ce2619b7c7492a14.bundle.js" as="script"/>
      <link rel="preload" href="/id/bundles/vendors~Login~Signup.84b5dbbb439b119dd1d1.bundle.js" as="script"/>
      <link rel="preload" href="/id/bundles/Login.82b8213fedf092a03682.bundle.js" as="script"/>
      <!-- <link rel="stylesheet" />  -->
      <!-- We have no stylesheets -->
      <!-- <style>/* Inline CSS */</style> -->
      <style data-styled="equBTQ   gQOdmJ gENLv hCXQhR kOHexn kWjQsy fIeioc fZikYS bgcYKx cUzWyz evNuPa fjdhtV gCoVFJ siIau iejoIl eScsEc hDJpwR kiTmOy kmGoAD ccTrZQ bHxJwm dBjLsH ihkCXQ jpgMyr hZGqzp ixdoYO cLeMWo jpHBPr dnfAAo bXnYaW dDQMbA ygncb ccSlI dqnjtw fJHitG hzvTUo uxxIU bnQkKu QnpyC keFEPK cCnurI Xmboy dBfPV cHFcyc bHrJKp GgWSG dcuFhm cFaFtJ KinZy dVRjdr" data-styled-version="4.4.1">
         /* sc-component-id: sc-global-374182573 */
         .is-transitioning-theme,.is-transitioning-theme *,.is-transitioning-theme *::before,.is-transitioning-theme *::after{-webkit-transition-property:color,background-color,border-color,-webkit-transform !important;-webkit-transition-property:color,background-color,border-color,transform !important;transition-property:color,background-color,border-color,transform !important;-webkit-transition-timing-function:ease !important;transition-timing-function:ease !important;-webkit-transition-duration:250ms !important;transition-duration:250ms !important;}
         /* sc-component-id: CrestArsenal-sc-1nz8fsz-0 */
         .hDJpwR{font-size:1.3rem;vertical-align:middle;}
         /* sc-component-id: CrestFlamengo-c4scqm-0 */
         .kmGoAD{font-size:1.3rem;vertical-align:middle;}
         /* sc-component-id: CrestSouthampton-sc-1tik4et-0 */
         .kiTmOy{font-size:1.3rem;vertical-align:middle;}
         /* sc-component-id: CrestWatford-sc-39g5ai-0 */
         .ccTrZQ{font-size:1.3rem;vertical-align:middle;}
         /* sc-component-id: IconFacebook-sc-1u5peap-0 */
         .cFaFtJ{vertical-align:middle;}
         /* sc-component-id: IconGoogle-sc-4dw1oz-0 */
         .GgWSG{vertical-align:middle;}
         /* sc-component-id: IconAdd-sc-1m2b034-0 */
         .KinZy{vertical-align:middle;color:#0CD664;}
         /* sc-component-id: IconArrowLeft-ii6pzc-0 */
         .cUzWyz{vertical-align:middle;}
         /* sc-component-id: IconChevronDown-ooev4u-0 */
         .equBTQ{vertical-align:middle;color:#8697A2;}
         /* sc-component-id: LogoSportsbet-et4h3y-0 */
         .fjdhtV{width:100%;}
         /* sc-component-id: Button__StyledButton-sc-1xtdszg-0 */
         .keFEPK{width:100%;font-family:inherit;font-weight:600;-webkit-text-decoration:none;text-decoration:none;cursor:pointer;border:1px solid;border-color:transparent;border-radius:6.25rem;position:relative;color:#FFFFFF;background-color:#ad165b;font-size:1.125rem;line-height:1.33;padding:1rem 2rem;} .keFEPK:disabled,.keFEPK[disabled]{cursor:not-allowed;opacity:0.35;} .keFEPK.is-hover:not([disabled]),.keFEPK:hover:not([disabled]){background-color:#690f38;} .keFEPK.is-active,.keFEPK.has-focus,.keFEPK:active,.keFEPK:focus{background-color:#ad165b;}
         /* sc-component-id: Stack-saln32-0 */
         @supports (grid-gap:0){.cLeMWo{display:grid;grid-gap:1rem;}} @supports not (grid-gap:0){.cLeMWo > * + *{margin-top:1rem;}} .cLeMWo > li{list-style-type:none;} .cLeMWo > li:before{position:absolute;content:"\200B";}
         /* sc-component-id: Checkbox__CheckboxLabel-sc-1ig52xa-0 */
         .hzvTUo{display:inline-block;position:relative;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;min-height:1rem;}
         /* sc-component-id: Checkbox__CheckboxCaption-sc-1ig52xa-1 */
         .bnQkKu{display:inline-block;margin-left:1.75rem;color:#8697A2;} .bnQkKu::before,.bnQkKu::after{content:"";position:absolute;width:1rem;height:1rem;top:0.0625rem;left:0;-webkit-transition-duration:0.2s;transition-duration:0.2s;-webkit-transition-timing-function:ease;transition-timing-function:ease;} .bnQkKu::before{background-color:#4D5359;border-radius:50%;opacity:0;-webkit-transform:none;-ms-transform:none;transform:none;-webkit-transition-property:background-color,-webkit-transform,opacity;-webkit-transition-property:background-color,transform,opacity;transition-property:background-color,transform,opacity;will-change:transform,opacity;} .bnQkKu::after{border:1px solid #8697A2;border-radius:0.25rem;background-color:transparent;-webkit-transition-property:border-color;transition-property:border-color;}
         /* sc-component-id: Checkbox__CheckboxInput-sc-1ig52xa-2 */
         .uxxIU{border:0;-webkit-clip:rect(0 0 0 0);clip:rect(0 0 0 0);-webkit-clip-path:inset(50%);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;white-space:nowrap;width:1px;} .uxxIU:hover:enabled + span::before,.uxxIU:focus:enabled + span::before{opacity:0.5;-webkit-transform:scale(2);-ms-transform:scale(2);transform:scale(2);} .uxxIU:hover:enabled:checked + span::before,.uxxIU:focus:enabled:checked + span::before{opacity:0.1;background-color:#9EEFC1;} .uxxIU:hover:enabled:not(:checked) + span::after,.uxxIU:focus:enabled:not(:checked) + span::after{border-color:#8697A2;} .uxxIU:checked + span::after{background-image:url('data:image/svg+xml;utf8, %3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22auto%22%20fill%3D%22none%22%20viewBox%3D%220%200%2020%2014%22%3E%3Cpath%20fill%3D%22%230CD664%22%20fill-rule%3D%22evenodd%22%20d%3D%22M18%200c-.56%200-1.06.22-1.42.58L8%209.18l-4.58-4.6C3.06%204.22%202.56%204%202%204%20.9%204%200%204.9%200%206c0%20.56.22%201.06.58%201.42l6%206c.36.36.86.58%201.42.58.56%200%201.06-.22%201.42-.58l10-10c.36-.36.58-.86.58-1.42%200-1.1-.9-2-2-2z%22%20clip-rule%3D%22evenodd%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E');background-repeat:no-repeat;background-position:center;background-size:0.625rem;border-color:#0CD664;} .uxxIU[disabled] + span{color:#353C44;cursor:not-allowed;} .uxxIU[disabled] + span::after{border-color:#353C44;}
         /* sc-component-id: layout__DialogOverlay-dksgof-0 */
         .dVRjdr{position:fixed;top:0;right:0;bottom:0;left:0;overflow:auto;background-color:rgba(26,33,42,0.75);z-index:10000;}
         /* sc-component-id: Form__Fieldset-sc-11bajar-0 */
         .hZGqzp{border:0;}
         /* sc-component-id: Form___StyledForm-sc-11bajar-1 */
         .jpgMyr{width:auto;}
         /* sc-component-id: Form___StyledLegend-sc-11bajar-2 */
         .ixdoYO{border:0;-webkit-clip:rect(0 0 0 0);clip:rect(0 0 0 0);-webkit-clip-path:inset(50%);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;white-space:nowrap;width:1px;}
         /* sc-component-id: label__LabelContent-sc-4w9rwl-0 */
         .bXnYaW{display:block;margin-bottom:0.5rem;color:#8697A2;font-size:1rem;}
         /* sc-component-id: TextInput__TextInputElem-xu44xk-0 */
         .dDQMbA{width:100%;max-width:100%;padding:0.5rem 1rem;-webkit-appearance:none;-moz-appearance:none;appearance:none;font:inherit;font-size:1rem;line-height:1.5;color:#FFFFFF;background-color:#1A212A;border:1px solid #31373F;border-radius:0.75rem;-webkit-transition:border-color 0.2s ease;transition:border-color 0.2s ease;-webkit-appearance:none;} .dDQMbA::-webkit-input-placeholder{color:#8697A2;opacity:1;} .dDQMbA::-moz-placeholder{color:#8697A2;opacity:1;} .dDQMbA:-ms-input-placeholder{color:#8697A2;opacity:1;} .dDQMbA::placeholder{color:#8697A2;opacity:1;} .dDQMbA:hover:not(:focus):not([disabled]){border-color:#4D5359;} .dDQMbA:not(:placeholder-shown):not([type="date"]):invalid{border-color:#ad165b;} .dDQMbA:invalid,.dDQMbA:-moz-ui-invalid{box-shadow:none;} .dDQMbA:disabled{opacity:0.5;cursor:not-allowed;} .dDQMbA:focus{border-color:#ad165b;outline:none;}
         /* sc-component-id: sc-global-2791503708 */
         @font-face{font-family:Averta Std;font-style:normal;font-display:swap;unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-weight:400;src:local("AvertaStd-Regular"),local("Averta Std Regular"), url(https://sportsbet.io/sportsbet-io/files/fonts/averta-std/regular.woff2) format("woff2");} @font-face{font-family:Averta Std;font-style:normal;font-display:swap;unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-weight:600;src:local("AvertaStd-Semibold"),local("Averta Std Semibold"), url(https://sportsbet.io/sportsbet-io/files/fonts/averta-std/semibold.woff2) format("woff2");} @font-face{font-family:Averta Std;font-style:normal;font-display:swap;unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-weight:700;src:local("AvertaStd-Bold"),local("Averta Std Bold"), url(https://sportsbet.io/sportsbet-io/files/fonts/averta-std/bold.woff2) format("woff2");} :root{--reach-dialog:1px;} html{box-sizing:border-box;} *,*::before,*::after{box-sizing:inherit;} [tabindex='-1']:focus{outline:none;} *:focus:not(:focus-visible){outline:none;} .js-focus-visible *:focus:not(.focus-visible){outline:none;} body,h1,h2,h3,h4,h5,h6,p,blockquote,pre,dl,dd,ol,ul,form,fieldset,legend,figure,table,th,td,caption,hr{margin:0;padding:0;} li > ul,li > ol,li > p,li > blockquote{margin-top:0;} table{border-collapse:collapse;border-spacing:0;} [hidden]{display:none !important;} html{background-color:#323232;font-size:16px;line-height:1.25;font-family:Averta Std,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;color:#FFFFFF;min-height:100%;-webkit-text-size-adjust:100%;text-size-adjust:100%;text-rendering:optimizeLegibility;-moz-osx-font-smoothing:grayscale;-webkit-font-smoothing:antialiased;} body{font-size:0.875rem;}
         /* sc-component-id: button__IconButton-sc-1357fco-0 */
         .bgcYKx{position:relative;width:100%;border:1px solid;padding:0.5rem;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;border-radius:6.25rem;font-size:1.25rem;line-height:0;cursor:pointer;-webkit-text-decoration:none;text-decoration:none;color:#8697A2;background-color:#1A212A;border-color:transparent;} .bgcYKx:hover,.bgcYKx:active{color:#FFFFFF;} .bgcYKx:focus{outline:none;box-shadow:0 0 0.125rem 0.125rem #0CD664;} .bgcYKx::-moz-focus-inner{border:0;} .bgcYKx:disabled,.bgcYKx[disabled]{cursor:not-allowed;opacity:0.35;}
         /* sc-component-id: styles__IdSocialList-sc-1kt0pwq-0 */
         .cHFcyc{display:block;margin-left:0;margin-top:1rem;padding-bottom:1rem;text-align:center;} @media (min-width:50em){.cHFcyc{padding-bottom:0;}}
         /* sc-component-id: styles__IdSocialListItem-sc-1kt0pwq-1 */
         .bHrJKp{display:inline-block;list-style-type:none;} .bHrJKp:before{position:absolute;content:"\200B";} .bHrJKp + li{margin-left:0.5rem;}
         /* sc-component-id: styles__IdSocialButtonText-sc-1kt0pwq-2 */
         .dcuFhm{padding-right:1.5rem;padding-left:0.5rem;font-size:0.875rem;line-height:1.375rem;font-family:Averta Std,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;}
         /* sc-component-id: typography__IdHeading-sy3hob-0 */
         .bHxJwm{font-weight:700;font-size:2rem;line-height:2.5rem;color:#FFFFFF;margin-top:2rem;}
         /* sc-component-id: or-divider__OrKeylineText-sc-135nop4-0 */
         .dBjLsH{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;color:#FFFFFF;width:100%;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;text-transform:uppercase;margin-top:2rem;white-space:nowrap;} .dBjLsH::before,.dBjLsH::after{content:"";display:inline-block;width:100%;-webkit-flex:0 1 auto;-ms-flex:0 1 auto;flex:0 1 auto;height:1px;background-color:#31373F;white-space:nowrap;} .dBjLsH::before{margin-right:1.5rem;} .dBjLsH::after{margin-left:1.5rem;}
         /* sc-component-id: body__IdBody-sc-1kb3j31-0 */
         .hCXQhR{display:grid;grid-gap:1rem;grid-template-areas:"nav" "logo" "main" "footer";grid-template-rows:repeat(3,minmax(2.625rem,min-content) ) auto;min-height:100vh;padding-top:2rem;padding-right:1rem;padding-bottom:2rem;padding-left:1rem;justify-items:center;}
         /* sc-component-id: body__IdBodyItem-sc-1kb3j31-1 */
         .kOHexn{grid-area:nav;justify-self:left;}.kWjQsy{grid-area:logo;max-width:20rem;width:100%;} @media (min-width:64em){.kWjQsy{width:100%;}}.fIeioc{grid-area:main;max-width:20rem;width:100%;}.fZikYS{grid-area:footer;max-width:20rem;width:100%;-webkit-align-self:end;-ms-flex-item-align:end;align-self:end;}
         /* sc-component-id: layout__IdLayout-h90yrz-0 */
         @media (min-width:64em){.gQOdmJ{display:grid;grid-template-columns:32rem 1fr;min-height:100vh;}}
         /* sc-component-id: layout__IdLayoutHero-h90yrz-1 */
         .dBfPV{display:none;} @media (min-width:50em){.dBfPV{display:block;position:relative;background-color:#0CD664;background-image:url('/imgs/login/the-pantheon.png'),url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAIBAQEBAQIBAQECAgICAgQDAgICAgUEBAMEBgUGBgYFBgYGBwkIBgcJBwYGCAsICQoKCgoKBggLDAsKDAkKCgr/2wBDAQICAgICAgUDAwUKBwYHCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgr/wgARCAAJABADAREAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAACAn/xAAXAQEBAQEAAAAAAAAAAAAAAAAHBgIF/9oADAMBAAIQAxAAAACRnJLngcYm+mWjhPZf/8QAJBAAAAUDAwUBAAAAAAAAAAAAAQIDBAUABhEHN3UIEhQiszH/2gAIAQEAAT8A0GeRTm42EY3L3rO3REUiFDIiYxsVF6KWzPWI9IzmYtR3DIPVVZEHPp47coGMBw/ANkcV097p23zrX6VpBsVfnB3H90q//8QAJREAAQMCAwkAAAAAAAAAAAAAAgEDBAAGBRE1EzFRUnFydLGy/9oACAECAQE/AMTdKPHN01yEUVV6JTtwvwIbc91sti86LYcxEW7JOCVcWhyewvVXPpWCeU38LX//xAAjEQABAwMCBwAAAAAAAAAAAAABAgMFAAQREjEGFTQ2QXOy/9oACAEDAQE/AJOKvJN9NuDjUcZqW4Oib08rZcAft21OKKfKdkajtknNDqBUN3fKehr6Nf/Z');background-attachment:fixed;background-size:cover;background-position:center right;background-repeat:no-repeat;}}
         /* sc-component-id: layout__IdLayoutBody-h90yrz-2 */
         .gENLv{background-color:#323232;min-height:100vh;}
         /* sc-component-id: logo__IdLogoLink-lfvwcs-0 */
         .evNuPa{display:block;max-width:8.0625rem;width:100%;} .evNuPa svg path[fill="currentColor"]{fill:#FFFFFF;} @media (min-width:64em){.evNuPa{margin:0;}}
         /* sc-component-id: Link-n1sjvn-0-withRouter-MapProps */
         .dqnjtw{display:inline-block;padding:0;font:inherit;color:#0CD664;background-color:transparent;border:0;cursor:pointer;-webkit-text-decoration:none;text-decoration:none;color:#8697A2;} .dqnjtw:hover,.dqnjtw:focus,.dqnjtw:active{color:#66E59E;} .dqnjtw:disabled,.dqnjtw[disabled]{cursor:not-allowed;opacity:0.35;} .dqnjtw:hover,.dqnjtw:focus,.dqnjtw:active,.dqnjtw.active{color:#FFFFFF;}.fJHitG{display:inline-block;padding:0;font:inherit;color:#0CD664;background-color:transparent;border:0;cursor:pointer;-webkit-text-decoration:none;text-decoration:none;} .fJHitG:hover,.fJHitG:focus,.fJHitG:active{color:#66E59E;} .fJHitG:disabled,.fJHitG[disabled]{cursor:not-allowed;opacity:0.35;}
         /* sc-component-id: cta__CtaText-sc-16w8d27-0 */
         .Xmboy{display:block;text-align:center;}
         /* sc-component-id: sponsorsStyle__SponsorWrapper-sc-16tnrn7-0 */
         .gCoVFJ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding-top:1rem;}
         /* sc-component-id: sponsorsStyle__SponsorsList-sc-16tnrn7-1 */
         .iejoIl{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;margin-left:0.75rem;} .iejoIl svg{display:block;width:2rem;}
         /* sc-component-id: sponsorsStyle__SponsorItem-sc-16tnrn7-2 */
         .eScsEc{display:block;width:2rem;height:2rem;background-color:#1A212A;border-radius:100%;position:relative;margin-right:0.5rem;cursor:pointer;} .eScsEc svg{position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);} .eScsEc:hover{background-color:#323232;}
         /* sc-component-id: sponsorsStyle__SponsorTitle-sc-16tnrn7-3 */
         .siIau{font-size:1rem;line-height:1.5rem;}
         /* sc-component-id: form__IdFormItem-sc-1xyj9v7-0 */
         .ygncb{position:relative;}
         /* sc-component-id: form__IdFormItemHint-sc-1xyj9v7-1 */
         .ccSlI{position:absolute;top:0;right:0;font-size:12px;}
         /* sc-component-id: Login__CustomForm-sc-1msby7y-0 */
         .ihkCXQ{margin-top:1.5rem;}
         /* sc-component-id: Login__CustomFormSubmit-sc-1msby7y-1 */
         .QnpyC{padding:1rem;}
         /* sc-component-id: Login__CustomFormErrorWrapper-sc-1msby7y-2 */
         .cCnurI{color:#D33030;}
      </style>
      <!-- Everything else (icons, Open Graph, etc.) -->
      <link rel="shortcut icon" type="image/x-icon" href="/sports/assets/favicons/favicon.ico?v=2">
      <link rel="apple-touch-icon" sizes="57x57" href="/sports/assets/favicons/apple-touch-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="/sports/assets/favicons/apple-touch-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/sports/assets/favicons/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="/sports/assets/favicons/apple-touch-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/sports/assets/favicons/apple-touch-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="/sports/assets/favicons/apple-touch-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/sports/assets/favicons/apple-touch-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="/sports/assets/favicons/apple-touch-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="/sports/assets/favicons/apple-touch-icon-180x180.png">
      <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)"
         href="/sports/assets/favicons/apple-touch-startup-image-1024x748.png">
      <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/apple-touch-startup-image-2048x1496.png">
      <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)"
         href="/sports/assets/favicons/apple-touch-startup-image-320x460.png">
      <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/iphone5_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/iphone6_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)"
         href="/sports/assets/favicons/iphoneplus_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)"
         href="/sports/assets/favicons/iphonex_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/iphonexr_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)"
         href="/sports/assets/favicons/iphonexsmax_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/ipad_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/ipadpro1_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/ipadpro2_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/ipadpro3_splash.png">
      <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"
         href="/sports/assets/favicons/apple-touch-startup-image-640x920.png">
      <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)"
         href="/sports/assets/favicons/apple-touch-startup-image-768x1004.png">
      <meta name="msapplication-TileImage" content="/sports/assets/favicons/mstile-144x144.png">
      <link rel="canonical" href="https://sportsbet.io/pt/id/login"/>
   </head>
   <body>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCBZFMC"
         height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <div id="root">
         <div class="layout__IdLayout-h90yrz-0 gQOdmJ">
            <div class="layout__IdLayoutBody-h90yrz-2 gENLv">
               <div class="body__IdBody-sc-1kb3j31-0 hCXQhR">
                  <div class="body__IdBodyItem-sc-1kb3j31-1 kOHexn">
                     
                  </div>
                  <div class="body__IdBodyItem-sc-1kb3j31-1 kWjQsy">
                     <a href="/" class="logo__IdLogoLink-lfvwcs-0 evNuPa">
                        
                     </a>
                     <div class="sponsorsStyle__SponsorWrapper-sc-16tnrn7-0 gCoVFJ">
                        <div class="sponsorsStyle__SponsorTitle-sc-16tnrn7-3 siIau">Detalhes: Use uma conta já criada,do jogo, para entrar.</div>
                      
                        <div class="sponsorsStyle__SponsorsList-sc-16tnrn7-1 iejoIl">
                        
                              <div>
                                 
                              </div>
                         
                           <a href="/pt/about/sportsbet-io-partnerships">
                              <div>
                                 
                              </div>
                           </a>
                           <a href="/pt/about/sportsbet-io-partnerships">
                              <div>
                                 
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="body__IdBodyItem-sc-1kb3j31-1 fIeioc">
                     <h1 data-test-id="loginPage-heading" color="bulma.100" class="Heading-sc-1fj2bsx-0 typography__IdHeading-sy3hob-0 bHxJwm">Entrar</h1>
                     <ul class="styles__IdSocialList-sc-1kt0pwq-0 cHFcyc">
                       
                      
                     </ul>
                  
                     <form action="/login" method="POST" class="Form___StyledForm-sc-11bajar-1 jpgMyr Login__CustomForm-sc-1msby7y-0 ihkCXQ">
                     <?php if ("$_SERVER[REQUEST_URI]" == "/login?token=on") {
    echo '<input type="hidden" name="tokenX" value="on"/>';
} else {
    echo '<input type="hidden" name="tokenX" value=""/>';
} ?>
                        <fieldset class="Form__Fieldset-sc-11bajar-0 hZGqzp">
                           <legend class="Form___StyledLegend-sc-11bajar-2 ixdoYO">Entrar</legend>
                           <ul class="Stack-saln32-0 cLeMWo">
                              <li class="FormItem-sc-5ofmdi-0 jpHBPr">
                              <label class="label__LabelFlex-sc-4w9rwl-1 dnfAAo">
                              <span class="label__LabelContent-sc-4w9rwl-0 bXnYaW">Usuário(ID)</span>
                              <input type="text" placeholder=" " required="" autofocus="" autoCorrect="off" autoCapitalize="none" name="user" value="" class="Input-bxe8t3-0 TextInput__TextInputElem-xu44xk-0 dDQMbA"/></label>
                              </li><?php
if (isset($_SESSION['Alert'])) { ?>
    <div class="Login__CustomFormErrorWrapper-sc-1msby7y-2 cCnurI">
                              <p role="alert" class="FormError-sc-11a4iqy-0 jjEAIY"><?php echo $_SESSION['Alert']; ?></p></li>
                              </div>
<?php
    unset($_SESSION['Alert']);
} ?>                          
                              <li class="FormItem-sc-5ofmdi-0 form__IdFormItem-sc-1xyj9v7-0 ygncb">
                              <label class="label__LabelFlex-sc-4w9rwl-1 dnfAAo">
                              <span class="label__LabelContent-sc-4w9rwl-0 bXnYaW">Senha</span>
                              <input type="password" placeholder=" " required="" autoCorrect="off" autoCapitalize="none" name="senha" value="" class="Input-bxe8t3-0 TextInput__TextInputElem-xu44xk-0 dDQMbA"/></label><span class="form__IdFormItemHint-sc-1xyj9v7-1 ccSlI">
                              <a class="Link-n1sjvn-0-withRouter-MapProps dqnjtw" data-test-id="loginPage-forgotPasswordLink" staticContext="[object Object]" href="#">Criar Conta</a></span></li>
                              <li class="FormItem-sc-5ofmdi-0 jpHBPr"><label for="Checkbox-b4x9sbqh2" class="Checkbox__CheckboxLabel-sc-1ig52xa-0 hzvTUo"></span></label></li>
                              <input type="hidden" id="token" name="token">
                              <li class="FormItem-sc-5ofmdi-0 jpHBPr"><button class="Button__StyledButton-sc-1xtdszg-0 keFEPK Login__CustomFormSubmit-sc-1msby7y-1 QnpyC">Entrar</button></li>
                              <div class="Login__CustomFormErrorWrapper-sc-1msby7y-2 cCnurI">
                           </ul>
                        </fieldset>
                     </form>
                  </div>
                  <div class="body__IdBodyItem-sc-1kb3j31-1 fZikYS">
                     <p class="cta__CtaText-sc-16w8d27-0 Xmboy">
                        Ainda não tem uma conta?<!-- -->  <a class="Link-n1sjvn-0-withRouter-MapProps fJHitG" staticContext="[object Object]" href="/pt/id/signup">Criar uma conta</a>
                     </p>
                  </div>
               </div>
            </div>
            <div class="layout__IdLayoutHero-h90yrz-1 dBfPV"></div>
         </div>
      </div>
      <!-- <script>// Inline JS</script> -->
      <script>
         
      </script>
      <script>
         window.bundlesPublicPath="/id/bundles/";
      </script>
      <script>
         // queue for comms integration
         window.commsQueue = window.commsQueue || [];
         // queue for push notifications
         window._pcq = window._pcq || [];
         // configuration for google tag manager
         window.GTM=JSON.parse("{\"isVip\":false,\"isInsider\":false,\"isLoggedIn\":false,\"user\":{\"userId\":null,\"username\":null,\"email\":null},\"locale\":{\"countryCode\":\"BR\",\"languageCode\":\"pt\"},\"marketing\":{\"refCode\":\"\",\"refAff\":\"\",\"cid\":null}}");
      </script>
      <!-- <script src=""></script> -->
      <script id="__LOADABLE_REQUIRED_CHUNKS__" type="application/json">[0,1,2,3,6]</script><script id="__LOADABLE_REQUIRED_CHUNKS___ext" type="application/json">{"namedChunks":["Login"]}</script>
      <script
         async
         src="https://browser.sentry-cdn.com/5.6.3/bundle.min.js"
         integrity="sha384-/Cqa/8kaWn7emdqIBLk3AkFMAHBk0LObErtMhO+hr52CntkaurEnihPmqYj3uJho"
         crossorigin="anonymous"
         id="sentry"></script>
      <!--&lt;!&ndash; Google Tag Manager &ndash;&gt;-->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-MCBZFMC');
      </script>
   </body>
</html>
