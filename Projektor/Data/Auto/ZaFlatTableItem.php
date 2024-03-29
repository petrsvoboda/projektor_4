<?php
/**
 * Description of ZaFlatTableItem
 *
 * @author pes2704
 */
class Projektor_Data_Auto_ZaFlatTableItem extends Projektor_Data_Item
{
    const DATABAZE = Projektor_App_Config::DATABAZE_PROJEKTOR;
    const TABULKA = "za_flat_table";
    const NAZEV_ZOBRAZOVANE_VLASTNOSTI = "dbField°id_zajemce";

###START_AUTOCODE
    // Nový kód pro databázi Projektor a tabulku za_flat_table
    // Kód obsahuje definice všech vlastností odpovídajících názvům sloupců v db tabulce. Názvy vlastností jsou vytvořeny s prefixem dbField°
    // následovaným názvem sloupce db tabulky a jsou deklarovány jako public, to zajistí fungování autokompletace (napovídání) v editoru.
    // Vlastnost odpovídající primárnímu klíči tabulky takto vytvořena není, místo ní je vytvořena vlastnost se jménem id.
    // S touto vlastností aplikace pacuje odlišně, předpokládá se, že primární klíč tabulky je vždy autoincrement.
    // Dále kód obsahuje definici konstruktoru, ve které se všechny proměnné pro automaticky generované vlastnosti zruší - unset.
    // To zajistí, že i pro tyto vlastnosti jsou volány magické metody __set a __get, ale pozor, jen poprvé. Obecně v php platí, že pokud je public
    // proměnná nastavená, vložení hodnoty do takové proměnné již přímo vloží hodnotu (pro viditelné proměnné se nevolají magické metody).

    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec id_za_flat_table. Vlatnosti sloupce: typ=int, sloupec je primární klíč a je auto_increment
     * je vygenerována public vlastnost se jménem $id
     */
    public $id;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec id_zajemce. Vlatnosti sloupce: typ=int
     * , sloupec je cizí klíč z tabulky zajemce a sloupce id_zajemce
     */
    public $dbField°id_zajemce;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec datum_reg. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_reg;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec titul. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°titul;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec titul_za. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°titul_za;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec jmeno. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°jmeno;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec prijmeni. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°prijmeni;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pohlavi. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pohlavi;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec datum_narozeni. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_narozeni;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rodne_cislo. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rodne_cislo;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec z_up. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°z_up;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec prac_up. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°prac_up;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec stav. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°stav;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zam_osvc_neaktivni. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°zam_osvc_neaktivni;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec datum_poradenstvi_zacatek. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_poradenstvi_zacatek;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec mesto. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°mesto;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ulice. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°ulice;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec psc. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°psc;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pevny_telefon. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pevny_telefon;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec mesto2. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°mesto2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ulice2. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°ulice2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec psc2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°psc2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pevny_telefon2. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°pevny_telefon2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec mobilni_telefon. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°mobilni_telefon;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_telefon. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dalsi_telefon;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_telefon. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°popis_telefon;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec mail. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°mail;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoly1. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoly1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec obor1. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°obor1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni_studia1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni_studia1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec vzdelani1. Vlatnosti sloupce: typ=varchar, delka=60
     */
    public $dbField°vzdelani1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zaverecna_zkouska1. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°zaverecna_zkouska1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis1. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°popis1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoly2. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoly2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec obor2. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°obor2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni_studia2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni_studia2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec vzdelani2. Vlatnosti sloupce: typ=varchar, delka=60
     */
    public $dbField°vzdelani2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zaverecna_zkouska2. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°zaverecna_zkouska2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis2. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°popis2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoly3. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoly3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec obor3. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°obor3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni_studia3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni_studia3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec vzdelani3. Vlatnosti sloupce: typ=varchar, delka=60
     */
    public $dbField°vzdelani3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zaverecna_zkouska3. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°zaverecna_zkouska3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis3. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°popis3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoly4. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoly4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec obor4. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°obor4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni_studia4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni_studia4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec vzdelani4. Vlatnosti sloupce: typ=varchar, delka=60
     */
    public $dbField°vzdelani4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zaverecna_zkouska4. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°zaverecna_zkouska4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis4. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°popis4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoly5. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoly5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec obor5. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°obor5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni_studia5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni_studia5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec vzdelani5. Vlatnosti sloupce: typ=varchar, delka=60
     */
    public $dbField°vzdelani5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zaverecna_zkouska5. Vlatnosti sloupce: typ=varchar, delka=40
     */
    public $dbField°zaverecna_zkouska5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis5. Vlatnosti sloupce: typ=varchar, delka=120
     */
    public $dbField°popis5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoleni1. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoleni1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_skoleni1. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_skoleni1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec doba_skoleni1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°doba_skoleni1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_dokladu1. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_dokladu1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec hrazeno1. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°hrazeno1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno_skoleni1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno_skoleni1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoleni2. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoleni2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_skoleni2. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_skoleni2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec doba_skoleni2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°doba_skoleni2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_dokladu2. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_dokladu2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec hrazeno2. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°hrazeno2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno_skoleni2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno_skoleni2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoleni3. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoleni3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_skoleni3. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_skoleni3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec doba_skoleni3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°doba_skoleni3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_dokladu3. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_dokladu3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec hrazeno3. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°hrazeno3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno_skoleni3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno_skoleni3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoleni4. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoleni4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_skoleni4. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_skoleni4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec doba_skoleni4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°doba_skoleni4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_dokladu4. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_dokladu4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec hrazeno4. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°hrazeno4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno_skoleni4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno_skoleni4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nazev_skoleni5. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°nazev_skoleni5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_skoleni5. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_skoleni5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rok_ukonceni5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rok_ukonceni5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec doba_skoleni5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°doba_skoleni5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec popis_dokladu5. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°popis_dokladu5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec hrazeno5. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°hrazeno5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dolozeno_skoleni5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dolozeno_skoleni5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec specializace_v_praxi. Vlatnosti sloupce: typ=varchar, delka=360
     */
    public $dbField°specializace_v_praxi;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec aj_uroven. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°aj_uroven;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec aj_schopnosti. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°aj_schopnosti;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nj_uroven. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°nj_uroven;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec nj_schopnosti. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°nj_schopnosti;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rj_uroven. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°rj_uroven;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec rj_schopnosti. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°rj_schopnosti;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_jazyk1_jmeno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dalsi_jazyk1_jmeno;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_jazyk1_jmeno_uroven. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dalsi_jazyk1_jmeno_uroven;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_jazyk1_schopnosti. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°dalsi_jazyk1_schopnosti;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_jazyk2_jmeno. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dalsi_jazyk2_jmeno;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_jazyk2_jmeno_uroven. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°dalsi_jazyk2_jmeno_uroven;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec dalsi_jazyk2_schopnosti. Vlatnosti sloupce: typ=varchar, delka=30
     */
    public $dbField°dalsi_jazyk2_schopnosti;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pc_office_uroven. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pc_office_uroven;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_ERP. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°PC_ERP;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_ERP_nazev. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°PC_ERP_nazev;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_CAD. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°PC_CAD;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_CAD_nazev. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°PC_CAD_nazev;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_GRA. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°PC_GRA;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_GRA_nazev. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°PC_GRA_nazev;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_IT. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°PC_IT;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec PC_popis. Vlatnosti sloupce: typ=varchar, delka=360
     */
    public $dbField°PC_popis;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_sk1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_sk1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_sk2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_sk2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_sk3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_sk3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_sk4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_sk4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_rok1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_rok1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_rok2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_rok2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_rok3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_rok3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ridic_rok4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ridic_rok4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_od1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_od1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_do1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_do1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_zamestnavatel1. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_zamestnavatel1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_pozice1. Vlatnosti sloupce: typ=varchar, delka=70
     */
    public $dbField°zamestnani_pozice1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_popis1. Vlatnosti sloupce: typ=varchar, delka=230
     */
    public $dbField°zamestnani_popis1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec kzam. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°kzam;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec KZAM_cislo1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°KZAM_cislo1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_od2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_od2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_do2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_do2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_zamestnavatel2. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_zamestnavatel2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_pozice2. Vlatnosti sloupce: typ=varchar, delka=70
     */
    public $dbField°zamestnani_pozice2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_popis2. Vlatnosti sloupce: typ=varchar, delka=230
     */
    public $dbField°zamestnani_popis2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec KZAM_cislo2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°KZAM_cislo2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_od3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_od3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_do3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_do3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_zamestnavatel3. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_zamestnavatel3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_pozice3. Vlatnosti sloupce: typ=varchar, delka=70
     */
    public $dbField°zamestnani_pozice3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_popis3. Vlatnosti sloupce: typ=varchar, delka=230
     */
    public $dbField°zamestnani_popis3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec KZAM_cislo3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°KZAM_cislo3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_od4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_od4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_do4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_do4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_zamestnavatel4. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_zamestnavatel4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_pozice4. Vlatnosti sloupce: typ=varchar, delka=70
     */
    public $dbField°zamestnani_pozice4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_popis4. Vlatnosti sloupce: typ=varchar, delka=230
     */
    public $dbField°zamestnani_popis4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec KZAM_cislo4. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°KZAM_cislo4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_od5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_od5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_do5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°zamestnani_do5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_zamestnavatel5. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_zamestnavatel5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_pozice5. Vlatnosti sloupce: typ=varchar, delka=70
     */
    public $dbField°zamestnani_pozice5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_popis5. Vlatnosti sloupce: typ=varchar, delka=230
     */
    public $dbField°zamestnani_popis5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec KZAM_cislo5. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°KZAM_cislo5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_konec_posledniho. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_konec_posledniho;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zamestnani_zpukonceni. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zamestnani_zpukonceni;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_povolani. Vlatnosti sloupce: typ=varchar, delka=90
     */
    public $dbField°pozadavky_povolani;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_KZAM1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pozadavky_KZAM1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_KZAM2. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pozadavky_KZAM2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_KZAM3. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pozadavky_KZAM3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda1. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda2. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda3. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda4. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda5. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda6. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda6;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda7. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda7;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda8. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda8;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda9. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda9;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda10. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda10;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda11. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda11;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda12. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda12;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_hleda13. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_hleda13;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita1. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita1;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita2. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita2;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita3. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita3;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita4. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita4;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita5. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita5;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita6. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita6;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita7. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita7;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita8. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita8;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita9. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita9;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita10. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita10;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita11. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita11;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita12. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita12;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_odmita13. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pozadavky_odmita13;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_nastup. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pozadavky_nastup;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_plat. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pozadavky_plat;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pozadavky_prace. Vlatnosti sloupce: typ=varchar, delka=300
     */
    public $dbField°pozadavky_prace;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pece_o_zav_osoby. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°pece_o_zav_osoby;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zdrav_stav. Vlatnosti sloupce: typ=varchar, delka=200
     */
    public $dbField°zdrav_stav;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec ZPS. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°ZPS;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec zdravotni_znevyhodneni. Vlatnosti sloupce: typ=varchar, delka=50
     */
    public $dbField°zdravotni_znevyhodneni;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec doba_evidence. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°doba_evidence;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec kolikrat_ev. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°kolikrat_ev;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec prostredky_p_p. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°prostredky_p_p;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec pp_v_hotovosti. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°pp_v_hotovosti;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec predcisli. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°predcisli;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec cislo. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°cislo;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec banka. Vlatnosti sloupce: typ=varchar, delka=80
     */
    public $dbField°banka;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec datum_vytvor_smlouvy. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_vytvor_smlouvy;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec datum_vytvor_dotazniku. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°datum_vytvor_dotazniku;
    /**
     * Generovaná vlastnost pro tabulku za_flat_table a sloupec B1. Vlatnosti sloupce: typ=varchar, delka=20
     */
    public $dbField°B1;

