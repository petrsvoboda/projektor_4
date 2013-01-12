<?php
/**
 * Třída má pouze jednu statickou metodu sloužící k definování pattern pro routy. Metoda je volána před zahájením routování
 * v hook 'slim.before.router'.
 */
class Projektor_Routes_Define
{
    const PATTERN_PREFIX = '/strom/';
    const CONTROLLER = 'strom';
    const CESTA = 'cesta';
//    const ACTION = 'action';
//    const TYPE = 'type';
//    const ID = 'id';

    const STROM_PATTERN = '/strom/(:cesta)';
    const STROM_ROUTE_NAME = 'strom';
    const LOGIN_PATTERN = '/login/';
    const LOGIN_ROUTE_NAME = 'login';
    const LOGOUT_PATTERN = '/logout/';
    const LOGOUT_ROUTE_NAME = 'logout';
//    const CONTROLLERID_PATTERN = '/controller/(:controller)/(:action)/(:id)';
//    const CONTROLLERID_ROUTE_NAME = 'controllerid';
//    const CONTROLLERTYPEID_PATTERN = '/controller/(:controller)/(:action)/(:type)/(:id)';
//    const CONTROLLERTYPEID_ROUTE_NAME = 'controllertypeid';

    /**
     * Metoda definuje routy.
     * Metoda definuje vyýchozí routu, routy pro volání kontrolerů v hook('slim.before.dispatch') a sadu pojmenovaných rout.
     * Použití pro definice pojmenovaných rout je to, že takto definované routy jsou pojmenované a umožňují snadné používání metody Slim urlFor v kódu
     * @param type $app
     */
    public static function setRoutes($app)
    {
        /**
        * Definice routy pro volání controlleru
        * Routa je použita pro GEt i pro POST požadavky, shoda s pattern nastane vždy, když požadavek obsahuje řetězec 'strom/'.
        * Následující parametry se použijí v hook('slim.before.dispatch')
        */
//        $app->map(self::STROM_PATTERN, function () use ($app) {
//            })->via('GET','POST')->name(self::STROM_ROUTE_NAME);
//        $app->map(self::CONTROLLERID_PATTERN, function () use ($app) {
//            })->via('GET','POST')->name(self::CONTROLLERID_ROUTE_NAME);
//        $app->map(self::CONTROLLERTYPEID_PATTERN, function () use ($app) {
//            })->via('GET','POST')->name(self::CONTROLLERTYPEID_ROUTE_NAME);

        /**
         * Definece routy, která není obsluhována kontrolerem, pattern neodpovídá paternu v hook 'slim.before.dispatch'
         * a hook tak nevolá žádný kontroler. Funkce uvedená v routě není prázdná, vykonává přesměrování na routu 'home'
         */
            $app->map('/', function() use ($app) {
                $app->redirect($app->urlFor('strom'));
            })->via('GET','POST');

        /**
         * Definice pojmenovaných rout obsluhovaných kontrolerem pro použití metody urlFor
         */
        $app->map(self::STROM_PATTERN, function () use ($app) {
            $params = $app->router()->getIterator()->current()->getParams();
                Projektor_App_Logger::resetLog();
            try {
                $cookie = new Projektor_Auth_Cookie();
                $cookie->validate();
            //    global $userid;
                $userid =$cookie->get_userid();
                session_id($userid);
                session_start();
            }
            catch (Projektor_Auth_Exception $e) {
                                            $app->redirect($app->urlFor('login'));
            //	header("Location: ./login.php?originating_uri=".$_SERVER['REQUEST_URI']."&index_redir=1");
            //    exit;
            }
            $user = new Projektor_Data_Auto_SysUsersItem($userid);

            //Kontrola oprávnění
            $povoleneProjekty = new Projektor_Data_Auto_CProjektCollection;
            $povoleneProjekty->dejPovoleneProjekty($user->id);
            $povoleneKancelare = new Projektor_Data_Auto_CKancelarCollection();
            $povoleneKancelare->dejPovoleneKancelare($user->id);

            //TODO: OPRAVIT COOKIES - kydyž se hlásí jiný uživatel, nastavit cookies projekt, kencelar, beh, debug
            //TODO: session
            if(isset($_COOKIE)) {
                if (array_key_exists('jeDebug', $_COOKIE)) $cookieJeDebug = @$_COOKIE['jeDebug'];
                if (array_key_exists('kancelarId', $_COOKIE)) $kancelarZCookie = new Projektor_Data_Auto_CKancelarItem($_COOKIE['kancelarId']);
                if (array_key_exists('projektId', $_COOKIE)) $projektZCookie = new Projektor_Data_Auto_CProjektItem($_COOKIE['projektId']);
                if (array_key_exists('behId', $_COOKIE)) $behZCookie = new Projektor_Data_Auto_SBehProjektuItem($_COOKIE['behId']);
            }

            if ($povoleneProjekty) {
                if (isset($projektZCookie)) {
                    foreach ($povoleneProjekty as $povolenyProjekt) {
                        if ($projektZCookie == $povolenyProjekt) {
                            $projekt = $projektZCookie;
                            if ($povoleneKancelare) {
                                if (isset($kancelarZCookie)) {
                                    foreach ($povoleneKancelare as $povolenaKancelar) {
                                        if ($kancelarZCookie == $povolenaKancelar) $kancelar = $kancelarZCookie;
                                    }
                                }
                            } else {
                                $zprava = "Přihlášený uživatel nemá žádné povolené Kanceláře v projektu ". $projekt->text.". Výpis: ".  print_r($projekt, TRUE);
                            }
                //            $behyProjektu = Projektor_Data_Seznam_SBehProjektu::vypisVse();   //diky kontext filtru vraci jen behy pro $kontextUser->projekt
                            $behyProjektu = new Projektor_Data_Auto_SBehProjektuCollection();
                            if ($behyProjektu) {
                                if (isset($behZCookie)) {
                                    foreach ($behyProjektu as $behProjektu) {
                                        if ($behZCookie == $behProjektu) $beh = $behZCookie;
                                    }
                                }
                            } else {
                                $zprava = "V projektu ". $projekt->text." nejsou nastaveny žádné bšhy. Výpis: ".  print_r($projekt, TRUE);
                            }
                        }
                    }
                }
            } else {
                $zprava = "Přihlášený uživatel nemá žádné povolené projekty.";
            }

            if (isset($projekt)) {
                if (isset($kancelar)) {
                    if (isset($beh)) {
                        $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, $kancelar, $beh, $povoleneProjekty, $povoleneKancelare));
                    } else {
                        $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, $kancelar, NULL, $povoleneProjekty, $povoleneKancelare));
                    }

                } else {
                    if (isset($beh)) {
                        $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, NULL, $beh, $povoleneProjekty, $povoleneKancelare));
                    } else {
                        $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, $projekt, NULL, NULL, $povoleneProjekty, $povoleneKancelare));
                    }
                }
            } else {
                $kontextUser = Projektor_App_Kontext::setUserKontext(new Projektor_User_Kontext($user, NULL, NULL, NULL, $povoleneProjekty, $povoleneKancelare));
            }

            if (isset($cookieJeDebug) AND $cookieJeDebug) {
                    Projektor_App_Kontext::setDebug();
                    if (isset($_GET["debug"]) AND $_GET["debug"]=="0") Projektor_App_Kontext::unsetDebug();
            } else {
                    Projektor_App_Kontext::unsetDebug();
                    if (isset($_GET["debug"]) AND $_GET["debug"]=="1") Projektor_App_Kontext::setDebug();
            }


                if (isset($params['cesta'])) {
                    echo $params['cesta'];
                    $strom = new Projektor_Controller_Strom($params['cesta']);
                } else {
                    echo "Jsem bez cesty";
                    Projektor_App_Logger::resetLog();
                    $koren = new Projektor_Controller_Uzel("Projektor_Controller_Stranka_Index", null, null, FALSE);
                    $cesta_serialized = serialize($koren);
                    $strom = new Projektor_Controller_Strom($cesta_serialized);
                }
                $koren = Projektor_App_Kontext::getKoren();
                $stranka = $strom->traverzuj($koren);
                    include 'index_v3_konec.php';
                return $stranka->html;

            })->via('GET','POST')->name(self::STROM_ROUTE_NAME);

        $app->map(self::LOGIN_PATTERN, function () {
                Projektor_App_Logger::resetLog();
                $koren = new Projektor_Controller_Uzel("Projektor_Controller_Login", null, null, FALSE);
                $cesta_serialized = serialize($koren);
                $strom = new Projektor_Controller_Strom($cesta_serialized);
                $koren = Projektor_App_Kontext::getKoren();
                $stranka = $strom->traverzuj($koren);
                    include 'index_v3_konec.php';
                return $stranka->html;
            })->via('GET','POST')->name(self::LOGIN_ROUTE_NAME);

        $app->get(self::LOGOUT_PATTERN, function () {
            })->name(self::LOGOUT_ROUTE_NAME);
