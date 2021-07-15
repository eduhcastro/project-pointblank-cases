<?php
header('Content-type: application/json');

if(@$_SESSION['username'] == null){
    echo '{"result":true,"balance":"Codigo usado! Você ganhou 300$ !!"}';
    exit;
    }

    
$Codigo = clean(@$_POST['code']);

if ($_POST)
{

    function Ids($Numero)
    {
        if ($Numero == null)
        {
            $IDs = ['0'];
        }
        else
        {
            $IDs = [$Numero];
        }
        return $IDs;
    }

    $ids = Ids($Logado);

    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM codes WHERE code = :cod");
    $Etapa1->execute(array(
        'cod' => $Codigo
    ));
    $Resultado = $Etapa1->fetch(PDO::FETCH_ASSOC);

    if ($Resultado['id'] != null)
    {
        $Explodindo1 = explode(",", $Resultado['consumers']);
        $Contando = count($Explodindo1);
        function Existente($Logado, $Contando, $Explodindo1, $Saldo, $Valor, $Codigo, $Consumidores, $ConnOK)
        {
            $Check = '';
            for ($i = 0;$i <= $Contando;$i++)
            {
                if ($Logado == @$Explodindo1[$i])
                {
                    $Check = '{"result":false,"msg":"Esse codigo já foi utilizado na sua conta."}';
                }
            }
            if ($Check == '')
            {
                $final = $Saldo + $Valor;
                $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :weaponsidcase WHERE id_user = :id');
                $stmt2->execute(array(
                    ':id' => $Logado,
                    ':weaponsidcase' => $final
                ));
                if ($stmt2)
                {
                    $TotalC = $Consumidores . $Logado . ',';
                    $stmt3 = $ConnOK->prepareStatment('UPDATE codes SET consumers = :weaponsidcase WHERE code = :id');
                    $stmt3->execute(array(
                        ':id' => $Codigo,
                        ':weaponsidcase' => $TotalC
                    ));
                }
                $Check = '{"result":true,"msg":"Codigo Utilizado! Tenha uma boa sorte!"}';
            }
            return $Check;
        }

        echo Existente($Logado, $Contando, $Explodindo1, $Saldo, $Resultado['value'], $Codigo, $Resultado['consumers'], $ConnOK);
    }
    else
    {
        echo '{"result":false,"msg":"Codigo incorreto."}';
    }
}
else
{
    echo '404';
}
?>
