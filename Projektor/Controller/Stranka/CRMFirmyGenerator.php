<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    class Projektor_Controller_Stranka_CRMFirmyGenerator extends Projektor_Controller_Stranka_Generator
    {
	const SABLONA = "seznam.xhtml";

        protected function generujStranku()
        {
            $stranka = new Projektor_Controller_Stranka_CRMFirmy($this->uzel, self::SABLONA);
            return $stranka;
        }
    }
?>
