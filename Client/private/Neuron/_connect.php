<?php
//============================================================================================================================================
//############################                2021 // EDUARDO CASTRO //  PENTA TUDO                               ############################
//============================================================================================================================================
//-----------------------------------------------------//-----------------------------------------------------//------------------------------
// BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR BR B 
//-----------------------------------------------------//-----------------------------------------------------//------------------------------
/* Anotacoes para futuras mudanças */
# ConnOK (array,array..) Conexão com site (cases)
# ConnOK2 (array,array..) Usando return, conexão com DB PointBlank
# (href="#" on) Por (on)
# -----
/*
 * Criador: Eduardo Castro
 * Fonte Base: CaseDROP
 * :)
*/
// Começando detalhes.
//============================================================================================================================================
//                                                         CONEXAO WEBSITE
//============================================================================================================================================
date_default_timezone_set('America/Bahia');

function outputPDOerror($errorCode = 0) {
    return 'Website Offline';
  }

class DatabaseUtility {
    private $dsn, $username, $password, $database, $pdo;
    public function __construct($host = 'localhost', $username = 'root', $password = '', $database) {
        $this->dsn = "pgsql:dbname=$database;host=$host";
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    public function connect() {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password, null);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $err) {
            die(outputPDOerror($err->getCode()));
        }
    }
    public function prepareStatment($query) {
        return $this->pdo->prepare($query);
    }
    public function bindmNow($query) {
        return $this->pdo->bindParam($query);
    }
    public function query2($query) {
        return $this->pdo->query($query);
    }
}
$ConnOK = new DatabaseUtility('localhost', 'postgres', '123456', 'painel');
$ConnOK->connect();
session_start();
//============================================================================================================================================
//                                                         FUNÇÕES WEBSITE
//============================================================================================================================================

function Sessao(){
    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 100) as $k) $rand .= $seed[$k];
     return $rand;
    }


function clean($string) {
    $string = str_replace(' ', '-', $string);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    return preg_replace('/-+/', '-', $string);
}

function CasesHome($Conexao) {
    $statment = $Conexao->prepareStatment("SELECT * FROM cases_detalhes WHERE open = true ORDER BY created DESC LIMIT 5");
    $statment->execute();
    while ($r = $statment->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="http://127.0.0.1/case/' . $r['casename'] . '" class="item-case case-shadow'.$r['color'].'  " style="overflow:hidden" itemscope itemtype="http://schema.org/Product">
            <div class="img-holder">
               <img class="case" src="http://127.0.0.1/template/imgs/cases/' . $r['caseimg'] . '.png" alt="" itemprop="image">
               <img class="weapon" src="http://127.0.0.1/template/imgs/cases/' . $r['weaponimg'] . '" alt="" style="filter: none; z-index: 2">
            </div>
            <span class="title" itemprop="name">' . $r['casename'] . '</span>
            <span class="btn-action"  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <meta itemprop="priceCurrency" content="USD">
               <span><i class="fa fa-usd"></i> ' . $r['price'] . '</span>
            </span>
         </a>';
    }
}
function Padroes($Conexao) {
    $Cate = 'Fixado';
    $statment = $Conexao->prepareStatment("SELECT * FROM cases_detalhes WHERE Categoria=:id AND open = true ORDER BY created DESC LIMIT 15");
    $statment->execute(['id' => $Cate]);
    while ($r = $statment->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="http://127.0.0.1/case/' . $r['casename'] . '" class="item-case case-shadow'.$r['color'].'  " style="overflow:hidden" itemscope itemtype="http://schema.org/Product">
            <div class="img-holder">
               <img class="case" src="http://127.0.0.1/template/imgs/cases/' . $r['caseimg'] . '.png" alt="" itemprop="image">
               <img class="weapon" src="http://127.0.0.1/template/imgs/cases/' . $r['weaponimg'] . '"  alt="" style="filter: none; z-index: 2">
            </div>
            <span class="title" itemprop="name">' . $r['casename'] . '</span>
            <span class="btn-action"  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <meta itemprop="priceCurrency" content="USD">
               <span><i class="fa fa-usd"></i> ' . $r['price'] . '</span>
            </span>
         </a>';
    }
}

function Person_Itens($Conexao) {
    $Cate = 'Person';
    $Cate2 = 'Acess';
    $statment = $Conexao->prepareStatment("SELECT * FROM cases_detalhes WHERE Categoria=:id OR Categoria=:id2 AND open = true ORDER BY created DESC LIMIT 15");
    $statment->execute(['id' => $Cate, 'id2' => $Cate2]);
    while ($r = $statment->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="http://127.0.0.1/case/' . $r['casename'] . '" class="item-case case-shadow'.$r['color'].'  " style="overflow:hidden" itemscope itemtype="http://schema.org/Product">
            <div class="img-holder">
               <img class="case" src="http://127.0.0.1/template/imgs/cases/' . $r['caseimg'] . '.png" alt="" itemprop="image">
               <img class="weapon" src="http://127.0.0.1/template/imgs/cases/' . $r['weaponimg'] . '"  alt="" style="filter: none; z-index: 2">
            </div>
            <span class="title" itemprop="name">' . $r['casename'] . '</span>
            <span class="btn-action"  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <meta itemprop="priceCurrency" content="USD">
               <span><i class="fa fa-usd"></i> ' . $r['price'] . '</span>
            </span>
         </a>';
    }
}

function Raros($Conexao) {
    $Cate = 'Raras';
    $statment = $Conexao->prepareStatment("SELECT * FROM cases_detalhes WHERE Categoria=:id AND open = true ORDER BY created DESC LIMIT 15");
    $statment->execute(['id' => $Cate]);
    while ($r = $statment->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="http://127.0.0.1/case/' . $r['casename'] . '" class="item-case case-shadow'.$r['color'].'  " style="overflow:hidden" itemscope itemtype="http://schema.org/Product">
            <div class="img-holder">
               <img class="case" src="http://127.0.0.1/template/imgs/cases/' . $r['caseimg'] . '.png" alt="" itemprop="image">
               <img class="weapon" src="http://127.0.0.1/template/imgs/cases/' . $r['weaponimg'] . '"  alt="" style="filter: none; z-index: 2">
            </div>
            <span class="title" itemprop="name">' . $r['casename'] . '</span>
            <span class="btn-action"  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <meta itemprop="priceCurrency" content="USD">
               <span><i class="fa fa-usd"></i> ' . $r['price'] . '</span>
            </span>
         </a>';
    }
}

