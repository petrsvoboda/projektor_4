<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Projektor_Slim_Slim extends Slim
{
    // vlastnost pro uložení kontroleru
    public $controller;

    /**
     * Metoda přetěžuje metodu render třídy Slim. K poli data (druhý parametr metody render) přidá položky uložené ve vlastnosti baseData kontroleru
     * a tím je zpřístupní pro renderovanou template.
     * Ve  vlastnosti baseData kontroleru jsou uložené proměnné vždy dotupné pro všechny template kdekoli použité na stránce.
     * Tyto položky jsou naplněny v Projektor_Controller_Stranka_Base konstruktoru.
     *
     * @param type $template
     * @param type $data
     * @param type $status
     */
    public function render($template, $data = array(), $status = null )
    {
        $data = array_merge($data, $this->controller->baseData);
        parent::render($template, $data, $status);
    }
}
?>
