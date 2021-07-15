<?php
header('Content-Type: application/json; charset=utf-8');


if(@$_SESSION['username'] == null){
echo '{"result":true,"balance":"Codigo usado! Você ganhou 300$ !!"}';
exit;
}

if($Vip == false){
    echo '{"result":true,"balance":"Codigo usado! Você ganhou 400$ !!"}';
    exit;
    }
if($_POST['P']){
$Position = CertasMargens(@$_POST['P']);
$BackGround = UrlCerta(@$_POST['Back']);


if($Position == false || $BackGround == null || $BackGround == false){
    echo '{"result":false,"msg":"Margens Incorretas Ou Sem BackGround!."}';
    exit;
}

if (filter_var($BackGround, FILTER_VALIDATE_URL)) {
$Consultar = $ConnOK->prepareStatment("SELECT * FROM cases_users_settings WHERE id_user = '$Logado';");
$Consultar->execute();
$Consultar2 = $Consultar->fetch(PDO::FETCH_ASSOC);
if (@$Consultar2['id'] == null) {
    $InserirUsu = $ConnOK->prepareStatment('INSERT INTO cases_users_settings (id_user,background,background_xy) VALUES(:nome,:back,:backxy)');
    if($InserirUsu->execute(array(':nome' => $Logado, ':back' => $BackGround, ':backxy' => $Position))){
        echo '{"result":true,"msg":"Background definido!."}';
        exit;
    }else{
        echo '{"result":false,"msg":"Erro interno,contate o suporte imediatamente!."}';
        exit;
    }
}
$stmt2 = $ConnOK->prepareStatment('UPDATE cases_users_settings SET background = :bg, background_xy = :bgxy WHERE id_user = :id');
if($stmt2->execute(array(
    ':id' => $Logado,
    ':bg' => $BackGround,
    ':bgxy' => $Position
))){
    echo '{"result":true,"msg":"Background definido!."}';
    exit;
}else{
    echo '{"result":false,"msg":"Erro interno,contate o suporte imediatamente!."}';
    exit;
}}else {
    echo '{"result":false,"msg":"Coloque uma URL Valida!"}';
    exit;
}}else{
    echo '{"result":false,"msg":"Coloque um XY primeiro!"}';
    exit;
}

?>