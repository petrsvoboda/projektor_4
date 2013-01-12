<?php
// zajištění autoload pro Projektor
require_once 'Projektor/Autoloader.php';
Projektor_Autoloader::register();

/**
 * Načtení Slim PHP 5 Framework včetně Slim-Extras, Twig templates
 */
// Slim
require 'Slim/Slim.php';
require 'Views/TwigView.php';

/**
 * get Twig up and running
 * using the Slim extras
 */
// Configuration
TwigView::$twigDirectory = __DIR__ . '/Twig/';
// initialize urlFor function as a Twig Extension
TwigView::$twigExtensions = array(
    'Twig_Extensions_Slim'
);

/**
 * Vytvoření instance Projektor_Slim_Slim
 * Třída je potomkem třídy Slim a vytvoří tedy rozšířený objekt Slim application
 */
$app = new Projektor_Slim_Slim(array(
//    'debug' => false,
        'log.enable' => true,
        'log.path' => './logs',
        'log.level' => 4,
        'view' => new TwigView,
        'cookies.secret_key'  => 'AWESOME',
        //'cookies.lifetime' => time() + (1 * 24 * 60 * 60), // = 1 day
        'cookies.lifetime' => time() + 10*60, // = 10 minutes
        'cookies.cipher' => MCRYPT_RIJNDAEL_256,
        'cookies.cipher_mode' => MCRYPT_MODE_CBC
));


/**
 * Hook se jménem slim.before.router je použit vždy před vyhledáváním a rozpoznáváním rout.
 * Zde se volá statická metoda setRoutes třídy Projektor_Routes_Define. Tato metoda definuje všechny potřebné routy.
 */
$app->hook('slim.before.router', function () use ($app) {
            Projektor_Routes_Define::setRoutes($app);
});

/**
 * Hook se jménem slim.before.dispatch je použit vždy po vyhodnocení shody route pattern s došlým požadavkem (request).
 * Znamená to, že v okamžiku volání hook slim.before.dispatch již slim  vytvořil objekt router (volá se $app->router) a rozpoznal aktuální routu.
 * Metoda getIterator ($app->router->getIterator) vrací standardní iteráror (PHP spl iterátor) a je pak možno používat metody iterátoru.
 * Zde se používá metoda iterátoru current ( $app->router()->getIterator()->current() ), která vrací aktuální routu (objekt route), tedy právě tu
 * routu, u které slim zjistil shodu pattern s požadavkem. Dále se pak použijí metody objektu route->getName a route->getParams. Metoda getName
 * vrací pattern routy, metoda getParams vrací asociativní pole obsahující jednotlivé parametry.
 * Například pro route pattern: '/controller/(:controller)/(:action)/(:type)/(:id)' vrací metoda getName řetězec 'controller'
 * a metoda getParams vrací pole se čtyřmi prvky, první prvek s indexem 'controller' obsahuje řetězec nalezený na pozici parametru (:controller),
 * druhý prvek s indexem 'action' obsahuje řetězec nalezený na pozici parametru (:action) atd.
 * Příklad: pro pattern '/controller/Krasny_Controller/edit/hotel/1' se vytvoří objekt Krasny_Controller a zavolá se jeho metoda 'edit'.
 * V poli parametrů jsou pak čtyři parametry array('controller'=>'Krasny_Controller, 'action'=>'edit', 'type'=>hotel, 'id'=>'1')
 * Pokud není zadána nebo neexistuje třída kontroléru, vytvoří se objekt Atw_Controller_NonExists
 * Pokud není zadána nebo neexistuje metoda kontroléru, volá se metoda kontroléru defaultAction
 *
 * Funkce rozpoznává vzory (pattern) a routy (route names), které jsou definovány v metodě setRoutes třídy Projektor_Routes_Define.
 * Metoda setRoutes třídy Projektor_Routes_Define musí být volána dříve a je tedy volána v hook('slim.before.router')
 */
