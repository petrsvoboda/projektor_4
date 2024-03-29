<?php
class Projektor_Data_Auto_VzbUcastnikAkceItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "vzb_ucastnik_akce";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "Vazební tabulka";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku vzb_ucastnik_akce
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku vzb_ucastnik_akce a sloupec id_vzb_ucastnik_akce. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku vzb_ucastnik_akce a sloupec id_ucastnik_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky ucastnik a sloupce id_ucastnik
     */
    public $dbField°id_ucastnik_FK;
    /**
     * Generovaná vlastnost pro tabulku vzb_ucastnik_akce a sloupec id_akce_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky akce a sloupce id_akce
     */
    public $dbField°id_akce_FK;
    /**
     * Generovaná vlastnost pro tabulku vzb_ucastnik_akce a sloupec id_s_stav_ucastnik_akce_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_stav_ucastnik_akce a sloupce id_s_stav_ucastnik_akce
     */
    public $dbField°id_s_stav_ucastnik_akce_FK;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°id_ucastnik_FK);
        unset($this->dbField°id_akce_FK);
        unset($this->dbField°id_s_stav_ucastnik_akce_FK);
    }

###END_AUTOCODE

}
?>
