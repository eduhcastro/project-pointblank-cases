<?php
function NameLeves($numero){
    $i = $numero;
    switch ($i) {
        case 0: 
            return "Novato";
            break;
        case 1:
            return "Recruta";
            break;
        case 2:
            return "Soldado";
            break;
        case 3:
            return "Cabo";
            break;
        case 4:
            return "Sargento";
            break;
        case 5:
            return "Terceiro Sargento 1";
            break;
        case 6:
            return "Terceiro Sargento 2";
            break;
        case 7:
            return "Terceiro Sargento 3";
            break;
        case 8:
            return "Segundo Sargento 1";
            break;
        case 9:
            return "Segundo Sargento 2";
            break;
        case 10:
            return "Segundo Sargento 3";
            break;
        case 11:
            return "Segundo Sargento 4";
            break;
        case 12:
            return "Primeiro Sargento 1";
            break;
        case 13:
            return "Primeiro Sargento 2";
            break;
        case 14:
            return "Primeiro Sargento 3";
            break;
        case 15:
            return "Primeiro Sargento 4";
            break;
        case 16:
            return "Primeiro Sargento 5";
            break;
        case 17:
            return "Segundo Tenente 1";
            break;
        case 18:
            return "Segundo Tenente 2";
            break;
        case 19:
            return "Segundo Tenente 3";
            break;
        case 20:
            return "Segundo Tenente 4";
            break;
        case 21:
            return "Primeiro Tenente 1";
            break;
        case 22:
            return "Primeiro Tenente 2";
            break;
        case 23:
            return "Primeiro Tenente 3";
            break;
        case 24:
            return "Primeiro Tenente 4";
            break;
        case 25:
            return "Primeiro Tenente 5";
            break;
        case 26:
            return "Capitão 1";
            break;
        case 27:
            return "Capitão 2";
            break;
        case 28:
            return "Capitão 3";
            break;
        case 29:
            return "Capitão 4";
            break;
        case 30:
            return "Capitão 5";
            break;
        case 31:
            return "Major 1";
            break;
        case 32:
            return "Major 2";
            break;
        case 33:
            return "Major 3";
            break;
        case 34:
            return "Major 4";
            break;
        case 35:
            return "Major 5";
            break;
        case 36:
            return "Tenente Coronel 1";
            break;
        case 37:
            return "Tenente Coronel 2";
            break;
        case 38:
            return "Tenente Coronel 3";
            break;
        case 39:
            return "Tenente Coronel 4";
            break;
        case 40:
            return "Tenente Coronel 5";
            break;
        case 41:
            return "Coronel 1";
            break;
        case 42:
            return "Coronel 2";
            break;
        case 43:
            return "Coronel 3";
            break;
        case 44:
            return "Coronel 4";
            break;
        case 45:
            return "Coronel 5";
            break;
        case 46:
            return "General de Brigada";
            break;
        case 47:
            return "General de Divisão";
            break;
        case 48:
            return "General de Exército";
            break;
        case 49:
            return "Marechal";
            break;
        case 50:
            return "Herói de Guerra";
            break;
        case 51:
            return "Hero";
            break;
        case 53:
            return "Game Master";
            break;
        case 54:
            return "Game Master";
            break;
    }
}
function ValueLevels($Numero) {
    $Exp = $Numero;
    switch ($Exp) {
        case ($Exp >= 56000 && $Exp <= 62000):
            return 62000;
        break;
        case ($Exp >= 62001 && $Exp <= 68000):
            return 68000;
        break;
        case ($Exp >= 68001 && $Exp <= 74000):
            return 74000;
        break;
        case ($Exp >= 74001 && $Exp <= 80000):
            return 80000;
        break;
        case ($Exp >= 80001 && $Exp <= 86000):
            return 86000;
        break;
        case ($Exp >= 86001 && $Exp <= 93000):
            return 93000;
        break;
        case ($Exp >= 93001 && $Exp <= 100000):
            return 100000;
        break;
        case ($Exp >= 100001 && $Exp <= 107000):
            return 107000;
        break;
        case ($Exp >= 107001 && $Exp <= 114000):
            return 114000;
        break;
        case ($Exp >= 114001 && $Exp <= 121000):
            return 121000;
        break;
        case ($Exp >= 121001 && $Exp <= 151000):
            return 151000;
        break;
        case ($Exp >= 151001 && $Exp <= 181000):
            return 181000;
        break;
        case ($Exp >= 181001 && $Exp <= 211000):
            return 211000;
        break;
        case ($Exp >= 211001 && $Exp <= 241000):
          return 241000;
        break;
        case ($Exp >= 241001 && $Exp <= 271000):
        return 271000;
        break;
        case ($Exp >= 271001 && $Exp <= 311000):
          return 311000;
        break;
        case ($Exp >= 311001 && $Exp <= 351000):
          return 351000;
        break;
        case ($Exp >= 351001 && $Exp <= 391000):
          return 391000;
        break;
        case ($Exp >= 391001 && $Exp <= 413000):
          return 413000;
        break;
        case ($Exp >= 413001 && $Exp <= 471000):
          return 471000;
        break;
        case ($Exp >= 471001 && $Exp <= 521000):
          return 521000;
        break;
        case ($Exp >= 521001 && $Exp <= 571000):
          return 571000;
        break;
        case ($Exp >= 571001 && $Exp <= 621000):
          return 621000;
        break;
        case ($Exp >= 621001 && $Exp <= 671000):
          return 671000;
        break;
        case ($Exp >= 671001 && $Exp <= 721000):
          return 721000;
        break;
        case ($Exp >= 721001 && $Exp <= 781000):
          return 781000;
        break;
        case ($Exp >= 781001 && $Exp <= 851000):
          return 851000;
        break;
        case ($Exp >= 851001 && $Exp <= 931000):
          return 931000;
        break;
        case ($Exp >= 931001 && $Exp <= 1021000):
          return 1021000;
        break;
        case ($Exp >= 1021001 && $Exp <= 1121000):
          return 1121000;
        break;
        case ($Exp >= 1121001 && $Exp <= 100000000):
          return 100000000;
        break;
        case ($Exp >= 100000001 && $Exp <= 99999999999):
          return 100000002;
        break;
      }
    }

    function ValueLevels2($Numero) {
        $Exp = $Numero;
        switch ($Exp) {
            case ($Exp >= 398000 && $Exp <= 454000): // ID 19
            $Acumulado = $Exp - 398000;
            $Limite = 454000;
            return array(56000, $Acumulado, $Limite);
            break;
            case ($Exp >= 454001 && $Exp <= 516000):
            $Acumulado = $Exp - 454000;
            $Limite = 516000;
            return array(62000, $Acumulado, $Limite);
            break;
            case ($Exp >= 516001 && $Exp <= 584000):
            $Acumulado = $Exp - 516000;
            $Limite = 584000;
            return array(68000, $Acumulado, $Limite);
            break;
            case ($Exp >= 584001 && $Exp <= 658000):
            $Acumulado = $Exp - 584000;
            $Limite = 658000;
            return array(74000, $Acumulado, $Limite);
            break;
            case ($Exp >= 658001 && $Exp <= 738000):
            $Acumulado = $Exp - 658000;
            $Limite = 738000;
            return array(80000, $Acumulado, $Limite);
            break;
            case ($Exp >= 738001 && $Exp <= 824000):
            $Acumulado = $Exp - 738000;
            $Limite = 824000;
            return array(86000, $Acumulado, $Limite);
            break;
            case ($Exp >= 824001 && $Exp <= 917000):
            $Acumulado = $Exp - 824000;
            $Limite = 917000;
            return array(93000, $Acumulado, $Limite);
            break;
            case ($Exp >= 917001 && $Exp <= 1017000):
            $Acumulado = $Exp - 917000;
            $Limite = 1017000;
            return array(100000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1017001 && $Exp <= 1124000):
            $Acumulado = $Exp - 1017000;
            $Limite = 1124000;
            return array(107000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1124001 && $Exp <= 1238000):
            $Acumulado = $Exp - 1124000;
            $Limite = 1238000;
            return array(114000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1238001 && $Exp <= 1359000):
            $Acumulado = $Exp - 1238000;
            $Limite = 1359000;
            return array(121000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1359001 && $Exp <= 1510000):
            $Acumulado = $Exp - 1359000;
            $Limite = 1510000;
            return array(151000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1510001 && $Exp <= 1691000):
            $Acumulado = $Exp - 1510000;
            $Limite = 1691000;
            return array(181000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1691001 && $Exp <= 1902000):
            $Acumulado = $Exp - 1691000;
            $Limite = 1902000;
            return array(211000, $Acumulado, $Limite);
            break;
            case ($Exp >= 1902001 && $Exp <= 2143000):
            $Acumulado = $Exp - 1902000;
            $Limite = 2143000;
            return array(241000, $Acumulado, $Limite);
            break;
            case ($Exp >= 2143001 && $Exp <= 2414000):
            $Acumulado = $Exp - 2143000;
            $Limite = 2414000;
            return array(271000, $Acumulado, $Limite);
            break;
            case ($Exp >= 2414001 && $Exp <= 2725000):
            $Acumulado = $Exp - 2414000;
            $Limite = 2725000;
            return array(311000, $Acumulado, $Limite);
            break;
            case ($Exp >= 2725001 && $Exp <= 3076000):
            $Acumulado = $Exp - 2725000;
            $Limite = 3076000;
            return array(351000, $Acumulado, $Limite);
            break;
            case ($Exp >= 3076001 && $Exp <= 3467000):
            $Acumulado = $Exp - 3076000;
            $Limite = 3467000;
            return array(391000, $Acumulado, $Limite);
            break;
            case ($Exp >= 3467001 && $Exp <= 3898000):
            $Acumulado = $Exp - 3467000;
            $Limite = 3898000;
            return array(413000, $Acumulado, $Limite);
            break;
            case ($Exp >= 3898001 && $Exp <= 4369000):
            $Acumulado = $Exp - 3898000;
            $Limite = 4369000;
            return array(471000, $Acumulado, $Limite);
            break;
            case ($Exp >= 4369001 && $Exp <= 4890000):
            $Acumulado = $Exp - 4369000;
            $Limite = 4890000;
            return array(521000, $Acumulado, $Limite);
            break;
            case ($Exp >= 4890001 && $Exp <= 5461000):
            $Acumulado = $Exp - 4890000;
            $Limite = 5461000;
            return array(571000, $Acumulado, $Limite);
            break;
            case ($Exp >= 5461001 && $Exp <= 6082000):
            $Acumulado = $Exp - 5461000;
            $Limite = 6082000;
            return array(621000, $Acumulado, $Limite);
            break;
            case ($Exp >= 6082001 && $Exp <= 6753000):
            $Acumulado = $Exp - 6082000;
            $Limite = 6753000;
            return array(671000, $Acumulado, $Limite);
            break;
            case ($Exp >= 6753001 && $Exp <= 7474000):
            $Acumulado = $Exp - 6753000;
            $Limite = 7474000;
            return array(721000, $Acumulado, $Limite);
            break;
            case ($Exp >= 7474001 && $Exp <= 8255000):
            $Acumulado = $Exp - 7474000;
            $Limite = 8255000;
            return array(781000, $Acumulado, $Limite);
            break;
            case ($Exp >= 8255001 && $Exp <= 9106000):
            $Acumulado = $Exp - 8255000;
            $Limite = 9106000;
            return array(851000, $Acumulado, $Limite);
            break;
            case ($Exp >= 9106001 && $Exp <= 10037000):
            $Acumulado = $Exp - 9106000;
            $Limite = 10037000;
            return array(931000, $Acumulado, $Limite);
            break;
            case ($Exp >= 10037001 && $Exp <= 11058000):
            $Acumulado = $Exp - 10037000;
            $Limite = 11058000;
            return array(1021000, $Acumulado, $Limite);
            break;
            case ($Exp >= 11058001 && $Exp <= 12179000):
            $Acumulado = $Exp - 11058000;
            $Limite = 12179000; // 11058001 = 0% 4 estrelas 1 de xp
            return array(1121000, $Acumulado, $Limite);
            break;
            case ($Exp >= 12179001 && $Exp <= 100000000):
            $Acumulado = $Exp - 12179000;
            $Limite = 100000000; // 12179001 = 0% 5 estrelas 1 de xp
            return array(87821000, $Acumulado, $Limite);
            break;
            case ($Exp >= 100000001):
            $Acumulado = $Exp - 100000000;
            $Limite = 99999999999999; // 12179001 = 0% 5 estrelas 1 de xp
            return array(99999999999999, $Acumulado, $Limite);
            break;
          }
        }

?>
