<?php
class Projektor_Controller_Stranka_ISCO_Detail extends Projektor_Controller_Stranka_Detail
{
    const TYP_STRANKY = Projektor_Controller_Stranka_Generator::TYP_DETAIL;
    const SABLONA = "detail.xhtml";
    const TRIDA_DATA_ITEM = "Projektor_Data_Auto_SISCOItem";

	public function vychozi()
	{
		/* Konstrukce objektu */
		$form = new HTML_QuickForm2("iscoj");
                $form->setOption('action', $this->uzel->formActionUri());

		$isco = Projektor_Data_Seznam_SISCO::najdiPodleId($this->uzel->parametry["id"]);

		/* Defaultni stavy */
		if($isco)
		{
			$form->addDataSource(new HTML_QuickForm2_DataSource_Array(array
			(
				"isco_id" => $isco->id,
				"isco_kod" => $isco->kod,
				"isco_nazev" => $isco->nazev
			)));
		}

		/* Vytvareni elementu */
		$form->addElement("hidden", "isco_id");
		$form->addElement("text", "isco_kod", "Kód ISCO");
		$form->addElement("text", "isco_nazev", "Název ISCO");

		/* Rozhodovani detail/uprav */
		if($parametry["zmraz"])
		{
			$form->freeze();
			$this->novaPromenna("nadpis", "Detail položky ISCO");
		}
		else
			$this->novaPromenna("hlaseni", "Položky v seznamu ISCO nelze upravovat");


		/* Zpracovani */
		if($form->validate())
		{
			$form->freeze();
			$data = $form->exportValues();

			$isco = new Projektor_Data_Seznam_SISCO
			(
			$data["isco_kod"],
			$data["isco_nazev"]
			);

			if($isco->uloz())
                            $this->novaPromenna("ulozeno", true);
                        else
                            $this->novaPromenna("ulozeno_chyba", true);
		}

		/* Generovani */
                $this->novaPromenna("formular", $form->toHtml());
	}

	protected function vzdy()
	{
            parent::vzdy();
            $isco = Projektor_Data_Seznam_SISCO::najdiPodleId($this->uzel->parametry["id"]);
            /* Ovladaci tlacitka stranky */
            $tlacitka = array
            (
                    new Projektor_Controller_Stranka_Element_Tlacitko("Zájemci vhodní na pozici", $this->uzel->potomekUri("Projektor_Controller_Stranka_Zajemci_VhodniNaPozici", array("iscoKod" => $isco->kod)))
            );
            $this->novaPromenna("tlacitka", $tlacitka);
	}
}