function CompraRapida($Conexao,$Logado) {
    $statment = $Conexao->prepareStatment("SELECT * FROM fast_buy ORDER BY buy_start DESC LIMIT 3");
    $statment->execute();
    while ($r = $statment->fetch(PDO::FETCH_ASSOC)) {
        $Arma = $r['id'];
        $statment2 = $Conexao->prepareStatment("SELECT * FROM fastbuy_users_weapons WHERE id_user = '$Logado' AND id_weaponfast = '$Arma'");
        $statment2->execute();
        $Resultado = $statment2->fetch(PDO::FETCH_ASSOC);
        echo '<div class="giveaway">
        <div class="image">
           <img class="weapon" src="/template/imgs/weapons_drops/fast_buy/'.$r['weapon_img'].'.png" alt="">
           <span class="price "><i class="fa fa-usd"></i>  '.$r['weapon_price'].' </span>
        </div>
        <div class="info">
           <div class="row-holder">
           ';
           if(@$_COOKIE['thema'] == 'light'){
              echo '<div class="title" style="color: #000;  font-weight: bold;"> '.$r['weapon_name'].' '.$r['weapon_count'].'D</div>';
    }else{
        echo '<div class="title"> '.$r['weapon_name'].' '.$r['weapon_count'].'D</div>';
    }
              if(@$Resultado['id_weaponfast'] != null){
             echo '<div class="text-valid" id="giveaway-participant-'.$r['id'].'"><i class="fa fa-check mr-1"></i>Você Comprou!</div>';
            }else{
                echo '<div class="text-valid" id="giveaway-participant-'.$r['id'].'" style=display:none><i class="fa fa-check mr-1"></i>Compra Realizada!</div>';
             }
              echo '<div class="subtitle">Inicou em '.$r['buy_start'].'</div>
           </div>
           <div class="row-holder">
           <div class="title" style="color: #ffffff;"> Restam '.$r['unidade'].' Unidades!</div>
            <div class="subtitle" data-countdown="'.$r['buy_end'].'"></div>
           </div>
        </div>';
if(@$Resultado['id_weaponfast'] != null){
        echo '<div class="block-info" id="giveaway-join-'.$r['id'].'" >
           <div class="info">
              <div class="text">Você já comprou está<span class="deposit"> <span>Arma</span> !!</span></div>
             
           </div>
        </div>
        <div class="giveaway-info"><a href="/regulamento#question5"  class="giveaway-info-link"><i class="fa fa-info-circle"></i></a></div>
     </div>';
}else{
    $Now = date('Y/m/d H:i:s');
    if($Now > @$r['buy_end']){
        echo '<div class="block-info" id="giveaway-join-'.$r['id'].'" >
        <div class="info">
           <div class="text">Desculpe mas essa Promoção<span class="aviso"> <span>Acabou</span> !!</span></div>
          
        </div>
     </div>
     <div class="giveaway-info"><a href="/regulamento#question5" class="giveaway-info-link"><i class="fa fa-info-circle"></i></a></div>
  </div>'; }else{
    if($r['unidade'] == 0){
        echo '<div class="block-info" id="giveaway-join-'.$r['id'].'" >
        <div class="info">
           <div class="text">Desculpe mas as Unidades<span class="aviso"> <span>Acabaram :(</span> !!</span></div>
          
        </div>
     </div>
     <div class="giveaway-info"><a href="/regulamento#question5"  class="giveaway-info-link"><i class="fa fa-info-circle"></i></a></div>
  </div>'; }else{
    echo '<div class="block-info" id="giveaway-join-'.$r['id'].'" >
    <div class="info">
       <div class="text">Chance Unica! Compre agora Por<span class="deposit"> <span>$'.$r['weapon_price'].'</span> !!</span></div>
       <a href="#" data-game-id="'.$r['id'].'" class="button-info giveaway-join">
       <span>Comprar Agora</span>
       </a>
    </div>
 </div>
 <div class="giveaway-info"><a href="/regulamento#question5" class="giveaway-info-link"><i class="fa fa-info-circle"></i></a></div>
</div>';
}
    }
}
    }
}


Function NiveisArmas($NivelArma) {
    // covert = Vermelho 3 // restricted = roxo // industrial = azul 1
    if ($NivelArma == 1) return "industrial";
    else if ($NivelArma == 2) return "restricted";
    else if ($NivelArma == 3) return "covert";
}
Function CheckType($NivelArma) {
    if ($NivelArma == null) return "Comum";
    else if ($NivelArma != null) return $NivelArma;
}
Function PaginaSolicitada($REQUISITADA, $Requiscao) {
    $URL = explode('/', $REQUISITADA);
    if (preg_match("#^[aA-zZ0-9\-_]+$#", trim($URL[1])) > 0) {
        $UrlAqui = $URL[1];
        $statment = $Requiscao->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = '$UrlAqui' AND open = true");
        $statment->execute();
        $Resultado = $statment->fetch(PDO::FETCH_ASSOC);
        if ($Resultado > 0) {
            $CaseNome = $Resultado['casename'];
            $Preco = $Resultado['price'];
            $ImagemArma = $Resultado['weaponimg'];
            $ImagemCaixa = $Resultado['caseimg'];
            $IdCaixa = $Resultado['id'];
            $Sound = $Resultado['sound'];
        } else {
            echo "<script>window.location = '/';</script>";
            exit;
            exit();
        }
    } else {
        echo "<script>window.location = '/';</script>";
        exit;
        exit();
    }
    return array($CaseNome, $Preco, $ImagemArma, $ImagemCaixa, $IdCaixa, $Sound);
}
Function ArmasCaixa($Requiscao, $CaixaID) {
    $ArmasDoITem = $Requiscao->prepareStatment("SELECT DISTINCT nivelweapon,weaponimg,nameweapon,classeweapon,caseid,category FROM cases_weapons WHERE caseid = '$CaixaID' ORDER BY nivelweapon DESC");
    $ArmasDoITem->execute();
    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {
        if(@$_COOKIE['thema'] == 'V12'){
        echo '<div class="item-small-case ' . NiveisArmas($r['nivelweapon']) . '" style="    background-size: 103% 103%;">
        <div class="img-holder" style="overflow: inherit;">
           <img class="image2" '.StyleCases($r['category']).' src="/template/imgs/weapons_drops/' . $r['weaponimg'] . '.png" alt="' . $r['nameweapon'] . ' - ' . $r['classeweapon'] . '">
        </div>
        <div class="title1" style="background-image: url(/template/imgs/UI_V12/Tools/'.WeaponTag($r['nivelweapon']).');"> ' . $r['nameweapon'] . ' ' . $r['classeweapon'] . '</div><div class="title2"> Contém: '.LevelCharac($r['nivelweapon']).' Dias</div>
        </div>';
        }else{
            echo '<div class="item-small-case ' . NiveisArmas($r['nivelweapon']) . '">
<div class="img-holder">
   <img class="image" src="/template/imgs/weapons_drops/' . $r['weaponimg'] . '.png" alt="' . $r['nameweapon'] . ' - ' . $r['classeweapon'] . '">
</div>
<div class="title"><i class="fa fa-square"></i> ' . $r['nameweapon'] . '<br>' . $r['classeweapon'] . '</div>
</div>';
        }
    }
}


Function Wallet($Requiscao, $Card) {
    $ArmasDoITem2 = $Requiscao->prepareStatment("SELECT * FROM cases_cards_history WHERE cardnum = '$Card' ORDER BY data DESC LIMIT 6");
    $ArmasDoITem2->execute();
    $r2 = $ArmasDoITem2->fetch(PDO::FETCH_ASSOC);
    $ia = 0;
    if(@$r2['consumer'] == null){
        for($i5=0; $i5 < 6; $i5++){
            echo '<tr class="Nova">
           <th scope="row">'.$ia++.'</th>
           <td></td>
            <td></td>
            <td></td>
          </tr>';
    }
}

    $ArmasDoITem = $Requiscao->prepareStatment("SELECT * FROM cases_cards_history WHERE cardnum = '$Card' ORDER BY data DESC LIMIT 6");
    $ArmasDoITem->execute();
    $id = 0;
    $Quant= $ArmasDoITem->rowCount();
    if($Quant != 0){
    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {
        echo ' <tr class="Nova">
        <th scope="row">'.$id++.'</th>
       <td> <a href="/profile/'.$r['consumer'].'"> '.$r['consumer'].'</td></a>
        <td>$ '.$r['value'].'</td>
        <td>'.$r['data'].'</td>
      </tr>';
       
    }
    $limite = 6;
    $limite2 = $limite - $Quant;
    for($i5=0; $i5 < $limite2; $i5++){
        echo '<tr class="Nova">
        <th scope="row">'.$id++.'</th>
        <td></td>
        <td></td>
        <td></td>
      </tr>';
    }
}
}




Function PerfilSolicitado($REQUISITADA, $Requiscao) {
    $URL = explode('/', $REQUISITADA);
    if (preg_match("#^[aA-zZ0-9\-_]+$#", trim($URL[1])) > 0) {
        $UrlAqui = $URL[1];
        $statment = $Requiscao->prepareStatment("SELECT * FROM cases_users WHERE id_user = '$UrlAqui'");
        $statment->execute();
        $Resultado = $statment->fetch(PDO::FETCH_ASSOC);
        if ($Resultado > 0) {
            $Nome = $Resultado['id_user'];
            $Imagem = $Resultado['userimg'];
            $CountOpen = $Resultado['countabertas'];
            $Banner = $Resultado['banner'];
            $Moldura = $Resultado['frame'];
            $Vip = $Resultado['vip'];
        } else {
            echo "<script>window.location = '/';</script>";
            exit;
            exit();
        }
    } else {
        echo "<script>window.location = '/';</script>";
        exit;
        exit();
    }
    return array($Nome, $Imagem, $CountOpen, $Banner, $Moldura, $Vip);
}

Function PerfilSolicitadoVIP($UserR, $Requiscao, $Vip) {
    if($Vip == false){
        $R = false;
        return $R;
    }else{
        $statment = $Requiscao->prepareStatment("SELECT * FROM cases_users_settings WHERE id_user = '$UserR'");
        $statment->execute();
        $Resultado = $statment->fetch(PDO::FETCH_ASSOC);
        if ($Resultado > 0) {
            $Back = $Resultado['background'];
            $BackXY = $Resultado['background_xy'];
            $userXY = $Resultado['user_xy'];
            $Music = $Resultado['music'];
        }
    return array(@$Back, @$BackXY, @$userXY, @$Music);
}}



Function PerfilSolicitadoArmas($Conexao, $Usuario, $Limit) {
    $ArmasDoITem = $Conexao->prepareStatment("SELECT * FROM cases_users_weapons WHERE id_user = '$Usuario' ORDER BY id DESC LIMIT 70 OFFSET '$Limit'");
    $ArmasDoITem->execute(); 
    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {
        $CASEID = $r['case_id'];
        $ArmID = $r['id_weaponcase'];
        $Etapa1 = $Conexao->prepareStatment("SELECT * FROM cases_detalhes WHERE id = '$CASEID'");
        $Etapa1->execute();
        $Etapa1R = $Etapa1->fetch(PDO::FETCH_ASSOC);
        $ArmasDoITem2 = $Conexao->prepareStatment("SELECT * FROM cases_weapons WHERE id = '$ArmID'");
        $ArmasDoITem2->execute();
        while ($r2 = $ArmasDoITem2->fetch(PDO::FETCH_ASSOC)) {
            if ($r['status'] == 0) {
                if (@$_SESSION['username'] == $Usuario) {
                    if(@$_COOKIE['thema'] == 'V12'){
                    echo '<div class="item-small-case user-case ' . NiveisArmas($r2['nivelweapon']) . '" data-price="' . $r2['price'] . '" style="background-size: 112%;background-repeat: no-repeat;">         
                <a href="#" class="btn-case-action send action-send" data-id="' . $r['sessaofinal'] . '" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Enviar item">
                Retirar        </a>
            <a href="#" class="btn-case-action sell action-sell" data-id="' . $r['sessaofinal'] . '" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Vender item">
                Vender por <span ><i class="fa fa-usd"></i> ' . $r2['price'] . '</span>
            </a>';
                    }else{
                        echo '<div class="item-small-case user-case ' . NiveisArmas($r2['nivelweapon']) . '" data-price="' . $r2['price'] . '">         
                        <a href="#" class="btn-case-action send action-send" data-id="' . $r['sessaofinal'] . '" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Enviar item">
                        Retirar        </a>
                    <a href="#" class="btn-case-action sell action-sell" data-id="' . $r['sessaofinal'] . '" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Vender item">
                        Vender por <span ><i class="fa fa-usd"></i> ' . $r2['price'] . '</span>
                    </a>';
                    }
                } else {
                    echo '<div class="item-small-case user-case ' . NiveisArmas($r2['nivelweapon']) . '" data-price="' . $r2['price'] . '" style="background-size: 112%;background-repeat: no-repeat;">
                    <div class="info">
                       <span class="item-status">
                       <i class="fa esperando fa-hourglass"></i>Aguardando                            </span>
                       <span class="price ">
                       <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['price'] . '
                       </span>
                    </div>';
                }
            } elseif ($r['status'] == 1) {
                echo '<div class="item-small-case user-case ' . NiveisArmas($r2['nivelweapon']) . '" data-price="' . $r2['price'] . '">
            <div class="info">
               <span class="item-status">
               <i class="fa fa-arrow-down"></i>Vendido                            </span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['price'] . '
               </span>
            </div>';
            } else {
                echo '<div class="item-small-case user-case ' . NiveisArmas($r2['nivelweapon']) . '" data-price="' . $r2['price'] . '">
            <div class="info">
               <span class="item-status">
               <i class="fa retirada fa-arrow-up"></i>Retirado                            </span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['price'] . '
               </span>
            </div>';
            }
            if(@$_COOKIE['thema'] == 'V12'){
            echo '<div class="img-holder" style="top: -5;">
               <img class="image2" src="/template/imgs/weapons_drops/' . $r2['weaponimg'] . '.png" alt="MAC-10 | Tatter (Battle-Scarred)" style="top: 0px; '.StyleCases2($r2['category']).'">
               <a href="/case/' . @$Etapa1R['casename'] . '">';
                if(@$Etapa1R['caseimg'] != null){
                    echo '<img class="case V12" src="/template/imgs/cases/' . $Etapa1R['caseimg'] . '.png"></a>';
                    }else{
                     echo '<img class="case V12"src="/template/imgs/cases/offline.png"></a>';
                    }
               }
               else
               {
                echo '<div class="img-holder" style="top: -5;">
                <img class="image" src="/template/imgs/weapons_drops/' . $r2['weaponimg'] . '.png" alt="MAC-10 | Tatter (Battle-Scarred)">
                <a href="/case/' . @$Etapa1R['casename'] . '">';
               if(@$Etapa1R['caseimg'] != null){
               echo '<img class="case" src="/template/imgs/cases/' . $Etapa1R['caseimg'] . '.png"></a>';
               }else{
                echo '<img class="case" src="/template/imgs/cases/offline.png"></a>';
               }
            }
           echo '</div>
            <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">' . $r2['classeweapon'] . '</span><br>' . $r2['nameweapon'] . ' (' . $r2['dias'] . ' Dias)</div>
         </div>';
        }
    }
}

Function PerfilSolicitadoArmasCount($Conexao, $Usuario){
$query_Total = $Conexao->prepareStatment("SELECT * FROM cases_users_weapons WHERE id_user = '$Usuario'");
$query_Total->execute(); 
$query_result = $query_Total->fetchAll(PDO::FETCH_ASSOC);
$query_count =  $query_Total->rowCount();
return $qtdPag = ceil($query_count/70);
}

Function PerfilSolicitadoArmasPaginacao($PagAtual, $Count, $Usuario){
    if($PagAtual > 1){
        $Sub = $Count-1; 
        echo '<a class="page-link" href="/profile/'.$Usuario.'/'.$Sub.'" rel="prev">«</a>';
    }else{
    echo '<li class="page-item disabled"><span class="page-link">«</span></li>';
    }
    if($Count > 1){
        for($i=1; $i < $Count+1; $i++){
            if($i == $PagAtual){
                echo  '<li class="page-item active"><a class="page-link" href="/profile/'.$Usuario.'/'.$i.'">'.$i.'</a></li>';
            }else{
                echo  '<li class="page-item"><a class="page-link" href="/profile/'.$Usuario.'/'.$i.'">'.$i.'</a></li>';
            }
        }
        echo '<li class="page-item"><a class="page-link" href="/profile/'.$Usuario.'/'.$Count++.'" rel="next">»</a></li>';
    }else{
        echo '<li class="page-item active"><span class="page-link">1</span></li>';
        echo '<li class="page-item disabled"><a class="page-link" rel="next">»</a></li>';
    }
    }


Function PerfilSolicitadoArmasExclusivas($Conexao, $Usuario) {
    $ArmasDoITem = $Conexao->prepareStatment("SELECT * FROM fastbuy_users_weapons WHERE id_user = '$Usuario' ORDER BY id DESC");
    $ArmasDoITem->execute();
    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {
        $ArmID = $r['id_weaponfast'];
        $ArmasDoITem2 = $Conexao->prepareStatment("SELECT * FROM fast_buy WHERE id = '$ArmID' ORDER BY id DESC");
        $ArmasDoITem2->execute();
        while ($r2 = $ArmasDoITem2->fetch(PDO::FETCH_ASSOC)) {
            if ($r['status'] == 0) {
                if (@$_SESSION['username'] == $Usuario) {
                    echo '<div class="item-small-case user-case covert" data-price="' . $r2['weapon_price'] . '">

                <a href="#" class="btn-case-action send action-send" data-id="' . $r['sessaofast'] . '" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Enviar item">
                Retirar        </a> <a href="#" class="btn-case-action sell action-leiloar" data-idX="' . $r['sessaofast'] . '" data-img="/template/imgs/weapons_drops/fast_buy/' . $r2['weapon_img'] . '.png" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Anunciar na loja clandestina">
             <span ><i class=""></i>Anunciar</span>
            </a>';
            
                } else {
                    echo '<div class="item-small-case user-case covert" data-price="' . $r2['weapon_price'] . '">
                    <div class="info">
                       <span class="item-status">
                       <i class="fa esperando fa-hourglass"></i>Aguardando                            </span>
                       <span class="price ">
                       <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['weapon_price'] . '
                       </span>
                    </div>';
                }
            } elseif ($r['status'] == 1) {
                echo '<div class="item-small-case user-case covert" data-price="' . $r2['weapon_price'] . '">
            <div class="info">
               <span class="item-status">
               <i class="fa fa-arrow-down"></i>Vendido                            </span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['weapon_price'] . '
               </span>
            </div>';
            } elseif ($r['status'] == 2){
                echo '<div class="item-small-case user-case covert" data-price="' . $r2['weapon_price'] . '">
            <div class="info">
               <span class="item-status">
               <i class="fa retirada fa-arrow-up"></i>Retirado                            </span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['weapon_price'] . '
               </span>
            </div>';
            }elseif ($r['status'] == 3){
                echo '<div class="item-small-case user-case covert" data-price="' . $r2['weapon_price'] . '">
            <div class="info">
               <span class="item-status">
               <i class="fa leilao fa-usd"></i>Anunciado No Shop                            </span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-usd"></i></span> ' . $r2['weapon_price'] . '
               </span>
            </div>';
            }
            echo '<div class="img-holder">
               <img class="image" src="/template/imgs/weapons_drops/fast_buy/' . $r2['weapon_img'] . '.png" alt="MAC-10 | Tatter (Battle-Scarred)">';
               if ($r['status'] == 3){
               echo '<a href="/shopclandestine/'.$r['sessaofast'].'">';
               }else{
                echo '<a href="#">';
               }
                echo '<img class="case" src="/template/imgs/cases/offline.png"></a>';
           echo '</div>
            <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">' . $r2['weapon_name'] . '</span><br>(' . $r2['weapon_count'] . ' Dias)</div>
         </div>';
        }
    }
}


Function Leilao($Requiscao, $Logado) {
    $Leilao = $Requiscao->prepareStatment("SELECT * FROM fastbuy_users_weapons WHERE status = 3 ORDER BY id DESC");
    $Leilao->execute();
    while ($r = $Leilao->fetch(PDO::FETCH_ASSOC)) {
    $Arma = $r['id_weaponfast'];
    $Leilao2 = $Requiscao->prepareStatment("SELECT * FROM fast_buy WHERE id = '$Arma'");
    $Leilao2->execute();
        while ($r2 = $Leilao2->fetch(PDO::FETCH_ASSOC)) {
            $Argumentos = '\''.$r['sessaofast'].'\',\''.$r['id_user'].'\',\''.$r2['weapon_img'].'\',\''.$r2['weapon_name'].'\',\''.($r['last_l']).'\',\''.($r['price_l']).'\'';
     echo '<div class="item-small-case user-case rareofgods" data-price="'.$r['price_l'].'">'; 
    echo '</a>
 <a onclick="MyDiv('.$Argumentos.');" class="btn-case-action sell action-sell"  data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Preço Atual" style="color: #fff">
     Preço Anunciado: <span><i class="fa fa-usd"></i> '.$r['price_l'].'</span>
 </a><div class="img-holder">
    <img class="image" src="/template/imgs/weapons_drops/fast_buy/'.$r2['weapon_img'].'.png" alt="MAC-10 | Tatter (Battle-Scarred)">
    <a onclick="MyDiv('.$Argumentos.');"><img class="case" src="/template/imgs/cases/offline.png"></a></div>
 <div class="title"><i class="fa fa-square"></i> '.$r2['weapon_name'].' <br>(30 Dias) Por : '.$r['id_user'].'</div>
</div>';

    }
}
}

function AllUsers($Conexao){
    $ArmasDoITem = $Conexao->prepareStatment("SELECT * FROM cases_users WHERE master = false ORDER BY saldo DESC");
    $ArmasDoITem->execute();
    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="item-small-case user-case" style="box-shadow: inset 1px 1px 51px #10101000; background-image: url(https:" data-price="0.14">
        <div class="img-holder">
            <img class="image"  style="width:100; height:100;" src="'.$r['userimg'].'" alt="PP-Bizon | Photic Zone (Well-Worn)">
            <a href="/profile/'.$r['id_user'].'"><img class="case" src="'.$r['userimg'].'"></a>
        </div>
        <div class="title"><span style="color:#b2b2b2"></span><br>   '.$r['id_user'].'</div>                 
         </div>';
            
    }
}