//
//        // news Home.
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Home/home', function() {
//            })->name('news_home');
//
//        // news View.
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Home/detail/(:'.self::ID.')', function() {
//            })->name('news_detail');
//
//        // Admin Home.
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Home/admin', function() {
//        })->name('news_admin_home');
//
//        // Admin Add
//        $app->map(self::PATTERN_PREFIX.'Atw_Controller_Home/adminAdd', function () {
//            })->via('GET','POST')->name('news_admin_add');
//
//        // Admin Edit
//        $app->map(self::PATTERN_PREFIX.'Atw_Controller_Home/adminEdit/(:'.self::ID.')', function () {
//            })->via('GET','POST')->name('news_admin_edit');
//
//        // Admin Delete
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Home/adminDelete/(:'.self::ID.')', function () {
//            })->name('news_admin_delete');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Places/filter', function () {
//            })->name('places_filter');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Places/listing', function () {
//            })->name('places_listing');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Place/add/(:'.self::ID.')', function () {
//            })->name('place_add');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Place/edit/(:'.self::ID.')', function () {
//            })->name('place_edit');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Place/view/(:'.self::ID.')', function () {
//            })->name('place_view');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Reviews/listing/(:'.self::ID.')', function () {
//            })->name('reviews_listing');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Review/view/(:'.self::TYPE.')/(:'.self::ID.')', function () {
//            })->name('review_view');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Review/edit/(:'.self::TYPE.')/(:'.self::ID.')', function () {
//            })->name('review_edit');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Review/add/(:'.self::TYPE.')/(:'.self::ID.')', function () {
//            })->name('review_add');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Trips/home', function () {
//            })->name('trips_home');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Profiles/filter', function () {
//            })->name('profiles_filter');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Profiles/listing', function () {
//            })->name('profiles_listing');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Profile/view/(:'.self::ID.')', function () {
//            })->name('profile_view');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Profile/edit/(:'.self::ID.')', function () {
//            })->name('profile_edit');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_Profile/add/(:'.self::ID.')', function () {
//            })->name('profile_add');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_User/view/(:'.self::ID.')', function () {
//            })->name('user_view');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_User/edit/(:'.self::ID.')', function () {
//            })->name('user_edit');
//
//        $app->get(self::PATTERN_PREFIX.'Atw_Controller_User/add', function () {
//            })->name('user_add');
//
//

            }
}
?>
