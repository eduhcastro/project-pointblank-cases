<?php
header('Content-Type: application/json');
if (@$_SESSION['username'] == null)
    {
        echo '{"result":error,"msg":error}';
        exit;
	}
if ($_POST['frameid']) {
    $Banner = clean($_POST['frameid']);
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_frames WHERE id = :cod");
    $Etapa1->execute(array(
        'cod' => $Banner
    ));
    $Resultado = $Etapa1->fetch(PDO::FETCH_ASSOC);
    if ($Resultado['id'] != null){
        $Explodindo1 = explode(",", $Resultado['users']);
        $Contando = count($Explodindo1);
        function Existente($Logado, $Contando, $Explodindo1, $Saldo, $Valor){
            $Check = '';
            for ($i = 0;$i <= $Contando;$i++){
                if ($Logado == @$Explodindo1[$i]){
                    $Check = 0;
                }
            }
            if ($Check == ''){
                if($Saldo < $Valor){
                    $Check = 1;
                }else{
              $Check = 2;
            }
        }
            return $Check;
        }
        $Executar = Existente($Logado, $Contando, $Explodindo1, $Saldo, $Resultado['price']);
     if($Executar == 0){
         echo '{"result":false,"msg":"Você já possui essa Moldura."}';
         exit;
     }elseif($Executar == 1){
        echo '{"result":false,"msg":"Você não possui saldo suficiente."}';
        exit;
     }else{
        $final = $Saldo - $Resultado['price'];
        $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :weaponsidcase WHERE id_user = :id');
        $stmt2->execute(array(
            ':id' => $Logado,
            ':weaponsidcase' => $final
        ));
        if ($stmt2){
            $TotalC = $Resultado['users'] . $Logado . ',';
            $stmt3 = $ConnOK->prepareStatment('UPDATE cases_frames SET users = :weaponsidcase WHERE id = :id');
            $stmt3->execute(array(
                ':id' => $Banner,
                ':weaponsidcase' => $TotalC
            ));
        }
        echo '{"result":true,"msg":"Moldura Comprada!"}';
        exit;
     }
     
    }
    else
    {
        echo '{"result":false,"msg":"Incorreto#"}';
    }
}
else
{
    echo '404';
}
?>