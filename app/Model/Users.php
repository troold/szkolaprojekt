<?php
namespace Model;
/**
*
*/
class UsersModel extends \Model\Model
{



    public function login($login, $password){

        $row = $this->baseClass->db->pdoQuery('SELECT * FROM users WHERE login = ? AND (password = ? OR password = ?)', array($login, md5($password.SALT), md5($password)))->result();

        if(isset($row['user_id']))          
            return $this->methodResult(true, $row);        
            
        return $this->methodResult(false, array('response' => 'Niepoprawne dane do logowania!'));
        
    }

    public function one($userId){
    	$row = $this->baseClass->db->pdoQuery('SELECT * FROM users WHERE user_id = ?', array($userId))->result();

        if(isset($row['user_id']))          
            return $this->methodResult(true, $row);        
            
        return $this->methodResult(false, array('response' => 'Niepoprawne id użytkownika'));
    }
}