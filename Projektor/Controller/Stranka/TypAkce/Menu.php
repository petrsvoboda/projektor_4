 <?php
class Projektor_Controller_Stranka_TypAkce_Menu extends Projektor_Controller_Stranka_Menu
{
    const SABLONA = "menu.xhtml";
    const TRIDA_DATA_ITEM = "Projektor_Data_Auto_STypAkceItem";

    protected function vzdy()
    {
        /* Nadpis stranky */
        $this->novaPromenna("nadpis", "Typ akce - zobrazení a úprava vlastností");
        return parent::vzdy();
    }

    protected function generujTlacitkaMenu($typAkce)
    {
        $tlacitka = array
            (
                new Projektor_Controller_Stranka_Element_Tlacitko("Detail", $this->uzel->potomekUri("Projektor_Controller_Stranka_TypAkce_Detail", array("id" => $typakce->id, "zmraz" => 1))),
                new Projektor_Controller_Stranka_Element_Tlacitko("Upravit", $this->uzel->potomekUri("Projektor_Controller_Stranka_TypAkce_Detail", array("id" => $typakce->id))),
                new Projektor_Controller_Stranka_Element_Tlacitko("Smazat", $this->uzel->potomekUri("Projektor_Controller_Stranka_TypAkce_Detail", array("id" => $typakce->id, "smaz" => 1))),
                new Projektor_Controller_Stranka_Element_Tlacitko("Předpoklady", $this->uzel->potomekUri("Projektor_Controller_Stranka_Predpoklady_Detail", array("id_typ_akce" => $typakce->id))),
            );
        return $tlacitka;
    }
}
