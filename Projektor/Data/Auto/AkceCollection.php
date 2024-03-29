<?php
class Projektor_Data_Auto_AkceCollection extends Projektor_Data_Collection
{
    const NAZEV_TRIDY_ITEM = "Projektor_Data_Auto_AkceItem";

###START_AUTOCODE

    /**
     * Metoda vrací Item, prvek kolekce Projektor_Data_Auto_AkceCollection typu Projektor_Data_Auto_AkceItem
     * @param Projektor_Data_Auto_AkceItem $object
     * @return \Projektor_Data_Auto_AkceItem
     */
    public function Item($id, Projektor_Data_Auto_AkceItem &$object=NULL){
        $object = new Projektor_Data_Auto_AkceItem($id); //factory na Item
        return $object;
    }

###END_AUTOCODE


   /**
    * Nstaví foltr ehere pro výběr akcí, na kterych je Item prihlasen.
    * @param $item Instance Item pro který se vyhledají akce
    * @return void
    */
    public function akceObjektu($item)
    {
        $ucastnikAkceCollection = new Projektor_Data_Auto_VzbUcastnikAkceCollection();
        $ucastnikAkceCollection->where("dbField°id_ucastnik_FK", "=", $item->id);
        $in = array();
        foreach ($ucastnikAkceCollection as $ucastnikAkceItem)
        {
            $in[] = $ucastnikAkceItem->dbField°id_akce_FK;
        }

//        $ua = new Projektor_Data_Auto_VzbUcastnikAkceItem;
//        $ua->dbField°id_ucastnik_FK;
//        $ua->dbField°id_akce_FK;
        $this->where("id", "IN", $in);
        return;
//            $this->where($nazevVlastnosti, $podminka, $hodnota)
//            $dbh = Projektor_App_Kontext::getDbh(Projektor_App_Config::DATABAZE_PROJEKTOR);
//            $query = "SELECT ~1 FROM ~2 WHERE ~3=:4";
//            $radky = $dbh->prepare($query)->execute(Projektor_Data_Auto_VzbUcastnikAkceCollection::ID_AKCE_FK, Projektor_Data_Auto_VzbUcastnikAkceCollection::TABULKA,
//            Projektor_Data_Auto_VzbUcastnikAkceCollection::ID_UCASTNIK_FK, $item->id)->fetchall_assoc();
//
//            foreach($radky as $radek)
//                    $vypis[] = self::najdiPodleId($radek[Projektor_Data_Auto_VzbUcastnikAkceCollection::ID_AKCE_FK]);
//
//            return $vypis;
    }
}
?>
