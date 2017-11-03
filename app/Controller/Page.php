<?php
namespace Controller;
use Dframe\Controller;
use Dframe\Config;

class PageController extends Controller 
{
    /** 
     * Dynamiczny loader stron wykrywa akcje jako plik i stara sie go za ładować
     */

    public function init(){
    	if(method_exists($this, $_GET['action'])) // Skip dynamic page if method in controller exist
    		return;
    	

        $smartyConfig = Config::load('view/smarty');
        $view = $this->loadView('Index');

        $patchController = $smartyConfig->get('setTemplateDir', APP_DIR.'View/templates').'/page/'.htmlspecialchars($_GET['action']).$smartyConfig->get('fileExtension', '.html.php');
        
        if(!file_exists($patchController)){
        	$this->router->redirect('page/index');
        	return;
        }
        
        return $view->render('page/'.htmlspecialchars($_GET['action']));
        
    }

    public function index() {
        $view = $this->loadView('Index');

        $view->assign('contents', 'Example assign');
        return $view->render('index');

    }
}