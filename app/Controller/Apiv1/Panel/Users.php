<?php
namespace Controller\Apiv1\Panel;
use Dframe\Config;

class UsersController extends \Controller\Apiv1\AbstractPanel {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function one(){
        return Response::create(json_encode(array('return' => '1', 'user' => array('userId' = '1'))))
            ->header(array('Content-Type' => 'application/json')); 
    }
}