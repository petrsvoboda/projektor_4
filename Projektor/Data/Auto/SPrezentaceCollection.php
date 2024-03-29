<?php
/**
 * @author Svoboda Petr
 */

class Projektor_Data_Auto_SPrezentaceCollection extends Projektor_Data_Collection
{
    const NAZEV_TRIDY_ITEM = "Projektor_Data_Auto_SPrezentaceItem";

###START_AUTOCODE

    /**
     * Metoda vrací Item, prvek kolekce Projektor_Data_Auto_SPrezentaceCollection typu Projektor_Data_Auto_SPrezentaceItem
     * @param Projektor_Data_Auto_SPrezentaceItem $object
     * @return \Projektor_Data_Auto_SPrezentaceItem
     */
    public function Item($id, Projektor_Data_Auto_SPrezentaceItem &$object=NULL){
        $object = new Projektor_Data_Auto_SPrezentaceItem($id); //factory na Item
        return $object;
    }

###END_AUTOCODE

    public static function nactiNazvy($jmenaHlavnichObjektu = NULL) {
        //načtení hlavních objektů
        foreach ($jmenaHlavnichObjektu as $jmenoHlavnihoObjektu) {
            $jmenoDatovehoObjektu = "Projektor_Data_".$jmenoHlavnihoObjektu;
            $datovyObjekt = new $jmenoDatovehoObjektu;
            $mapovani = $datovyObjekt->_mapovaniObjektTabulka;
            $prefix = $datovyObjekt->prefix;

            $dbh = Projektor_App_Kontext::getDbh(Projektor_App_Config::DATABAZE_PROJEKTOR);
            foreach ($mapovani as $jmenoObjektuVlastnosti => $tabulka) {
                // Kontrola existence tabulky v databázi
                switch($dbh->dbType){
                case 'MySQL':
                    $dbhi = Projektor_App_Kontext::getDbh(Projektor_App_Config::DATABAZE_INFORMATION_SCHEMA);
                    $query = Projektor_Helper_SqlQuery::getShowTablesQueryMySQL();
                    break;
                case 'MSSQL':
                    $dbhi = Projektor_App_Kontext::getDbh($dbh->dbName);
                    $query = Projektor_Helper_SqlQuery::getShowTablesQueryMSSQL();
                    break;
                default: throw new Exception('*** Chyba v '.__CLASS__."->".__METHOD__.':<BR>'."Typ databáze ".$dbh->dbType." neexistuje.");
                }
                if (!$dbhi->prepare($query)->execute($dbh->dbName, $prefix . $tabulka)) {
                    throw new Exception("V databázi ".$dbh->dbName." neexistuje tabulka ".$prefix . $tabulka);
                };
                //Nacteni struktury tabulky, datovych typu a ostatnich parametru tabulky
                switch($dbh->dbType){
                case 'MySQL':
                    $dbhi = Projektor_App_Kontext::getDbh(Projektor_App_Config::DATABAZE_INFORMATION_SCHEMA);
                    $query = Projektor_Helper_SqlQuery::getShowColumnsQueryMySQL();
                    break;
                case 'MSSQL':
                    $dbhi = Projektor_App_Kontext::getDbh($dbh->dbName);
                    $query = Projektor_Helper_SqlQuery::getShowColumnsQueryMSSQL();
                    break;
                default: throw new Exception('*** Chyba v '.__CLASS__."->".__METHOD__.':<BR>'."Typ databáze ".$dbh->dbType." neexistuje.");
                }
                $querySelectCount = "SELECT ".self::ID." FROM ".self::TABULKA.
                            " WHERE ".self::HLAVNI_OBJEKT."='".$jmenoHlavnihoObjektu.
                                    "' AND ".self::OBJEKT_VLASTNOST."='".$jmenoObjektuVlastnosti.
                                    "' AND ".self::NAZEV_SLOUPCE."= :1";
                $sloupce= $dbhi->prepare($query)->execute($dbh->dbName, $prefix . $tabulka)->fetchall_assoc();
                if ($sloupce) {
                    foreach ($sloupce as $sloupec) {
                        if (!$sloupec['PK']) {
                            //pokud v tabulce prezentace neexistuje záznam pro hlavní objekt, objekt vlastnost, název sloupce, vloží se nový záznam
                            if (!$dbh->prepare($querySelectCount)->execute($sloupec['Nazev'])->fetch_assoc()) {
                                $query = "INSERT INTO ~1 (~2, ~3, ~4, ~5, ~6, ~7) VALUES (:8, :9, :10, :11, :12, :13)";
                                //zobrazovat je nastaveno na 1, aby se obsah zobrazoval ve formuláři,
                                //valid je nastaveno na 0, aby se v objektu stránky použila defaultní hodnota titulku
                                $dbh->prepare($query)->execute(
                                        self::TABULKA,
                                        self::HLAVNI_OBJEKT, self::OBJEKT_VLASTNOST, self::NAZEV_SLOUPCE, self::TITULEK, self::ZOBRAZOVAT, self::VALID,
                                        $jmenoHlavnihoObjektu, $jmenoObjektuVlastnosti, $sloupec['Nazev'], NULL, 1, 0
                                        )->last_insert_id();

                            }
                        }
                    }
                }
            }
        }

    }
}
?>
