<?php
class Projektor_Controller_Strom
{
    /**
     * Metoda vytvoří objekt ze serializace objektu
     * @param type $uri
     */
    public function __construct($uri) {
        if($uri) {
            $koren = unserialize($uri);
            Projektor_App_Kontext::setKoren($koren);
        }
    }

    /**
     * Metoda traverzuje okolo stromu a generuje objekty stránek
     * @param Projektor_Router_Strom_Uzel $uzel
     * @return type
     */
    public function traverzuj(Projektor_Controller_Uzel $uzel) {
        $generator = new Projektor_Controller_Stranka_Generator($uzel);
        $generator->generuj();
        $generator->volejMetoduVychozi();
        if ($uzel->uzlyPotomci) {
            foreach($uzel->uzlyPotomci as $uzelPotomek)
            {
                if ( !$uzelPotomek->vraciHodnoty) {
                    $strankaPotomek = $this->traverzuj($uzelPotomek);
                    $strankyPotomci[] = $strankaPotomek;
                }
                //volám metodu rodičovské stránky pro potomka
                $generator->volejMetoduPotomkovskou($strankaPotomek);
            }
        } else {
                // není žádný potomek - volám metodu potomek není
                $generator->volejMetoduPotomekNeni();
        }
        $generator->volejMetoduVzdy();
        if (isset($strankyPotomci)) {
            $generator->stranka->sablona($strankyPotomci); 	// nacteni a exekuce template
        } else {
            $generator->stranka->sablona(); 	// nacteni a exekuce template
        }

        return $generator->stranka;
    }

    public static function debugUri($uri) {
        $cesta = unserialize(str_replace(Projektor_Request_Cesta::getPrefixCesty(), "", $uri));
        return print_r($cesta, True);
    }


//###########  STARÉ    ###################
//        protected function prodluzUri($uri)
//        {
//                    foreach($this->cesta as $ukaz => $krokCesty)
//                    {
//                        if($krokCesty->parametry)
//                            foreach($krokCesty->parametry as $jmenoParametru => $parametr)
//                                    $apostrofy[] = $jmenoParametru."!".$parametr;
//                        $tildy[] = $krokCesty->trida . "." . $krokCesty->metoda . "(" . ($apostrofy ? implode("'", $apostrofy) : "") . ")";
//                        /* Uklid */
//                        $apostrofy = "";
//                        // krokuje až k ukazateli
//                        if ($ukaz == $this->ukazatel)  return $_SERVER["SCRIPT_NAME"]."?" . Projektor_Generator::getPrefixCesty () . "_cesta=".implode("~", $tildy);
//                    }
//        }
//
////	public static function nova()
////	{
////		return new self("");
////	}
//
//        /**
//         * Metoda vrací aktuální krok cesty, krok na který ukazuje ukazatel
//         * @return Projektor_Router_Cesta_Krok
//         */
//        public function dejKrokSem()
//        {
//		return $this->cesta[$this->ukazatel];
//        }
//
//	/**
//         * Metoda zjišťuje, jestli cesta ma krok za ukazatelem
//         * @return boolean
//         */
//        public function maDalsi()
//	{
//		return ($this->cesta && array_key_exists($this->ukazatel+1, $this->cesta));
//	}
//
//	/**
//         * Metoda vrací další krok cesty, krok o jednu pozici za ukazatelem
//         * @return Projektor_Router_Cesta_Krok
//         */
//        public function dejDalsiKrok()
//	{
//		if($this->maDalsi())
//                    return $this->cesta[$this->ukazatel+1];
//		else
//			return null;
//	}
//
//	/**
//         * Metoda zjišťuje, jestli cesta ma krok před ukazatelem
//         * @return boolean
//         */
//        public function maPredchozi()
//	{
//		return ($this->cesta && array_key_exists($this->ukazatel-1, $this->cesta));
//	}
//
//	/**
//         * Metoda vrací předchozí krok cesty, krok o jednu pozici před ukazatelem
//         * @return Projektor_Router_Cesta_Krok
//         */
//        public function dejPredchoziKrok()
//	{
//		if($this->maPredchozi())
//                    return $this->cesta[$this->ukazatel-1];
//		else
//			return null;
//	}
//
//	public function dejPosledniKrok()
//	{
//		return end($this->cesta);
//	}
//
//	/**
//         * Metoda vytvoří klon (kopii) cesty
//         * @return Projektor_Router_Strom
//         */
//        public function klonuj()
//	{
//		$klon = clone $this;					// naklonujeme objekt, reference zustanou
//		$poleCesta = $klon->cesta;				// ulozime si pole (teoreticky referenci na nej)
//		$klon->cesta = array();					// v klonu vytvorime nove pole
//		$klon->ukazatel = -1;
//		if($poleCesta)
//			foreach($poleCesta as $krokCesty)       // projdeme puvodni pole
//                        {
//                            $klon->ukazatel++;
//                            $klon->cesta[$klon->ukazatel] = clone $krokCesty;	// a do noveho pole vkladame klony objektu v poli puvodnim
//                        }
//		$klon->ukazatel = $this->ukazatel;
//		return $klon;
//	}
//
//	private function pridej(Projektor_Router_Cesta_Krok $krok)
//	{
//                $this->ukazatel++;
//		$this->cesta[$this->ukazatel] = $krok;
//                $this->cesta[$this->ukazatel]->uri = $this->formActionUri();
//		return $this;
//	}
//
//	/**
//         * Metoda přídá krok k cestě (nevytváří kopii, klon) na pozici za ukazatelem a posune ukazatel na přidaný krok
//         * @param type $trida
//         * @param type $metoda
//         * @param type $parametry
//         * @return type
//         */
//        public function pridejKrok($trida, $metoda = "main", $parametry = null)
//	{
//		return $this->pridej(new Projektor_Router_Cesta_Krok($trida, $metoda, $parametry));
//	}
//
//
//	/**
//         * Metoda  vytvoří kopii cesty (klon) a přidá jeden parametr k poli parametrů v posledním kroku cesty,
//         *  poslední krok cesty je poslední položka v cestě, nikoli krok, ne který ukazuje ukazatel
//         * @param string $parametr Název parametru
//         * @param mixed $hodnota Hodnota parametru
//         * @return Projektor_Router_Strom
//         */
//        public function pridejParametr($parametr, $hodnota)
//	{
//		$nova = $this->klonuj();
//		$nova->dejPosledniKrok()->pridejParametr($parametr, $hodnota);
//		return $nova;
//	}
//
//
//	/**
//         * Metoda ořízne cestu tak, že odřízne všechny kroky za ukazatelem
//         * @return boolean
//         */
//        private function orez()
//	{
//		if($this->cesta == null)
//			return false;
//
//		$this->cesta = array_slice($this->cesta, 0, $this->ukazatel + 1);
//	}
//
//	/**
//         * Metoda vytvoří kopii cesty (klon) a ořízne novou cestu tak, že poslední krok je krok, na který ukazuje ukazatel
//         * @return Projektor_Router_Strom
//         */
//        public function sem()
//	{
//		$cestaSem = $this->klonuj();
//		$cestaSem->orez();
//		return $cestaSem;
//	}
//
//	/**
//         * Metoda vytvoří kopii cesty (klon), pusune ukazatel na další krok
//         * @return Projektor_Router_Strom
//         */
//        public function dalsi()
//	{
//		$cestaDalsi = $this->klonuj();
//                $cestaDalsi->ukazatel++;
//		return $cestaDalsi;
//	}
}