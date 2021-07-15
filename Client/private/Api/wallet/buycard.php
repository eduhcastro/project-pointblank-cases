<?php
header('Content-Type: application/json');
if ($_POST)
{

    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_cards WHERE owner = :id");
    $Etapa1->execute(array(
        'id' => $Logado,
    ));
    $Etapa1 = $Etapa1->fetch(PDO::FETCH_ASSOC);
    if($Etapa1['owner'] != null){


        if($Etapa1['status'] == '1'){

            $Etapa1 = $ConnOK->prepareStatment("UPDATE cases_cards SET status=:ss WHERE owner = :id");
            $Etapa1->execute(array(
                'ss' => 0,
                'id' => $Logado
            ));
            echo '{"result":true,"msg":"Cartão Bloqueado.","status":0}';
            exit;
        }
        if($Etapa1['status'] == '0'){

            $Etapa1 = $ConnOK->prepareStatment("UPDATE cases_cards SET status=:ss WHERE owner = :id");
            $Etapa1->execute(array(
                'ss' => 1,
                'id' => $Logado
            ));
            echo '{"result":true,"msg":"Cartão Desbloqueado","status":1}';
            exit;
        }

        echo '{"result":false,"msg":"offline"}';
        exit;
    }else{
        echo '{"result":false,"msg":"offline"}';
        exit;
    }
}
else
{
    echo '{"result":false,"msg":"offline"}';
    exit;
}
?>
