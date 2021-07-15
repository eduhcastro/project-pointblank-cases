<?php
header('Content-Type: application/json');
if (@$_SESSION['username'] == null)
    {
        echo '{"result":error,"msg":error}';
        exit;
	}
if ($_POST['bannerid']) {
    $Banner = clean($_POST['bannerid']);
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_banners WHERE id = :cod");
    $Etapa1->execute(array(
        'cod' => $Banner
    ));
    $Resultado = $Etapa1->fetch(PDO::FETCH_ASSOC);
    if ($Resultado['id'] != null){
        $Explodindo1 = explode(",", $Resultado['users']);
        $Contando = count($Explodindo1);
        $IMGB = $Resultado['banner'];
        function Existente($Logado, $Contando, $Explodindo1, $Banner, $ConnOK){
            $Check = '';
            for ($i = 0;$i <= $Contando;$i++){
                if ($Logado == @$Explodindo1[$i]){
                    $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET banner = :ba WHERE id_user = :id');
                    $stmt2->execute(array(
                        ':id' => $Logado,
                        ':ba' => $Banner
                    ));
                    $Check = '{"result":true,"msg":"Banner adicionado!."}';
                }
            }
            if ($Check == ''){
                    $Check = '{"result":false,"msg":"Você não possui."}';
            }
            return $Check;
        }
        echo Existente($Logado, $Contando, $Explodindo1, $IMGB, $ConnOK);
    }else{
        echo '{"result":false,"msg":"Incorreto#"}';
    }
}else{
    echo '404';
}
?>