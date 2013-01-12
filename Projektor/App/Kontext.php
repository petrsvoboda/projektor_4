<?php
/**
 * Kontejner na globalni promenne
 * @author Petr Svoboda
 */

abstract class Projektor_App_Kontext
{
        private static $dbObjekty;
        private static $userKontext;
        private static $jeDebug;
        private static $koren;


	public static function getDbh($databaze = null)
        {
//            if (!$databaze) $databaze = Projektor_App_Config::DATABAZE_PROJEKTOR;
            if (!$databaze) throw new Exception(__CLASS__." ".__METHOD__." Metoda byla zavolána bez uvedení hodnoty parametru \$databaze");
            if (!self::$dbObjekty OR !array_key_exists($databaze, self::$dbObjekty) OR !self::$dbObjekty[$databaze])
            {
                $dbConfig = Projektor_App_Config::najdiPolozkuPodleAtributu(Projektor_App_Config::SEKCE_DB, Projektor_App_Config::ATRIBUT_SEKCE_DATABAZE, $databaze);
                if (!$dbConfig)
                    throw new Exception(__CLASS__." ".__METHOD__." Nenalezena položka v XML souboru s konfiguračními informacemi. Název sekce: ".
                                        Projektor_App_Config::SEKCE_DB.", název atributu: ".Projektor_App_Config::ATRIBUT_SEKCE_DATABAZE.", atribut:".$databaze);
                if (!$dbConfig->user OR !$dbConfig->pass OR !$dbConfig->dbhost OR !$dbConfig->dbname OR !$dbConfig->dbtype)
                    throw new Exception(__CLASS__." ".__METHOD__.
                                        " Sekce s konfiguračními informacemi. Název sekce: ".
                                        Projektor_App_Config::SEKCE_DB.", název atributu: ".Projektor_App_Config::ATRIBUT_SEKCE_DATABAZE.", hodnota atribut:".$databaze.
                                        " neobsahuje všechny potřebné informace: user, pass, dbhost, dbname, dbtype");
                switch ($dbConfig->dbtype) {
                    case Projektor_App_Config::DB_TYPE_MYSQL :
                        self::$dbObjekty[$databaze] = new Projektor_DB_Mysql($dbConfig->user, $dbConfig->pass, $dbConfig->dbhost, $dbConfig->dbname) ;
                        break;
                    case Projektor_App_Config::DB_TYPE_MSSQL :
                        self::$dbObjekty[$databaze] = new Projektor_DB_Mssql($dbConfig->user, $dbConfig->pass, $dbConfig->dbhost, $dbConfig->dbname) ;
                        break;
                    default:
                        throw new Exception(__CLASS__." ".__METHOD__." V konfigutaci (Projektor_App_Config) neexistuje zadaný typ databáze: ".$dbConfig->dbtype);
                }
            }
            return self::$dbObjekty[$databaze];
        }

//
//        public static function getDbMySQLInformationSchema()
//	{
//		if(!self::$DbMySQLInformationSchema)
//		self::$DbMySQLInformationSchema = new Projektor_DB_Mysql_InformationSchema();
//		return self::$DbMySQLInformationSchema;
//	}
//
//	public static function getDbMySQLProjektor()
//	{
//		if(!self::$DbMySQLProjektor) self::$DbMySQLProjektor = new Projektor_DB_Mysql_Projektor();
//		return self::$DbMySQLProjektor;
//	}
//
//	public static function getDbMySQLPersonalService()
//	{
//		if(!self::$DbMySQLPersonalService) self::$DbMySQLPersonalService = new Projektor_DB_Mysql_PersonalService();
//		return self::$DbMySQLPersonalService;
//	}
//
//	public static function getDbMSSQLCRM()
//	{
//		if(!self::$dbMSSQLCRM) self::$dbMSSQLCRM = new Projektor_DB_Mssql_CRM();
//		return self::$dbMSSQLCRM;
//	}

        public static function setUserKontext(Projektor_User_Kontext $userKontext = NULL)
	{
		if ($userKontext) self::$userKontext = $userKontext;
		return self::$userKontext;
	}

        public static function getUserKontext()
	{
		if(!self::$userKontext)
		self::$userKontext = new Projektor_User_Kontext ();  // prázdný kontext
		return self::$userKontext;
	}

        public static function getKontextFiltrSQL($nazevIdProjekt = NULL, $nazevIdKancelar = NULL, $nazevIdBeh = NULL, $filtr = NULL, $orderBy = NULL, $order = NULL, $vsechnyRadky = FALSE)
        {
                $kon = self::getUserKontext();
                $kontextFiltr =
                    ($filtr == "" ? ($vsechnyRadky ? "" : " WHERE valid = 1") : ($vsechnyRadky ? " WHERE {$filtr} " : " WHERE valid = 1 AND {$filtr}")).
                    (($kon->projekt AND $nazevIdProjekt) ? " AND `{$nazevIdProjekt}` = {$kon->projekt->id}" : "").
                    (($kon->kancelar AND $nazevIdKancelar) ? " AND `{$nazevIdKancelar}` = {$kon->kancelar->id}" : "").
                    (($kon->beh AND $nazevIdBeh) ? " AND `{$nazevIdBeh}` = {$kon->beh->id}" : "").
                    ($orderBy ? " ORDER BY `{$orderBy}` {$order}" : "");
                return $kontextFiltr;
        }

        public static function setDebug()
	{
		self::$jeDebug = TRUE;
		return self::$jeDebug;
	}

        public static function unsetDebug()
	{
		self::$jeDebug = FALSE;
		return self::$jeDebug;
	}
        public static function getDebug()
	{
		return self::$jeDebug;
	}


        public static function setKoren(Projektor_Controller_Uzel $koren = NULL)
	{
		if ($koren) self::$koren = $koren;
		return self::$koren;
	}

        public static function getKoren()
        {
            return self::$koren;
        }
}
?>
