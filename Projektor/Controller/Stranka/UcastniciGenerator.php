<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    class Projektor_Controller_Stranka_UcastniciGenerator extends Projektor_Controller_Stranka_Generator
    {
	const SABLONA = "seznam.xhtml";

        protected function generujStranku()
        {
            $stranka = new Projektor_Controller_Stranka_Ucastnici($this->uzel, self::SABLONA);
            return $stranka;
        }
    }
?>
