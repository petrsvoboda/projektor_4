<?php
class Projektor_Data_Auto_SAkcePredpokladItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "s_akce_predpoklad";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°text";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku s_akce_predpoklad
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec id_s_akce_predpoklady. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec text. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°text;
    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec full_text. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°full_text;
    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec id_s_typ_akce_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_typ_akce a sloupce id_s_typ_akce
     */
    public $dbField°id_s_typ_akce_FK;
    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec id_s_typ_akce_pred_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_typ_akce a sloupce id_s_typ_akce
     */
    public $dbField°id_s_typ_akce_pred_FK;
    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec id_s_stav_ucastnik_akce_pred_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_stav_ucastnik_akce a sloupce id_s_stav_ucastnik_akce
     */
    public $dbField°id_s_stav_ucastnik_akce_pred_FK;
    /**
     * Generovaná vlastnost pro tabulku s_akce_predpoklad a sloupec valid. Vlatnosti sloupce: typ=tinyint, default=1
     */
    public $dbField°valid;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°text);
        unset($this->dbField°full_text);
        unset($this->dbField°id_s_typ_akce_FK);
        unset($this->dbField°id_s_typ_akce_pred_FK);
        unset($this->dbField°id_s_stav_ucastnik_akce_pred_FK);
        unset($this->dbField°valid);
    }

###END_AUTOCODE
}
?>