    public function reset()
    {
        unset($this->id);
        unset($this->dbField°id_zajemce);
        unset($this->dbField°datum_reg);
        unset($this->dbField°titul);
        unset($this->dbField°titul_za);
        unset($this->dbField°jmeno);
        unset($this->dbField°prijmeni);
        unset($this->dbField°pohlavi);
        unset($this->dbField°datum_narozeni);
        unset($this->dbField°rodne_cislo);
        unset($this->dbField°z_up);
        unset($this->dbField°prac_up);
        unset($this->dbField°stav);
        unset($this->dbField°zam_osvc_neaktivni);
        unset($this->dbField°datum_poradenstvi_zacatek);
        unset($this->dbField°mesto);
        unset($this->dbField°ulice);
        unset($this->dbField°psc);
        unset($this->dbField°pevny_telefon);
        unset($this->dbField°mesto2);
        unset($this->dbField°ulice2);
        unset($this->dbField°psc2);
        unset($this->dbField°pevny_telefon2);
        unset($this->dbField°mobilni_telefon);
        unset($this->dbField°dalsi_telefon);
        unset($this->dbField°popis_telefon);
        unset($this->dbField°mail);
        unset($this->dbField°nazev_skoly1);
        unset($this->dbField°obor1);
        unset($this->dbField°rok_ukonceni_studia1);
        unset($this->dbField°vzdelani1);
        unset($this->dbField°zaverecna_zkouska1);
        unset($this->dbField°popis1);
        unset($this->dbField°dolozeno1);
        unset($this->dbField°nazev_skoly2);
        unset($this->dbField°obor2);
        unset($this->dbField°rok_ukonceni_studia2);
        unset($this->dbField°vzdelani2);
        unset($this->dbField°zaverecna_zkouska2);
        unset($this->dbField°popis2);
        unset($this->dbField°dolozeno2);
        unset($this->dbField°nazev_skoly3);
        unset($this->dbField°obor3);
        unset($this->dbField°rok_ukonceni_studia3);
        unset($this->dbField°vzdelani3);
        unset($this->dbField°zaverecna_zkouska3);
        unset($this->dbField°popis3);
        unset($this->dbField°dolozeno3);
        unset($this->dbField°nazev_skoly4);
        unset($this->dbField°obor4);
        unset($this->dbField°rok_ukonceni_studia4);
        unset($this->dbField°vzdelani4);
        unset($this->dbField°zaverecna_zkouska4);
        unset($this->dbField°popis4);
        unset($this->dbField°dolozeno4);
        unset($this->dbField°nazev_skoly5);
        unset($this->dbField°obor5);
        unset($this->dbField°rok_ukonceni_studia5);
        unset($this->dbField°vzdelani5);
        unset($this->dbField°zaverecna_zkouska5);
        unset($this->dbField°popis5);
        unset($this->dbField°dolozeno5);
        unset($this->dbField°nazev_skoleni1);
        unset($this->dbField°popis_skoleni1);
        unset($this->dbField°rok_ukonceni1);
        unset($this->dbField°doba_skoleni1);
        unset($this->dbField°popis_dokladu1);
        unset($this->dbField°hrazeno1);
        unset($this->dbField°dolozeno_skoleni1);
        unset($this->dbField°nazev_skoleni2);
        unset($this->dbField°popis_skoleni2);
        unset($this->dbField°rok_ukonceni2);
        unset($this->dbField°doba_skoleni2);
        unset($this->dbField°popis_dokladu2);
        unset($this->dbField°hrazeno2);
        unset($this->dbField°dolozeno_skoleni2);
        unset($this->dbField°nazev_skoleni3);
        unset($this->dbField°popis_skoleni3);
        unset($this->dbField°rok_ukonceni3);
        unset($this->dbField°doba_skoleni3);
        unset($this->dbField°popis_dokladu3);
        unset($this->dbField°hrazeno3);
        unset($this->dbField°dolozeno_skoleni3);
        unset($this->dbField°nazev_skoleni4);
        unset($this->dbField°popis_skoleni4);
        unset($this->dbField°rok_ukonceni4);
        unset($this->dbField°doba_skoleni4);
        unset($this->dbField°popis_dokladu4);
        unset($this->dbField°hrazeno4);
        unset($this->dbField°dolozeno_skoleni4);
        unset($this->dbField°nazev_skoleni5);
        unset($this->dbField°popis_skoleni5);
        unset($this->dbField°rok_ukonceni5);
        unset($this->dbField°doba_skoleni5);
        unset($this->dbField°popis_dokladu5);
        unset($this->dbField°hrazeno5);
        unset($this->dbField°dolozeno_skoleni5);
        unset($this->dbField°specializace_v_praxi);
        unset($this->dbField°aj_uroven);
        unset($this->dbField°aj_schopnosti);
        unset($this->dbField°nj_uroven);
        unset($this->dbField°nj_schopnosti);
        unset($this->dbField°rj_uroven);
        unset($this->dbField°rj_schopnosti);
        unset($this->dbField°dalsi_jazyk1_jmeno);
        unset($this->dbField°dalsi_jazyk1_jmeno_uroven);
        unset($this->dbField°dalsi_jazyk1_schopnosti);
        unset($this->dbField°dalsi_jazyk2_jmeno);
        unset($this->dbField°dalsi_jazyk2_jmeno_uroven);
        unset($this->dbField°dalsi_jazyk2_schopnosti);
        unset($this->dbField°pc_office_uroven);
        unset($this->dbField°PC_ERP);
        unset($this->dbField°PC_ERP_nazev);
        unset($this->dbField°PC_CAD);
        unset($this->dbField°PC_CAD_nazev);
        unset($this->dbField°PC_GRA);
        unset($this->dbField°PC_GRA_nazev);
        unset($this->dbField°PC_IT);
        unset($this->dbField°PC_popis);
        unset($this->dbField°ridic_sk1);
        unset($this->dbField°ridic_sk2);
        unset($this->dbField°ridic_sk3);
        unset($this->dbField°ridic_sk4);
        unset($this->dbField°ridic_rok1);
        unset($this->dbField°ridic_rok2);
        unset($this->dbField°ridic_rok3);
        unset($this->dbField°ridic_rok4);
        unset($this->dbField°zamestnani_od1);
        unset($this->dbField°zamestnani_do1);
        unset($this->dbField°zamestnani_zamestnavatel1);
        unset($this->dbField°zamestnani_pozice1);
        unset($this->dbField°zamestnani_popis1);
        unset($this->dbField°kzam);
        unset($this->dbField°KZAM_cislo1);
        unset($this->dbField°zamestnani_od2);
        unset($this->dbField°zamestnani_do2);
        unset($this->dbField°zamestnani_zamestnavatel2);
        unset($this->dbField°zamestnani_pozice2);
        unset($this->dbField°zamestnani_popis2);
        unset($this->dbField°KZAM_cislo2);
        unset($this->dbField°zamestnani_od3);
        unset($this->dbField°zamestnani_do3);
        unset($this->dbField°zamestnani_zamestnavatel3);
        unset($this->dbField°zamestnani_pozice3);
        unset($this->dbField°zamestnani_popis3);
        unset($this->dbField°KZAM_cislo3);
        unset($this->dbField°zamestnani_od4);
        unset($this->dbField°zamestnani_do4);
        unset($this->dbField°zamestnani_zamestnavatel4);
        unset($this->dbField°zamestnani_pozice4);
        unset($this->dbField°zamestnani_popis4);
        unset($this->dbField°KZAM_cislo4);
        unset($this->dbField°zamestnani_od5);
        unset($this->dbField°zamestnani_do5);
        unset($this->dbField°zamestnani_zamestnavatel5);
        unset($this->dbField°zamestnani_pozice5);
        unset($this->dbField°zamestnani_popis5);
        unset($this->dbField°KZAM_cislo5);
        unset($this->dbField°zamestnani_konec_posledniho);
        unset($this->dbField°zamestnani_zpukonceni);
        unset($this->dbField°pozadavky_povolani);
        unset($this->dbField°pozadavky_KZAM1);
        unset($this->dbField°pozadavky_KZAM2);
        unset($this->dbField°pozadavky_KZAM3);
        unset($this->dbField°pozadavky_hleda1);
        unset($this->dbField°pozadavky_hleda2);
        unset($this->dbField°pozadavky_hleda3);
        unset($this->dbField°pozadavky_hleda4);
        unset($this->dbField°pozadavky_hleda5);
        unset($this->dbField°pozadavky_hleda6);
        unset($this->dbField°pozadavky_hleda7);
        unset($this->dbField°pozadavky_hleda8);
        unset($this->dbField°pozadavky_hleda9);
        unset($this->dbField°pozadavky_hleda10);
        unset($this->dbField°pozadavky_hleda11);
        unset($this->dbField°pozadavky_hleda12);
        unset($this->dbField°pozadavky_hleda13);
        unset($this->dbField°pozadavky_odmita1);
        unset($this->dbField°pozadavky_odmita2);
        unset($this->dbField°pozadavky_odmita3);
        unset($this->dbField°pozadavky_odmita4);
        unset($this->dbField°pozadavky_odmita5);
        unset($this->dbField°pozadavky_odmita6);
        unset($this->dbField°pozadavky_odmita7);
        unset($this->dbField°pozadavky_odmita8);
        unset($this->dbField°pozadavky_odmita9);
        unset($this->dbField°pozadavky_odmita10);
        unset($this->dbField°pozadavky_odmita11);
        unset($this->dbField°pozadavky_odmita12);
        unset($this->dbField°pozadavky_odmita13);
        unset($this->dbField°pozadavky_nastup);
        unset($this->dbField°pozadavky_plat);
        unset($this->dbField°pozadavky_prace);
        unset($this->dbField°pece_o_zav_osoby);
        unset($this->dbField°zdrav_stav);
        unset($this->dbField°ZPS);
        unset($this->dbField°zdravotni_znevyhodneni);
        unset($this->dbField°doba_evidence);
        unset($this->dbField°kolikrat_ev);
        unset($this->dbField°prostredky_p_p);
        unset($this->dbField°pp_v_hotovosti);
        unset($this->dbField°predcisli);
        unset($this->dbField°cislo);
        unset($this->dbField°banka);
        unset($this->dbField°datum_vytvor_smlouvy);
        unset($this->dbField°datum_vytvor_dotazniku);
        unset($this->dbField°B1);
    }

###END_AUTOCODE}
}
?>
