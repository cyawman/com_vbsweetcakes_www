<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class ContactForm extends Form implements InputFilterProviderInterface {

    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'type' => 'text',
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Enter name',
                'required' => 'required'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'options' => array(
                'label' => 'Email address',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'type' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Enter email address',
                'required' => 'required'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'comments',
            'options' => array(
                'label' => 'Comments',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'id' => 'comments',
                'class' => 'form-control',
                'required' => 'required'
            )
        ));
        $this->add(new \Zend\Form\Element\Csrf('security'));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-default',
                'value' => 'Submit',
            ),
        ));
    }

    public function getInputFilterSpecification() {
        return array(
            'name' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 4,
                            'max' => 32
                        )
                    )
                )
            ),
            'email' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'EmailAddress'
                    )
                )
            ),
            'comments' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                )
            )
        );
    }

}