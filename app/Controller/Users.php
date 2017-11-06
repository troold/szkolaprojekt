<?php
namespace Controller;
use Dframe\Controller;
use Dframe\Config;

class UsersController extends Controller {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */


    public function login() {        
        $view = $this->loadView('Index');        
        
        return Response::render($view->fetch('user/login'));
    }

    public function register() {
        $view = $this->loadView('Index');
        
        return Response::render($view->fetch('user/register'));
    }
 
    public function logout(){
        $this->baseClass->session->end();
        //usuwanie cookie z last page
        unset($_COOKIE['currentPage']);
        setcookie("currentPage", "", time()-3600, "/");
        return $this->router->redirect('page/index');
    }

}