function Banners($ConnOK, $Logado, $BanerL){
    $rankplayer = "SELECT * FROM cases_banners ORDER BY id ASC";
    $ix = 0;
    foreach ($ConnOK->query2($rankplayer) as $r){
        $Y = BannerExistente($ConnOK,$Logado,$r['banner']); 
        echo '<div class="item-weapon" id="prize-'.$r['id'].'">
        <div class="info">
           <div class="titleMore" >'.$r['name'].'</div>
           <img class="bannerMORE" src="/template/imgs/UI_V12/Banners_Profiles/'.$r['banner'].'.gif">';
        if($Y == true){
            if($r['banner'] == $BanerL){
                echo '<button type="button" class="btn-action2" data-id="'.$r['id'].'" disabled>
                <span class="'.$r['id'].'">
                   <i class="fa fa-check-close"></i>USANDO
                </span>
             </button>';
               }else{
            echo '<button type="button" class="btn-action2 UseBanner" data-id="'.$r['id'].'" >
            <span class="'.$r['id'].'">
               <i class="fa fa-check-circle"></i>USAR
            </span>
         </button>';
               }
        }else{
            echo '<button type="button" class="btn-action2 NewBanner" data-id="'.$r['id'].'" >
            <span class="'.$r['id'].'">
               BUY $'.$r['price'].'
            </span>
         </button>';
        }
        echo '</div>
     </div>';
            
    }
}

