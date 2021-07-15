<?php

Function PerfilLogado($User, $Requiscao){
        $statment = $Requiscao->prepareStatment("SELECT * FROM cases_users WHERE id_user = '$User'");
        $statment->execute();
        $Resultado = $statment->fetch(PDO::FETCH_ASSOC);
    
        if($Resultado > 0){
           $Nome = $Resultado['id_user'];
           $Imagem = $Resultado['userimg'];
           $CountOpen = $Resultado['countabertas'];
           $Saldo = $Resultado['saldo'];
           $IdUsuario = $Resultado['id_user2'];
           $ImagemUsuario = $Resultado['userimg'];
           $Brinde = $Resultado['brinde_data'];
           $BrindeVip = $Resultado['vipgift_date'];
           $Banne = $Resultado['banner'];
           $Moldura = $Resultado['frame'];
           $Vip = $Resultado['vip'];
        }else{
            echo "<script>window.location = '/';</script>";
            exit;
            exit();
        }
        return array($Nome, $Imagem, $CountOpen, $Saldo, $IdUsuario, $ImagemUsuario, $Brinde, $Banne, $Moldura, $Vip, $BrindeVip);
    }

    Function PerfilLogado2($User, $Requiscao){
        $statment = $Requiscao->prepareStatment("SELECT * FROM cases_users WHERE id_user2 = '$User'");
        $statment->execute();
        $Resultado = $statment->fetch(PDO::FETCH_ASSOC);
    
        if($Resultado > 0){
           $Nome = $Resultado['id_user'];
           $Imagem = $Resultado['userimg'];
           $CountOpen = $Resultado['countabertas'];
           $Saldo = $Resultado['saldo'];
           $IdUsuario = $Resultado['id_user2'];
           $ImagemUsuario = $Resultado['userimg'];
           $Banner = $Resultado['banner'];
           $Moldura = $Resultado['frame'];
        }else{
            $Nome = '';
            $Imagem = '';
            $CountOpen = '';
            $Saldo = '';
            $IdUsuario = '';
            $ImagemUsuario = '';
            $Banner = '';
            $Moldura = '';
        }
        return array($Nome, $Imagem, $CountOpen, $Saldo, $IdUsuario, $ImagemUsuario, $Banner, $Moldura);
    }

    Function PerfilLogadoCarteira($User, $Requiscao){
        $statment = $Requiscao->prepareStatment("SELECT * FROM cases_cards WHERE owner = '$User'");
        $statment->execute();
        $Resultado = $statment->fetch(PDO::FETCH_ASSOC);
        if($Resultado > 0){
           $CN = $Resultado['card_n'];
           $CS = $Resultado['card_sc'];
           $DD = $Resultado['data'];
           $SS = $Resultado['status'];
        }else{
            $CN = '';
            $CS = '';
            $DD = '';
            $SS = '';
        }
        return array($CN, $CS, $DD, $SS);
    }
 
    if(@$_SESSION['username'] != null){
$Saldo = PerfilLogado($Logado, $ConnOK)[3];
$ImagemUsuarioL = PerfilLogado($Logado, $ConnOK)[1];
$BannerLogado = PerfilLogado($Logado, $ConnOK)[7];
$MolduraLogado = PerfilLogado($Logado, $ConnOK)[8];
$Vip = PerfilLogado($Logado, $ConnOK)[9];
$IdUsuario = PerfilLogado($Logado, $ConnOK)[4];
$BrindeData = PerfilLogado($Logado, $ConnOK)[6];
$BrindeDataVip = PerfilLogado($Logado, $ConnOK)[10];
$Carteira = PerfilLogadoCarteira($Logado, $ConnOK); 
    }
?>