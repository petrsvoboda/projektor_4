<?php
/**
 * Description of ZaFlatTableItem
 *
 * @author pes2704
 */
class Projektor_Data_Auto_ZaUkoncFlatTableItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "za_ukonc_flat_table";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°id_zajemce";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku za_ukonc_flat_table
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec id_za_ukonc_flat_table. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec id_zajemce. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky zajemce a sloupce id_zajemce
     */
    public $dbField°id_zajemce;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec datum_ukonceni. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_ukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec duvod_ukonceni. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°duvod_ukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec popis_ukonceni. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°popis_ukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec vyhodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°vyhodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec mot_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°mot_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec mot_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°mot_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec pc1_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°pc1_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec pc1_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°pc1_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec pc2_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°pc2_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec pc2_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°pc2_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec bidi_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°bidi_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec bidi_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°bidi_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prdi_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°prdi_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prdi_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°prdi_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec praxe_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°praxe_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec praxe_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°praxe_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prof1_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°prof1_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prof1_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°prof1_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prof2_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°prof2_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prof2_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°prof2_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prof3_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°prof3_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec prof3_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°prof3_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec porad_znamka. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°porad_znamka;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec porad_hodnoceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°porad_hodnoceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec doporuceni. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°doporuceni;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec neni_podpis. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°neni_podpis;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec priloha. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°priloha;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec datum_vytvor_dok. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_vytvor_dok;
    /**
     * Generovaná vlastnost pro tabulku za_ukonc_flat_table a sloupec B1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°B1;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°id_zajemce);
        unset($this->dbField°datum_ukonceni);
        unset($this->dbField°dokonceno);
        unset($this->dbField°duvod_ukonceni);
        unset($this->dbField°popis_ukonceni);
        unset($this->dbField°datum_certif);
        unset($this->dbField°vyhodnoceni);
        unset($this->dbField°mot_znamka);
        unset($this->dbField°mot_hodnoceni);
        unset($this->dbField°pc1_znamka);
        unset($this->dbField°pc1_hodnoceni);
        unset($this->dbField°pc2_znamka);
        unset($this->dbField°pc2_hodnoceni);
        unset($this->dbField°bidi_znamka);
        unset($this->dbField°bidi_hodnoceni);
        unset($this->dbField°prdi_znamka);
        unset($this->dbField°prdi_hodnoceni);
        unset($this->dbField°praxe_znamka);
        unset($this->dbField°praxe_hodnoceni);
        unset($this->dbField°prof1_znamka);
        unset($this->dbField°prof1_hodnoceni);
        unset($this->dbField°prof2_znamka);
        unset($this->dbField°prof2_hodnoceni);
        unset($this->dbField°prof3_znamka);
        unset($this->dbField°prof3_hodnoceni);
        unset($this->dbField°porad_znamka);
        unset($this->dbField°porad_hodnoceni);
        unset($this->dbField°doporuceni);
        unset($this->dbField°neni_podpis);
        unset($this->dbField°priloha);
        unset($this->dbField°datum_vytvor_dok);
        unset($this->dbField°B1);
    }

###END_AUTOCODE}
}
?>