function Frames($ConnOK, $Logado, $BanerL){
    $rankplayer = "SELECT * FROM cases_frames ORDER BY id ASC";
    $ix = 0;
    foreach ($ConnOK->query2($rankplayer) as $r){
        $Y = FrameExistente($ConnOK,$Logado,$r['frame']); 
        echo '<div class="item-weapon" id="prize-'.$r['id'].'" style="flex: 20 0 40%;">
        <div class="info">
           <div class="titleMoreMoldura" >'.$r['name'].'</div>
           <img class="bannerMOREMoldura" src="/template/imgs/UI_V12/Molders_Profiles/'.$r['frame'].'">';
        if($Y == true){
            if($r['frame'] == $BanerL){
                echo '<button type="button" class="btn-action3 Tpp" data-id="'.$r['id'].'" disabled>
                <span class="Pda">
                   USANDO
                </span>
             </button>';
               }else{
            echo '<button type="button" class="btn-action3 UseFrame Tpp" data-id="'.$r['id'].'" >
            <span class="'.$r['id'].'">
               <i class="fa fa-check-circle"></i>USAR
            </span>
         </button>';
               }
        }else{
            echo '<button type="button" class="btn-action3 NewFrame Tpp" data-id="'.$r['id'].'" ><i class="fa fa-shopping-cart"></i>
            <span class="'.$r['id'].'">$'.$r['price'].'</span>
         </button>';
        }
        echo '</div>
     </div>';
            
    }
}




