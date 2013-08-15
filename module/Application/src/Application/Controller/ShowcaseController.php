<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ShowcaseController extends AbstractActionController {

    /**
     * List the Albums
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction() {
        return new ViewModel();
    }

    /**
     * List the Showcases in the Album
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function albumAction() {
        $this->layout('layout/interactive');
        
        $album = $this->params()->fromRoute('album');
        $slug = $this->params()->fromRoute('slug', null);

        $template = "application/showcase/" . $album;
        if (!is_null($slug)) {
            $template .= "/" . $slug;
        }

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