<?php
//ob_start();
//
//require_once("Projektor/ProjektorAutoload.php");
//        $autocodeConfig = Projektor_App_Config::najdiSekciPodleJmena(Projektor_App_Config::SEKCE_AUTOCODE);
//
//try {
//    $cookie = new Projektor_Auth_Cookie();
//    $cookie->validate();
////    global $userid;
//    $userid =$cookie->get_userid();
//    session_id($userid);
//    session_start();
//}
//catch (Projektor_Auth_Exception $e) {
//	header("Location: ./login.php?originating_uri=".$_SERVER['REQUEST_URI']."&index_redir=1");
//    exit;
//}
//$user = new Projektor_Data_Auto_SysUsersItem($userid);
//
////Kontrola oprávnění
//$povoleneProjekty = new Projektor_Data_Auto_CProjektCollection;
//$povoleneProjekty->dejPovoleneProjekty($user->id);
//$povoleneKancelare = new Projektor_Data_Auto_CKancelarCollection();
//$povoleneKancelare->dejPovoleneKancelare($user->id);
//
////TODO: OPRAVIT COOKIES - kydyž se hlásí jiný uživatel, nastavit cookies projekt, kencelar, beh, debug
////TODO: session
//if(isset($_COOKIE)) {
//    if (array_key_exists('jeDebug', $_COOKIE)) $cookieJeDebug = @$_COOKIE['jeDebug'];
//    if (array_key_exists('kancelarId', $_COOKIE)) $kancelarZCookie = new Projektor_Data_Auto_CKancelarItem($_COOKIE['kancelarId']);
//    if (array_key_exists('projektId', $_COOKIE)) $projektZCookie = new Projektor_Data_Auto_CProjektItem($_COOKIE['projektId']);
//    if (array_key_exists('behId', $_COOKIE)) $behZCookie = new Projektor_Data_Auto_SBehProjektuItem($_COOKIE['behId']);
//}
//
//if ($povoleneProjekty) {
//    if (isset($projektZCookie)) {
//        foreach ($povoleneProjekty as $povolenyProjekt) {
//            if ($projektZCookie == $povolenyProjekt) {
//                $projekt = $projektZCookie;
//                if ($povoleneKancelare) {
//                    if (isset($kancelarZCookie)) {
//                        foreach ($povoleneKancelare as $povolenaKancelar) {
//                            if ($kancelarZCookie == $povolenaKancelar) $kancelar = $kancelarZCookie;
//                        }
//                    }
//                } else {
//                    $zprava = "Přihlášený uživatel nemá žádné povolené Kanceláře v projektu ". $projekt->text.". Výpis: ".  print_r($projekt, TRUE);
//                }
//    //            $behyProjektu = Projektor_Data_Seznam_SBehProjektu::vypisVse();   //diky kontext filtru vraci jen behy pro $kontextUser->projekt
//                $behyProjektu = new Projektor_Data_Auto_SBehProjektuCollection();
//                if ($behyProjektu) {
//                    if (isset($behZCookie)) {
//                        foreach ($behyProjektu as $behProjektu) {
//                            if ($behZCookie == $behProjektu) $beh = $behZCookie;
//                        }
//                    }
//                } else {
//                    $zprava = "V projektu ". $projekt->text." nejsou nastaveny žádné bšhy. Výpis: ".  print_r($projekt, TRUE);
//                }
//            }
//        }
//    }
//} else {
//    $zprava = "Přihlášený uživatel nemá žádné povolené projekty.";
//}
//
//if (isset($projekt)) {
//    if (isset($kancelar)) {
//        if (isset($beh)) {
//            $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, $kancelar, $beh, $povoleneProjekty, $povoleneKancelare));
//        } else {
//            $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, $kancelar, NULL, $povoleneProjekty, $povoleneKancelare));
//        }
//
//    } else {
//        if (isset($beh)) {
//            $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, NULL, $beh, $povoleneProjekty, $povoleneKancelare));
//        } else {
//            $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, NULL, NULL, $povoleneProjekty, $povoleneKancelare));
//        }
//    }
//} else {
//    $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, NULL, NULL, NULL, $povoleneProjekty, $povoleneKancelare));
//}
//
//if (isset($cookieJeDebug) AND $cookieJeDebug) {
//        Projektor_App_Kontext::setDebug();
//        if (isset($_GET["debug"]) AND $_GET["debug"]=="0") Projektor_App_Kontext::unsetDebug();
//} else {
//        Projektor_App_Kontext::unsetDebug();
//        if (isset($_GET["debug"]) AND $_GET["debug"]=="1") Projektor_App_Kontext::setDebug();
//}
//
//echo Projektor_Request_Base::getContent();

$kontextUser = Projektor_App_Kontext::getUserKontext();
if ($kontextUser->projekt) setcookie("projektId",$kontextUser->projekt->id);
if ($kontextUser->kancelar) setcookie("kancelarId",$kontextUser->kancelar->id);
if ($kontextUser->beh) setcookie("behId",$kontextUser->beh->id);
setcookie('jeDebug', Projektor_App_Kontext::getDebug());

?>