<?php
header('Content-Type: application/json');
if ($_POST)
{
    if(!isset($_POST["token"])){
        echo '{"result":false,"msg":"invalid token"}';
        exit;
    }

    $SellSessao = clean($_POST['token']);
    if (@$_SESSION['username'] == null)
    {
        echo '{"result":false,"msg":"offline"}';
        exit;
    }

    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_users_weapons WHERE sessaofinal = :ss AND id_user = :ids AND status = :sts");
    $Etapa1->execute(array(
        'ss' => $SellSessao,
        'ids' => $Logado,
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
    echo '{"result":false,"msg":offline}';
}
?>
