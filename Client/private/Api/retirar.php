<?php
header('Content-Type: application/json');
if(@$_SESSION['username'] == null){
    echo '{"result":true,"balance":"Codigo usado! Você ganhou 300$ !!"}';
    exit;
    }

if($_POST) {
    if($Vip == false){
        echo '{"result":false,"msg":"Error"}';
        exit;
    }
    if($BrindeDataVip == date('d/m/Y')){
        echo '{"result":false,"msg":"Brinde já retirado"}';
        exit;
    }
    $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET vipgift_date = :bdd WHERE id_user = :id');
    if($stmt2->execute(array(
        ':id' => $Logado,
        ':bdd' => date('d/m/Y')
    ))){
        function Gifs($ConnOK, $Saldo, $Logado){
        $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_gifts");
        $Etapa1->execute();
        $Resultado = $Etapa1->fetchAll(PDO::FETCH_ASSOC);
        $Retorno = 0;
        foreach($Resultado as $item){
        if($item['type'] == 1){
            $Saldo2 = $item['value'] + $Saldo;
            $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :bdd WHERE id_user = :id');
            $stmt2->execute(array(
                ':id' => $Logado,
                ':bdd' => $Saldo2
            ));   
            $Retorno+1;   
        }
        if($item['type'] == 2){
            $Name = $item['name'];
            $ItemID = $item['item_id'];
            $Days = $item['days'];
            $Category = $item['category'];
            $WeaponIdCase = $item['id_weaponcase'];

            $InserirUsu = $ConnOK->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,status,sessaofinal) VALUES(:idw,:idu,:cas,:sts,:sfn)');
            $InserirUsu->execute(array(':idw' => $WeaponIdCase, ':idu' => $Logado, ':cas' => 0, ':sts' => 0, ':sfn' => GerarSessao(100)));
            $Retorno+1;    
        }}
    }
    Gifs($ConnOK, $Saldo, $Logado);
    echo  '{"result":true,"msg":"Brinde Retirado"}'; 
}else{
    echo '{"result":false,"msg":"Error 01"}';
    exit;
}}else{
    echo '{"result":false,"msg":"Ganhou 1000$"}';
    exit;
}