function BannerExistente($ConnOK, $Logado, $Banner){
    $Resul = false;
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_banners WHERE banner = :cod");
    $Etapa1->execute(array(
        'cod' => $Banner
    ));
    $Resultado = $Etapa1->fetch(PDO::FETCH_ASSOC);
    $Explodindo1 = explode(",", $Resultado['users']);
    $Contando = count($Explodindo1);
    for($n=0; $n < $Contando; $n++){
        if($Logado == @$Explodindo1[$n]){
            $Resul = true;
        }
    }
    return $Resul;
}

function FrameExistente($ConnOK, $Logado, $Banner){
    $Resul = false;
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_frames WHERE frame = :cod");
    $Etapa1->execute(array(
        'cod' => $Banner
    ));
    $Resultado = $Etapa1->fetch(PDO::FETCH_ASSOC);
    $Explodindo1 = explode(",", $Resultado['users']);
    $Contando = count($Explodindo1);
    for($n=0; $n < $Contando; $n++){
        if($Logado == @$Explodindo1[$n]){
            $Resul = true;
        }
    }
    return $Resul;
}


Function NewsDrops($ConnOK){
    $Drops = "SELECT * FROM cases_news ORDER BY id ASC";
    $ix = 0;
    foreach ($ConnOK->query2($Drops) as $rows){
    echo '<span class="WebTeste" id="Weapon-'.$ix++.'">
        <img class="NvBWeapon"src="/template/imgs/UI_V12/WeaponsNews/'.$rows['img'].'.png">
           <img class="NvBCategory" src="/template/imgs/UI_V12/WeaponsNews/Category/'.CategoryNews($rows['category']).'.png"><p class="NvBTitle">'.$rows['name'].'</p>
    </span>';
}}

