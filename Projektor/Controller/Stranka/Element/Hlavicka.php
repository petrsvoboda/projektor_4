<?php
class Projektor_Controller_Stranka_Element_Hlavicka
{
	public $sloupce;
        private $nazevTridyDataItem;
	private $uzel;

	public function __construct($nazevTridyDataItem, Projektor_Controller_Uzel $uzel)
	{
            $this->nazevTridyDataItem = $nazevTridyDataItem;
            $this->uzel = $uzel;

//            $typStranky = $trida::TYP_STRANKY;
//            switch ($typStranky) {
//                case self::TYP_SEZNAM:
//                    $tridaData = $trida::TRIDA_DATA;
//                    $collection = new $tridaData();
//                    if (!is_subclass_of($collection, "Projektor_Data_Collection"));//exception
//                    $this->stranka = new $trida($this->uzel, $collection, NULL, $this->strankaRodic);
//                    break;
//                case self::TYP_MENU:
//                    $tridaData = $trida::TRIDA_DATA;
//                    $item = new $tridaData();
//                    if (!is_subclass_of($collection, "Projektor_Data_Item"));  //exception
//                    $this->stranka = new $trida($this->uzel, NULL, $item, $this->strankaRodic);
//                    break;
//                case self::TYP_DETAIL:
//                    $tridaData = $trida::TRIDA_DATA;
//                    $collection = new $tridaData();
//                    if (!is_subclass_of($collection, "Projektor_Data_Item"));  //exception
//                    $this->stranka = new $trida($this->uzel, NULL, $item, $this->strankaRodic);
//                    break;
//                case self::TYP_SPECIFIC:
//                    $this->stranka = new $trida($this->uzel, NULL, NULL, $this->strankaRodic);
//                    break;
//                default:
//                    //exception
//                    break;
//            }
	}

	/**
         * Metoda přidá do pole sloupců hlavičky seznamu další prvek - objekt sloupec.
         * Objekt sloupec má vlastnosti, které se používají pro vytvoření iterovatelných vlastností datových objektů v seznamu a pro řazení a filtrování.
         * Řadit a filtrovat lze pouze vlatnosti odpovídající sloupcům db tabulky (používá se SQL příkaz).
         * Pokud není zadán parametr $nazevSloupceDb, parametry $nazevVlastnosti a $popisek se použijí pro vytvoření sloupce seznamu neumožňujícího řazení a filtrování.
         * Pokud je zadán parametr $nazevSloupceDb, parametry $nazevVlastnosti a $popisek se použijí pro vytvoření sloupce seznamu umožňujícího řazení a filtrování.
         * Pokud $nazevSloupceDb odpovídá sloupci db, který neobsahuje cizí klíč, není třeba zadávat parametry $prikazGenerujiciPoleReferencovanychObjektu a $nazevVlastnostiReferencovanehoObjektu,
         * ve formuláři filtru se vytvoří element typu text.
         * Pokud $nazevSloupceDb odpovídá sloupci db, který obsahuje cizí klíč, je třeba zadávat parametry $prikazGenerujiciPoleReferencovanychObjektu a $nazevVlastnostiReferencovanehoObjektu,
         * ve formuláři filtru se vytvoří element typu select zobrazující hodnoty z referencované db tabulky a umožňující vybrat hodnotu cizího klíče.
         *
         * @param string $nazevVlastnosti Název vlastnosti objektu odpovídající sloupci seznamu, požije se pro vytvoření iterovatelné vlastností datových objektů v seznamu
         * @param string $popisek Text do titulku sloupce seznamu
         * @param string $nazevSloupceDb Název sloupce db tabulky odpovídající sloupci seznamu, pokud je zadán, pak sepodle tohoto sloupce provádí řazení a filtrování
         * @param type $prikazGenerujiciPoleReferencovanychObjektu Pokud $nazevSloupceDb obsahuje cizí klíč, pak zde je třeba zadat PHP kód, který při vykonání vrací pole objektů odpovídajících tabulce v db jejíž klíč je jako cizí klíč obsažen ve sloupci zadaném v parametu $nazevSloupceDb
         * @param type $nazevVlastnostiReferencovanehoObjektu Název vlastnosti objektu z pole objektů, jejíž hodnota se zobrazuje v HTML příkazu select (option)
         */
        public function pridejSloupec($nazevVlastnosti, $titulek=NULL, $nazevVlastnostiReferencovanehoObjektu = NULL)
	{
            $nazevTridyDataItem = $this->nazevTridyDataItem;
            $nazevSloupceDb = $nazevTridyDataItem::dejNazevSloupceZVlastnosti($nazevVlastnosti);
            if ($nazevSloupceDb)
            {
                //uschování hodnot parametrů
                $razeniPodle = $this->uzel->getParametr("razeniPodle");
                $razeni = $this->uzel->getParametr("razeni");
                if ($this->uzel->getParametr("razeniPodle")==$nazevSloupceDb)
                {
                    if($this->uzel->getParametr("razeni")=="ASC") $razeniAscPouzito = TRUE;
                    if($this->uzel->getParametr("razeni")=="DESC") $razeniDescPouzito = TRUE;
                } else {
                    $razeniAscPouzito = FALSE;
                    $razeniDescPouzito = FALSE;
                }
                $this->sloupce[] = new Projektor_Controller_Stranka_Element_Hlavicka_Sloupec
                (
                    $nazevVlastnosti,
                    $titulek,
                    $nazevVlastnostiReferencovanehoObjektu,
                    $this->uzel->setParametr("razeniPodle", $nazevSloupceDb)->setParametr("razeni", "DESC")->formActionUri(),
                    $razeniDescPouzito,
                    $this->uzel->setParametr("razeniPodle", $nazevSloupceDb)->setParametr("razeni", "ASC")->formActionUri(),
                    $razeniAscPouzito
                );
                //vrácení hodnot parametrů
                $this->uzel->setParametr("razeniPodle", $razeniPodle)->setParametr("razeni", $razeni)->formActionUri();
            } else {
                //prazdné parametry vzestupne a sestupne zpusobí neexistenci vlastnosti sloupec->vzestupne a sloupec->sestupne
                //v šabloně seznam.xhtml je podminka tal:condition a vynechaji se šipky s odkazy pro řazení, zobrazí se jen popisek
                $this->sloupce[] = new Projektor_Controller_Stranka_Element_Hlavicka_Sloupec
                (
                    $nazevVlastnosti,
                    $titulek
                );
            }
        }
}