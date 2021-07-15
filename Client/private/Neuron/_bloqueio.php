<?php
if (@$_COOKIE['thema'] == 'V12') {
    if (@$Vip != true) {
        setcookie("thema", "dark");
        header("Refresh:0");
    }
}
if (@$_SESSION["username"] != null) {
    $Sessao = PerfilLogado($_SESSION["username"], $ConnOK);
}
$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
$INITE = strpos($REQUEST_URI, '?');
if ($INITE):
    $REQUEST_URI = substr($REQUEST_URI, 0, $INITE);
endif;
$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);
$URL = explode('/', $REQUEST_URI_PASTA);
if ($URL[0] == 'login') {
    $URL[0] = ($URL[0] != '' ? $URL[0] : 'home');
    if (file_exists('private/Views/' . $URL[0] . '.php')):
        require ('private/Views/' . $URL[0] . '.php');
    elseif (is_dir('private/Views/' . $URL[0])):
        if (isset($URL[1]) && file_exists('private/Views/' . $URL[0] . '.php')):
            require ('private/Views/' . $URL[0] . '.php');
        else:
            header("Location: /home");
            die();
        endif;
    else:
        header("Location: /home");
        die();
    endif;
    exit;
    exit();
}
if ($URL[0] == 'giveaway') {
    $URL[0] = ($URL[0] != '' ? $URL[0] : 'home');
    if (file_exists('private/Api/' . $URL[1] . '.php')):
        require ('private/Api/' . $URL[1] . '.php');
    elseif (is_dir('private/Api/' . $URL[1])):
        if (isset($URL[1]) && file_exists('private/Api/' . $URL[1] . '.php')):
            require ('private/Api/' . $URL[1] . '.php');
        else:
            header("Location: /home");
            die();
        endif;
    else:
        header("Location: /home");
        die();
    endif;
    exit;
    exit();
}
if ($URL[0] == 'refresh') {
    $URL[0] = ($URL[0] != '' ? $URL[0] : 'home');
    if (file_exists('private/Api/refreshs/' . $URL[1] . '.php')):
        require ('private/Api/refreshs/' . $URL[1] . '.php');
    elseif (is_dir('private/Api/refreshs/' . $URL[1])):
        if (isset($URL[1]) && file_exists('private/Api/refreshs/' . $URL[1] . '.php')):
            require ('private/Api/refreshs/' . $URL[1] . '.php');
        else:
            header("Location: /home");
            die();
        endif;
    else:
        header("Location: /home");
        die();
    endif;
    exit;
    exit();
}
if ($URL[0] == 'wallet') {
    if ($URL[1] == "NwCard") {
        require ('private/Api/wallet/newcard.php');
        exit;
    }
    if ($URL[1] == "CardOff") {
        require ('private/Api/wallet/cardoff.php');
        exit;
    }
}
if ($URL[0] == 'settings') {
    if ($URL[1] == "userXY") {
        require ('private/Api/adprofile/user.php');
        exit;
    }
    if ($URL[1] == "backXY") {
        require ('private/Api/adprofile/background.php');
        exit;
    }
}
?>