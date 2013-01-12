<?php
require_once("../autoload.php");
echo("<pre>");

echo Projektor_Data_Seznam_SPrechodUcastnikAkce::jeMozny(Projektor_Data_Seznam_SStavUcastnikAkce::najdiPodleId(3), Projektor_Data_Seznam_SStavUcastnikAkce::najdiPodleId(4));