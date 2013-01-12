<?php
/**
 * Description of CKancelarCollection
 *
 * @author pes2704
 */
class Projektor_Data_Auto_CProjektCollection extends Projektor_Data_CiselnikCollection
{
    const NAZEV_TRIDY_ITEM = "Projektor_Data_Auto_CProjektItem";

###START_AUTOCODE

    /**
     * Metoda vrací Item, prvek kolekce Projektor_Data_Auto_CProjektCollection typu Projektor_Data_Auto_CProjektItem
     * @param Projektor_Data_Auto_CProjektItem $object
     * @return \Projektor_Data_Auto_CProjektItem
     */
    public function Item($id, Projektor_Data_Auto_CProjektItem &$object=NULL){
        $object = new Projektor_Data_Auto_CProjektItem($id); //factory na Item
        return $object;
    }

###END_AUTOCODE
    
    /**
        * Vraci záznamy z tabulky přiřazení uživatel-projekt sys_acc_usr_projekt,
        * odpovídající zadanému id uživatele a id projektu.
        * @param $userid identifikátor uživatele
        * @param $kancelarid Identifikátor projektu
        * @return array Identifikátor řádku s povoleným projektem uživatele.
        */
    public function dejPovoleneProjekty($userId)
    {
        $proj = new Projektor_Data_Auto_SysAccUsrProjektCollection;
        $proj->where("dbField°id_sys_users", "=", $userId);
        foreach ($proj as $item) {
            $list[] = $item->dbField°id_c_projekt;
        }
        $this->where("dbField°id_c_projekt", "IN", $list);
    }
}

?>
