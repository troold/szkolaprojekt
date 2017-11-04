<?php
namespace Controller;
use Dframe\Controller;
use Dframe\Config;

abstract class AbstractPanel extends Controller {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */
    public function start(){

        if($this->baseClass->session->authLogin() != true){
            return $this->baseClass->msg->add('e', 'Nie jestes zalogowany','page/index');
        }

        $this->baseClass->msg->add('s', 'Success Message!','panel/index');

    }

}