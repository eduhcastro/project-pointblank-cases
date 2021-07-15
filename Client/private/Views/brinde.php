           
<style>

.roleta{
    width: 400px;
}
@media (min-width: 700px) { 
    .roleta{
    width: 700px;
}
}
</style>
                  
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-16">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="/">
                            <i class="fa fa-gift mr-1"></i>
                            LuckCases
                        </a></li>
                    <li class="breadcrumb-item active">
                        <i class="fa fa-suitcase mr-1"></i>
                      Brinde
                    </li>
                </ol>
            </div>
        </div>

        <div class="case-open" itemscope="" itemtype="http://schema.org/Product">
            <div class="heading">
                <h1 class="title" itemprop="name"> PointLuck Brinde </h1>
            </div>

        

           
<canvas class="roleta" id="canvas" width="500" height="500"style="    background: url(http://127.0.0.1/imgs/logo.png);
    background-position: bottom;
    background-size: 60%;
    background-repeat: no-repeat;
    background-position: center;" ></canvas>  
            <div class="loading-div" style="display: none;"></div>
           

<?php if(@$_SESSION['username'] != null){
    if($BrindeData == date('d/m/Y')){
        echo '<div class="row-buttons">
        <button type="button" class="btn-action btn-lg disabled" data-toggle="modal" data-target="#" disabled>
        <span class="open">VOCÊ JÁ RODOU HOJE!<span class=""> <span class="price"></span></span></span>
    </button>';
    }else{
            echo '<div class="row-buttons">
                            <button type="button" class="btn btn-primary btn-lg btn-open disabled" id="spin2" style="display: none;">GIRANDO...</button>
                <button type="button" class="btn-action btn-big" id="spin">
                    <span class="open">GIRAR ROLETA <span class=""><i class="fa fa-usd"></i> 0.00<span class="price"></span></span></span>
                    <span class="opening" style="display: none;">GIRANDO...</span>
                </button>'; }}else{
                    echo '<div class="row-buttons">
                    <button type="button" class="btn-action btn-lg" data-toggle="modal" data-target="#login">
            <span class="open">GIRAR ROLETA <span class=""><i class="fa fa-usd"></i> 0.00 <span class="price"></span></span></span>
        </button>'; 
                } ?>
                        </div>
        </div>

        <div class="case-contains">
            <div class="heading">Você pode ganhar</div>
            <div class="list-small-cases">
               
<div class="item-small-case covert">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="Butterfly - ">
</div>
<div class="title"><i class="fa fa-square"></i> 20.00$ Creditos<br></div>
</div><div class="item-small-case covert">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="Faca de Osso - ">
</div>
<div class="title"><i class="fa fa-square"></i> 3.00$ Creditos<br></div>
</div><div class="item-small-case covert">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="L11A1 SE - ">
</div>
<div class="title"><i class="fa fa-square"></i> 2.15$ Creditos<br></div>
</div><div class="item-small-case covert">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="PGM Hecate2 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 2.05$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="RangerMaster.338 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.95$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="Troca rapida - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.85$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="Winchester M70 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.75$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.65$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.55$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.45$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.35$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.25$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.15$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 1.10$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.95$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.90$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.85$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.80$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.75$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.70$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.65$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.60$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.55$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.50$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.45$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.40$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
   </div>
<div class="title"><i class="fa fa-square"></i> 0.35$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
   </div>
<div class="title"><i class="fa fa-square"></i> 0.30$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
   </div>
<div class="title"><i class="fa fa-square"></i> 0.25$ Creditos<br></div>
</div><div class="item-small-case industrial">
<div class="img-holder">
   <img class="image" src="https://cdn.shopify.com/s/files/1/1792/3413/products/IMG_1057_600x.png?v=1588386709" alt="XM2010 - ">
</div>
<div class="title"><i class="fa fa-square"></i> 0.10$ Creditos<br></div>
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

    <script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
    <script defer src="/template/js/main.js?v=2.0.1" type="text/javascript"></script>
    <script defer src="/template/js/livedrop.js?v=2.0.1" type="text/javascript"></script>
    <script defer src="/template/js/giveaway.js?v=2.0.1" type="text/javascript"></script>
    <script src="/template/js/app.js?v=2.0.1" type="text/javascript"></script>
    <script src="/template/js/auth.js?v=2.0.1" type="text/javascript"></script>
    <script src="/template/js/brinde.js?v=1.0.1" type="text/javascript"></script>
    <script>
        var case_id = 99;
        var price = 0;
        var routes = {
            "reOpen": "https://casedrop.com/br/open/homeless/reopen",
            "stateFinally": "http://127.0.0.1/giveaway/finally",
            "buy": "http://127.0.0.1/giveaway/buy",
            "sell": "https://casedrop.com/br/prize/sell",
            "massSell": "http://127.0.0.1/giveaway/massSell"
        };
        var trans = {

        };

                            
    </script> 
    <script defer src="/template/js/cases.js?v=2.0.1"></script>







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

