<?php
  //define('FPDF_FONTPATH','/fpdf16/font/');
  //require('/fpdf16/fpdf.php');
        define('FPDF_FONTPATH','classes/PDF/Fonts/');
//	require_once("autoload.php");  
  $pdfpole = $_POST;
 
  
  foreach($pdfpole  as $klic => $hodnota) {
      $pdfpole['$klic'] = trim($pdfpole['$klic']);  //??
  }
  


    $pdfhlavicka = PDFContext::dejHlavicku();
		//$pdfhlavicka->text("Individuální plán účastníka - 1. část");
		$pdfhlavicka->zarovnani("C");
		$pdfhlavicka->vyskaPisma(14);
		$pdfhlavicka->obrazek("./PDF/logo_agp_bw.png", null, null,90,12);
		
    $pdfpaticka = PDFContext::dejPaticku();
		$pdfpaticka->text("Souhlas zájemce o zaměstnání s poskytováním osobních údajů  Zájemce: ".$Zajemce->identifikator);
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
	          $celeJmeno =  @$pdfpole["titul"]." ".@$pdfpole["jmeno"]." ".@$pdfpole["prijmeni"];
	          if (@$pdfpole["titul_za"]) 
		  {
			$celeJmeno = $celeJmeno.", ".@$pdfpole["titul_za"];
		  }
	    $stranaUcastnik->PridejBunku("jméno, příjmení, titul: ", $celeJmeno,1);
		$adresapole="";
                if (@$pdfpole["ulice"]) {
                    $adresapole .=   @$pdfpole["ulice"];
                    if  (@$pdfpole["mesto"])  {  $adresapole .=  ", ".   @$pdfpole["mesto"];}
                    if  (@$pdfpole["psc"])    {  $adresapole .= ", " . @$pdfpole["psc"]; }
                }
                else {
                    if  (@$pdfpole["mesto"])  {
                        $adresapole .= @$pdfpole["mesto"];
                        if  (@$pdfpole["psc"])    {  $adresapole .= ", " . @$pdfpole["psc"]; }
                    }
                    else {
                         if  (@$pdfpole["psc"])  {$adresapole .=  @$pdfpole["psc"];}
                    } 
                }
            $stranaUcastnik->PridejBunku("bydliště: ", $adresapole,1);
	    $stranaUcastnik->PridejBunku("nar.: ", @$pdfpole["datum_narozeni"],1);                
	    $stranaUcastnik->PridejBunku("identifikační číslo zájemce: ", $Zajemce->identifikator,1);
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

	$kk = $Kancelar->plny_text;
       	
    	$podpisy->PridejBunku("Kontaktní kancelář: ", $kk, 1); 
    	$podpisy->PridejBunku("Dne ", @$pdfpole["datum_vytvor_smlouvy"],1);
	$podpisy->NovyRadek(0,1);
	$podpisy->PridejBunku("                       Zájemce:","",1);
        $podpisy->NovyRadek(0,5);
        //  $podpisy->NovyRadek(0,3);
    	$podpisy->PridejBunku("                       ......................................................","",1);
     	$podpisy->PridejBunku("                           " . str_pad($celeJmeno, 30, " ", STR_PAD_BOTH),"",1);
//	$podpisy->PridejBunku("                           " . $celeJmeno . "                                                                         " . $User->name,"",1);

        //$podpisy->PridejBunku("                                     podpis účastníka                                                                podpis, jméno a příjmení","",1);
        $podpisy->NovyRadek();



//**********************************************

    $pdfdebug = PDFContext::dejDebug();
    $pdfdebug->debug(0);

    ob_clean;
	$pdf = new Projektor_Pdf_VytvorPDF ();

	$pdf->AddFont('Times','','times.php');
	$pdf->AddFont('Times','B','timesbd.php');
	$pdf->AddFont("Times","BI","timesbi.php");
	$pdf->AddFont("Times","I","timesi.php");

        $pdf->AddPage();   //uvodni stranka
        $pdf->Ln(10);
        $pdf->TiskniOdstavec($titulka1);
        $pdf->TiskniOdstavec($titulka2);
        
               
        $pdf->Ln(10); 
        $pdf->TiskniSaduBunek($stranaUcastnik);
	
	$pdf->Ln(15); 
	$pdf->TiskniOdstavec($dohoda1);	
        
	$pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec1);
        $pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec2);
        $pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec3);
        $pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec4);
        $pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec5);
        $pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec6);
        $pdf->Ln(7); 
        $pdf->TiskniOdstavec($odstavec7);        
	$pdf->Ln(7); 	 
        
        $pdf->Ln(20);
        $pdf->TiskniSaduBunek($podpisy, 0, 1);

  //$pdf->Output("doc.pdf",D);
  
$filepathprefix= iconv('UTF-8', 'windows-1250', "./doku/AGP_SOUHLAS_ZA_");  //C:/_Export Projektor/PDF/AGP_SOUHLAS_ZA_
if (file_exists($filepathprefix. $Zajemce->identifikator . ".pdf"))  	{
    	unlink($filepathprefix. $Zajemce->identifikator . ".pdf");
}

$pdf->Output($filepathprefix. $Zajemce->identifikator . ".pdf", F);  
  
  
  
//  if (file_exists("./doku/smlouva". $Ucastnik->identifikator . ".pdf")) {
//    unlink("./doku/smlouva". $Ucastnik->identifikator . ".pdf");
//  }
  
//  $pdf->Output("doku/smlouva". $Ucastnik->identifikator . ".pdf", F);
  
  
 

?>