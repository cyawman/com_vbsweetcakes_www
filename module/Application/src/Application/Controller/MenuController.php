<?php


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MenuController extends AbstractActionController {
    
    public function indexAction() {
        return new ViewModel();
    }
    
    public function estimateCostAction(){
        return new ViewModel();
    }
    
}