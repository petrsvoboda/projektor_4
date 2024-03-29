<?php
/**
 * @author Petr Svoboda
 * @since Fri, 12 Oct 20011 19:01:55 +0200
 */

class Projektor_Data_Auto_SysUsersItem extends Projektor_Data_Item
{

//	public $id;
//
//        public $username;
//        public $name;
//        public $authtype;
//        public $povolen_zapis;
//
//        const ID = "id_sys_users";
//        const USERNAME = "username";
//        const NAME = "name";
//        const AUTHTYPE = "authtype";
////        const DEBUG = "debug";
//        const POVOLEN_ZAPIS = "povolen_zapis";

    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "sys_users";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°name";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku sys_users
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec id_sys_users. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec username. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°username;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec name. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°name;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec authtype. Vlatnosti sloupce: typ=varchar, delka=10, default=password
     */
    public $dbField°authtype;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec password. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°password;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec povolen_zapis. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°povolen_zapis;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_sml. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_sml;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_dot. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_dot;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_plan. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_plan;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_ukon. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_ukon;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_testpc. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_testpc;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_zam. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_zam;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_dopRK. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_dopRK;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_dopRKdoplneni1. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_dopRKdoplneni1;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_dopRKdoplneni2. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_dopRKdoplneni2;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_dopRKvyrazeni. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_dopRKvyrazeni;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_spzp_agp. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_spzp_agp;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_sml. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_sml;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_dot. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_dot;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_plan. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_plan;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_ukon. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_ukon;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_testpc. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_testpc;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_zam. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_zam;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_dopRK. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_dopRK;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_dopRKdoplneni1. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_dopRKdoplneni1;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_dopRKdoplneni2. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_dopRKdoplneni2;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_dopRKvyrazeni. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_dopRKvyrazeni;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_rnh_agp. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_rnh_agp;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_agp_sml. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_agp_sml;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_agp_souhlas. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_agp_souhlas;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_agp_dot. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_agp_dot;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_agp_plan. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_agp_plan;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_agp_ukon. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_agp_ukon;
    /**
     * Generovaná vlastnost pro tabulku sys_users a sloupec tl_agp_zam. Vlatnosti sloupce: typ=tinyint
     */
    public $dbField°tl_agp_zam;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°username);
        unset($this->dbField°name);
        unset($this->dbField°authtype);
        unset($this->dbField°password);
        unset($this->dbField°povolen_zapis);
        unset($this->dbField°tl_spzp_sml);
        unset($this->dbField°tl_spzp_dot);
        unset($this->dbField°tl_spzp_plan);
        unset($this->dbField°tl_spzp_ukon);
        unset($this->dbField°tl_spzp_testpc);
        unset($this->dbField°tl_spzp_zam);
        unset($this->dbField°tl_spzp_dopRK);
        unset($this->dbField°tl_spzp_dopRKdoplneni1);
        unset($this->dbField°tl_spzp_dopRKdoplneni2);
        unset($this->dbField°tl_spzp_dopRKvyrazeni);
        unset($this->dbField°tl_spzp_agp);
        unset($this->dbField°tl_rnh_sml);
        unset($this->dbField°tl_rnh_dot);
        unset($this->dbField°tl_rnh_plan);
        unset($this->dbField°tl_rnh_ukon);
        unset($this->dbField°tl_rnh_testpc);
        unset($this->dbField°tl_rnh_zam);
        unset($this->dbField°tl_rnh_dopRK);
        unset($this->dbField°tl_rnh_dopRKdoplneni1);
        unset($this->dbField°tl_rnh_dopRKdoplneni2);
        unset($this->dbField°tl_rnh_dopRKvyrazeni);
        unset($this->dbField°tl_rnh_agp);
        unset($this->dbField°tl_agp_sml);
        unset($this->dbField°tl_agp_souhlas);
        unset($this->dbField°tl_agp_dot);
        unset($this->dbField°tl_agp_plan);
        unset($this->dbField°tl_agp_ukon);
        unset($this->dbField°tl_agp_zam);
    }

###END_AUTOCODE

    public function najdiPodleJmena($jmeno)
    {
        $this->where("dbField°username", "=", $jmeno);
    }

}
?>