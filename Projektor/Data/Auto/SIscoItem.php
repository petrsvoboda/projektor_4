<?php
/**
 * @author Svoboda Petr
 */

class Projektor_Data_Auto_SIscoItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "s_isco";

    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°nazev";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku s_isco
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku s_isco a sloupec id_s_isco. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku s_isco a sloupec kod. Vlatnosti sloupce: typ=varchar, delka=5
     */
    public $dbField°kod;
    /**
     * Generovaná vlastnost pro tabulku s_isco a sloupec nazev. Vlatnosti sloupce: typ=varchar, delka=250
     */
    public $dbField°nazev;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°kod);
        unset($this->dbField°nazev);
    }

###END_AUTOCODE
}
?>
