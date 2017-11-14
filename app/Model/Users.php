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

    public function register($login, $password, $firstname, $surname, $email, $town){
        $dataArray = array(
            'login' => $login,
            'password' => md5($password),
            'email' => $email,
            'name' => ucwords($firstname),
            'surname' => ucwords($surname),
            'town' => ucwords($town),
        );
        if(isset($dataArray)){
            $insert = $this->baseClass->db->insert('users', $dataArray)->getLastInsertId();
            return $this->methodResult(true, $dataArray);         
        }else{
            return $this->methodResult(false, array('response' => 'Niepoprawne dane do rejestracji!'));     
        }
            
        return $this->methodResult(false, array('response' => 'Niepoprawne dane do rejestracji!'));
        
    }

    public function editProfile($array){

        $userId = $_SESSION['id'];
        $where = array('user_id' => $userId);
        $update = $this->baseClass->db->update('users', $array, $where)->affectedRows();

        if(isset($array)){
            $update = $this->baseClass->db->insert('users', $array)->getLastInsertId();
            return $this->methodResult(true, $array);         
        }else{
            return $this->methodResult(false, array('response' => 'Wystąpił błąd!'));     
        }

        return $this->methodResult(false, array('response' => 'Error'));
    }

    public function getUser($login){

        $row = $this->baseClass->db->pdoQuery('SELECT * FROM users WHERE login = ?', array($login))->result();

        if(isset($row['user_id']))          
            return $this->methodResult(true, $row);        
            
        return $this->methodResult(false, array('response' => 'Nie ma takiego użytkownika.'));
        
    }

    public function getMail($email){

        $row = $this->baseClass->db->pdoQuery('SELECT * FROM users WHERE email = ?', array($email))->result();

        if(isset($row['user_id']))          
            return $this->methodResult(true, $row);        
            
        return $this->methodResult(false, array('response' => 'Nie ma takiego maila.'));
        
    }

    public function updateScore($userId, $score){
        $affectedRows = $this->baseClass->db->pdoQuery('UPDATE users SET points = points + ? WHERE id = ?', array($score, $userId))->affectedRows();

        if($affectedRows >= 0){
            return $this->methodResult(true);
        }

        return $this->methodResult(false, array('response' => 'Error'));
    }

    public function one(){
    	$row = $this->baseClass->db->pdoQuery('SELECT * FROM users WHERE user_id = ?', array($_SESSION['id']))->result();

        if(isset($row['user_id']))          
            return $this->methodResult(true, $row);        
            
        return $this->methodResult(false, array('response' => 'Niepoprawne id użytkownika'));
    }
}