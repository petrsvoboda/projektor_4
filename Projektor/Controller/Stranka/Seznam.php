<?php
/**
 * Description of Seznam
 *
 * @author pes2704
 */
abstract class Projektor_Controller_Stranka_Seznam extends Projektor_Controller_Stranka_Base
{

    protected function vzdy()
    {
        parent::vzdy();
        if (isset($this->strankaPotomek))
        {
            $collection = $this->dejCollection();
            $collection->where("id", "=", $this->strankaPotomek->uzel->parametry["id"]);
            $this->generujPolozku($collection);
        }
    }

    protected function potomekNeni()
    {
        $collection = $this->dejCollection();
        $this->autofiltr($collection);
        $collection->filter($this->filtr->generujSQL());
        if (isset($this->uzel->parametry["razeniPodle"]))
        {
            $collection->order($this->uzel->parametry["razeniPodle"], $this->uzel->parametry["razeni"]);
        }
        $this->generujSeznam($collection);
    }

    /**
     * metoda vrací data Collection pro stránku, může být přetížená metodou dejCollection ve stránce, která je potomkem této třídy a takoví metoda vrací
     * collection například s vhodným fitrem where (pracuje jen s některými Item z Collection) nebo collection s jednotlivými item s vlastnostmi,
     *  které neodpovídají sloupcům db tabulky
     */
    public function dejCollection()
    {
            $tridaCollection = static::TRIDA_DATA_COLLECTION;
            return new $tridaCollection();
    }

    /**
     * Metoda generuje seznam pro template z parametru $collection
     * @param Projektor_Data_Collection $collection
     */
    protected function generujSeznam(Projektor_Data_Collection $collection)
    {
        // při vytváření seznamu volá generujTlacitkaProSeznam
        $hlavickaTabulky = $this->generujHlavickuTabulky(get_class($collection));
        $this->novaPromenna("hlavickaTabulky", $hlavickaTabulky);
        $seznamCollection = new Projektor_Data_SeznamCollection();
        foreach($collection as $item)
        {
            $seznamItem = $this->dejSeznamItemZHlavicky($item, $hlavickaTabulky);
            $seznamItem->tlacitka = $this->generujTlacitkaProSeznam($item);  //přidá vlastnost tlacitka přímo, ne do iterátoru
            $seznamCollection->add($seznamItem);
        }
        $this->novaPromenna("seznam", $seznamCollection);
        $this->novaPromenna("zprava", "Celkem nalezeno:".  $seznamCollection->count());
    }

    /**
     * Metoda generuje položku pro template z parametru $collection
     * @param Projektor_Data_Collection $collection
     */
    protected function generujPolozku(Projektor_Data_Collection $collection)
    {
        // při vytváření seznamu volá generujTlacitkaProPolozku
        $hlavickaTabulky = $this->generujHlavickuTabulky(get_class($collection));
        $this->novaPromenna("hlavickaTabulky", $hlavickaTabulky);
        $seznamCollection = new Projektor_Data_SeznamCollection();
        foreach($collection as $item)
        {
            $seznamItem = $this->dejSeznamItemZHlavicky($item, $hlavickaTabulky);
            $seznamItem->tlacitka = $this->generujTlacitkaProPolozku($item);  //přidá vlastnost tlacitka přímo, ne do iterátoru
            $seznamCollection->add($seznamItem);
        }
        $this->novaPromenna("seznam", $seznamCollection);
    }

//    protected function generujTlacitkaProSeznam(Projektor_Data_Item $item) {}
//
//    protected function generujTlacitkaProPolozku(Projektor_Data_Item $item) {}

    /**
        * Metoda vrací html kód formuláře umožňujícího nastavit parametry filtrování datových objektů v seznamu.
        * Metoda použije potomkovskou metodu generujHlavickuTabulky a podle vlastnosti sloupce vygeneruje formulář.
        * Výsledný formulář vloží do nové proměnné stránky "filtrovaciFormular" (volá metodu novaPromenna)
        */
    protected function autofiltr(Projektor_Data_Collection $collection)
    {
        $hlavickaTabulky = $this->generujHlavickuTabulky(get_class($collection));
        $form = new HTML_QuickForm2("autofiltr");
        $form->setOption('action', $this->uzel->formActionUri());
        foreach ($hlavickaTabulky->sloupce as $sloupec) {
            $referencovanaCollection = $collection->dejReferencovanouKolekci($sloupec->nazevVlastnosti);
            if ($referencovanaCollection) {
                if ($sloupec->nazevVlastnostiReferencovanehoObjektu) {
                    $nazev = $sloupec->nazevVlastnostiReferencovanehoObjektu;
                } else {
                    $itemClass = $referencovanaCollection::NAZEV_TRIDY_ITEM;
                    $nazev = $itemClass::NAZEV_ZOBRAZOVANE_VLASTNOSTI;
                }
                $poleSelect = array();
                $poleSelect[""] = "";
                foreach($referencovanaCollection as $objektProSelect)
                    $poleSelect[$objektProSelect->id] = $objektProSelect->$nazev;
                $form->addElement("select", $sloupec->nazevVlastnosti, $sloupec->titulek, $poleSelect);
            } else {
                if ($sloupec->nazevVlastnosti)
                {
                $form->addElement("text", $sloupec->nazevVlastnosti, $sloupec->titulek);
                }
            }
        }
        $form->addElement("submit", "submitFiltrovat", "Filtrovat");
        $form->addElement("submit", "submitNefiltrovat", "Nefiltrovat");

        $this->filtr = new Projektor_Controller_Stranka_Element_Filtr();
        if($form->validate())
        {
            $data = $form->exportValues();
            if ($data["submitFiltrovat"]) {
                unset($data["submitFiltrovat"]);
                unset($data["submitNefiltrovat"]);
                $this->filtr = Projektor_Controller_Stranka_Element_Filtr::like($data);
            } else {
                unset($data["submitFiltrovat"]);
                unset($data["submitNefiltrovat"]);
                $this->filtr = Projektor_Controller_Stranka_Element_Filtr::like();
            }
        }

// volba rendereru formuláře
// odkomentuj následující dva řádku pro jiný renderer než default
// volba Tableless rendereru
//      $renderer = new HTML_QuickForm_Renderer_Tableless();
//      $form->accept($renderer);
//      $this->novaPromenna("filtrovaciFormular", $renderer->toHtml());

// zakomentuj následující řádek pro jiný renderer než default
    $this->novaPromenna("filtrovaciFormular", $form->toHtml());
    }

