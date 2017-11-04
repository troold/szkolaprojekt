<?php
namespace Controller\Panel;
use Dframe\Config;

class UsersController extends \Controller\AbstractPanel {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function one(){
        $view->loadView('index');
		return Response::create($view->fetch('panel/user/one')));
    }
}