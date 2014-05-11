<?php

namespace Application\Form;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class ContactForm extends Form {

    public function __construct($name = null) {
        parent::__construct('contact_form');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'fullname',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'id' => 'contact_fullname',
                'placeholder' => 'Full Name...',
                'required' => 'required',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Full Name',
                'label_attributes' => array(
                    'class' => 'col-sm-2 control-label',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'attributes' => array(
                'id' => 'contact_email',
                'placeholder' => 'Email ...',
                'required' => 'required',
                'class' => 'form-control',
            ),
            'options' => array(
                'label' => 'Email Adress',
                'label_attributes' => array(
                    'class' => 'col-sm-2 control-label',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'paragraph',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'id' => 'contact_message',
                'required' => 'required',
                'class' => 'form-control',
                'rows' => "7",
            ),
            'options' => array(
                'label' => 'Message',
                'label_attributes' => array(
                    'class' => 'col-sm-2 control-label',                    
                ),
            ),
        ));


        $this->add(array(
            'name' => 'csrf',
            'type' => 'Zend\Form\Element\Csrf',
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Contact',
                'id' => 'submitContact',
                'class' => 'btn btn-success',
            ),
        ));
    }

}

?>
