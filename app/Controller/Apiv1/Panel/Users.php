<?php
namespace Controller\Apiv1\Panel;
use Dframe\Config;
use Dframe\Router\Response;

class UsersController extends \Controller\Apiv1\AbstractPanel {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function one(){
    	$method = $_SERVER['REQUEST_METHOD'];
    	$userModel = $this->loadModel('Users');
    	$view = $this->loadView('Index');
    	$data = $userModel->one();

        switch ($method) {
        case 'POST':  
                return array($data);
            break;
        case 'GET':
        		$return = array(
        		'user_id' => $data['user_id'],
                'username' => $data['login'],
                'email' => $data['email'],
                'firstname' => $data['name'],
                'surname' => $data['surname'],
                'town' => $data['town'],
        		'points' => $data['points']
        		);
            	return $view->renderJSON(array('return' => '1', 'response' => $return));
            break;
    	}
        
        return $view->renderJSON(array('return' => '0', 'response' => 'Niepoprawne parametry'));
    }
}