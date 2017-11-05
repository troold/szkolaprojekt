<?php
namespace Controller\Panel;
use Dframe\Config;
use Dframe\Router\Response;

class UsersController extends \Controller\AbstractPanel { 
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function index(){
        $view = $this->loadView('Index');
		return Response::create($view->fetch('panel/user/index'));
    }

    public function one(){
        $view = $this->loadView('Index');
		return Response::create($view->fetch('panel/user/one'));
    }

    public function pong(){
        $view = $this->loadView('Index');
		return Response::create($view->fetch('panel/games/pong'));
    }
}