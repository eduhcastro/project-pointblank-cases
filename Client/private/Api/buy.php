<?php
header('Content-Type: application/json; charset=utf-8');

if (@$_SESSION['username'] == null){
    echo '{"result":false,"msg":"error"}';
    exit;
}


@$NomeCase = $_POST['case'];
@$NomePuro = clean($NomeCase);
@$Count = SomenteNumero($_POST['count']);
@$SessaoJS = $_POST['session'];

if(strlen($SessaoJS) < 80){
    echo '{"result":false,"msg":"error"}';
    exit;
}


if($Count == 1){
if($_POST['method'] == 'card'){
    $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = :casex AND open = true");
    $Etapa0->execute(array(
        'casex' => $NomePuro
    ));
    $Etapa0 = $Etapa0->fetch(PDO::FETCH_ASSOC);

    if ($Etapa0 > 0){
    @$Cartao = $_POST['cardn'];
    @$Seguranca = $_POST['csc'];
    $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_cards WHERE card_n = :ca AND card_sc = :cs");
    $Etapa1->execute(array(
        'ca' => $Cartao,
        'cs' => $Seguranca
    ));
    $Etapa1 = $Etapa1->fetch(PDO::FETCH_ASSOC);


    if ($Etapa1 > 0){

        if($Etapa1['owner'] == $Logado){
            echo '{"result":false,"msg":"Epa! Não use seu propio cartão!"}';
            exit;
        }
        
        if($Etapa1['status'] == 0){
            echo '{"result":false,"msg":"Cartão Bloqueado"}';
            exit;
        }

        $Etapa2 = $ConnOK->prepareStatment("SELECT * FROM cases_users WHERE id_user = :usu");
        $Etapa2->execute(array(
            'usu' => $Etapa1['owner']
        ));
        $Etapa2 = $Etapa2->fetch(PDO::FETCH_ASSOC);


        $taxa = 01.182;
        $tributado = $Etapa0['price'] * $taxa;

        if($Etapa2['saldo'] < $tributado){
            echo '{"result":false,"msg":"Não há Saldo suficiente no Cartão"}';
            exit;
        }

        $IDCase = $Etapa0['id'];
        $ContandoQunatidae = $ConnOK->prepareStatment("SELECT sum(prob) FROM cases_weapons WHERE caseid = '$IDCase' ORDER BY RANDOM()");
        $ContandoQunatidae->execute(); 
        $ContandoFinal = $ContandoQunatidae->fetchColumn(); 
        $DonoCard = $Etapa2['id_user'];
        $saldo2 = $Etapa2['saldo'];
        $novo = $saldo2 - $tributado;
        $NovoSaldo = substr($novo, -10, 5);  

        $SaldoFinal = AbrindoCaixa($ConnOK, $IDCase, $ContandoFinal);
        if($SaldoFinal[1] != 'Error'){
            $SessaoAutomatica = GerarSessao(100);
            $Enviando = $ConnOK->prepareStatment("SELECT * FROM cases_weapons WHERE id = :di");
            $Enviando->execute(array(
                'di' => $SaldoFinal[1]
            ));
            $ranking = $Enviando->fetch(PDO::FETCH_ASSOC);
            $Data = date('d/m/Y H:i:s');
                $weaponiimg = $ranking['weaponimg'];
                $weaponnnam = $ranking['nameweapon'];
                $weaponncla = CheckType($ranking['classeweapon']);
                $caseimg = $Etapa0['caseimg'];
                $dias = $ranking['dias'];
                $cxp = $Etapa0['price'];
                $wpp = $ranking['price'];
                $nniv = NiveisArmas($ranking['nivelweapon']);
                $CriandoSessao = $ConnOK->prepareStatment('INSERT INTO cases_session (id_user,userimg,weaponimg,caseimg,weaponname,weapondias,weaponclasse,nivelweapon,wpprice,cxprice,session,idweaponwin,usersession,iniciado,banner,frame) VALUES(:usu,:imgu,:weaponimg,:caseiimg,:weaponna,:weapod,:weapoc,:nn,:cxprice,:weaponprice,:nome,:win,:atual,:dataf,:banner,:frame)');
                $CriandoSessao->execute(array(
                    ':usu' => $Logado,
                    ':imgu' => $ImagemUsuarioL,
                    ':weaponimg' => $weaponiimg,
                    ':caseiimg' => $caseimg,
                    ':weaponna' => $weaponnnam,
                    ':weapod' => $dias,
                    ':weapoc' => $weaponncla,
                    ':nn' => $nniv,
                    ':cxprice' => $wpp,
                    ':weaponprice' => $cxp,
                    ':nome' => $SessaoAutomatica,
                    ':win' => $ranking['id'],
                    ':atual' => $Logado,
                    ':dataf' => $Data,
                    ':banner' => $BannerLogado,
                    ':frame' => $MolduraLogado
                ));


                if ($CriandoSessao){
                    $IDUSER = $_SESSION["username"];
                    $caixa = $Etapa0['price'];
                    $saldo = $Etapa2['saldo'];
                    $final = $saldo - $caixa;
    

                    $ContandoCaixasAbertas1 = $ConnOK->prepareStatment('UPDATE cases_users SET countabertas = countabertas + :abertas WHERE id_user = :id');
                    $ContandoCaixasAbertas1->execute(array(
                        ':id' => $IDUSER,
                        ':abertas' => 1
                    ));

                    $ContandoCaixasAbertas = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :weaponsidcase WHERE id_user = :id');
                    $ContandoCaixasAbertas->execute(array(
                        ':id' => $DonoCard,
                        ':weaponsidcase' => $NovoSaldo
                    ));

                    if ($ContandoCaixasAbertas)
                    {                        
                    
                        $AdicionandoArmaUser = $ConnOK->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,sessaofinal) VALUES(:win,:atual,:caseid,:sessaof)');
                        $AdicionandoArmaUser->execute(array(
                            ':win' => $ranking['id'],
                            ':atual' => $Logado,
                            ':caseid' => $IDCase,
                            ':sessaof' => $SessaoAutomatica
                        ));
                    }
                        $IDDe = $Etapa0['id'];
                        $stmt3 = $ConnOK->prepareStatment('UPDATE cases_detalhes SET used = used + :used WHERE id = :id');
                        $stmt3->execute(array(
                            ':id' => $IDDe,
                            ':used' => 1
                        ));

                    
                        $ColocandoValores2 = $ConnOK->prepareStatment('INSERT INTO cases_cards_history (cardnum,value,consumer,data) VALUES(:cdn,:vll,:cons,:dda)');
                        $ColocandoValores2->execute(array(
                            ':cdn' => $Cartao,
                            ':vll' => $tributado,
                            ':cons' => $Logado,
                            ':dda' => $Data
                        ));
        }
    }
        echo '{"result":true,"items":[' . $SaldoFinal[0] . '],"balance":' . $Saldo . ',"Sessao":"'.$SessaoAutomatica.'"}';
    }else{
        echo '{"result":false,"msg":"Cartão Incorreto"}';
        exit;
    }
    }else{
        echo '{"result":false,"msg":"Error 0"}';
        exit;
    }
}



