<?php
header('Content-type: application/json');

if(@$_SESSION['username'] == null){
    echo '{"result":false,"msg":"Codigo usado! Você ganhou 300$ !!"}';
    exit;
    }
    if($_POST['leilaos']){
    $Sessao = clean($_POST['leilaos']);
    $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM fastbuy_users_weapons WHERE sessaofast = :cod AND status = :ss");
    $Etapa0->execute(array(
        'cod' => $Sessao,
        'ss' => 3
    ));
    $Resultado0 = $Etapa0->fetch(PDO::FETCH_ASSOC);
    if($Resultado0 > 0){
        if($Resultado0['id_user'] == $Logado){
            echo '{"result":false,"msg":"Não pode comprar seu propio item!"}';
        exit;
        }
        $Preco = $Resultado0['price_l'];
        $Antigo = $Resultado0['id_user'];
        if($Saldo > $Preco){
            $Etapa1 = $ConnOK->prepareStatment('UPDATE fastbuy_users_weapons SET price_l = :prl, status = :sts, id_user = :ids WHERE sessaofast = :sss');
            $Etapa1->execute(array(
                ':prl' => 0,
                ':sts' => 0,
                ':ids' => $Logado,
                ':sss' => $Sessao
            ));
            $Etapa12 = $ConnOK->prepareStatment('SELECT * FROM cases_users WHERE id_user = :ant');
            $Etapa12->execute(array(
                ':ant' => $Antigo
            ));
            $ResultadoX = $Etapa12->fetch(PDO::FETCH_ASSOC);
            $NovoSaldo = $ResultadoX['saldo'] + $Preco;
            $Etapa2 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :ss WHERE id_user = :ant');
            $Etapa2->execute(array(
                ':ant' => $Antigo,
                ':ss' => $NovoSaldo
            ));
            $NovoSaldoComprador = $Saldo - $Preco;
            $Etapa3 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :ss WHERE id_user = :ant');
            $Etapa3->execute(array(
                ':ant' => $Logado,
                ':ss' => $NovoSaldoComprador
            ));
            echo '{"result":true,"msg":"Arma Comprada! :) )"}';
        }else{
            echo '{"result":false,"msg":"Você não tem saldo"}';
        exit;
        }
    }else{
        echo '{"result":false,"msg":"Esse item não existe"}';
    exit;
    }
}else{
    echo '{"result":false,"msg":"Codigo usado! Você ganhou 300$ !!"}';
exit;
}

?>