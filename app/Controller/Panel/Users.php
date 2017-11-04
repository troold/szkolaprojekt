<?php
namespace Controller\Panel;
use Dframe\Config;

class UsersController extends \Controller\AbstractPanelController { 
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function one(){
        $view = $this->loadView('index');
		return Response::create($view->fetch('panel/user/one')));
    }
}