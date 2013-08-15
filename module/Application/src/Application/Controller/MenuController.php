<?php


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Form\Element;
use Application\Entity\CostEstimator;

class MenuController extends AbstractActionController {
    
    public function indexAction() {
        return new ViewModel();
    }
    
    public function estimateCostAction(){
        $estimate = null;
        
        $estimator = new CostEstimator();
        $builder = new AnnotationBuilder();
        $form = $builder->createForm($estimator);
        $form->add(new Element\Csrf('security'));
        $form->add(array(
            'name' => 'send',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Submit',
            )
        ));

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $estimate = "$100";
            }
        }

        return new ViewModel(array('form' => $form, 'estimate' => $estimate));
    }
    
}