<?php
namespace Controller\Apiv1;
use Dframe\Controller;
use Dframe\Config;
use Dframe\Router\Response;

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
                return $view->renderJSON(array('return' => '0', 'response' => $return['response']));
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

    public function editProfile() {
        $userModel = $this->loadModel('Users');
        $view = $this->loadView('Index');

        if(isset($_POST) AND !empty($_POST)){
            $data = array();
            
            if(isset($_POST['firstname']))
                $data['name'] = $_POST['firstname'];

            if(isset($_POST['surname']))
                $data['surname'] = $_POST['surname'];

            if(isset($_POST['password']))
                $data['password'] = md5($_POST['password']);

            if(isset($_POST['town']))
                $data['town'] = $_POST['town'];

            $return = $userModel->editProfile($data);

            if($return['return'] == true){
                return $view->renderJSON(array('return' => '1'));
            }elseif($return['return'] == false AND isset($return['response'])){
                return $view->renderJSON(array('return' => '0', 'response' => 'wystapil bład'));
            }
        }
    }

    public function updateScore() {
        $userModel = $this->loadModel('Users');
        $view = $this->loadView('Index');
        $userId = $_SESSION['id'];

        if(isset($_POST) AND !empty($_POST)){
            $return = $userModel->updateScore($userId, $_POST['score']);

            if($return['return'] == true){
                return $view->renderJSON(array('return' => '1'));
            }elseif($return['return'] == false AND isset($return['response'])){
                return $view->renderJSON(array('return' => '0', 'response' => 'wystapil bład'));
            }
        }

        return $view->renderJSON(array('return' => '0', 'response' => 'Niepoprawne parametry'));
    }
 
	public function logout(){
        $userModel = $this->loadModel('Users');
        $view = $this->loadView('Index');

        $this->baseClass->session->end();
        //usuwanie cookie z last page
        unset($_COOKIE['currentPage']);
        setcookie("currentPage", "", time()-3600, "/");
        return $view->renderJSON(array('return' => '1', 'response' => 'Wylogowano'));
	}

}
