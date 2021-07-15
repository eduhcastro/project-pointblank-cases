var hoverc = new Audio("http://127.0.0.1/template/snd/Buttons/hover.wav");
var audio2 = new Audio("http://127.0.0.1/template/snd/Buttons/click.ogg");
function fadeOutIn(elem, speed ) {
        if (!elem.style.opacity) {
            elem.style.opacity = 1;
        } // end if
        var outInterval = setInterval(function() {
            elem.style.opacity -= 0.02;
            if (elem.style.opacity <= 0) {
                clearInterval(outInterval);
                var inInterval = setInterval(function() {
                    elem.style.opacity = Number(elem.style.opacity)+0.02;
                    if (elem.style.opacity >= 1)
                        clearInterval(inInterval);
                }, speed/50 );
            } // end if
        }, speed/50 );
    
    }
    
var myIndex = 0;
carousel();
function carousel() {
  var i;
  var x = document.getElementsByClassName("WebTeste");
  for (i = 0; i < x.length; i++) {
    x[i].style.opacity = "0";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  fadeOutIn(x[myIndex-1], 2000); 
  setTimeout(carousel, 9000);    
}


function ocultarnews(){
    $("#TotalNv").css("display", "none");
}


function hover(element, btn) {
    if(btn == 'BTBOnus'){
    element.setAttribute('src', '/template/imgs/UI_V12/Tools/BONUSC.png');
    hoverc.play();
    }
    if(btn == 'BTLoja'){
        element.setAttribute('src', '/template/imgs/UI_V12/Tools/LOJAC.png');
        hoverc.play();
        }
        if(btn == 'BTRegu'){
            element.setAttribute('src', '/template/imgs/UI_V12/Tools/REGULAMENTOC.png');
            hoverc.play();
            }
            if(btn == 'BRPa'){
                element.setAttribute('src', '/template/imgs/UI_V12/Tools/PARCERIAC.png');
                hoverc.play();
                }
  }

function Clicked(Url){
    audio2.play();
    setTimeout(function() {
        window.location.href = ""+Url+"";
    }, 300);
} 
function unhover(element, btn) { 
if(btn == 'BTBOnus'){
    element.setAttribute('src', '/template/imgs/UI_V12/Tools/BONUS.png');
}
if(btn == 'BTLoja'){
    element.setAttribute('src', '/template/imgs/UI_V12/Tools/LOJA.png');
}
if(btn == 'BTRegu'){
    element.setAttribute('src', '/template/imgs/UI_V12/Tools/REGULAMENTO.png');
}
if(btn == 'BRPa'){
    element.setAttribute('src', '/template/imgs/UI_V12/Tools/PARCERIA.png');
}
}
if(window.innerWidth < 575){
    $("#PlayerVipBar").remove();
    $('.navbar-nav').css("flex-direction", "row");
    $('.col-2.NovidadesBox').css("max-width", "20.5%");
    
    $("#NewsBG").css("width", "130px");
    $("#WeaponsNws").css("margin", "-49px 0px 0px");
    
}

if($('.PlayerVipBar.Banner').first().attr('src') != null){
    var img = $(".PlayerVipBar.Banner");
    $("<img>").attr("src", $(img).attr("src")).load(function(){
        var realWidth = this.width;
        if(realWidth > 319){
        $('.PlayerVipBar.Banner').css("width", "95%");
        }
    });
  $('.PlayerVipBar.Nick').css("color", "#ffffff");
}