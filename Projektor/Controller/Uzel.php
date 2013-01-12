<?php
class Projektor_Controller_Uzel
{
    public $uzelRodic;
    public $uzlyPotomci;
    public $trida;
    public $parametry;
    public $vraciHodnoty;

    public function __construct($trida, $uzelRodic, $parametry=null, $vraciHodnoty = FALSE)
    {
        $this->trida = $trida;
        $this->uzelRodic = $uzelRodic;
        $this->parametry = $parametry;
        $this->vraciHodnoty = $vraciHodnoty;
    }

    public function pridejPotomka($trida, $parametry=null)
    {
        $this->uzlyPotomci[] = new Projektor_Controller_Uzel($trida, $this, $parametry, FALSE);
        return end($this->uzlyPotomci);          //metoda vrací právě přidaného potomka
    }

    public function setParametr($parametr, $hodnota)
    {
        if (isset($hodnota))
        {
            $this->parametry[$parametr] = $hodnota;
        } else {
            unset($this->parametry[$parametr]);
        }
        return $this;
    }

    public function getParametr($parametr)
    {
        return $this->parametry[$parametr];
    }

//    public function najdiPotomka($trida, $metoda)
//    {
//        if ($this->uzlyPotomci)
//        {
//            foreach ($this->uzlyPotomci as $uzelPotomek)
//            {
//                if ($uzelPotomek->trida == $trida AND $uzelPotomek->metoda == $metoda) return $uzelPotomek;
//            }
//        }
//        return FALSE;
//    }

    /**
        * Metoda vrací uri do stranky, ve ktere je volana (odkaz na "tuto" stranku)
        * mohla by se jmenovet semUri, ale je vždy užita v akci formuláře, proto název formActionUri
        * @return string
        */
    public function formActionUri()
    {
        $prefix = Projektor_Request_Cesta::getPrefixCesty();
        $koren = Projektor_App_Kontext::getKoren();
        $uri = $prefix.serialize($koren);
        return $uri;
    }

    /**
        * Metoda vraci uri do stranky potomka
        * @param string $trida
        * @param string $metoda
        * @param array $parametry
        * @return string
        */
    public function potomekUri($trida, $parametry=null)
    {
        $p = $this->pridejPotomka($trida, $parametry);
        $uri = $this->formActionUri();
        $p = array_pop($this->uzlyPotomci);
        return $uri;
    }

    /**
        * Metoda vraci uri do stranky rodice, pokud uzel namá rodiče vrací FALSE
        * @return type
        */
    public function zpetUri()
    {
        if (isset($this->uzelRodic)) {
            // uschová potomky
            $uzlyPotomci = $this->uzelRodic->uzlyPotomci;
            //smaže potomky z potomků rodičovského uzlu a vygeneruje uri
            $this->uzelRodic->uzlyPotomci = $this->najdiASmazUzel($uzlyPotomci);
            $koren = Projektor_App_Kontext::getKoren();
            $prefix = Projektor_Request_Cesta::getPrefixCesty();
            $uri = $prefix.serialize($koren);
            // vrátí uschované potomky
            $this->uzelRodic->uzlyPotomci = $uzlyPotomci;
            return $uri;
        }
        return FALSE;
    }
//    public function zpetUri()
//    {
//        // přidání značky do rodiče slouří k tomu, aby byl v klonu při odstraňování uzlu smazán uzel - potomek správného rodiče
//        // identický uzel (stejná třída, metody i parametry) se ve stromě může nacházet vícekrát, stačí mít dvě identické stránky v různých místech stromu
//        $this->uzelRodic->znacka = "rodic";     // přidání značky do rodiče
//        $klon = $this->klonuj(Projektor_App_Kontext::getKoren());
//        unset($this->uzelRodic->znacka);    // odstranění značky z rodiče
//        $klon->najdiASmazUzel($klon, $this);
//        $prefix = Projektor_Generator::getPrefixCesty();
//        $uri = $prefix.serialize($klon);
//        return $uri;
//    }

    public function drobeckovaNavigace(Projektor_Controller_Uzel $uzel = null, $navigace = "")
    {
        if (!$uzel) $uzel = $this;

        if ($uzel->uzelRodic)
        {
            if ($navigace) $navigace = " - ".$navigace;
            $navigace = $uzel->uzelRodic->trida . $navigace;
            $navigace = $this->drobeckovaNavigace($uzel->uzelRodic, $navigace);
        }

        return $navigace;

    }

// ################################# PRIVÁTNÍ FUNKCE ########################################################

    private function najdiASmazUzel($uzlyPotomci)
    {
        if (count($uzlyPotomci) == 0)
        {
            $uzlyPotomci = array();
            return $uzlyPotomci;
        }
        foreach($uzlyPotomci as $key=>$uzelPotomek)
        {
//            if ($this->shodaUzlu($uzelPotomek, $this))
            if ($uzelPotomek === $this)
            {
                    $potomciPred = array();
                    $potomciPost = array();
                    if ($key > 0)
                    {
                        $potomciPred = array_slice($uzlyPotomci, 0, $key);
                    }
                    if ($key+1 <  count($uzlyPotomci))
                    {
                        $potomciPost = array_slice($uzlyPotomci, $key+1);
                    }
                    $uzlyPotomci = array_merge($potomciPred, $potomciPost);
                    return $uzlyPotomci;
            }
        }
    }
    /**
        * Metoda odstraní uzel ze stromu
        * Metoda prochází strom postupem preorder (prefixově) až k nalezení zadaného uzlu v potomcích, uzel potomek smaže
        * @param Projektor_Router_Strom_Uzel $uzel
        * @return integer
        */
//    private function najdiASmazUzel(Projektor_Router_Uzel $uzel, Projektor_Router_Uzel $hledanyUzel)
//    {
//        if ($uzel->znacka == "rodic")
//        {
//            unset($uzel->znacka);  //odstranění značky z rodiče
//            foreach($uzel->uzlyPotomci as $uzelPotomek)
//            {
//                if ($this->shodaUzlu($uzelPotomek, $hledanyUzel))
//                {
//                        $key = key($uzel->uzlyPotomci);
//                        $potomciPred = array();
//                        $potomciPost = array();
//                        if ($key > 0)
//                        {
//                            $potomciPred = array_slice($uzel->uzlyPotomci, 0, $key-1);
//                        }
//                        if ($key+1 <  count($uzel->uzlyPotomci))
//                        {
//                            $potomciPost = array_slice($uzel->uzlyPotomci, $key+1);
//                        }
//                        $uzel->uzlyPotomci = array_merge($potomciPred, $potomciPost);
//                        return TRUE;
//                }
//            }
//        }
//        if ($uzel->uzlyPotomci)
//        {
//            foreach($uzel->uzlyPotomci as $uzelPotomek)
//            {
//                $ret = $this->najdiASmazUzel($uzelPotomek, $hledanyUzel);
//                if ($ret)
//                {
//                    return TRUE;
//                }
//            }
//        }else {
//            return FALSE;
//        }
//    }

    private function shodaUzlu(Projektor_Controller_Uzel $uzel1, Projektor_Controller_Uzel $uzel2)
    {
        // When using the comparison operator (==), object variables are compared in a simple manner,
        // namely: Two object instances are equal if they have the same attributes and values, and are instances of the same class.
        // On the other hand, when using the identity operator (===), object variables are identical if and only if they refer to the same
        // instance of the same class.
        if (($uzel1->trida == $uzel2->trida)) return TRUE;
        return FALSE;
    }
}