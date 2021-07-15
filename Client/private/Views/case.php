<?php

$Solicitado = PaginaSolicitada($REQUEST_URI_PASTA = substr($REQUEST_URI, 1), $ConnOK);

?>
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
                       <?php echo $Solicitado[0]; ?>
                    </li>
                </ol>
            </div>
        </div>

        <div class="case-open" itemscope="" itemtype="http://schema.org/Product">
            <div class="heading">
                <h1 class="title" itemprop="name">  <?php echo $Solicitado[0]; ?></h1>
                <a href="#" title="Sound on/off" class="sound on"></a>
            </div>

            <meta itemprop="image" content="/template/imgs/cases/<?php echo $Solicitado[2]; ?>.png">

            <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer" style="display: none;">
                <meta itemprop="priceCurrency" content="USD">
                <meta itemprop="price" content="<?php echo $Solicitado[1]; ?>">
            </div>

            
                
                
            

                            <div class="roulette-container" id="roulette-container-1" >
                    <div class="item-case">
                        <img class="case" src="/template/imgs/cases/<?php echo $Solicitado[3]; ?>.png" alt="" itemprop="image">
                        <img class="weapon" src="/template/imgs/cases/<?php echo $Solicitado[2]; ?>" alt="">
                    </div>
                </div>
                            <div class="roulette-container" id="roulette-container-2"  style="display: none;" >
                    <div class="item-case">
                        <img class="case" src="/template/imgs/cases/<?php echo $Solicitado[3]; ?>.png" alt="" itemprop="image">
                        <img class="weapon" src="/template/imgs/cases/<?php echo $Solicitado[2]; ?>" alt="">
                    </div>
                </div>

                <div class="roulette-container" id="roulette-container-3"  style="display: none;" >
                    <div class="item-case">
                        <img class="case" src="/template/imgs/cases/<?php echo $Solicitado[3]; ?>.png" alt="" itemprop="image">
                        <img class="weapon" src="/template/imgs/cases/<?php echo $Solicitado[2]; ?>" alt="">
                    </div>
                </div>
             
            
            <div class="loading-div" style="display: none;"></div>

            <div id="roulettes">

            </div>

            <div class="row-buttons row-dropdown" id="btnDropdownChoose">
                <span class="title">Caixas para abrir:</span>
                <div class="btn-group">
                    <button type="button" class="dropdown-toggle btn-select" data-toggle="dropdown"><span>1</span></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">1</a>
                        <a class="dropdown-item" href="#">2</a>
                        <a class="dropdown-item" href="#">3</a>
                    </div>
                </div>
            </div>

<?php if(@$_SESSION['username'] != null){
            echo '<div class="row-buttons">
                            <button type="button" class="btn btn-primary btn-lg btn-open disabled" id="btnOpening" style="display: none;">ABRINDO...</button>
                <button type="button" class="btn-action btn-big" id="btnOpen" safary="'.$Solicitado[5].'">
                    <span class="open">ABRIR ESTA CAIXA <span class=""><i class="fa fa-usd"></i> <span class="price">'.$Solicitado[1].'</span></span></span>
                    <span class="opening" style="display: none;">ABRINDO...</span>
                </button>'; }else{
                    echo '<div class="row-buttons">
                    <button type="button" class="btn-action btn-lg" data-toggle="modal" data-target="#login">
            <span class="open">ABRIR ESTA CAIXA <span class=""><i class="fa fa-usd"></i> <span class="price">'.$Solicitado[1].'</span></span></span>
        </button>';
                } ?>
                        </div>
        </div>

        <div class="case-contains">
            <div class="heading">A caixa contém</div>
            <div class="list-small-cases">
               
		<?php ArmasCaixa($ConnOK, $Solicitado[4]); ?>
	


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

    <script>
     document.title = 'PAN+ <?php echo $Solicitado[0]; ?>'; 
        var case_id = '<?php echo $Solicitado[0]; ?>';
        var price = <?php echo $Solicitado[1]; ?>;
        var routes = {
            "reOpen": "https://casedrop.com/br/open/homeless/reopen",
            "stateFinally": "http://127.0.0.1/giveaway/finally",
            "buy": "http://127.0.0.1/giveaway/buy",
            "sell": "http://127.0.0.1/giveaway/sell",
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

