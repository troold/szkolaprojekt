<?php
namespace Controller\Apiv1;
use Dframe\Controller;
use Dframe\Config;

class UsersController extends Controller {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */


	public function login() {
		$userModel = $this->loadModel('Users');
		$view = $this->loadView('Index');

        if(isset($_POST) AND !empty($_POST)){
            $return = $userModel->login($_POST['login'], $_POST['password']);

            if($return['return'] == true){
               $this->baseClass->session->register();
               $this->baseClass->session->set('id', $return['user_id']);

               return $view->renderJSON(array('return' => '1'));
               
            }elseif($return['return'] == false AND isset($return['response'])){
                return $view->renderJSON(array('return' => '0', 'response' => 'wystapil bład'));
            }

        } 
        
        return $view->renderJSON(array('return' => '0', 'response' => 'Niepoprawne parametry'));
	}

    public function register() {
        $userModel = $this->loadModel('Users');
        $view = $this->loadView('Index');
        $getUser = $userModel->getUser($_POST['login']);
        $getMail = $userModel->getMail($_POST['email']);

        if($getUser['return'] != false)
            return $view->renderJSON(array('return' => '0', 'response' => 'Podany login jest już zajęty.'));

        if($getMail['return'] != false)
            return $view->renderJSON(array('return' => '0', 'response' => 'Podany email jest już zajęty.'));

        if(isset($_POST) AND !empty($_POST)){
            $return = $userModel->register($_POST['login'], $_POST['password'], $_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['town']);

            if($return['return'] == true){
                return $view->renderJSON(array('return' => '1'));
               
            }elseif($return['return'] == false AND isset($return['response'])){
                return $view->renderJSON(array('return' => '0', 'response' => 'wystapil bład'));
            }

        }
        
        return $view->renderJSON(array('return' => '0', 'response' => 'Niepoprawne parametry'));
    }
 
	public function logout(){
        $this->baseClass->session->end();
        //usuwanie cookie z last page
        unset($_COOKIE['currentPage']);
        setcookie("currentPage", "", time()-3600, "/");
        return $view->renderJSON(array('return' => '0', 'response' => 'Niepoprawne parametry'));
	}

}