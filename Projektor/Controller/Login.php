<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author pes2704
 */
class Projektor_Controller_Login extends Projektor_Controller_Stranka_Base {
    const SABLONA = "login.xhtml";

	protected function vychozi()
	{
if(isset($_COOKIE)) {
	$lastname=@$_COOKIE['lastname'];
        if (isset($lastname)) $lastname=trim($lastname);
    }
if(isset($_GET['uri'])) {
    $uri = $_GET['uri'];
}
else {
    $uri = @$_REQUEST['originating_uri'];
    if(!$uri) {                             //$_REQUEST['originating_uri' neexistuje a $uri pak také ne, pokud se sem přišlo ze zobrazené přuhlašovací stránky po stisku přihlásit
	$uri = "index.php";
    }
}
$warning = @$_GET['warning'];
//print_r($_GET);
        $form = new HTML_QuickForm2("login");
        $form->addDataSource(new HTML_QuickForm2_DataSource_Array(array
                    (
                        "name" => $lastname,    // po dobu životnosti cookie lastname vyplňuje do formuláře jméno posledního přihlášení
                    )));
        $form->addElement("hidden", "sent")->setValue(1);
        $fieldsetCredentials = $form->addElement('fieldset')->setLabel('Auth credentials');
        $name = $fieldsetCredentials->addElement('text', 'name', array('style' => 'width: 200px;'))
                   ->setLabel('Username: ');
        $password = $fieldsetCredentials->addElement('password', 'newPassword', array('style' => 'width: 200px;'))
                           ->setLabel('Password: ');
        $name->addRule('required', 'Username is required', null,
                   HTML_QuickForm2_Rule::ONBLUR_CLIENT_SERVER);
        $password->addRule('required', 'Password is required', null,
                   HTML_QuickForm2_Rule::ONBLUR_CLIENT_SERVER);
$submitGrp = $form->addElement('group')->setSeparator('&nbsp;&nbsp;&nbsp;');

$submitButton = $submitGrp->addElement('submit', 'testSubmit', array('value' => 'Send'));






//        $form->addElement("text", "name", "Jméno uživatele:");
//        $form->addElement("password", "password", "Heslo:");
//        $form->addElement("submit", "login_submit", "Přihlásit");
//
//        $form->addRule("name", "Chybí jméno uživatele!", "required");
//        $form->addRule("password", "Chybí heslo!", "required");
        /* Zpracovani */
        if($form->validate())
        {
            $form->removeChild($submitButton);
            $form->toggleFrozen(TRUE);
            $data = $form->getValue();
        setcookie("lastname",$data["name"],time()+3600);

        $userid = Projektor_Auth_Authentication::check_credentials($data["name"],$data["password"]);

        //echo "name:".$name." pass:".$password." userid:".$userid."<br>";
        if($userid){
            $cookie = new Projektor_Auth_Cookie($userid);
            $cookie->set();
            $app = Slim::getInstance();
            $app->redirect($app->urlFor('login'));

//            header("Location: $uri");
        }
        else {
            $this->novaPromenna("warning", "Přihlášení se nezdařilo");
        }
    }
$renderer = HTML_QuickForm2_Renderer::factory('default');
$form->render($renderer);
// Output javascript libraries, needed for client-side validation
$html = $renderer->getJavascriptBuilder()->getLibraries(true, true);
$html .= $renderer;

 //vydumpovani  databaze
 //exec("C:\\XAMPP\\mysql\\bin\\mysqldump --user=root --password=spravce projektor2kancelar>D:\\%COMPUTERNAME%_sql.sql");




            /* Vygenerovani filtrovaciho formulare */
            $this->novaPromenna("loginformular", $html);
            $templateVariables['html'] =  $html;
            $app = Slim::getInstance();
            return $app->render('tal_to_twig.twig', $templateVariables);
	}

    }

?>
