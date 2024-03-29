<?php
/**
 * Description of SPrezentaceItem
 *
 * @author pes2704
 */
class Projektor_Data_Auto_SPrezentaceItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "s_prezentace";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "Ještě nevím";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku s_prezentace
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec id_s_prezentace. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec hlavni_objekt. Vlatnosti sloupce: typ=varchar, delka=255
     */
    public $dbField°hlavni_objekt;
    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec objekt_vlastnost. Vlatnosti sloupce: typ=varchar, delka=255
     */
    public $dbField°objekt_vlastnost;
    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec nazev_sloupce. Vlatnosti sloupce: typ=varchar, delka=255
     */
    public $dbField°nazev_sloupce;
    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec titulek. Vlatnosti sloupce: typ=varchar, delka=255
     */
    public $dbField°titulek;
    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec zobrazovat. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°zobrazovat;
    /**
     * Generovaná vlastnost pro tabulku s_prezentace a sloupec valid. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°valid;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°hlavni_objekt);
        unset($this->dbField°objekt_vlastnost);
        unset($this->dbField°nazev_sloupce);
        unset($this->dbField°titulek);
        unset($this->dbField°zobrazovat);
        unset($this->dbField°valid);
    }

###END_AUTOCODE
}

?>
