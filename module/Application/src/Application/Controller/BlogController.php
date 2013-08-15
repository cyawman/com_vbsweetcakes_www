<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController {
    
    public function indexAction() {
        return new ViewModel();
    }
    
    public function viewAction(){
        $slug = $this->params()->fromRoute('slug', null);

        $template = "application/blog/" . $slug;

        $resolver = $this->getEvent()
                ->getApplication()
                ->getServiceManager()
                ->get('Zend\View\Resolver\TemplatePathStack');

        if (false === $resolver->resolve($template)) {
            $this->getResponse()->setStatusCode(404);
        }

        $view = new ViewModel();
        $view->setTemplate($template);
        return $view;
    }
    
}