<?php
namespace Controller;
use Dframe\Controller;
use Dframe\Config;

abstract class AbstractPanelController extends Controller {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */
    public function start(){

        if(authLogin() != true)
            return $this->baseClass->msg('e', 'Nie jestes zalogowany','index.html.php');

        $this->baseClass->msg('s', 'Success Message!','page/index.html.php');
    }

}