if($_POST['method'] == 'saldo'){
    $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = :casex AND open = true");
    $Etapa0->execute(array(
        'casex' => $NomePuro
    ));
    $Resultado = $Etapa0->fetch(PDO::FETCH_ASSOC);
    if ($Resultado > 0){
        if($Saldo < $Resultado['price']){
           echo '{"result":false,"msg":"N\u00e3o tem dinheiro suficiente.","type":"money"}';
            exit;
        }
        $IDCase = $Resultado['id'];
        $ContandoQunatidae = $ConnOK->prepareStatment("SELECT sum(prob) FROM cases_weapons WHERE caseid = '$IDCase' ORDER BY RANDOM()");
        $ContandoQunatidae->execute(); 
        $ContandoFinal = $ContandoQunatidae->fetchColumn(); 

        $SaldoFinal = AbrindoCaixa($ConnOK, $IDCase, $ContandoFinal);
        if($SaldoFinal[1] != 'Error'){
            $SessaoAutomatica = GerarSessao(100);
            $Enviando = $ConnOK->prepareStatment("SELECT * FROM cases_weapons WHERE id = :di");
            $Enviando->execute(array(
                'di' => $SaldoFinal[1]
            ));
            $ranking = $Enviando->fetch(PDO::FETCH_ASSOC);
            $Data = date('d/m/Y H:i:s');
                $weaponiimg = $ranking['weaponimg'];
                $weaponnnam = $ranking['nameweapon'];
                $weaponncla = CheckType($ranking['classeweapon']);
                $caseimg = $Resultado['caseimg'];
                $dias = $ranking['dias'];
                $cxp = $Resultado['price'];
                $wpp = $ranking['price'];
                $nniv = NiveisArmas($ranking['nivelweapon']);
                $CriandoSessao = $ConnOK->prepareStatment('INSERT INTO cases_session (id_user,userimg,weaponimg,caseimg,weaponname,weapondias,weaponclasse,nivelweapon,wpprice,cxprice,session,idweaponwin,usersession,iniciado,banner,frame) VALUES(:usu,:imgu,:weaponimg,:caseiimg,:weaponna,:weapod,:weapoc,:nn,:cxprice,:weaponprice,:nome,:win,:atual,:dataf,:banner,:frame)');
                $CriandoSessao->execute(array(
                    ':usu' => $Logado,
                    ':imgu' => $ImagemUsuarioL,
                    ':weaponimg' => $weaponiimg,
                    ':caseiimg' => $caseimg,
                    ':weaponna' => $weaponnnam,
                    ':weapod' => $dias,
                    ':weapoc' => $weaponncla,
                    ':nn' => $nniv,
                    ':cxprice' => $wpp,
                    ':weaponprice' => $cxp,
                    ':nome' => $SessaoAutomatica,
                    ':win' => $ranking['id'],
                    ':atual' => $Logado,
                    ':dataf' => $Data,
                    ':banner' => $BannerLogado,
                    ':frame' => $MolduraLogado
                ));
                if ($CriandoSessao){
                    $IDUSER = $_SESSION["username"];       
                }            
                $caixa = $Resultado['price'];
                $saldo = $Saldo;
                $final = $saldo - $caixa;
                    $ContandoCaixasAbertas = $ConnOK->prepareStatment('UPDATE cases_users SET countabertas = countabertas + :abertas, saldo = :weaponsidcase WHERE id_user = :id');
                    $ContandoCaixasAbertas->execute(array(
                        ':id' => $IDUSER,
                        ':abertas' => 1,
                        ':weaponsidcase' => $final
                    ));

                    if ($ContandoCaixasAbertas)
                    {                        
                    
                        $AdicionandoArmaUser = $ConnOK->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,sessaofinal) VALUES(:win,:atual,:caseid,:sessaof)');
                        $AdicionandoArmaUser->execute(array(
                            ':win' => $ranking['id'],
                            ':atual' => $Logado,
                            ':caseid' => $IDCase,
                            ':sessaof' => $SessaoAutomatica
                        ));

                     

                        $IDDe = $Resultado['id'];
                        $stmt3 = $ConnOK->prepareStatment('UPDATE cases_detalhes SET used = used + :used WHERE id = :id');
                        $stmt3->execute(array(
                            ':id' => $IDDe,
                            ':used' => 1
                        ));                    
                }
            echo '{"result":true,"items":[' . $SaldoFinal[0] . '],"balance":' . $Saldo . ',"Sessao":"'.$SessaoAutomatica.'"}';
        }else{
            echo '{"result":false,"msg":"Error Fatal"}';
        }}else{
        echo 'error';
        exit;
    }
}
}elseif($Count == 2){
    if($_POST['method'] == 'card'){
        $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = :casex AND open = true");
        $Etapa0->execute(array(
            'casex' => $NomePuro
        ));
        $Etapa0 = $Etapa0->fetch(PDO::FETCH_ASSOC);
    
        if ($Etapa0 > 0){
            $Cartao = $_POST['cardn'];
            $Seguranca = $_POST['csc'];
            $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_cards WHERE card_n = :ca AND card_sc = :cs");
            $Etapa1->execute(array(
                'ca' => $Cartao,
                'cs' => $Seguranca
            ));
            $Etapa1 = $Etapa1->fetch(PDO::FETCH_ASSOC);
        
        
            if ($Etapa1 > 0){
        
                if($Etapa1['owner'] == $Logado){
                    echo '{"result":false,"msg":"Epa! Não use seu propio cartão!"}';
                    exit;
                }
                
                if($Etapa1['status'] == 0){
                    echo '{"result":false,"msg":"Cartão Bloqueado"}';
                    exit;
                }
        
                $Etapa2 = $ConnOK->prepareStatment("SELECT * FROM cases_users WHERE id_user = :usu");
                $Etapa2->execute(array(
                    'usu' => $Etapa1['owner']
                ));
                $Etapa2 = $Etapa2->fetch(PDO::FETCH_ASSOC);
        
        
                $taxa = 01.182;
                $tributado2 = $Etapa0['price'] * $taxa;
                $tributado = $tributado2 * 2;
                if($Etapa2['saldo'] < $tributado){
                    echo '{"result":false,"msg":"Não há Saldo suficiente no Cartão"}';
                    exit;
                }
        
                $IDCase = $Etapa0['id'];
                $saldo2 = $Etapa2['saldo'];
                $novo = $saldo2 - $tributado;
                $NovoSaldoCAR = substr($novo, -10, 5); 
                $DONOCARTAO = $Etapa2['id_user'];
                $Sessao2 = GerarSessao(80);
                $caixa = $Etapa0['price'];
                $saldouscartao = $Etapa2['saldo'];
                $IDDe = $Etapa0['id'];
                $caseimg = $Etapa0['caseimg'];
                $cxp = $Etapa0['price'];
                
        function Teste2($ConnOK, $IDCase, $SessaoCardTwo, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado){
        $ContandoQunatidae = $ConnOK->prepareStatment("SELECT sum(prob) FROM cases_weapons WHERE caseid = '$IDCase' ORDER BY RANDOM()");
        $ContandoQunatidae->execute(); 
        $ContandoFinal = $ContandoQunatidae->fetchColumn(); 
        $SaldoFinal = AbrindoCaixa($ConnOK, $IDCase, $ContandoFinal);
        if($SaldoFinal[1] != 'Error'){
            $Enviando = $ConnOK->prepareStatment("SELECT * FROM cases_weapons WHERE id = :di");
            $Enviando->execute(array(
                'di' => $SaldoFinal[1]
            ));
            $ranking = $Enviando->fetch(PDO::FETCH_ASSOC);
            $Data = date('d/m/Y H:i:s');
                $weaponiimg = $ranking['weaponimg'];
                $weaponnnam = $ranking['nameweapon'];
                $weaponncla = CheckType($ranking['classeweapon']);
                $dias = $ranking['dias'];
                $dias = $ranking['dias'];
                $wpp = $ranking['price'];
                $nniv = NiveisArmas($ranking['nivelweapon']);
                $CriandoSessao = $ConnOK->prepareStatment('INSERT INTO cases_session (id_user,userimg,weaponimg,caseimg,weaponname,weapondias,weaponclasse,nivelweapon,wpprice,cxprice,session,idweaponwin,usersession,iniciado,banner,frame) VALUES(:usu,:imgu,:weaponimg,:caseiimg,:weaponna,:weapod,:weapoc,:nn,:cxprice,:weaponprice,:nome,:win,:atual,:dataf,:banner,:frame)');
                $CriandoSessao->execute(array(
                    ':usu' => $Logado,
                    ':imgu' => $ImagemUsuarioL,
                    ':weaponimg' => $weaponiimg,
                    ':caseiimg' => $caseimg,
                    ':weaponna' => $weaponnnam,
                    ':weapod' => $dias,
                    ':weapoc' => $weaponncla,
                    ':nn' => $nniv,
                    ':cxprice' => $wpp,
                    ':weaponprice' => $cxp,
                    ':nome' => $SessaoCardTwo,
                    ':win' => $ranking['id'],
                    ':atual' => $Logado,
                    ':dataf' => $Data,
                    ':banner' => $BannerLogado,
                    ':frame' => $MolduraLogado
                ));


                if ($CriandoSessao)
                {
                    $IDUSER = $_SESSION["username"];
                    $final = $saldouscartao - $caixa;
    

                    $ContandoCaixasAbertas1 = $ConnOK->prepareStatment('UPDATE cases_users SET countabertas = countabertas + :abertas WHERE id_user = :id');
                    $ContandoCaixasAbertas1->execute(array(
                        ':id' => $IDUSER,
                        ':abertas' => 1
                    ));

                    $ContandoCaixasAbertas = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :weaponsidcase WHERE id_user = :id');
                    $ContandoCaixasAbertas->execute(array(
                        ':id' => $DONOCARTAO,
                        ':weaponsidcase' => $NovoSaldoCAR
                    ));

                    if ($ContandoCaixasAbertas)
                    {                        
                    
                        $AdicionandoArmaUser = $ConnOK->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,sessaofinal) VALUES(:win,:atual,:caseid,:sessaof)');
                        $AdicionandoArmaUser->execute(array(
                            ':win' => $ranking['id'],
                            ':atual' => $Logado,
                            ':caseid' => $IDCase,
                            ':sessaof' => $SessaoCardTwo
                        ));
                    }
                        $stmt3 = $ConnOK->prepareStatment('UPDATE cases_detalhes SET used = used + :used WHERE id = :id');
                        $stmt3->execute(array(
                            ':id' => $IDDe,
                            ':used' => 1
                        ));
                    
                        $ColocandoValores2 = $ConnOK->prepareStatment('INSERT INTO cases_cards_history (cardnum,value,consumer,data) VALUES(:cdn,:vll,:cons,:dda)');
                        $ColocandoValores2->execute(array(
                            ':cdn' => $Cartao,
                            ':vll' => $tributado,
                            ':cons' => $Logado,
                            ':dda' => $Data
                        ));

                    
                }
        }
        return $SaldoFinal[0];
            }
            $SessaoCardTwo1 = GerarSessao(100);
            $SessaoCardTwo2 = GerarSessao(100);
              $someJSON2 = Teste2($ConnOK, $IDCase, $SessaoCardTwo1, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado);
              $someJSON3 = Teste2($ConnOK, $IDCase, $SessaoCardTwo2, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado);
            echo '{"result":true,"items":['.$someJSON2.','.$someJSON3.'],"balance":' . $Saldo . '}';
            exit;
 
        }else{
            echo '{"result":false,"msg":"Cartão Incorreto"}';
            exit;
        }
    }else{
        echo 'error 0';
        exit;
    }



      
    }elseif($_POST['method'] == 'saldo'){
        $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = :casex AND open = true");
    $Etapa0->execute(array(
        'casex' => $NomePuro
    ));
    $Resultado = $Etapa0->fetch(PDO::FETCH_ASSOC);
    if ($Resultado > 0){
        if($Saldo < $Resultado['price'] * 2){
           echo '{"result":false,"msg":"N\u00e3o tem dinheiro suficiente.","type":"money"}';
            exit;
        }
        $IDCase = $Resultado['id'];
        $caixa = $Resultado['price'];
        $IDDe = $Resultado['id'];
        $caseimg = $Resultado['caseimg'];
        $cxp = $Resultado['price'];

        function Teste($Con, $aray1 ,$SessaoSaldoTwo ,$Logado ,$caixa, $Saldo, $IDCase, $IDDe ,$caseimg ,$ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado){
        $ContandoQunatidae = $Con->prepareStatment("SELECT sum(prob) FROM cases_weapons WHERE caseid = '$aray1' ORDER BY RANDOM()");
        $ContandoQunatidae->execute(); 
        $ContandoFinal = $ContandoQunatidae->fetchColumn(); 
        $SaldoFinal = AbrindoCaixa($Con, $aray1, $ContandoFinal);
        if($SaldoFinal[1] != 'Error'){
            $Enviando = $Con->prepareStatment("SELECT * FROM cases_weapons WHERE id = :di");
            $Enviando->execute(array(
                'di' => $SaldoFinal[1]
            ));
            $ranking = $Enviando->fetch(PDO::FETCH_ASSOC);
            $Data = date('d/m/Y H:i:s');
                    $weaponiimg = $ranking['weaponimg'];
                    $weaponnnam = $ranking['nameweapon'];
                    $weaponncla = CheckType($ranking['classeweapon']);
                    $dias = $ranking['dias'];
                    $wpp = $ranking['price'];
                    $nniv = NiveisArmas($ranking['nivelweapon']);
                    $CriandoSessao = $Con->prepareStatment('INSERT INTO cases_session (id_user,userimg,weaponimg,caseimg,weaponname,weapondias,weaponclasse,nivelweapon,wpprice,cxprice,session,idweaponwin,usersession,iniciado,banner,frame) VALUES(:usu,:imgu,:weaponimg,:caseiimg,:weaponna,:weapod,:weapoc,:nn,:cxprice,:weaponprice,:nome,:win,:atual,:dataf,:banner,:frame)');
                    $CriandoSessao->execute(array(
                        ':usu' => $Logado,
                        ':imgu' => $ImagemUsuarioL,
                        ':weaponimg' => $weaponiimg,
                        ':caseiimg' => $caseimg,
                        ':weaponna' => $weaponnnam,
                        ':weapod' => $dias,
                        ':weapoc' => $weaponncla,
                        ':nn' => $nniv,
                        ':cxprice' => $wpp,
                        ':weaponprice' => $cxp,
                        ':nome' => $SessaoSaldoTwo,
                        ':win' => $ranking['id'],
                        ':atual' => $Logado,
                        ':dataf' => $Data,
                        ':banner' => $BannerLogado,
                        ':frame' => $MolduraLogado
                    ));
                    $IDUSER = $_SESSION["username"];
                    $saldo = $Saldo;
                    $final = $saldo - $caixa;
                    $final2 = $final - $caixa;
                        $ContandoCaixasAbertas = $Con->prepareStatment('UPDATE cases_users SET countabertas = countabertas + :abertas, saldo = :weaponsidcase WHERE id_user = :id');
                        $ContandoCaixasAbertas->execute(array(
                            ':id' => $IDUSER,
                            ':abertas' => 1,
                            ':weaponsidcase' => $final2
                        ));
    
                        if ($ContandoCaixasAbertas)
                        {                        
                        
                            $AdicionandoArmaUser = $Con->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,sessaofinal) VALUES(:win,:atual,:caseid,:sessaof)');
                            $AdicionandoArmaUser->execute(array(
                                ':win' => $ranking['id'],
                                ':atual' => $Logado,
                                ':caseid' => $IDCase,
                                ':sessaof' => $SessaoSaldoTwo
                            ));
                            $stmt3 = $Con->prepareStatment('UPDATE cases_detalhes SET used = used + :used WHERE id = :id');
                            $stmt3->execute(array(
                                ':id' => $IDDe,
                                ':used' => 1
                            ));
                    }}
            return $SaldoFinal[0];
        }
        $SessaoSaldoTwo1 = GerarSessao(100);
        $SessaoSaldoTwo2 = GerarSessao(100);
        $someJSON2 = Teste($ConnOK, $IDCase, $SessaoSaldoTwo1, $Logado, $caixa, $Saldo, $IDCase, $IDDe, $caseimg, $ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado);
        $someJSON3 = Teste($ConnOK, $IDCase,$SessaoSaldoTwo2 ,$Logado ,$caixa, $Saldo, $IDCase, $IDDe, $caseimg, $ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado);
        echo '{"result":true,"items":['.$someJSON2.','.$someJSON3.'],"balance":' . $Saldo . '}';
        }else{
            echo 'error';
            exit;
        }}else{
        echo 'Error 2 Method Not Found';
        exit;
    }
}elseif($Count == 3){
        if($_POST['method'] == 'card'){
            $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = :casex AND open = true");
            $Etapa0->execute(array(
                'casex' => $NomePuro
            ));
            $Etapa0 = $Etapa0->fetch(PDO::FETCH_ASSOC);
        
            if ($Etapa0 > 0){
                $Cartao = $_POST['cardn'];
                $Seguranca = $_POST['csc'];
                $Etapa1 = $ConnOK->prepareStatment("SELECT * FROM cases_cards WHERE card_n = :ca AND card_sc = :cs");
                $Etapa1->execute(array(
                    'ca' => $Cartao,
                    'cs' => $Seguranca
                ));
                $Etapa1 = $Etapa1->fetch(PDO::FETCH_ASSOC);
            
            
                if ($Etapa1 > 0){
            
                    if($Etapa1['owner'] == $Logado){
                        echo '{"result":false,"msg":"Epa! Não use seu propio cartão!"}';
                        exit;
                    }
                    
                    if($Etapa1['status'] == 0){
                        echo '{"result":false,"msg":"Cartão Bloqueado"}';
                        exit;
                    }
            
                    $Etapa2 = $ConnOK->prepareStatment("SELECT * FROM cases_users WHERE id_user = :usu");
                    $Etapa2->execute(array(
                        'usu' => $Etapa1['owner']
                    ));
                    $Etapa2 = $Etapa2->fetch(PDO::FETCH_ASSOC);
            
            
                    $taxa = 01.182;
                    $tributado2 = $Etapa0['price'] * $taxa;
                    $tributado = $tributado2 * 3;
                    if($Etapa2['saldo'] < $tributado){
                        echo '{"result":false,"msg":"Não há Saldo suficiente no Cartão"}';
                        exit;
                    }
            
                    $IDCase = $Etapa0['id'];
                    $saldo2 = $Etapa2['saldo'];
                    $novo = $saldo2 - $tributado;
                    $NovoSaldoCAR = substr($novo, -10, 5); 
                    $DONOCARTAO = $Etapa2['id_user'];
                    $Sessao2 = GerarSessao(80);
                    $caixa = $Etapa0['price'];
                    $saldouscartao = $Etapa2['saldo'];
                    $IDDe = $Etapa0['id'];
                    $caseimg = $Etapa0['caseimg'];
                    $cxp = $Etapa0['price'];
                    
            function Teste2($ConnOK, $IDCase, $SessaoCardTwo, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado){
            $ContandoQunatidae = $ConnOK->prepareStatment("SELECT sum(prob) FROM cases_weapons WHERE caseid = '$IDCase' ORDER BY RANDOM()");
            $ContandoQunatidae->execute(); 
            $ContandoFinal = $ContandoQunatidae->fetchColumn(); 
            $SaldoFinal = AbrindoCaixa($ConnOK, $IDCase, $ContandoFinal);
            if($SaldoFinal[1] != 'Error'){
                $Enviando = $ConnOK->prepareStatment("SELECT * FROM cases_weapons WHERE id = :di");
                $Enviando->execute(array(
                    'di' => $SaldoFinal[1]
                ));
                $ranking = $Enviando->fetch(PDO::FETCH_ASSOC);
                $Data = date('d/m/Y H:i:s');
                    $weaponiimg = $ranking['weaponimg'];
                    $weaponnnam = $ranking['nameweapon'];
                    $weaponncla = CheckType($ranking['classeweapon']);
                    $dias = $ranking['dias'];
                    $dias = $ranking['dias'];
                    $wpp = $ranking['price'];
                    $nniv = NiveisArmas($ranking['nivelweapon']);
                    $CriandoSessao = $ConnOK->prepareStatment('INSERT INTO cases_session (id_user,userimg,weaponimg,caseimg,weaponname,weapondias,weaponclasse,nivelweapon,wpprice,cxprice,session,idweaponwin,usersession,iniciado,banner,frame) VALUES(:usu,:imgu,:weaponimg,:caseiimg,:weaponna,:weapod,:weapoc,:nn,:cxprice,:weaponprice,:nome,:win,:atual,:dataf,:banner,:frame)');
                    $CriandoSessao->execute(array(
                        ':usu' => $Logado,
                        ':imgu' => $ImagemUsuarioL,
                        ':weaponimg' => $weaponiimg,
                        ':caseiimg' => $caseimg,
                        ':weaponna' => $weaponnnam,
                        ':weapod' => $dias,
                        ':weapoc' => $weaponncla,
                        ':nn' => $nniv,
                        ':cxprice' => $wpp,
                        ':weaponprice' => $cxp,
                        ':nome' => $SessaoCardTwo,
                        ':win' => $ranking['id'],
                        ':atual' => $Logado,
                        ':dataf' => $Data,
                        ':banner' => $BannerLogado,
                        ':frame' => $MolduraLogado
                    ));
    
    
                    if ($CriandoSessao)
                    {
                        $IDUSER = $_SESSION["username"];
                        $final = $saldouscartao - $caixa;
        
    
                        $ContandoCaixasAbertas1 = $ConnOK->prepareStatment('UPDATE cases_users SET countabertas = countabertas + :abertas WHERE id_user = :id');
                        $ContandoCaixasAbertas1->execute(array(
                            ':id' => $IDUSER,
                            ':abertas' => 1
                        ));
    
                        $ContandoCaixasAbertas = $ConnOK->prepareStatment('UPDATE cases_users SET saldo = :weaponsidcase WHERE id_user = :id');
                        $ContandoCaixasAbertas->execute(array(
                            ':id' => $DONOCARTAO,
                            ':weaponsidcase' => $NovoSaldoCAR
                        ));
    
                        if ($ContandoCaixasAbertas)
                        {                        
                        
                            $AdicionandoArmaUser = $ConnOK->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,sessaofinal) VALUES(:win,:atual,:caseid,:sessaof)');
                            $AdicionandoArmaUser->execute(array(
                                ':win' => $ranking['id'],
                                ':atual' => $Logado,
                                ':caseid' => $IDCase,
                                ':sessaof' => $SessaoCardTwo
                            ));
                        }
                            $stmt3 = $ConnOK->prepareStatment('UPDATE cases_detalhes SET used = used + :used WHERE id = :id');
                            $stmt3->execute(array(
                                ':id' => $IDDe,
                                ':used' => 1
                            ));
                        
                            $ColocandoValores2 = $ConnOK->prepareStatment('INSERT INTO cases_cards_history (cardnum,value,consumer,data) VALUES(:cdn,:vll,:cons,:dda)');
                            $ColocandoValores2->execute(array(
                                ':cdn' => $Cartao,
                                ':vll' => $tributado,
                                ':cons' => $Logado,
                                ':dda' => $Data
                            ));
    
                        
                    }
            }
            return $SaldoFinal[0];
                }
                $SessaoCardTwo1 = GerarSessao(100);
                $SessaoCardTwo2 = GerarSessao(100);
                $SessaoCardTwo3 = GerarSessao(100);
                  $someJSON2 = Teste2($ConnOK, $IDCase, $SessaoCardTwo1, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado);
                  $someJSON3 = Teste2($ConnOK, $IDCase, $SessaoCardTwo2, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado);
                  $someJSON4 = Teste2($ConnOK, $IDCase, $SessaoCardTwo3, $Logado, $caixa, $saldouscartao, $NovoSaldoCAR, $IDDe, $ImagemUsuarioL, $caseimg, $cxp, $Cartao, $tributado, $DONOCARTAO, $BannerLogado, $MolduraLogado);
                echo '{"result":true,"items":['.$someJSON2.','.$someJSON3.','.$someJSON4.'],"balance":' . $Saldo . '}';
                exit;
     
            }else{
                echo '{"result":false,"msg":"Cartão Incorreto"}';
                exit;
            }
        }else{
            echo 'error 0';
            exit;
        }
    
    
    
          
        }elseif($_POST['method'] == 'saldo'){
            $Etapa0 = $ConnOK->prepareStatment("SELECT * FROM cases_detalhes WHERE casename = :casex AND open = true");
        $Etapa0->execute(array(
            'casex' => $NomePuro
        ));
        $Resultado = $Etapa0->fetch(PDO::FETCH_ASSOC);
        if ($Resultado > 0){
            if($Saldo < $Resultado['price'] * 3){
               echo '{"result":false,"msg":"N\u00e3o tem dinheiro suficiente.","type":"money"}';
                exit;
            }
            $IDCase = $Resultado['id'];
            $caixa = $Resultado['price'];
            $IDDe = $Resultado['id'];
            $caseimg = $Resultado['caseimg'];
            $cxp = $Resultado['price'];
    
            function Teste($Con, $aray1 ,$SessaoSaldoTwo ,$Logado ,$caixa, $Saldo, $IDCase, $IDDe ,$caseimg ,$ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado){
            $ContandoQunatidae = $Con->prepareStatment("SELECT sum(prob) FROM cases_weapons WHERE caseid = '$aray1' ORDER BY RANDOM()");
            $ContandoQunatidae->execute(); 
            $ContandoFinal = $ContandoQunatidae->fetchColumn(); 
            $SaldoFinal = AbrindoCaixa($Con, $aray1, $ContandoFinal);
            if($SaldoFinal[1] != 'Error'){
                $Enviando = $Con->prepareStatment("SELECT * FROM cases_weapons WHERE id = :di");
                $Enviando->execute(array(
                    'di' => $SaldoFinal[1]
                ));
                $ranking = $Enviando->fetch(PDO::FETCH_ASSOC);
                $Data = date('d/m/Y H:i:s');
                        $weaponiimg = $ranking['weaponimg'];
                        $weaponnnam = $ranking['nameweapon'];
                        $weaponncla = CheckType($ranking['classeweapon']);
                        $dias = $ranking['dias'];
                        $wpp = $ranking['price'];
                        $nniv = NiveisArmas($ranking['nivelweapon']);
                        $CriandoSessao = $Con->prepareStatment('INSERT INTO cases_session (id_user,userimg,weaponimg,caseimg,weaponname,weapondias,weaponclasse,nivelweapon,wpprice,cxprice,session,idweaponwin,usersession,iniciado,banner,frame) VALUES(:usu,:imgu,:weaponimg,:caseiimg,:weaponna,:weapod,:weapoc,:nn,:cxprice,:weaponprice,:nome,:win,:atual,:dataf,:banner,:frame)');
                        $CriandoSessao->execute(array(
                            ':usu' => $Logado,
                            ':imgu' => $ImagemUsuarioL,
                            ':weaponimg' => $weaponiimg,
                            ':caseiimg' => $caseimg,
                            ':weaponna' => $weaponnnam,
                            ':weapod' => $dias,
                            ':weapoc' => $weaponncla,
                            ':nn' => $nniv,
                            ':cxprice' => $wpp,
                            ':weaponprice' => $cxp,
                            ':nome' => $SessaoSaldoTwo,
                            ':win' => $ranking['id'],
                            ':atual' => $Logado,
                            ':dataf' => $Data,
                            ':banner' => $BannerLogado,
                            ':frame' => $MolduraLogado
                        ));
                        $IDUSER = $_SESSION["username"];
                        $saldo = $Saldo;
                        $final = $saldo - $caixa;
                        $final2 = $final - $caixa;
                            $ContandoCaixasAbertas = $Con->prepareStatment('UPDATE cases_users SET countabertas = countabertas + :abertas, saldo = :weaponsidcase WHERE id_user = :id');
                            $ContandoCaixasAbertas->execute(array(
                                ':id' => $IDUSER,
                                ':abertas' => 1,
                                ':weaponsidcase' => $final2
                            ));
        
                            if ($ContandoCaixasAbertas)
                            {                        
                            
                                $AdicionandoArmaUser = $Con->prepareStatment('INSERT INTO cases_users_weapons (id_weaponcase,id_user,case_id,sessaofinal) VALUES(:win,:atual,:caseid,:sessaof)');
                                $AdicionandoArmaUser->execute(array(
                                    ':win' => $ranking['id'],
                                    ':atual' => $Logado,
                                    ':caseid' => $IDCase,
                                    ':sessaof' => $SessaoSaldoTwo
                                ));
                                $stmt3 = $Con->prepareStatment('UPDATE cases_detalhes SET used = used + :used WHERE id = :id');
                                $stmt3->execute(array(
                                    ':id' => $IDDe,
                                    ':used' => 1
                                ));
                        }}
                return $SaldoFinal[0];
            }
            $SessaoSaldoTwo1 = GerarSessao(100);
            $SessaoSaldoTwo2 = GerarSessao(100);
            $SessaoSaldoTwo3 = GerarSessao(100);
            $someJSON2 = Teste($ConnOK, $IDCase, $SessaoSaldoTwo1, $Logado, $caixa, $Saldo, $IDCase, $IDDe, $caseimg, $ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado);
            $someJSON3 = Teste($ConnOK, $IDCase,$SessaoSaldoTwo2 ,$Logado ,$caixa, $Saldo, $IDCase, $IDDe, $caseimg, $ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado);
            $someJSON4 = Teste($ConnOK, $IDCase,$SessaoSaldoTwo3 ,$Logado ,$caixa, $Saldo, $IDCase, $IDDe, $caseimg, $ImagemUsuarioL, $cxp, $BannerLogado, $MolduraLogado);
            echo '{"result":true,"items":['.$someJSON2.','.$someJSON3.','.$someJSON4.'],"balance":' . $Saldo . '}';
            }else{
                echo 'error';
                exit;
            }}else{
            echo 'Error 2 Method Not Found';
            exit;
        }}else{
            echo 'Error';
            exit;
        }


?>
