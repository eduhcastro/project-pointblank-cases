<?php
header('Content-Type: application/json');
if ($_POST['game_id'])
{
    if (@$_SESSION['username'] == null)
    {
        echo '{"result":false,"msg":"Ops, Não Logado","modal":"email"}';
        exit;
    }
    $IDFastBuy = $_POST['game_id'];
    $Now = date('Y/m/d H:i:s');
    $Reconhecimento = $ConnOK->prepareStatment("SELECT * FROM fast_buy WHERE id = :id AND buy_end > :endd AND unidade > 0");
    $Reconhecimento->execute(array(
        'id' => $IDFastBuy,
        'endd' => $Now
    ));
    $Reconhecimento1 = $Reconhecimento->fetch(PDO::FETCH_ASSOC);

    if (@$Reconhecimento1['id'] != null)
    {
        $Valor = $Reconhecimento1['weapon_price'];
        if ($Saldo < $Valor)
        {
            echo '{"result":false,"msg":"Saldo Insuficiente","modal":"pay"}';
            exit;
        }

        $Reconhecimento2 = $ConnOK->prepareStatment("SELECT * FROM fastbuy_users_weapons WHERE id_user = :id AND id_weaponfast = :endd");
        $Reconhecimento2->execute(array(
            'id' => $Logado,
            'endd' => $IDFastBuy
        ));
        $Reconhecimento2 = $Reconhecimento2->fetch(PDO::FETCH_ASSOC);

        if (@$Reconhecimento2['id'] != null){
            echo '{"result":false,"msg":"Você já tem essa arma"}';
            exit;
        }

        $WeaponIDInteger = $Reconhecimento1['id'];
        $Sessao = Sessao();
        $Diminuindo = $Reconhecimento1['unidade'] - 1;

        $AdicionandoArmaUser = $ConnOK->prepareStatment('INSERT INTO fastbuy_users_weapons (id_weaponfast,id_user,sessaofast) VALUES(:win,:atual,:sessaof)');
        $AdicionandoArmaUser->execute(array(
            ':win' => $WeaponIDInteger,
            ':atual' => $Logado,
            ':sessaof' => $Sessao
        ));
        $saldo = $Saldo;
        $final = $saldo - $Valor;
        $stmt2 = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :weaponsidcase WHERE id_user = :id');
        $stmt2->execute(array(
            ':id' => $Logado,
            ':weaponsidcase' => $final
        ));

        $stmt3 = $ConnOK->prepareStatment('UPDATE fast_buy SET unidade = :weaponsidcase WHERE id = :id');
        $stmt3->execute(array(
            ':id' => $IDFastBuy,
            ':weaponsidcase' => $Diminuindo
        ));

        echo '{"result":true,"msg":"Compra Feita!"}';
        exit;
    }
    else
    {
        echo '{"result":false,"msg":"Essa promoção acabou :("}';
        exit;
    }

}
else
{
    echo '{"result":false,"msg":2021}';
    exit;
}

?>
