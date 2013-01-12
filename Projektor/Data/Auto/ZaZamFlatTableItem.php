<?php
/**
 * Description of ZaFlatTableItem
 *
 * @author pes2704
 */
class Projektor_Data_Auto_ZaZamFlatTableItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "za_zam_flat_table";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°id_zajemce";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku za_zam_flat_table
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec id_za_zam_flat_table. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec id_zajemce. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky zajemce a sloupce id_zajemce
     */
    public $dbField°id_zajemce;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_identifikator. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°zam_identifikator;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_nove_misto. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_nove_misto;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_forma. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zam_forma;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_datum_vstupu. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_datum_vstupu;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_nazev. Vlatnosti sloupce: typ=varchar, delka=255
     */
    public $dbField°zam_nazev;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_mesto. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zam_mesto;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_ulice. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zam_ulice;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_psc. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_psc;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_ic. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_ic;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_navazujici_datum_vstupu. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_navazujici_datum_vstupu;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_navazujici_nazev. Vlatnosti sloupce: typ=varchar, delka=255
     */
    public $dbField°zam_navazujici_nazev;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_navazujici_mesto. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zam_navazujici_mesto;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_navazujici_ulice. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zam_navazujici_ulice;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_navazujici_psc. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_navazujici_psc;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec zam_navazujici_ic. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zam_navazujici_ic;
    /**
     * Generovaná vlastnost pro tabulku za_zam_flat_table a sloupec B1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°B1;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°id_zajemce);
        unset($this->dbField°zam_identifikator);
        unset($this->dbField°zam_nove_misto);
        unset($this->dbField°zam_forma);
        unset($this->dbField°zam_datum_vstupu);
        unset($this->dbField°zam_nazev);
        unset($this->dbField°zam_mesto);
        unset($this->dbField°zam_ulice);
        unset($this->dbField°zam_psc);
        unset($this->dbField°zam_ic);
        unset($this->dbField°zam_navazujici_datum_vstupu);
        unset($this->dbField°zam_navazujici_nazev);
        unset($this->dbField°zam_navazujici_mesto);
        unset($this->dbField°zam_navazujici_ulice);
        unset($this->dbField°zam_navazujici_psc);
        unset($this->dbField°zam_navazujici_ic);
        unset($this->dbField°B1);
    }

###END_AUTOCODE}
}
?>
