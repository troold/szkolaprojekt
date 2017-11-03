<?php
namespace Model;
/**
*
*/
class UsersModel extends \Model\Model
{



    public function login($login, $password){

        $row = $this->baseClass->db->pdoQuery('SELECT * FROM users WHERE login = ? AND (password = ? OR password = ?)', array($email, md5($password.SALT), md5($password)))->result();

        if(isset($row['id'])){
            if($row['confirmed'] == 0)
                return $this->methodResult(false, array('response' => 'Dotychczas nie potwierdzono adresu e-mail Twojego konta'));
            
            return $this->methodResult(true, $row);
        }
            
        return $this->methodResult(false, array('response' => 'Niepoprawne dane do logowania!'));
        
    }
}