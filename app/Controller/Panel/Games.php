<?php
namespace Controller\Panel;
use Dframe\Config;
use Dframe\Router\Response;

class GamesController extends \Controller\AbstractPanel { 
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function pong(){
        $view = $this->loadView('Index');
        return Response::create($view->fetch('panel/games/pong'));
    }

    public function clicker(){
        $view = $this->loadView('Index');
        return Response::create($view->fetch('panel/games/clicker'));
    }

    public function matcher(){
        $view = $this->loadView('Index');
		return Response::create($view->fetch('panel/games/matcher'));
    }
}