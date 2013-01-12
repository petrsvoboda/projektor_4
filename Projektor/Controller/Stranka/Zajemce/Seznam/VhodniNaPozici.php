<?php
class Projektor_Controller_Stranka_Zajemce_Seznam_VhodniNaPozici extends Projektor_Controller_Stranka_Zajemce_Seznam
{
    const SABLONA = "seznam.xhtml";
    const TRIDA_DATA_COLLECTION = "Projektor_Data_Auto_ZajemceCollection";

    protected function potomekNeni()
    {
        $iscoKod = $this->uzel->parametry["iscoKod"];
        $zajemci = Projektor_Data_Zajemce::vypisVhodneNaPozici($iscoKod);
        $this->generujSeznam($zajemci);
        /* Nadpis stranky */
        $this->novaPromenna("nadpis", "Zájemci vhodní na pozici");
    }

    protected function potomek°Projektor_Controller_Stranka_Zajemce°detail(Projektor_Controller_Uzel $uzelPotomek = null)
    {
        $this->generujPolozkuSTlacitky($uzelPotomek);
    }


}