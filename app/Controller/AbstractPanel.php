<?php
namespace Controller;
use Dframe\Controller;
use Dframe\Config;

abstract class AbstractPanelController extends Controller {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */
    public function start(){
        $msg = new Messages(new Session('hashSaltRandomForSession')); // Join the current session
        $msg->add('s', 'Success Message!');
        //$msg->add('s', 'Success Message!', 'page/index'); // with redirect 
        $msg->hasMessages('success'): // Will return array['success']
        $msg->hasMessages(): // Will return all array

        $msg->clear('success'); // remove success msg
        $msg->clear(); // remove all msg
    }

}