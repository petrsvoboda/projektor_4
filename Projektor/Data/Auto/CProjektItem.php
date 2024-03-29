<?php
/**
 * Description of CKancelarItem
 *
 * @author pes2704
 */
class Projektor_Data_Auto_CProjektItem extends Projektor_Data_CiselnikItem
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "c_projekt";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku c_projekt
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku c_projekt a sloupec id_c_projekt. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku c_projekt a sloupec razeni. Vlatnosti sloupce: typ=int
     */
    public $dbField°razeni;
    /**
     * Generovaná vlastnost pro tabulku c_projekt a sloupec kod. Vlatnosti sloupce: typ=varchar, delka=20, default=""
     */
    public $dbField°kod;
    /**
     * Generovaná vlastnost pro tabulku c_projekt a sloupec text. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°text;
    /**
     * Generovaná vlastnost pro tabulku c_projekt a sloupec plny_text. Vlatnosti sloupce: typ=varchar, delka=500
     */
    public $dbField°plny_text;
    /**
     * Generovaná vlastnost pro tabulku c_projekt a sloupec valid. Vlatnosti sloupce: typ=tinyint, default=1
     */
    public $dbField°valid;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°razeni);
        unset($this->dbField°kod);
        unset($this->dbField°text);
        unset($this->dbField°plny_text);
        unset($this->dbField°valid);
    }

###END_AUTOCODE


}

?>
