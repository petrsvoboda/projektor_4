<?php
class Projektor_Data_Auto_SysAccUsrProjektItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "sys_acc_usr_projekt";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "Vazební tabulka";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku sys_acc_usr_projekt
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku sys_acc_usr_projekt a sloupec id_sys_acc_usr_projekt. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku sys_acc_usr_projekt a sloupec id_sys_users. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky sys_users a sloupce id_sys_users
     */
    public $dbField°id_sys_users;
    /**
     * Generovaná vlastnost pro tabulku sys_acc_usr_projekt a sloupec id_c_projekt. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky c_projekt a sloupce id_c_projekt
     */
    public $dbField°id_c_projekt;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°id_sys_users);
        unset($this->dbField°id_c_projekt);
    }

###END_AUTOCODE


}