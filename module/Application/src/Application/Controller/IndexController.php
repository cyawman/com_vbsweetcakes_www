<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Message;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $view = new ViewModel();

        $form = $this->getServiceLocator()->get('ContactForm');

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                try {
                    $mail = new Message();
                    $mail->setBody('Dear Sweet Cakes,\n' . $form->get('comments')->getValue() . '\n ~ ' . $form->get('name')->getValue());
                    $mail->setFrom($form->get('email')->getValue(), $form->get('name')->getValue());
                    $mail->addTo('cyawman@gmail.com', 'Chris Yawman');
                    $mail->setSubject('VBSweetCakes.com Contact Form');

                    $config = $this->getServiceLocator()->get('config');
                    
                    $transport = new Smtp();
                    $options = new SmtpOptions($config['ses']);
                    $transport->setOptions($options);
                    $transport->send($mail);
                } catch (\Exception $e) {
                    $view->setVariable('mailException', $e->getMessage());
                }
                $this->flashMessenger()->addSuccessMessage('Thank you for contacting us! We will respond to you shortly :)');
                return $this->redirect()->toRoute('home');
            }
        }
        if ($this->flashMessenger()->hasSuccessMessages()) {
            $view->setVariable('successMessages', $this->flashMessenger()->getSuccessMessages());
        }
        $view->setVariable('form', $form);
        return $view;
    }

}