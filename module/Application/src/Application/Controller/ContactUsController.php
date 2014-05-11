<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm;
use Application\Form\ContactValidator;

class ContactUsController extends AbstractActionController {

    public function indexAction() {
        $form = new ContactForm();
        $request = $this->getRequest();

        if ($request->isPost()) {

            $formValidator = new ContactValidator(); 
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }

            if ($form->isValid()) { {
                 $message=var_dump($form->getData());
                }
            }
 $message="POST";
            
            
        }
        if (!isset($message))
        return new ViewModel(array('form' => $form));
        else
        return new ViewModel(array('message' => $message));            
    }

}

?>
