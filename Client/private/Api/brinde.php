<?php
header('Content-Type: application/json');
if(@$_SESSION['username'] == null){
    echo '{"result":true,"balance":"Codigo usado! Você ganhou 300$ !!"}';
    exit;
    }
require 'private/Neuron/plugins/_Plug.php';
if (@$_POST){
if(@$_POST['etapa'] == 2){
    if($BrindeData == date('d/m/Y')){
        echo '{"result":false,"msg":"Você já girou hoje,mas eae, qual foi sua sorte?"}';
        exit;
    }
    $Valor = BrindeReturn(rand(00, 64));
    $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET brinde_data = :bdd WHERE id_user = :id');
    if($stmt2->execute(array(
        ':id' => $Logado,
        ':bdd' => date('d/m/Y')
    ))){
        $Somando = $Saldo + $Valor[1];
        $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :bdd WHERE id_user = :id');
        if($stmt2->execute(array(
            ':id' => $Logado,
            ':bdd' => $Somando
        ))){
            echo '{"result":true,"msg":'.$Valor[0].'}';
            exit;
        }else{
            echo '{"result":false,"msg":"Error 02"}';
            exit;
        }
}else{
    echo '{"result":false,"msg":"Error 01"}';
    exit;
}}}else{
    echo '{"result":false,"msg":"Ganhou 1000$"}';
    exit;
}




