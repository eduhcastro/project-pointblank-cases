<?php
header('Content-Type: application/json; charset=utf-8');
if(@$_SESSION['username'] != null){
echo '{"result":true,"balance":'.$Saldo.'}';
}else{
    echo '{"result":flase,"msg":offline}';
}



?>