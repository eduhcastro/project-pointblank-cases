<?php
header('Content-Type: application/json');

if (@$_SESSION['username'] == null)
{
	echo '{"result":error,"msg":error}';
	exit;
}

if ($_POST) {
	@$Count = SomenteNumero($_POST['count']);
	if($Count == 3){
		$statmentX = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE usersession = '$Logado' ORDER BY id DESC LIMIT 3");
		$statmentX->execute();
		$ResultadoX = $statmentX->fetch(PDO::FETCH_ASSOC);

		if ($ResultadoX > 0) {
			function All($ConnOK, $Logado){
			function RemoveZero($Nu)
			{
				$Check1 = substr($Nu, 0, -1);
				if ($Check1 == 0) {
					$FinalZero = substr($Nu, 1);
				}
				$Check2 = substr($Nu, 0, -4);
				if ($Check2 == 0) {
					$FinalZero = substr($Nu, 1);
				} else {
					$FinalZero = $Nu;
				}
				return $FinalZero;
			}
			function DD($A){
				$r = '';
				if($A == 0){
					$r = ',';
				}else{
					$r = '';
				} 
				return $r;
			}
			$ArmasDoITem2X = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE id_user = '$Logado' ORDER BY id DESC LIMIT 3");
			$ArmasDoITem2X->execute();
			$ranking = $ArmasDoITem2X->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
				$rs = '{"id":' . $ranking[0]['id'] . ',"type":"' . $ranking[0]['weaponname'] . '","name":"' . $ranking[0]['weaponname'] . '","quality":"Well-Worn","name_hash":"' . $ranking[0]['weaponname'] . ' (' . $ranking[0]['weapondias'] . ' Dias) | ' . $ranking[0]['weaponclasse'] . '","price":' . RemoveZero($ranking[0]['wpprice']) . ',"rarity":"milspec","image_id":"' . $ranking[0]['weaponimg'] . '"},{"id":' . $ranking[1]['id'] . ',"type":"' . $ranking[1]['weaponname'] . '","name":"' . $ranking[1]['weaponname'] . '","quality":"Well-Worn","name_hash":"' . $ranking[1]['weaponname'] . ' (' . $ranking[1]['weapondias'] . ' Dias) | ' . $ranking[1]['weaponclasse'] . '","price":' . RemoveZero($ranking[1]['wpprice']) . ',"rarity":"milspec","image_id":"' . $ranking[1]['weaponimg'] . '"},{"id":' . $ranking[2]['id'] . ',"type":"' . $ranking[2]['weaponname'] . '","name":"' . $ranking[2]['weaponname'] . '","quality":"Well-Worn","name_hash":"' . $ranking[2]['weaponname'] . ' (' . $ranking[2]['weapondias'] . ' Dias) | ' . $ranking[2]['weaponclasse'] . '","price":' . RemoveZero($ranking[2]['wpprice']) . ',"rarity":"milspec","image_id":"' . $ranking[2]['weaponimg'] . '"}';
			
			return $rs;
		}
		$axa = All($ConnOK, $Logado);
		echo '{"result":true,"prize":['.$axa.']}';
	}}elseif($Count == 2){
		$statmentX = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE usersession = '$Logado' ORDER BY id DESC LIMIT 2");
		$statmentX->execute();
		$ResultadoX = $statmentX->fetch(PDO::FETCH_ASSOC);

		if ($ResultadoX > 0) {
			function All($ConnOK, $Logado){
			function RemoveZero($Nu)
			{
				$Check1 = substr($Nu, 0, -1);
				if ($Check1 == 0) {
					$FinalZero = substr($Nu, 1);
				}
				$Check2 = substr($Nu, 0, -4);
				if ($Check2 == 0) {
					$FinalZero = substr($Nu, 1);
				} else {
					$FinalZero = $Nu;
				}
				return $FinalZero;
			}
			function DD($A){
				$r = '';
				if($A == 0){
					$r = ',';
				}else{
					$r = '';
				} 
				return $r;
			}
			$ArmasDoITem2X = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE id_user = '$Logado' ORDER BY id DESC LIMIT 2");
			$ArmasDoITem2X->execute();
			$ranking = $ArmasDoITem2X->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;
				$rs = '{"id":' . $ranking[0]['id'] . ',"type":"' . $ranking[0]['weaponname'] . '","name":"' . $ranking[0]['weaponname'] . '","quality":"Well-Worn","name_hash":"' . $ranking[0]['weaponname'] . ' (' . $ranking[0]['weapondias'] . ' Dias) | ' . $ranking[0]['weaponclasse'] . '","price":' . RemoveZero($ranking[0]['wpprice']) . ',"rarity":"milspec","image_id":"' . $ranking[0]['weaponimg'] . '"},{"id":' . $ranking[1]['id'] . ',"type":"' . $ranking[1]['weaponname'] . '","name":"' . $ranking[1]['weaponname'] . '","quality":"Well-Worn","name_hash":"' . $ranking[1]['weaponname'] . ' (' . $ranking[1]['weapondias'] . ' Dias) | ' . $ranking[1]['weaponclasse'] . '","price":' . RemoveZero($ranking[1]['wpprice']) . ',"rarity":"milspec","image_id":"' . $ranking[1]['weaponimg'] . '"}';
			
			return $rs;
		}
		$axa = All($ConnOK, $Logado);
		echo '{"result":true,"prize":['.$axa.']}';
		
		}
		
	}elseif($Count == 1){
	$Sessao = $_POST['session'];

	$statment = $ConnOK->prepareStatment("SELECT * FROM cases_session WHERE id_user = '$Logado' ORDER BY id DESC LIMIT 1");
	$statment->execute();
	$Resultado = $statment->fetch(PDO::FETCH_ASSOC);

	if ($Resultado > 0) {
		$IdArma = $Resultado['idweaponwin'];
		$statment1 = $ConnOK->prepareStatment("SELECT * FROM cases_weapons WHERE id = '$IdArma'");
		$statment1->execute();
		$Resultado2 = $statment1->fetch(PDO::FETCH_ASSOC);

		function RemoveZero($Nu)
		{
			$Check1 = substr($Nu, 0, -1);
			if ($Check1 == 0) {
				$FinalZero = substr($Nu, 1);
			}
			$Check2 = substr($Nu, 0, -4);
			if ($Check2 == 0) {
				$FinalZero = substr($Nu, 1);
			} else {
				$FinalZero = $Nu;
			}
			return $FinalZero;
		}

		$Price2 = RemoveZero($Resultado2['price']);

		echo '{"result":true,"prize":[{"id":' . $IdArma . ',"type":"' . $Resultado2['nameweapon'] . '","name":"' . $Resultado2['nameweapon'] . '","quality":"Well-Worn","name_hash":"' . $Resultado2['nameweapon'] . ' (' . $Resultado2['dias'] . ' Dias) | ' . $Resultado2['classeweapon'] . '","price":' . $Price2 . ',"rarity":"milspec","image_id":"' . $Resultado2['weaponimg'] . '"}]}';

	} else {
		echo '{"result":false,"error":"Session incorret"}';
		exit;
	}
}else{
	echo '{"result":false,"balance":0.36}';
	exit;
}
}else{
	echo '{"result":false,"balance":0.36}';
	exit;
}

