<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm; 
use Application\Form\ContactValidator; 

class ContactUsController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new ContactForm(); 
    $request = $this->getRequest(); 

    if($request->isPost()) 
    { 
        $user = new (); 
        
        $formValidator = new ContactValidator(); 
        { 
            $form->setInputFilter($formValidator->getInputFilter()); 
            $form->setData($request->getPost()); 
        } 
         
        if($form->isValid()){ 
        { 
            $user->exchangeArray($form->getData()); 
        } 
    } 
    
    
        return new ViewModel(array('form' => $form));
    }
}

?>
