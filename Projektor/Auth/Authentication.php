<?php
//require_once "DB.inc";

//class Authentication {
class Projektor_Auth_Authentication {
    public static function check_credentials($name,$password) {
        $user = new Projektor_Data_Auto_SysUsersItem();
        $user->najdiPodleJmena($name);
        if($user->dbField°authtype!=NULL){
            switch ($user->dbField°authtype){
                case "password":
                    if($user->dbField°password==md5($password))
                    {
                        return $user->id;
                    }
                    else
                    {
                        return NULL;
                    }
            }
        }
    }
}

?>