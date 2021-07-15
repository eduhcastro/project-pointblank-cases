<?php
header('Content-Type: application/json');

if (@$_SESSION['username'] == null)
{
    echo '{"result":false,"msg":"Vendido com exito"}';
    exit;
}


if($_POST['method'] == 'sellintwo'){

$IDRe = SomenteNumero($_POST['prize_id']);

$Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE id = :idarma AND id_user = :loga");
$Etapa1->execute(array(
    'idarma' => $IDRe,
    'loga' => $Logado
));
$Resultado1 = $Etapa1->fetch(PDO::FETCH_ASSOC);

if ($Resultado1 > 0){

    $IDRe2 = $Resultado1['session'];
    $Etapa1X = $ConnOK->prepareStatment("SELECT * FROM cases_users_weapons WHERE sessaofinal = :sess AND id_user = :loga AND status = :sts");
    $Etapa1X->execute(array(
        'sess' => $IDRe2,
        'loga' => $Logado,
        'sts' => 0
    ));
    $ResultadoX = $Etapa1X->fetch(PDO::FETCH_ASSOC);
    
    if ($ResultadoX > 0){
    $Etapa2 = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE session = :sess AND usersession = :loga");
    $Etapa2->execute(array(
        'sess' => $IDRe2,
        'loga' => $Logado
    ));
    $Resultado2 = $Etapa2->fetch(PDO::FETCH_ASSOC);

    if ($Resultado2 > 0){

        $ValorArma = $Resultado1['wpprice'];
        $FinalSomado = $Saldo + $ValorArma;
        $Etapa3 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :saldo WHERE id_user = :id');
        if ($Etapa3->execute(array(
            ':id' => $Logado,
            ':saldo' => $FinalSomado
))){

    $Etapa4 = $ConnOK->prepareStatment('UPDATE cases_users_weapons SET status = :statusf WHERE sessaofinal = :sessao');
    $Etapa4->execute(array(
        ':statusf' => '1',
        ':sessao' => $IDRe2
    ));

    echo '{"result":true,"msg":"Vendido com \u00eaxito"}';

}else{
    echo '{"result":false,"msg":"Erro Interno 4"}';
    exit;
}

}else{
    echo '{"result":false,"msg":"Erro Interno 3"}';
    exit;
}

        
    }else{
        echo '{"result":false,"msg":"Erro Interno 2"}';
        exit;
    }


}else{
    echo '{"result":false,"msg":"Erro Interno"}';
    exit;
}

}elseif($_POST['method'] == 'sellone'){
    $SellSessao = clean($_POST['prize_id']);
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_users_weapons WHERE sessaofinal = :sess AND id_user = :loga AND status = :sts");
    $Etapa1->execute(array(
        'sess' => $SellSessao,
        'loga' => $Logado,
        'sts' => 0
    ));
    $Resultado1 = $Etapa1->fetch(PDO::FETCH_ASSOC);

    if ($Resultado1 > 0)
    {
        $IDArma = $Resultado1['id_weaponcase'];
        $Etapa2 = $ConnOK->prepareStatment("SELECT * FROM cases_weapons WHERE id = '$IDArma'");
        $Etapa2->execute();
        $Resultado2 = $Etapa2->fetch(PDO::FETCH_ASSOC);
        if ($Resultado2 > 0)
        {
            $ValorArma = $Resultado2['price'];
            $FinalSomado = $Saldo + $ValorArma;
            $Etapa3 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :saldo WHERE id_user = :id');

            if ($Etapa3->execute(array(
                ':id' => $Logado,
                ':saldo' => $FinalSomado
            )))
            {
                $Etapa4 = $ConnOK->prepareStatment('UPDATE cases_users_weapons SET status = :statusf WHERE sessaofinal = :sessao');
                $Etapa4->execute(array(
                    ':statusf' => '1',
                    ':sessao' => $SellSessao
                ));

                echo '{"result":true,"msg":"Vendido com \u00eaxito"}';
            }
            else
            {
                echo '{"result":false,"msg":"Erro Interno, Contate um Administrador 2"}';
                exit;
            }

        }
        else
        {
            echo '{"result":false,"msg":"Erro Interno, Contate um Administrador"}';
            exit;
        }
    }
    else
    {
        echo '{"result":false,"msg":"Erro Interno"}';
        exit;
    }
}
else
{
    echo '{"result":false,"msg":Vendido com Exito}';
}
?>
