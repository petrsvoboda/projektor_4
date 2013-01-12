<?php
class Projektor_Controller_Stranka_Index extends Projektor_Controller_Stranka_Base
{
    const SABLONA = "index.xhtml";

	protected function vychozi()
	{
            /* Vygenerovani filtrovaciho formulare */
            $this->novaPromenna("formular", $this->kontextSelect());
	}
        protected function vzdy()
	{
            $kontextUser = Projektor_App_Kontext::getUserKontext();
            $this->novaPromenna("con",  "Přihlášen uživatel ".$kontextUser->user->username.", což je ".$kontextUser->user->name.".");
            $this->novaPromenna("nadpis", "Index");
            $this->novaPromenna("debuguj", $this->uzel->formActionUri()."&debug=".(Projektor_App_Kontext::getDebug() ? "0" : "1"));
            $this->novaPromenna("debugujtext", ($this->uzel->parametry["debugpovolen"] ? "UKONČI DEBUGOVÁNÍ" : "DEBUGUJ"));

            $this->novaPromenna("nadpis", "Výběr projektu, běhu a kanceláře");

            $kontextUser = Projektor_App_Kontext::getUserKontext();

            /* Ovladaci tlacitka stranky */
            if ($kontextUser->projekt->kod == "SPZP" OR $kontextUser->projekt->kod == "RNH")
            {
                $tlacitka = array
                (
                    new Projektor_Controller_Stranka_Element_Tlacitko("Zavři všechny stránky", "index.php"),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Akce", $this->uzel->potomekUri("Projektor_Controller_Stranka_Akce_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Účastníci", $this->uzel->potomekUri("Projektor_Controller_Stranka_Ucastnik_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Typy akce", $this->uzel->potomekUri("Projektor_Controller_Stranka_TypAkce_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Předpoklady", $this->uzel->potomekUri("Projektor_Controller_Stranka_Predpoklad_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Prezentace", $this->uzel->potomekUri("Projektor_Controller_Stranka_Prezentace_Seznam")),
                );
                $this->novaPromenna("tlacitka", $tlacitka);
            };
            if ($kontextUser->projekt->kod == "AGP")
            {
                $tlacitka = array
                (
                    new Projektor_Controller_Stranka_Element_Tlacitko("Zavři všechny stránky", "index.php"),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Akce", $this->uzel->potomekUri("Projektor_Controller_Stranka_Akce_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Zájemci", $this->uzel->potomekUri("Projektor_Controller_Stranka_Zajemce_Seznam", array("hlavniObjekt" => "Zajemci"))),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Typy akce", $this->uzel->potomekUri("Projektor_Controller_Stranka_TypAkce_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Předpoklady", $this->uzel->potomekUri("Projektor_Controller_Stranka_Predpoklad_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("ISCO", $this->uzel->potomekUri("Projektor_Controller_Stranka_ISCO_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Prezentace", $this->uzel->potomekUri("Projektor_Controller_Stranka_Prezentace_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Firmy", $this->uzel->potomekUri("Projektor_Controller_Stranka_Firma_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Staffer pozice", $this->uzel->potomekUri("Projektor_Controller_Stranka_StafferPoziceM_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("Přihlášky zájemců", $this->uzel->potomekUri("Projektor_Controller_Stranka_PrihlaskyZajemcu_Seznam")),
                    new Projektor_Controller_Stranka_Element_Tlacitko("CRMFirmy", $this->uzel->potomekUri("Projektor_Controller_Stranka_CRMFirmy_Seznam"))
                );
                $this->novaPromenna("tlacitka", $tlacitka);
            };
	}

    private function kontextSelect()
        {
            $form = new HTML_QuickForm2("kontext");
            $form->setOption('action', $this->uzel->formActionUri());

            $kontextUser = Projektor_App_Kontext::getUserKontext();

            /* element select Projekt a běh */
            if ($kontextUser->povoleneProjekty)
            {
                $projektySelect[""] = "";
                    $behySelect[""][""] = "";
                foreach($kontextUser->povoleneProjekty as $projekt)
                {
                    $projektySelect[$projekt->id] = $projekt->text;
                    $behySelect[$projekt->id][""] = "";
                    $behy = new Projektor_Data_Auto_SBehProjektuCollection();
                    $behy->where("dbField°id_c_projekt", "=", $projekt->id);
//                    $filtr = $projekt->id . " = " . Projektor_Data_Seznam_SBehProjektu::ID_C_PROJEKT_FK;
//                    $behy = Projektor_Data_Seznam_SBehProjektu::vypisVse($filtr);   //diky kontext filtru vraci jen behy pro $kontextUser->projekt
                    if ($behy)
                    {
                        foreach($behy as $beh) $behySelect[$projekt->id][$beh->id] = $beh->text;
                    }
                }
                // Create the Element
                $sel =& $form->addElement('hierselect', 'projektbeh', 'Projekt a běh:');

                // And add the selection options
                $sel->setOptions(array($projektySelect, $behySelect));
//                $form->addElement("select", Projektor_Data_Ucastnik::ID_C_PROJEKT_FK, "Projekt", $projektySelect);
            }
            /* element select Kanceláře */
            if ($kontextUser->povoleneKancelare) {
                $kancelareSelect[""] = "";
                foreach($kontextUser->povoleneKancelare as $kancelar) $kancelareSelect[$kancelar->id] = $kancelar->text;
                $form->addElement("select", "kancelar", "Kancelář", $kancelareSelect);
            }
            /* element Běhy */
//            if ($kontextUser->projekt)
//            {
//                $behySelect[""] = "";
//                $behy = Projektor_Data_Seznam_SBehProjektu::vypisVse();   //diky kontext filtru vraci jen behy pro $kontextUser->projekt
//                if ($behy)
//                {
//                    foreach($behy as $beh) $behySelect[$beh->id] = $beh->text;
//                    $form->addElement("select", Projektor_Data_Ucastnik::ID_S_BEH_PROJEKTU_FK, "Běh", $behySelect);
//                }
//            }
            /* element submit */
            $form->addElement("submit", "Vyber", "Vyber");
            if($form->validate())
            {
                $data = $form->exportValues();
                if ($data["Vyber"]) {
                    unset($data["Vyber"]);
                    $projekt = new Projektor_Data_Auto_CProjektItem($data["projektbeh"][0]);
                    $beh = new Projektor_Data_Auto_SBehProjektuItem($data["projektbeh"][1]);
                    $kancelar = new Projektor_Data_Auto_CKancelarItem($data["kancelar"]);
                    $kontextUser->projekt = $projekt;
                    $kontextUser->beh = $beh;
                    $kontextUser->kancelar = $kancelar;
                    $kontextUser = Projektor_App_Kontext::setUserKontext($kontextUser);
                }
            }
//            $kontextUser = Projektor_App_Kontext::getKontextUser();


            if ($kontextUser->projekt) {
                $elm = $form->getElement('projektbeh');
                $elm->setValue(array(0 => $kontextUser->projekt->id, 1 =>$kontextUser->beh->id));
//                $elm->setValue($kontextUser->projekt->id);
            }
            if ($kontextUser->kancelar) $form->getElement("kancelar")->setValue($kontextUser->kancelar->id);
//            if ($kontextUser->beh) $form->getElement(Projektor_Data_Ucastnik::ID_S_BEH_PROJEKTU_FK)->setValue($kontextUser->beh->id);
            return $form;
        }

}
