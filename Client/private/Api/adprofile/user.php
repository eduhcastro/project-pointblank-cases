<?php
header('Content-Type: application/json; charset=utf-8');


if(!isset($_SESSION['username'])){
echo '{"result":true,"balance":"Codigo usado! Você ganhou 300$ !!"}';
exit;
}

if($Vip === false){
    echo '{"result":true,"balance":"Codigo usado! Você ganhou 400$ !!"}';
    exit;
    }

if(isset($_POST['y'])){
$Top = SomenteNumero($_POST['y']);
$Left = SomenteNumero($_POST['x']);
//$BackGround = $_POST['Back'];
function Margem($TP, $LF){
    if($LF == null || $TP == null){
        $R1 = false;
    }else{
    if($TP < 112){
        $R1 = true;
    }else{
        $R1 = false;
    }
    if($LF < 1047){
      $R1 = true;
  }else{
      $R1 = false;
  }
}
 return $R1;
}

if(Margem($Top, $Left) == false){
    echo '{"result":false,"msg":"Margens Incorretas."}';
    exit;
}
$Margem = $Top.';'.$Left;
$Consultar = $ConnOK->prepareStatment("SELECT * FROM cases_users_settings WHERE id_user = '$Logado';");
$Consultar->execute();
$Consultar2 = $Consultar->fetch(PDO::FETCH_ASSOC);
if (@$Consultar2['id'] == null) {
    $InserirUsu = $ConnOK->prepareStatment('INSERT INTO cases_users_settings (id_user,user_xy) VALUES(:nome,:nome2)');
    if($InserirUsu->execute(array(':nome' => $Logado, ':nome2' => $Margem))){
        echo '{"result":true,"msg":"Novo Posicionamento definido."}';
        exit;
    }else{
        echo '{"result":false,"msg":"Erro interno,contate o suporte imediatamente!."}';
        exit;
    }
}
$stmt2 = $ConnOK->prepareStatment('UPDATE cases_users_settings SET user_XY = :XY WHERE id_user = :id');
if($stmt2->execute(array(
    ':id' => $Logado,
    ':XY' => $Margem
))){
    echo '{"result":true,"msg":"Novo Posicionamento definido."}';
    exit;
}else{
    echo '{"result":false,"msg":"Erro interno,contate o suporte imediatamente!."}';
    exit;
}}else{
        echo '{"result":false,"msg":"Coloque um XY primeiro!"}';
        exit;
}

?>