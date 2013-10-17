<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $view = new ViewModel();

        $form = $this->getServiceLocator()->get('ContactForm');

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                try {

                    $html = new MimePart('Dear Sweet Cakes,<br /><br />' . $form->get('comments')->getValue() . '<br /><br /> ~ ' . $form->get('name')->getValue());
                    $html->type = "text/html";

                    $body = new MimeMessage();
                    $body->addPart($html);

                    $mail = new Message();
                    $mail->setBody($body);
                    $mail->setFrom('vbsweetcakes@gmail.com', 'Sweet Cakes');
                    $mail->setReplyTo($form->get('email')->getValue());
                    $mail->addTo('vbsweetcakes@gmail.com', 'Sweet Cakes');
                    $mail->addBcc('cyawman@gmail.com', 'Chris Yawman');
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