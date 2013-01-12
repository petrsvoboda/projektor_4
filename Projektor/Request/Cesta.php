<?php
abstract class Projektor_Request_Cesta
{
    private static $prefixCesty;

    public static function getPrefixCesty()
    {
        return self::$prefixCesty;
    }

    public static function setPrefixCesty($prefix)
    {
        self::$prefixCesty = $prefix;
    }

    public static function getContent($cesta_serialized = null)
    {
        Projektor_Request_Cesta::setPrefixCesty($_SERVER["SCRIPT_NAME"]."?cesta=");
        Projektor_App_Logger::resetLog();

        if ( !$cesta_serialized)
        {
            $koren = new Projektor_Controller_Uzel("Projektor_Controller_Stranka_Index", null, null, FALSE);
            $cesta_serialized = serialize($koren);
        }
        $strom = new Projektor_Controller_Strom($cesta_serialized);
        $koren = Projektor_App_Kontext::getKoren();
        $stranka = $strom->traverzuj($koren);
        return $stranka->html;
    }
}