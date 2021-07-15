<?php
header('Content-Type: application/json');
if ($_POST)
{

    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  

    function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }

    $CVC = generate_string($permitted_chars, 4);
    $CartãoAtual = $Carteira[0];
    $NovoCartao = rand(000000000000000, 999999999999999); 


    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_cards WHERE owner = :id");
    $Etapa1->execute(array(
        'id' => $Logado,
    ));
    $Etapa1 = $Etapa1->fetch(PDO::FETCH_ASSOC);
    $CardOld = $Etapa1['card_n'];
    if($Etapa1['owner'] != null){
        $EtapaX = $ConnOK->prepareStatment("SELECT * FROM cases_cards WHERE card_n = :id");
        $EtapaX->execute(array(
            'id' => $NovoCartao
        ));
        $EtapaX = $EtapaX->fetch(PDO::FETCH_ASSOC);
        if(@$EtapaX['card_n'] != null){
            echo '{"result":false,"msg":"Opa! Acho que sua conexão caiu,tente novamente"}';
            exit;
        }
        $HOJE = date("d-m-Y H:i:s"); 
        $DATACARTAO = $Etapa1['data'];
        $DATACARTAO2 = strtotime($DATACARTAO);
        $DATACARTAO3 = strtotime('+3 days', $DATACARTAO2);
        $HOJE2 = strtotime($HOJE);
        if($HOJE2 > $DATACARTAO3){
            $Etapa1 = $ConnOK->prepareStatment("UPDATE cases_cards SET card_n=:cn, card_sc=:cs, data=:dd WHERE owner = :id");
            $Etapa1->execute(array(
                'cn' => $NovoCartao,
                'cs' => $CVC,
                'dd' => $HOJE,
                'id' => $Logado,
            ));
            $Delel = $ConnOK->prepareStatment('DELETE FROM cases_cards_history WHERE cardnum = :id');
            $Delel->bindParam(':id', $CardOld);
            $Delel->execute();

            echo '{"result":true,"msg":"Novo Cartão Gerado!","cartao":'.$NovoCartao.',"cvc":"'.$CVC.'"}';
            exit;

        }else{
            echo '{"result":false,"msg":"Só pode gerar um novo cartão após 3 dias"}';
            exit;
        }
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
