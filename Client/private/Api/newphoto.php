<?php
header('Content-Type: application/json; charset=utf-8');
if(@$_SESSION['username'] == null){
echo '{"result":true,"balance":"Codigo usado! Você ganhou 300$ !!"}';
exit;
}
if($_POST['url']){
$URL = $_POST['url'];



function URLOK($URL){
    if(strlen($URL) > 20){
$URLD = (array) $URL;
$CheckType = substr($URLD[0],-3, 3);
if($CheckType == 'jpg' || $CheckType == 'gif' || $CheckType == 'png'){$Finish = null;
}else{ $Finish = '{"result":false,"msg":"Coloque uma URL com o FINAL (JPG,PNG,GIF)"}';
}}else{ $Finish = '{"result":false,"msg":"Coloque uma URL Valida"}'; }
return $Finish;
}

$Testa = URLOK($URL);

if($Testa != null){
echo $Testa;
exit;
}

if (filter_var($URL, FILTER_VALIDATE_URL)) {
    $imagesize = getimagesize(''.$URL.'');
    if($imagesize[0] != null){
      if($imagesize[0] < 400){
        echo '{"result":false,"msg":"Sua imagem deve ter no mínimo 400 de largura (W)."}';
        exit;
      }
      if($imagesize[1] < 600){
        echo '{"result":false,"msg":"Sua imagem deve ter no mínimo 600 de altura (H)."}';
        exit;
      }
    }else{
      echo '{"result":false,"msg":"Tente novamente."}';
      exit;
    }
$stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET userimg = :img WHERE id_user = :id');
if($stmt2->execute(array(
    ':id' => $Logado,
    ':img' => $URL
))){

    $stmt3 = $ConnOK->prepareStatment('UPDATE cases_session SET userimg = :img WHERE id_user = :id');
    $stmt3->execute(array(
        ':id' => $Logado,
        ':img' => $URL
    ));
    echo '{"result":true,"msg":"Imagem Trocada!"}';
}else{
    echo '{"result":false,"msg":offline2}';
    exit;
}
}else {
    echo '{"result":false,"msg":"Coloque uma URL Valida!"}';
    exit;
}
}else{
    echo '{"result":false,"msg":"Coloque um link primeiro!"}';
    exit;
}

?>