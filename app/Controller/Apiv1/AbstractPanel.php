<?php
namespace Controller\apiv1;
use Dframe\Controller;
use Dframe\Config;

abstract class AbstractPanelController extends Controller {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */
    public function start(){
        if($this->baseClass->session->authLogin() != true){
            return Response::create(json_encode(array('return' => '0', 'response' => 'unauthorized access')))
            ->status(401)
            ->header(array('Content-Type' => 'application/json'));         
        }
    }

}