    /**
     * Metoda podle objektu $hlavickaTabulky, vygeneruje objekt typu Projektor_Data_SeznamItem s vlastnostmi odpovídajícími
     * sloupcům v objektu $hlavickaTabulky, tedy odpovídající požadovaným sloupcům seznamu. Vlastnostem objektu návratového Projektor_Data_SeznamItem
     * nastaví hodnoty takto:
     *  - V objektu $hlavickaTabulky->sloupec je název vlastnosti parametru $dataItem (např. "dbField°identifikator"):
     * použije hodnotu vlastnosti $dataItem->identifikator .
     *  - Objekt $dataItem je hlavní objekt a v objektu $hlavickaTabulky->sloupec je název vlastnosti podrízeného objektu
     * (např. "smlouva->dbField°jmeno"): použije hodnotu vlastnosti $dataItem->smlouva->jmeno .
     *  - V objektu $hlavickaTabulky->sloupec je název vlastnosti parametru $dataItem, který obsahuje cizí klíč jiné tabulky
     * (např. "dbField°id_c_kancelar_FK"): použije hodnotu vlastnosti objektu odpovídajícího tabulce referencované cizím klíčem,
     * tedy např objektu Projektor_Data_Auto_CKancelarItem. Kterou vlastnost referencovaného objektu použije zavisí na tom,
     * zda je v hlavičce nastaven parametr sloupce $sloupec->nazevVlastnostiReferencovanehoObjektu.
     * Pokud je nastaven - požije se tato vlastnost, pokud není nastaven - použije se defaultně vlastnost z konstatnty referencovaného datového objektu NAZEV_ZOBRAZOVANE_VLASTNOSTI
     * (např. Projektor_Data_Auto_CKancelarItem::NAZEV_ZOBRAZOVANE_VLASTNOSTI). Tento postup se uplatní i pro podřízenou vlatnost hlavního objektu:
     * např. pro název vlastnoti v hlavičce "dotaznik->dbField°id_c_okres_FK" se použije vlastnost objektu Projektor_Data_Auto_COkresItem::NAZEV_ZOBRAZOVANE_VLASTNOSTI.
     *
     * $dataItem-:prijmeni
     * @param Projektor_Data_Item $item
     * @param Projektor_Controller_Stranka_Element_Hlavicka $hlavickaTabulky
     * @return \Projektor_Data_SeznamItem
     */
    protected function dejSeznamItemZHlavicky(Projektor_Data_Item $item, Projektor_Controller_Stranka_Element_Hlavicka $hlavickaTabulky)
    {
        $seznamItem = new Projektor_Data_SeznamItem();
        foreach ($hlavickaTabulky->sloupce as $sloupec)
        {
            $nazevVlastnostiVHlavicce = $sloupec->nazevVlastnosti;
            if (strpos($nazevVlastnostiVHlavicce, "->"))
            {
                $castiNazvu = explode("->", str_replace(" ", "", $nazevVlastnostiVHlavicce));
                $dataItem = $item;
                foreach ($castiNazvu as $vlastnost)
                {
                    $dataItem = $this->dejHodnotu($vlastnost, $dataItem, $sloupec->nazevVlastnostiReferencovanehoObjektu);
                }
                $hodnota = $dataItem;
            } else {
                $hodnota = $this->dejHodnotu($nazevVlastnostiVHlavicce, $item, $sloupec->nazevVlastnostiReferencovanehoObjektu);
            }
            $seznamItem->addOrReplace($nazevVlastnostiVHlavicce, $hodnota);
        }
        return $seznamItem;
    }

    private function dejHodnotu($nazevVlastnostiVHlavicce, Projektor_Data_Item $item, $nazevVlastnostiReferencovanehoObjektu=NULL)
    {
        // když $nazevVlastnostiVHlavicce odpovídá sloupci s FK, vrací hodnotu vlastnosti
        // referencovaného objektu
        $referencovanyItem = $item->dejReferencovanýItem($nazevVlastnostiVHlavicce);
        if ($referencovanyItem)
        {
            if ($nazevVlastnostiReferencovanehoObjektu)
            {
                $nazev = $nazevVlastnostiReferencovanehoObjektu;
            } else {
                $nazev = $referencovanyItem::NAZEV_ZOBRAZOVANE_VLASTNOSTI;
            }
            return $referencovanyItem->$nazev;
        } else {
            return $item->$nazevVlastnostiVHlavicce;
        }
    }
}
?>
