<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Feed\Writer\Feed;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Form\Element;
use Application\Entity\Contact;

class IndexController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function sitemapAction() {
        $this->getResponse()->getHeaders()->addHeaders(array('Content-type' => 'text/xml'));
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function rssAction() {
        $this->getResponse()->getHeaders()->addHeaders(array('Content-type' => 'text/xml'));

        $feed = new Feed();
        $feed->setTitle('Sweet Cakes Blog');
        $feed->setDescription('RSS Feed for Sweet Cakes Blog');
        $feed->setLink('http://www.vbsweetcakes.com');
        $feed->setFeedLink('http://www.vbsweetcakes.com/rss', 'rss');
        $feed->addAuthor(array(
            'name' => 'Rebecca',
            'email' => 'rguthrie82@gmail.com',
            'uri' => 'http://www.vbsweetcakes.com',
        ));
        $feed->setDateModified(time());

        $entry = $feed->createEntry();
        $entry->setTitle('Halloween Cakes and Cupcakes');
        $entry->setLink('http://www.vbsweetcakes.com/blog/halloween-cakes-and-cupcakes');
        $entry->addAuthor(array(
            'name' => 'Rebecca',
            'email' => 'rguthrie82@gmail.com',
            'uri' => 'http://www.vbsweetcakes.com',
        ));
        $entry->setDateModified(time());
        $entry->setDateCreated(time());
        $entry->setDescription('Amazing Cake and Cupcake options for Halloween.');
        $entry->setContent('Halloween is all about treats. Sweet Cakes of Virginia Beach has just the cakes and cupcakes for the occassion.');
        $feed->addEntry($entry);

        $rss = $feed->export('rss');

        $view = new ViewModel();
        $view->setTerminal(true);
        $view->setVariable('rss', $rss);
        return $view;
    }

    public function viewAction() {
        $slug = $this->params()->fromRoute('slug', null);

        $template = "application/index/" . $slug;

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

    public function contactAction() {
        $contact = new Contact();
        $builder = new AnnotationBuilder();
        $form = $builder->createForm($contact);
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
                $this->flashMessenger()->addSuccessMessage('Thank you! Your message has been sent.');
                $this->redirect()->toRoute('success');
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function successAction() {
        return new ViewModel(array('flashMessenger' => $this->flashMessenger()));
    }

}