Function StyleCases($Objeto){
    switch ($Objeto){
            case $Objeto > 1:
                return 'style="transform: rotate(0);width: 70%;top: 40px;"';
                break;
    }
}

Function StyleCases2($Objeto){
    switch ($Objeto){
            case $Objeto > 1:
                return 'transform: rotate(0);width: 70%;
                top: -7px;';
                break;
    }
}


Function BrindeDiario($ConnOK, $BrindeData){
    if(@$_SESSION['username'] != null && @$BrindeData != date('d/m/Y') && @$_COOKIE['thema'] == 'V12'){
    $rankplayer = "SELECT * FROM cases_gifts";
    echo '<div class="modal fade show modal-discount modal-email" id="BrindesDiarios" tabindex="-1" role="dialog" aria-labelledby="modal-email" aria-hidden="true" style="display: block;background-color: #1b1b1bd6;">
    <div class="modal-dialog" role="document" style="
max-width: 700;
">
       <div class="modal-content" style="    background-image: linear-gradient(#0261c1, #00131b);     box-shadow: 0 0 3px #06f;">
          <div class="modal-header">
             <h5 class="modal-title">Recompensas Diárias</h5>
          </div>
          <div class="modal-body balance-holder form-group">
             <div id="Recompensas" class="BrindeReco">
             <span class="BrindeSpan">';
    foreach ($ConnOK->query2($rankplayer) as $Resultado){
        if($Resultado['type'] > 1){
    echo '<div>
    <img src="/template/imgs/UI_V12/Weapons/weaponback2.png">
<img class="BrindeImage" src="'.$Resultado['image'].'" style="    width: 32%;
margin: -38px 0px 0px -236px;">
<p class="BrindeTitle" style="margin: -164px 0px 1px 72px;">'.$Resultado['name'].'</p>
<p class="BrindeSub">Dias/Preço: '.$Resultado['days'].'D / '.$Resultado['value'].'$</p> </div>';
        }else{
            echo '<div>
            <img src="/template/imgs/UI_V12/Weapons/weaponback2.png">
        <img class="BrindeImage" src="'.$Resultado['image'].'">
        <p class="BrindeTitle">'.$Resultado['name'].'</p>
        <p class="BrindeSub">Recompensa: '.$Resultado['value'].'$</p> </div>';
        }
    }
    echo '</span>
    </div>
    </div>
    <div class="modal-footer">
       <button class="btn btn-primary btn-block" id="RetirarBrinde" data-game-id="" style="    background: linear-gradient(to right,#046580,#06b9e8);"><span style="    font-family: Arial;
       font-weight: 600;">Receber</span></button>
    </div>
 </div>
</div>
</div>';
}
}

function AbrindoCaixa($ConnOK, $CaseRout, $CCO) {
    $id = 0;
    $id2 = 0;
    $rankplayer = "SELECT * FROM cases_weapons WHERE caseid = '$CaseRout' ORDER BY RANDOM()";
    foreach ($ConnOK->query2($rankplayer) as $ranking) {
        for ($i = 0;$i < $ranking['prob'];$i++) {
            $ttt = array('itemid' => $ranking['id'], 'image_id' => '/template/imgs/weapons_drops/193/' . $ranking['weaponimg'] . '.png', 'name' => $ranking['nameweapon'], 'name_hash' => 'Bayonet | Boreal Forest (Battle-Scarred)' . ' #' . $id++, "rarity" => NiveisArmas($ranking['nivelweapon']), 'type' => CheckType($ranking['classeweapon']), 'countweapons' => $CCO);
            $Resultado1[] = $ttt;
        }
    }
    $first = shuffle($Resultado1);
    $Encod = json_encode($Resultado1);
    $Vinte = $Resultado1[21];
    if ($Vinte != null) {
        $itemid = $Resultado1[21]["itemid"];
    }else{
        $itemid = 'Error';
    }
    return array($Encod, $itemid);
}

Function CaseBuyComplet(){
     
}

Function LevelCharac($Objeto){
    switch ($Objeto){
        case $Objeto <= 2:
         return '30/15/7';
          break;
            case 3:
                return '30/7';
                break;
    }
}


Function WeaponTag($Objeto){
    switch ($Objeto){
            case 3:
                return 'Tag3.png';
                break;
    }
}

Function CategoryNews($Objeto){
    switch ($Objeto){
        case 1:
         return 'Rifle';
          break;
         case 2:
            return 'Sub';
            break;
            case 3:
                return 'Shot';
                break;
                case 4:
                    return 'Sniper';
                    break;
    }
}


