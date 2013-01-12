<?php
/**
 * Abstraktni trida Projektor_Controller_Stranka, popisuje obecnou stranku.
 * @author Marek Petko
 * @abstract
 */
abstract class Projektor_Controller_Stranka_Base
{
    /**
        * Nastaveni slozky kde prebyvaji vsechny sablony.
        */
    const SLOZKA_SABLON = "Projektor/Templates/";

    /**
        * Nastaveni klicoveho slova misto ktereho se nahradi html kod potomka.
        */
    const SLOT_PRO_POTOMKA = "<!-- %NEXT% -->";
    const SLOT_PRO_FORMULAR = "<!-- %FORM% -->";
    const SLOT_PRO_NAZEV_STRANKY = "%STRANKA%";
    const SLOT_PRO_FILTROVANI = "<!-- %FILTR% -->";


    /**
        * Konstanty pro služební metody
        */
    const SEPARATOR = "->";    //separuje název objektuVlastnosti a vlastnosti v objektu HlavickaTabulky (např. pro vlastnost smlouva->jmeno je v hlaviččce smlouva.self::SEPARATOR.jmeno
    const MAX_POCET_ZNAKU_TYPU_TEXT = 48; //max. počet znaků, pro který se při automatickém nastavení typu elementů nastaví "text", pro větší "textarea"
    const MAX_SIRKA_TYPU_TEXT = 68;
    const POCET_SLOUPCU_TYPU_TEXTAREA = 51;
    const MAX_POCET_RADKU_TYPU_TEXTAREA = 5;
    const NAZEV_HLAVNIHO_OBJEKTU_PREZENTACE_PRO_FLAT_TABLE = "Table";
    // slot pro vložení hodnoty id db tabulky do příkazu generujícího referencovaný objekt
    // metody generujHlavickuTabulky (v potomcích) slot vkládají, metoda pouzijHlavicku v této třídě vkládá komkrétní hodnoty id
    const SLOT_PRO_ID = "%ID%";


    /**
        * Počítadlo instancí objektů zděděných z třídy Stranka
        */
    static $instance = 0;


    /**
    * Uzel, podle kterého je stránka generována
    * Musí být public, je čten ve třídě AbstractGenerator
    */
    public $uzel;

    /**
    * Uzel, podle kterého byla generována poslední potomkovská stránka
    * Musí být public, je nastavován ve třídě AbstractGenerator
    */
    public $uzelPotomek;

    /**
    * Reference na rodičovskou stránku
    * Musí být public, je nastavována ve třídě AbstractGenerator
    */
   public $strankaPotomek;

    /**
        * Nazev stranky
        */
    public $nazev;

    /**
        * Sablona stranky
        */
    protected $souborSablony;

    /**
        * Třída datových objektů se kterými stranka pracuje
        */
    protected $tridaData;
    /**
        * Objekt typu Data_Collection s daty pro stránky typu SEZNAM
        */
    protected $dataCollection;
    /**
        * Objekt typu Data_Item s daty pro stránky typu MENU a DETAIL
        */
    protected $dataItem;
    /**
        * Formular stranky
        */
    protected $formular;
    /**
        * Filtrovaci formular stranky
        */
    protected $filtrovaciFormular;

    /**
        * Filtr generovany metodou filtrovani.
        */
    protected $filtr;

    /**
        * HTML kod stranky.
        */
    public $html;

    /**
        * Promenne stranky.
        */
    public $promenne;

    public function __construct(Projektor_Controller_Uzel $uzel)  //konstuktor je volaný z generátoru
    {
        $this->uzel = $uzel;
        $this->nazev = $uzel->trida.++self::$instance; //název třídy s číslem instance třídy
        $this->novaPromenna("id", $this->nazev);
    }


    public function __call($metoda, $parametryMetody = null)
    {
            if(method_exists($this, $metoda))
            {
                Projektor_App_Logger::setLog(array("stránka" => $this->nazev, "třída" => get_class($this), "metoda" => $metoda));
                if ($parametryMetody)
                {
                    $ret =$this->$metoda($parametryMetody[0]);
                } else {
                    $ret = $this->$metoda();
                }
            }
            else {
                Projektor_App_Logger::setLog(array("Varování" => "Metoda ".$metoda." ve tride ".get_class($this)." neni definovana"));
                if (Projektor_App_Kontext::getDebug()) echo("<font color=\"red\">Metoda <em>".$metoda."</em> ve tride <strong>".get_class($this)."</strong> neni definovana!</font>");
            }
            if (isset($ret)) return $ret;
    }

    protected function vzdy()
    {
        $this->novaPromenna("id", $this->nazev);
        $this->novaPromenna("navigace", $this->uzel->drobeckovaNavigace());
        if ( !$this->uzel->vraciHodnoty)
        {
            $uri = $this->uzel->zpetUri();
            if ($uri) {
                $tlacitkoZpet = new Projektor_Controller_Stranka_Element_Tlacitko("Zpět", $uri);
                $this->novaPromenna("tlacitkozpet", $tlacitkoZpet);
            }
        }
    }

