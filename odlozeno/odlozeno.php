<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// use HTTP Basic Auth to protect admin centre
// Auth Check.
// checking whether the auth values exist and match
$authCheck = function() use ($app) {
    $authRequest = isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
    $authUser   = $authRequest && $_SERVER['PHP_AUTH_USER'] === USERNAME;
    $authPass   = $authRequest && $_SERVER['PHP_AUTH_PW'] === PASSWORD; 
    if (! $authUser || ! $authPass) {
        $app->response()->header('WWW-Authenticate: Basic realm="My news Administration"', '');
        $app->response()->header('HTTP/1.1 401 Unauthorized', '');
        $app->response()->body('<h1>Please enter valid administration credentials</h1>');
//        $app->response()->send();
        $app->halt(401);
        exit;
    }
};
?>
