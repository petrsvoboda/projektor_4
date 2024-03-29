<?php
/**
 * Description of ZaFlatTableItem
 *
 * @author pes2704
 */
class Projektor_Data_Auto_ZaPlanFlatTableItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "za_plan_flat_table";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°id_zajemce";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku za_plan_flat_table
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_za_plan_flat_table. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_zajemce. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky zajemce a sloupce id_zajemce
     */
    public $dbField°id_zajemce;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_zztp_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_zztp_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec zztp_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°zztp_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec zztp_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°zztp_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec zztp_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°zztp_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec zztp_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zztp_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec zztp_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°zztp_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_kom_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_kom_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec kom_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°kom_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec kom_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°kom_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec kom_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°kom_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec kom_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°kom_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec kom_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°kom_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec mot_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°mot_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_pc1_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_pc1_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc1_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°pc1_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc1_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°pc1_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc1_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°pc1_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc1_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pc1_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc1_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°pc1_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc1_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pc1_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_pc2_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_pc2_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc2_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°pc2_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc2_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°pc2_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc2_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°pc2_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc2_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pc2_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc2_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°pc2_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec pc2_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pc2_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_bidi_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_bidi_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec bidi_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°bidi_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec bidi_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°bidi_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec bidi_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°bidi_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec bidi_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°bidi_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec bidi_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°bidi_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec bidi_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°bidi_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_praxe_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_praxe_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec praxe_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°praxe_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec praxe_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°praxe_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec praxe_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°praxe_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec praxe_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°praxe_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec praxe_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°praxe_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec praxe_datum_ukonceni. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°praxe_datum_ukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_prof1_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_prof1_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof1_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof1_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof1_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°prof1_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof1_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof1_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof1_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prof1_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof1_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof1_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof1_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prof1_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_prof2_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_prof2_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof2_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof2_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof2_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°prof2_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof2_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof2_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof2_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prof2_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof2_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof2_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof2_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prof2_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_prof3_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_prof3_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof3_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof3_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof3_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°prof3_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof3_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof3_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof3_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prof3_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof3_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prof3_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prof3_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prof3_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec id_s_kurz_prdi_FK. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky s_kurz a sloupce id_s_kurz
     */
    public $dbField°id_s_kurz_prdi_FK;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prdi_text. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prdi_text;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prdi_poc_abs_hodin. Vlatnosti sloupce: typ=varchar, delka=10
     */
    public $dbField°prdi_poc_abs_hodin;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prdi_duvod_absence. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prdi_duvod_absence;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prdi_dokonceno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prdi_dokonceno;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prdi_duvod_neukonceni. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°prdi_duvod_neukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec prdi_datum_certif. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prdi_datum_certif;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec datum_vytvor_dok. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_vytvor_dok;
    /**
     * Generovaná vlastnost pro tabulku za_plan_flat_table a sloupec B1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°B1;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°id_zajemce);
        unset($this->dbField°id_s_kurz_zztp_FK);
        unset($this->dbField°zztp_text);
        unset($this->dbField°zztp_poc_abs_hodin);
        unset($this->dbField°zztp_duvod_absence);
        unset($this->dbField°zztp_dokonceno);
        unset($this->dbField°zztp_duvod_neukonceni);
        unset($this->dbField°id_s_kurz_kom_FK);
        unset($this->dbField°kom_text);
        unset($this->dbField°kom_poc_abs_hodin);
        unset($this->dbField°kom_duvod_absence);
        unset($this->dbField°kom_dokonceno);
        unset($this->dbField°kom_duvod_neukonceni);
        unset($this->dbField°mot_datum_certif);
        unset($this->dbField°id_s_kurz_pc1_FK);
        unset($this->dbField°pc1_text);
        unset($this->dbField°pc1_poc_abs_hodin);
        unset($this->dbField°pc1_duvod_absence);
        unset($this->dbField°pc1_dokonceno);
        unset($this->dbField°pc1_duvod_neukonceni);
        unset($this->dbField°pc1_datum_certif);
        unset($this->dbField°id_s_kurz_pc2_FK);
        unset($this->dbField°pc2_text);
        unset($this->dbField°pc2_poc_abs_hodin);
        unset($this->dbField°pc2_duvod_absence);
        unset($this->dbField°pc2_dokonceno);
        unset($this->dbField°pc2_duvod_neukonceni);
        unset($this->dbField°pc2_datum_certif);
        unset($this->dbField°id_s_kurz_bidi_FK);
        unset($this->dbField°bidi_text);
        unset($this->dbField°bidi_poc_abs_hodin);
        unset($this->dbField°bidi_duvod_absence);
        unset($this->dbField°bidi_dokonceno);
        unset($this->dbField°bidi_duvod_neukonceni);
        unset($this->dbField°bidi_datum_certif);
        unset($this->dbField°id_s_kurz_praxe_FK);
        unset($this->dbField°praxe_text);
        unset($this->dbField°praxe_poc_abs_hodin);
        unset($this->dbField°praxe_duvod_absence);
        unset($this->dbField°praxe_dokonceno);
        unset($this->dbField°praxe_duvod_neukonceni);
        unset($this->dbField°praxe_datum_ukonceni);
        unset($this->dbField°id_s_kurz_prof1_FK);
        unset($this->dbField°prof1_text);
        unset($this->dbField°prof1_poc_abs_hodin);
        unset($this->dbField°prof1_duvod_absence);
        unset($this->dbField°prof1_dokonceno);
        unset($this->dbField°prof1_duvod_neukonceni);
        unset($this->dbField°prof1_datum_certif);
        unset($this->dbField°id_s_kurz_prof2_FK);
        unset($this->dbField°prof2_text);
        unset($this->dbField°prof2_poc_abs_hodin);
        unset($this->dbField°prof2_duvod_absence);
        unset($this->dbField°prof2_dokonceno);
        unset($this->dbField°prof2_duvod_neukonceni);
        unset($this->dbField°prof2_datum_certif);
        unset($this->dbField°id_s_kurz_prof3_FK);
        unset($this->dbField°prof3_text);
        unset($this->dbField°prof3_poc_abs_hodin);
        unset($this->dbField°prof3_duvod_absence);
        unset($this->dbField°prof3_dokonceno);
        unset($this->dbField°prof3_duvod_neukonceni);
        unset($this->dbField°prof3_datum_certif);
        unset($this->dbField°id_s_kurz_prdi_FK);
        unset($this->dbField°prdi_text);
        unset($this->dbField°prdi_poc_abs_hodin);
        unset($this->dbField°prdi_duvod_absence);
        unset($this->dbField°prdi_dokonceno);
        unset($this->dbField°prdi_duvod_neukonceni);
        unset($this->dbField°prdi_datum_certif);
        unset($this->dbField°datum_vytvor_dok);
        unset($this->dbField°B1);
    }

###END_AUTOCODE}
}
?>
