<?php
/**
 * Description of CKancelarCollection
 *
 * @author pes2704
 */
class Projektor_Data_Auto_CKancelarCollection extends Projektor_Data_CiselnikCollection
{
    const NAZEV_TRIDY_ITEM = "Projektor_Data_Auto_CKancelarItem";

###START_AUTOCODE

    /**
     * Metoda vrací Item, prvek kolekce Projektor_Data_Auto_CKancelarCollection typu Projektor_Data_Auto_CKancelarItem
     * @param Projektor_Data_Auto_CKancelarItem $object
     * @return \Projektor_Data_Auto_CKancelarItem
     */
    public function Item($id, Projektor_Data_Auto_CKancelarItem &$object=NULL){
        $object = new Projektor_Data_Auto_CKancelarItem($id); //factory na Item
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
    public function dejPovoleneKancelare($userId)
    {
        $proj = new Projektor_Data_Auto_SysAccUsrKancelarCollection;
        $proj->where("dbField°id_sys_users", "=", $userId);
        foreach ($proj as $item) {
            $list[] = $item->dbField°id_c_kancelar;
        }
        $this->where("dbField°id_c_kancelar", "IN", $list);

    }

}

?>
