<?php
class Projektor_Pdf_Dokument_AGPSouhlas extends Projektor_Pdf_Dokument
{
    const FILENAME_PREFIX = "AGP Souhlas se zpracováním ";

    protected $zajemce;


//        $pdfpole = $_POST;


//        foreach($pdfpole  as $klic => $hodnota) {
//            $pdfpole['$klic'] = trim($pdfpole['$klic']);  //??
//        }
    public function __construct($zajemce) {
        if (!$zajemce->identifikator)  throw new Exception('*** Chyba v '.__CLASS__."->".__METHOD__.': '."Není zadán parametr objekt nebo objekt nemá vlastnost identifikator  ".$zajemce->identifikator);
        $this->zajemce = $zajemce;
        parent::__construct();
    }

     public function vytvor()
     {
            $pdfhlavicka = Projektor_Pdf_Kontext::dejHlavicku();
                //$pdfhlavicka->text("Individuální plán účastníka - 1. část");
                $pdfhlavicka->zarovnani("C");
                $pdfhlavicka->vyskaPisma(14);
                $pdfhlavicka->obrazek(__DIR__."/images/logo_agp_bw.png", null, null,90,12);

            $pdfpaticka = Projektor_Pdf_Kontext::dejPaticku();
                $pdfpaticka->text("Souhlas zájemce o zaměstnání s poskytováním osobních údajů  Zájemce: ".$this->zajemce->identifikator);
                $pdfpaticka->zarovnani("C");
                $pdfpaticka->vyskaPisma(6);
                $pdfpaticka->cislovani = true;

            $titulka1 = new Projektor_Pdf_Odstavec;
                $titulka1->Nadpis("Souhlas zájemce o zaměstnání");
                $titulka1->ZarovnaniNadpisu("C");
                $titulka1->VyskaPismaNadpisu(14);
            $titulka2 = new Projektor_Pdf_Odstavec;
                $titulka2->Nadpis('s poskytováním osobních údajů');
                $titulka2->ZarovnaniNadpisu("C");
                $titulka2->VyskaPismaNadpisu(14);

            $strany = new Projektor_Pdf_Odstavec;
                $strany->Nadpis("Zájemce o práci:");
                $strany->ZarovnaniNadpisu("L");
                $strany->VyskaPismaNadpisu(11);


            $stranaUcastnik = new Projektor_Pdf_SadaBunek();
                    $celeJmeno =  $this->zajemce->smlouva->titul." ".$this->zajemce->smlouva->jmeno." ".$this->zajemce->smlouva->prijmeni;
                    if ($this->zajemce->smlouva->titul_za)
                    {
                            $celeJmeno = $celeJmeno.", ".$this->zajemce->smlouva->titul_za;
                    }
                $stranaUcastnik->PridejBunku("jméno, příjmení, titul: ", $celeJmeno,1);
                    $adresapole="";
                    if ($this->zajemce->smlouva->ulice) {
                        $adresapole .=   $this->zajemce->smlouva->ulice;
                        if  ($this->zajemce->smlouva->mesto)  {  $adresapole .=  ", ".   $this->zajemce->smlouva->mesto;}
                        if  ($this->zajemce->smlouva->psc)    {  $adresapole .= ", " . $this->zajemce->smlouva->psc; }
                    }
                    else {
                        if  ($this->zajemce->smlouva->mesto)  {
                            $adresapole .= $this->zajemce->smlouva->mesto;
                            if  ($this->zajemce->smlouva->psc)    {  $adresapole .= ", " . $this->zajemce->smlouva->psc; }
                        }
                        else {
                            if  ($this->zajemce->smlouva->psc)  {$adresapole .=  $this->zajemce->smlouva->psc;}
                        }
                    }
                $stranaUcastnik->PridejBunku("bydliště: ", $adresapole,1);
                $stranaUcastnik->PridejBunku("nar.: ", $this->zajemce->smlouva->datum_narozeni,1);
                $stranaUcastnik->PridejBunku("identifikační číslo zájemce: ", $this->zajemce->identifikator,1);
                $stranaUcastnik->PridejBunku("(dále jen „Zájemce“)", "",1);


            $dohoda1 = new Projektor_Pdf_Odstavec;
                $dohoda1->Nadpis("Prohlášení");
                $dohoda1->ZarovnaniNadpisu("C");
                $dohoda1->VyskaPismaNadpisu(12);

            $odstavec1 = new Projektor_Pdf_Odstavec;
                $odstavec1->text("V souladu se zákonem č.101/2000 Sb. v platném znění tímto výslovně prohlašuji, že souhlasím se zpracováním, užitím a uchováním veškerých mých osobních a citlivých údajů správcem a zpracovatelem údajů, kterým je Grafia, společnost s ručením omezeným, sídlo: Budilova 1511/4, 301 21 Plzeň, IČ: 47714620, získaných při získávání, hledání a výběru uchazečů o nabídky práce třetích osob pro tyto třetí osoby (dále jen potenciální zaměstnavatele) v rozsahu uvedeném v mnou poskytnuté dokumentaci (Dohoda o zprostředkování zaměstnání, registrační dotazník, strukturovaný životopis, reference apod.) a v rozsahu mnou osobně sdělených údajů zaznamenaných pracovníkem správce a včetně informací získaných při testování, pohovorech, pracovní diagnostice, zjišťování kulturních, týmových či osobnostních způsobilostí a kompetencí a to za účelem výkonu činnosti personální agentury, zejména pro účely pro účely zprostředkování zaměstnání a mé prezentace potenciálnímu zaměstnavateli jako příjemci.");

            $odstavec2 = new Projektor_Pdf_Odstavec;
                $odstavec2->text("Konkrétně se jedná o základní osobní údaje (např. jméno a příjmení, datum a místo narození, rodinný stav, občanství, pohlaví, získané tituly), údaj o zdravotním stavu potřebný pro posouzení nezbytně dobrého zdravotního stavu v povoláních vyžadujících zvýšenou fyzickou a psychickou odolnost, dále o podrobné informace týkající se kontaktních údajů včetně trvalého bydliště, získaného vzdělání, současného mého postavení na trhu práce a získané dosavadní praxe, znalostí a dovedností, zdravotního stavu, představ a požadavků na mnou hledanou práci a dalších souvisejících údajů.");

            $odstavec3 = new Projektor_Pdf_Odstavec;
                $odstavec3->text("Výslovně souhlasím s tím, aby mnou poskytnuté osobní údaje byly společností Grafia předány potenciálním zaměstnavatelům  v postavení uživatele osobních údajů. Souhlasím se zařazením do databáze zájemců o zaměstnání Personal service, kterou vlastní společnost Grafia, s. r. o.");

            $odstavec4 = new Projektor_Pdf_Odstavec;
                $odstavec4->text("Tento souhlas uděluji společnosti Grafia s.r.o., se sídlem Plzeň, Budilova 4, IČO: 47714620 dále jen Grafia), jakožto správci, a to na dobu 3 let ode dne poslední aktualizace informací.");

            $odstavec5 = new Projektor_Pdf_Odstavec;
                $odstavec5->text("Pokud předám svůj životopis, průvodní dopis, dotazník, doklady o vzdělání a praxi, reference, jiné podklady a doklady či jejich kopie, ve kterých budou uvedena osobní data, beru na vědomí, že Grafia, s.r.o. nenese za ochranu v nich uvedených osobních dat žádnou odpovědnost. V případě předání takových podkladů a dokladů či jejich kopií souhlasím s tím, že tyto doklady budou předány potenciálnímu zaměstnavateli nebo budou pro potenciálního zaměstnavatele zhotoveny jejich kopie.");

            $odstavec6 = new Projektor_Pdf_Odstavec;
                $odstavec6->text("Byl jsem seznámen se skutečností, že zaměstnanci správce, jiné fyzické osoby, které zpracovávají osobní údaje na základě smlouvy se správcem nebo zpracovatelem, a další osoby, které v rámci plnění zákonem stanovených oprávnění a povinností přicházejí do styku s osobními údaji u správce nebo zpracovatele, jsou povinni zachovávat mlčenlivost o osobních údajích a o bezpečnostních opatřeních, jejichž zveřejnění by ohrozilo zabezpečení osobních údajů.");

            $odstavec7 = new Projektor_Pdf_Odstavec;
                $odstavec7->text("Je mi známo, že mohu kdykoli výše uvedené souhlasy odvolat.");

            $podpisy = new Projektor_Pdf_SadaBunek();

            $userKontext = Projektor_App_Kontext::getUserKontext();
            $kk = $userKontext->kancelar->plny_text;

            $podpisy->PridejBunku("Kontaktní kancelář: ", $kk, 1);
            $podpisy->PridejBunku("Dne ", $this->zajemce->smlouva->datum_vytvor_smlouvy,1);
            $podpisy->NovyRadek(0,1);
            $podpisy->PridejBunku("                       Zájemce:","",1);
            $podpisy->NovyRadek(0,5);
            //  $podpisy->NovyRadek(0,3);
            $podpisy->PridejBunku("                       ......................................................","",1);
            $podpisy->PridejBunku("                           " . str_pad($celeJmeno, 30, " ", STR_PAD_BOTH),"",1);
//            $podpisy->PridejBunku("                           " . $celeJmeno . "                                                                         " . $userKontext->user->name,"",1);
            $podpisy->PridejBunku("                                     podpis účastníka","",1);
//            $podpisy->PridejBunku("                                     podpis účastníka                                                                podpis, jméno a příjmení","",1);
            $podpisy->NovyRadek();


//**********************************************

        $pdfdebug = Projektor_Pdf_Kontext::dejDebug();
        $pdfdebug->debug(0);

        ob_clean;
//	$this->pdf = new self($this->objekt);
//        $pdf = parent::__construct($zajemce);


        $this->pdf->AddFont('Times','','times.php');
	$this->pdf->AddFont('Times','B','timesbd.php');
	$this->pdf->AddFont("Times","BI","timesbi.php");
	$this->pdf->AddFont("Times","I","timesi.php");

        $this->pdf->AddPage();   //uvodni stranka
        $this->pdf->Ln(10);
        $this->pdf->TiskniOdstavec($titulka1);
        $this->pdf->TiskniOdstavec($titulka2);


        $this->pdf->Ln(10);
        $this->pdf->TiskniSaduBunek($stranaUcastnik);

	$this->pdf->Ln(15);
	$this->pdf->TiskniOdstavec($dohoda1);

	$this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec1);
        $this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec2);
        $this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec3);
        $this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec4);
        $this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec5);
        $this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec6);
        $this->pdf->Ln(7);
        $this->pdf->TiskniOdstavec($odstavec7);
	$this->pdf->Ln(7);

        $this->pdf->Ln(20);
        $this->pdf->TiskniSaduBunek($podpisy, 0, 1);
     }

     public function uloz()
     {
        //$pdf->Output("doc.pdf",D);
        $cas = date("Ymd_His", time());
        $exportConfig = Projektor_App_Config::najdiSekciPodleJmena(Projektor_App_Config::SEKCE_EXPORT);
        if (!file_exists($exportConfig->pdf->directory)) throw new Exception('*** Chyba v '.__CLASS__."->".__METHOD__.': '."Neexistuje adresář pro export pdf souboru zadaný v Projektor_App_Config: ".$exportConfig->pdf->directory);
        $fileName = iconv('UTF-8', 'windows-1250', $exportConfig->pdf->directory.self::FILENAME_PREFIX)."id".$this->zajemce->identifikator." time".$cas.".pdf";
        if (file_exists($fileName)) unlink ($fileName);  //pro případ opakovaného pokusu o uložení v jedné sekundě (opakovaný klik na tlačítko)

        $this->pdf->Output($fileName, F);
        if (file_exists($fileName))
        {
            return $fileName;
        } else {
            return FALSE;
        }



        //  if (file_exists("./doku/smlouva". $Ucastnik->identifikator . ".pdf")) {
        //    unlink("./doku/smlouva". $Ucastnik->identifikator . ".pdf");
        //  }

        //  $pdf->Output("doku/smlouva". $Ucastnik->identifikator . ".pdf", F);

     }

}
?>