    /**
        * Pripoji HTML kod formulare do stranky.
        * @param string $html HTML kod formulare.
        * @return void
        */
    public function pripojFormular($html)
    {
            $this->pripojHtml(self::SLOT_PRO_FORMULAR, htmlspecialchars_decode($html));
    }

    /**
    * Pripoji HTML kod formulare filtrovani do stranky.
    * @param string $html HTML kod formulare.
    * @return void
    */
    public function pripojFiltrovani($html)
    {
            $this->pripojHtml(self::SLOT_PRO_FILTROVANI, htmlspecialchars_decode($html));
    }

    /**
        * Pripoji HTML kod do slotu ve strance.
        * @param string $slot Kod definujici slot v sablone.
        * @param string $html HTML kod k pripojeni
        * @return void
        */
    public function pripojHtml($slot, $html)
    {
            $this->html = str_replace($slot, $html, $this->html);
    }

    public function pripojPromenne($promenne)
    {
            if($this->promenne)
                $this->promenne = array_merge($this->promenne, $promenne);
            else
                $this->promenne = $promenne;
    }

    /**
        * Nacte sablonu stranky ze souboru, vykona ji a připojí formulář, filtrování a html kód potomků.
        * @param Stranka $strankyPotomci Předtím vygenerovaní potomci, jejich vlastnost html je připojena do slotu pro potomka v šabloně.
        * @return type
        */
    public function sablona($strankyPotomci = null)
    {

        try
        {
            if (is_readable(CLASS_PATH.self::SLOZKA_SABLON . static::SABLONA) )
            {
                $sablona = file_get_contents(CLASS_PATH.self::SLOZKA_SABLON . static::SABLONA);
            } else {
                throw new Projektor_Data_Exception("Nelza načíst soubor s šablonou: ".CLASS_PATH.self::SLOZKA_SABLON . static::SABLONA.".");
            }
        } catch (Projektor_Data_Exception $e)
        {
            echo $e;
        }

        //TODO: odstranit sloty pro název stránky ze šablon a upravit tuto metodu, sloty jsou zbytečné, PHPTAL->execute se nově provádí pro každou stránku zvlášť
        $sablona = str_replace(self::SLOT_PRO_NAZEV_STRANKY, $this->nazev, $sablona);

        $content = "";
        if(Projektor_App_Kontext::getDebug()) $content .= $this->debuguj ($sablona);
        $tpl = new PHPTAL();
        $tpl->setSource($sablona);
        if($this->promenne) foreach($this->promenne as $klic => $hodnota) $tpl->$klic = $hodnota;  //teď je vždy jen jedna proměnná = stačí přřazení

        try
        {
            $content .=  $tpl->execute();
        }
        catch (Exception $e)
        {
            $content .= "<div>";
            $content .= "<h1>Ekscepsna v templejte...</h1> <pre>{$e}</pre>";
            $content .= $this->debuguj($sablona);
            $content .= "</div>";
        }
        $this->html = $content;
        $this->pripojFormular($this->formular);		// pripojime html kod formulare
        $this->pripojFiltrovani($this->filtrovaciFormular);		// pripojime html kod formulare
        if ($strankyPotomci)
        {
            $potomciHtml = "";
            foreach ($strankyPotomci as $strankaPotomek)
            {
                $potomciHtml .= $strankaPotomek->html;
            }
            $this->pripojHtml(self::SLOT_PRO_POTOMKA, $potomciHtml);        // pripojime html stranky potomka a znovu přidáme slot pro dalšího potomka
        }
        return;
}

protected function debuguj($sablona = NULL)
{
        $content = "<h1>Debugovaci vypis</h1>\n";
        $content .= "<h2>Logger:</h2>";
        $content .= "<pre>";
        $content .= Projektor_App_Logger::getLogText();
        $content .= "</pre>";
        $content .= "<h2>Vygenerovany template z ".$this->souborSablony."</h2>";
        if($sablona)
        {
                @$hlHTML = Text_Highlighter::factory("HTML");
                $content .= $hlHTML->highlight($sablona);
        }

        $content .= "<h2>Nastavene promenne ".$this->nazev."</h2>\n";
        if($this->promenne)
        {
                $content .= "<pre>";
                $content .= print_r($this->promenne, TRUE);
                $content .= "</pre>";
        }

        return $content;
}

    /**
        * Prida nebo upravi promennou do pole prommenych pro export do rodicovske stranky.
        */
    public function novaPromenna($klic, $hodnota)
    {
        $this->promenne[$this->nazev][$klic] = $hodnota;
//            $this->promenne[$klic] = $hodnota;
    }
/**
*
* následují "služební metody pro potomkovské třídy, metody pokytují různé funkčnosti, které se opakovaně užívají v potomkovských třídách
*
*
*
*/


}