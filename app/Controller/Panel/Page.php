<?php
namespace Controller\Panel;
use Dframe\Config;
use Dframe\Router\Response;

class PageController extends \Controller\AbstractPanel {
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function index(){
    	$view = $this->loadView('Index');
		return Response::create($view->fetch('panel/index'));
    }
}