function NovaIntegracao($Num){
    if(strlen($Num) == 10){
      $N1 = substr($Num, 0, -8);  // ANO
      $N2 = substr($Num, 2, -6);  // MES
      $N3 = substr($Num, 4, -4);  // DIA
      $N4 = substr($Num, 6, -2);
      $N5 = substr($Num, 8, 2);
      $Dia = $N3.'/'.$N2.'/'.$N1.' Às '.$N4.':'.$N5;
    }else{
        $Dia = $Num;
    }
    return $Dia;
    }

    
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a');
  }

  function SomenteNumero($Obejto){
    $res = preg_replace("/[^0-9.]/", "", "$Obejto");
    return $res;
  }

  function MargensSEMPX($Obejto){
    $res = preg_replace("/[^0-9.;-]/", "", "$Obejto");
  return $res;
  }

  function CertasMargens($Obj){
    $Margens1 = explode(" ", $Obj);
    if($Count = count($Margens1) >= 2){
    $Margens2 = $Margens1[0].";".$Margens1[1];
    $Final = MargensSEMPX($Margens2);
    }else{
    $Final = false;
    }
    return $Final;
    }

    function UrlCerta($UU){
        @$URL1 = explode('url("', @$UU);
        @$URL2 = explode('")', @$URL1[1]);
        if (filter_var(@$URL2[0], FILTER_VALIDATE_URL)) {
        $FINAL = $URL2[0];
        }else{
          $FINAL = false;
        }
        return $FINAL;
        }
        

  function GerarSessao($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  
  }
  
  function ProfileVisitante($GE,$LL,$AU){
    if($GE != null){
        if($GE == 'visitante'){
        if($LL == $AU){
            $Retorno = 0;
        }else{
            $Retorno = 1;
        }}else{
        $Retorno = 2;
    }}else{
    $Retorno = 3;
}
return $Retorno;
}
//============================================================================================================================================
//                                                         POINT BLANK CONEXAO
//============================================================================================================================================
Function ConexaoPB() {
    class DatabaseUtility2 {
        private $dsn, $username, $password, $database, $pdo;
        public function __construct($host = 'localhost', $username = 'root', $password = '', $database) {
            $this->dsn = "pgsql:dbname=$database;host=$host";
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        public function connect() {
            try {
                $this->pdo = new PDO($this->dsn, $this->username, $this->password, null);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }
            catch(PDOException $err) {
                die($err->getMessage());
            }
        }
        public function prepareStatment2($query) {
            return $this->pdo->prepare($query);
        }
        public function query22($query) {
            return $this->pdo->query($query);
        }
    }
    $ConnOK2 = new DatabaseUtility2('localhost', 'postgres', '123456', 'Evo3');
    $ConnOK2->connect();
    return $ConnOK2;
}
$Logado = @$_SESSION['username'];

Function SolicitacaoArmasPB($Conexao, $Usuario) {
    $ArmasDoITem = $Conexao->prepareStatment2("SELECT * FROM player_items WHERE owner_id = '$Usuario' AND item_name != 'Title Reward' ORDER BY object_id DESC ");
    $ArmasDoITem->execute();
    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {
        if(strlen($r['count']) > 4 ){
        if($r['equip'] == 2){

        echo '<div class="item-small-case user-case industrial" data-price="123">
            <div class="info">
               <span class="item-status">
               <i class="fa retirada fa-circle-o-notch"></i>Usando                            </span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-cubes"></i></span> Inventario
               </span>
               </div>';
               if($r['category'] == 1){
               echo '<div class="img-holder">
               <img class="image" src="/template/imgs/inventarypb/primarias.png" alt="MAC-10 | Tatter (Battle-Scarred)">
               <a href="#"><img class="case" src="/template/imgs/inventarypb/primarias.png"></a>
            </div>
            <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">Primaria </span>'.$r['item_name'].'<br>Acaba Dia ( '.NovaIntegracao($r['count']).' )</div>
         </div>';
               }elseif($r['category'] == 2){
                echo '<div class="img-holder">
                <img class="image" src="/template/imgs/inventarypb/acessorios.png" alt="MAC-10 | Tatter (Battle-Scarred)">
                <a href="#"><img class="case" src="/template/imgs/inventarypb/acessorios.png"></a>
             </div>
             <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">Person/Acess </span>'.$r['item_name'].'<br>Acaba Dia ( '.NovaIntegracao($r['count']).' )</div>
          </div>';
         }else{
            echo '<div class="img-holder">
            <img class="image" src="/template/imgs/inventarypb/items.png" alt="MAC-10 | Tatter (Battle-Scarred)">
            <a href="/case/1"><img class="case" src="/template/imgs/inventarypb/items.png"></a>
         </div>
         <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">Items/More </span>'.$r['item_name'].'<br>Acaba Dia ( '.NovaIntegracao($r['count']).' )</div>
      </div>';
         }
         
         
        }elseif($r['equip'] == 1){
            echo '<div class="item-small-case user-case industrial" data-price="123">
            <div class="info">
               <span class="item-status">
               <i class="fa fa-check"></i>Não Usado</span>
               <span class="price ">
               <span class="symbol"><i class="fa fa-cubes"></i></span> Inventario
               </span>
               </div>';
               if($r['category'] == 1){
                echo '<div class="img-holder">
                <img class="image" src="/template/imgs/inventarypb/primarias.png" alt="MAC-10 | Tatter (Battle-Scarred)">
                <a href="#"><img class="case" src="/template/imgs/inventarypb/primarias.png"></a>
             </div>
             <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">Primaria </span>'.$r['item_name'].'<br>Tempo: ( '.secondsToTime($r['count']).' Dias)</div>
          </div>';
                }elseif($r['category'] == 2){
                 echo '<div class="img-holder">
                 <img class="image" src="/template/imgs/inventarypb/acessorios.png" alt="MAC-10 | Tatter (Battle-Scarred)">
                 <a href="#"><img class="case" src="/template/imgs/inventarypb/acessorios.png"></a>
              </div>
              <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">Person/Acess </span>'.$r['item_name'].'<br>Tempo: ( '.secondsToTime($r['count']).' Dias)</div>
           </div>';
          }else{
             echo '<div class="img-holder">
             <img class="image" src="/template/imgs/inventarypb/items.png" alt="MAC-10 | Tatter (Battle-Scarred)">
             <a href="/case/1"><img class="case" src="/template/imgs/inventarypb/items.png"></a>
          </div>
          <div class="title"><i class="fa fa-square"></i> <span style="color:#cf6a32">'.$r['item_name'].'</span><br>Acaba Dia ( '.secondsToTime($r['count']).' )</div>
       </div>';
          }
        }
    }
}
}
function AmigosPB($Conexao, $Usuario, $Requiscao){
    $ArmasDoITem = $Conexao->prepareStatment2("SELECT * FROM friends WHERE owner_id = '$Usuario' AND removed != 't' ORDER BY friend_id DESC ");
    $ArmasDoITem->execute();

    while ($r = $ArmasDoITem->fetch(PDO::FETCH_ASSOC)) {

        $Nome = PerfilLogado2($r['friend_id'], $Requiscao)[0];
        $Foto = PerfilLogado2($r['friend_id'], $Requiscao)[5];
        $Banner = PerfilLogado2($r['friend_id'], $Requiscao)[6];
        $Moldura = PerfilLogado2($r['friend_id'], $Requiscao)[7];
        if($Nome != null){
            $idfrined = $r['friend_id'];
            $InfoPlayer = $Conexao->prepareStatment2("SELECT * FROM accounts WHERE player_id = '$idfrined'");
            $InfoPlayer->execute();
            while ($r2 = $InfoPlayer->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="item-small-case user-case" style="box-shadow: inset 1px 1px 51px #10101000; background-image: url(https:" data-price="0.14">
                   <div class="img-holder">
                      <img class="image"  style="width:100; height:118;" src="'.$Foto.'" alt="PP-Bizon | Photic Zone (Well-Worn)">
                      <a href="/profile/'.$Nome.'"><img class="case V12" src="https://media2.giphy.com/media/VdEzY9xugW4InIxIbE/source.gif"></a> 
                   </div>
                   ';
                   if($Moldura != null || $Moldura != ''){
                   echo '<a href="/profile/'.$Nome.'"><img class="image" style="width: 100%;" src="/template/imgs/UI_V12/Molders_Profiles/'.$Moldura.'" alt="casedrop.com">';
                   }
                   echo '<div class="statusP" style="/* background-image: url(/template/imgs/UI_V12/Banners_Profiles/Aurora.gif); */"><a href="/profile/eduh123">
                   <img src="/template/imgs/UI_V12/Tools/Off.png" style="
                   overflow: hidden;
                   position: absolute;
                   margin: -84px 0 0 126px;
                   width: 36%;
                   /* left: 125px; */
                   /* white-space: nowrap; */
                   right: 0;
                   top: 24px;
                   font-size: 15px;
                   line-height: 20px;
                   /* overflow: hidden; */
                   /* padding: 0px 7px 4px; */
                   /* white-space: nowrap; */
                   /* text-overflow: ellipsis; */
                   /* color: #e4e4e4; */
                   /* background: rgba(12, 12, 12, 0.53); */
                   /* position: absolute; */
                   /* left: 0px; */
                   /* right: 0; */
                   /* bottom: 0; */
                   /* background-size: 100% 44px; */
                   /* background-blend-mode: color; */
                   /* background-repeat: no-repeat; */
               ">
                   
                                  </a></div>';
                   if($Banner != null || $Banner != ''){
                   echo '
                   <div class="titlex" style="background-image: url(/template/imgs/UI_V12/Banners_Profiles/'.$Banner.'.gif);">
                      <span style="color: #ffffff;">'.$Nome.'</span><span><a onclick="PlayerInfo();"><span style="margin: 5px;font-size: 16px; color: #fff;"><i class="fa fa-info-circle" aria-hidden="true"></i></span></a></span>
                      <img src="/template/imgs/UI_V12/Patentes/'.$r2['rank'].'.png" style="
                         width: 68px;
                         position: relative;
                         margin: -14px -35px;
                         filter: blur(1px);
                         opacity: 0.6;
                         float: right;"><br><span style="color: #e3def9;font-size: 12px;">Usuario VIP</span>
                   </div>
                </div>
                ';
                }else{
                echo '
                <div class="title"> <span style="color: #ffffff; font-size: 15px;">'.$Nome.'</span><span><a onclick="PlayerInfo();"><span style="margin: 5px;font-size: 16px; color: #fff;"><i class="fa fa-info-circle" aria-hidden="true"></i></span></a></span><br>Usuario Comum</div>
                </div>';
                }}}}
     
}
//============================================================================================================================================
//                                                         LOGIN WEBSITE
//============================================================================================================================================
Function Login($Usuario, $Senha, $Token, $db, $db2) {
    if ((@$_SESSION['username'])) {
        echo "<script>window.location = '/';</script>";
        exit;
    }
    if (!preg_match("#^[aA-zZ0-9\-_]+$#", trim($Usuario)) || !preg_match("#^[aA-zZ0-9\-_]+$#", trim($Senha))) {
        $_SESSION['Alert'] = "Please use alphanumeric characters.";
        header("Location: /login/form");
        exit;
    }
    function encripitar($senha) {
        $salt = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
        $output = hash_hmac('md5', $senha, $salt);
        return $output;
    }
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = ['secret' => "6Ld6k6kZAAAAAP9ZBd79UNF1KBXWr_vRL4g3bgA9", 'response' => $Token,
    // 'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    $options = array('http' => array('header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => http_build_query($data)));
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $res = json_decode($response, true);
    if ($res['success'] == true) {
        if ($Usuario == "") {
            $_SESSION['Alert'] = "Preencha Todos os Campos";
            header("Location: /login");
            exit;
        } else if ($Senha == "") {
            $_SESSION['Alert'] = "Preencha Todos os Campos";
            header("Location: /login");
            exit;
        } else {
            $encript = encripitar($Senha);
            $sth = $db->prepareStatment2("SELECT * FROM accounts WHERE login = :ll AND password = :pss");
            $sth->execute(array(
                ':ll' => $Usuario,
                ':pss' => $encript
            ));

            $result = $sth->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                if ($result['player_name'] == null) {
                    $_SESSION['Alert'] = "Infelizmente não é possivel logar no Site enquanto você não adicionar um Nick a sua conta.";
                    header("Location: /login");
                    exit;
                }
                if ($result['rank'] < 21) {
                    $_SESSION['Alert'] = "Infelizmente não é possivel logar no Site enquanto você não for Tenente ou Superior.";
                    header("Location: /login");
                    exit;
                }
                $Usuario2 = $result['player_id'];
                $Consultar = $db2->prepareStatment("SELECT * FROM cases_users WHERE id_user = '$Usuario';");
                $Consultar->execute();
                $Consultar2 = $Consultar->fetch(PDO::FETCH_ASSOC);
                if ($Consultar2['id'] == null) {
                    $InserirUsu = $db2->prepareStatment('INSERT INTO cases_users (id_user,id_user2) VALUES(:nome,:nome2)');
                    $InserirUsu->execute(array(':nome' => $Usuario, ':nome2' => $Usuario2));
                }
                if($Usuario2 != null){
                    $_SESSION["username"] = $result['login'];
                    $_SESSION["nivel"] = $result['rank'];
                    $_SESSION["exp"] = $result['exp'];
                    $_SESSION["gp"] = $result['gp'];
                    $_SESSION["money"] = $result['money'];
                    $_SESSION["nick"] = $result['player_name'];
                    if($Consultar2['vip'] == true){
                        setcookie("thema", "V12");
                    }
                }
            
                if(@$_POST['tokenX'] == "on"){
                echo '<html lang="en">
                <head>
                    <meta charset="utf-8">
                    <title>message</title>
                    <script>
                        window.opener.postMessage({ token: "XyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9nYW1lcmdhbmdvLmNvbVwvbG9naW5cL3N0ZWFtXC9jYWxsYmFja1wvYWpheFwvY2FtcGFpZ25cL2ZhbHNlXC9pbnZpdGVcL2ZhbHNlIiwiaWF0IjoxNjA1Mzg5NTg3LCJuYmYiOjE2MDUzODk1ODcsImp0aSI6IjNMWkVXTzBOdlJIQzU4MWsiLCJzdWIiOiI3NjU2MTE5OTA1Mzk3NjQ2NCIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJjc3JmIjoiU1o2Z1dyWmNvbmViQ2s5SHJ4c0t6dlhSeGdYcWtudVoifQ.mFBo4ZK5fW7Y65JYRzJl5vSFICDHkG3IpoIdWywqCKU", token_type: "bearer", csrf: "SZ6gWrZconebCk9HrxsKzvXRxgXqknuZ" }, "*");
                        window.close();
                    </script>
                </head>
                <body>
                </body>
                </html>';
                }else{
                header("Location: /login");
                }
            } else {
                if(@$_POST['tokenX'] == "on"){
                    $_SESSION['Alert'] = "Usuário ou senha inválidos.";
                    header("Location: /login?token=on");
                    exit;
                }else{
                $_SESSION['Alert'] = "Usuário ou senha inválidos.";
                header("Location: /login");
                exit;
                }
            }
        }
    } else {
        if(@$_POST['tokenX'] == "on"){
            $_SESSION['Alert'] = "reCAPTCHA Vencido ou Invalido, Tente novamente.";
            header("Location: /login?token=on");
            exit;
            exit();
        }else{
        $_SESSION['Alert'] = "reCAPTCHA Vencido ou Invalido, Tente novamente.";
        header("Location: /login");
        exit;
        exit();
        }
    }
}
//============================================================================================================================================
//                                                              END
//============================================================================================================================================
?>