$app->hook('slim.before.dispatch', function () use ($app) {
//    $routeName = $app->router()->getIterator()->current()->getName();
//    if( $routeName == Projektor_Routes_Define::STROM_ROUTE_NAME) {
//        $params = $app->router()->getIterator()->current()->getParams();
//
//        /**
//         * kontrola parametru controller  (Projektor_Routes_Define::CONTROLLER)
//         * v případě selhání vytvořeníobjektu Atw_Controller_NonExists
//         */
//        if (! isset($params[Projektor_Routes_Define::CONTROLLER]))  // existuje parametr controller
//        {
//            $controller = new Projektor_Controller_NonExists();
//            $controller->defaultAction('Route parameter - controller in the route is not set', $params);
//            return FALSE;
//        }
//        if (! class_exists($params[Projektor_Routes_Define::CONTROLLER], TRUE )) // existuje třída pro vytvoření kontroléru
//        {
//            $controller = new Projektor_Controller_NonExists();
//            $controller->defaultAction('Route parameter - controller doesn\'t match with any defined class name.', $params);
//            return FALSE;
//        }
//
//        /**
//         *  vytvoření zadaného objektu kontroléru
//         */
//        $controller_name = $params[Projektor_Routes_Define::CONTROLLER];
//        $controller = new $controller_name();
//
//        /**
//         * Kontrola zda byl skutečně vytvořen objekt kontroléru
//         */
//        if (! is_object($controller))
//        {
//            $controller = new Projektor_Controller_NonExists();
//            $controller->defaultAction('Route parameter - controller properly match with defined class name, after all object instatiation failed.', $params);
//            return FALSE;
//        }
//    }

    // test, zda název routy odpovídá některému z názvů obsluhovaných kontrolerem
    if( 0
//            OR $routeName == Projektor_Routes_Define::CONTROLLERID_ROUTE_NAME
//            OR $routeName == Projektor_Routes_Define::CONTROLLERTYPEID_ROUTE_NAME
    ) {
        $params = $app->router()->getIterator()->current()->getParams();

        /**
         * kontrola parametru controller  (Projektor_Routes_Define::CONTROLLER)
         * v případě selhání vytvořeníobjektu Atw_Controller_NonExists
         */
        if (! isset($params[Projektor_Routes_Define::CONTROLLER]))  // existuje parametr controller
        {
            $controller = new Projektor_Controller_NonExists();
            $controller->defaultAction('Route parameter - controller in the route is not set', $params);
            return FALSE;
        }
        if (! class_exists($params[Projektor_Routes_Define::CONTROLLER], TRUE )) // existuje třída pro vytvoření kontroléru
        {
            $controller = new Projektor_Controller_NonExists();
            $controller->defaultAction('Route parameter - controller doesn\'t match with any defined class name.', $params);
            return FALSE;
        }

        /**
         *  vytvoření zadaného objektu kontroléru
         */
        $controller_name = $params[Projektor_Routes_Define::CONTROLLER];
        $controller = new $controller_name();

        /**
         * Kontrola zda byl skutečně vytvořen objekt kontroléru
         */
        if (! is_object($controller))
        {
            $controller = new Projektor_Controller_NonExists();
            $controller->defaultAction('Route parameter - controller properly match with defined class name, after all object instatiation failed.', $params);
            return FALSE;
        }

        /**
         *  kontola zadané metody kontroléru, v případě selhání so volá metoda defaultAction
         */
        if (! isset( $params[Projektor_Routes_Define::ACTION] ))  // existuje parametr action
        {
            $controller->defaultAction('Route parameter - action in the route is not set', $params);
            return FALSE;
        }
        if (! is_callable(array($controller, $params[Projektor_Routes_Define::ACTION])))  // existuje metoda kontroléru odpovídající zadanému parametru action
        {
            $controller->defaultAction('There is no controller method match with route parameter - action', $params);
            return FALSE;
        }

        /**
         *  volání zadané metody kontroléru
         */
        $action = $params[Projektor_Routes_Define::ACTION];
        $controller->$action();

    }

});


/**
 * Run the Slim application
 *
 * This method should be called last. This is responsible for executing
 * the Slim application using the settings and routes defined above.
 */
$app->run();
