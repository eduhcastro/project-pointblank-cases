<?php
header('Content-type: application/json');

if(@$_SESSION['username'] == null){
    echo '{"result":false,"msg":"Codigo usado! Você ganhou 300$ !!"}';
    exit;
    }

if(SomenteNumero(@$_POST['price']) != null || @$_POST['sessao'] != null){
    $SellSessao = $_POST['sessao'];
    $price = SomenteNumero($_POST['price']);
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM fastbuy_users_weapons WHERE sessaofast = :sess AND id_user = :loga AND status = :pl");
    $Etapa1->execute(array(
        ':sess' => $SellSessao,
        ':loga' => $Logado,
        ':pl' => 0
    ));
    $Resultado1 = $Etapa1->fetch(PDO::FETCH_ASSOC);

if($Resultado1 > 0){
$Etapa3 = $ConnOK->prepareStatment('UPDATE fastbuy_users_weapons SET price_l = :pric, status = 3 WHERE id_user = :id AND sessaofast = :sess');
$Etapa3->execute(array(
    ':id' => $Logado,
    ':pric' => $price,
    ':sess' => $SellSessao
));

echo '{"result":true,"msg":"Colocado a venda!"}';
            
}else{
    echo '{"result":false,"msg":"Error 1"}';
    exit;
}

}else{
    echo '{"result":false,"msg":"Error"}';
    exit;
}




?>