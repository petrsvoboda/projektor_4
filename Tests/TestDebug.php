<?php
class Projektor_DB_Mysql_TestDebug extends Projektor_DB_Mysql_Test {
  protected $elapsedTime;
  public function execute($query) {
    // set timer;
    parent::execute($query);
    // end timer;
  }
  public function getElapsedTime() {
    return $this->$elapsedTime;
  }
}

?>