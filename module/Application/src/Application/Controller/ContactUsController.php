<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm;
use Application\Form\ContactValidator;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
// Doctrine Annotations
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class ContactUsController extends AbstractActionController {
  private $em;
     public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function indexAction() {
        $form = new ContactForm();
        $request = $this->getRequest();
        if ($request->isPost()) {

            $formValidator = new ContactValidator(); 
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }

            if ($form->isValid()) { 
                $message='Isvalid';
                $post=$form->getData();
                die(var_dump($post));
                $params=$post;
                $email=new EmailController();
               return $result=$email->sendAlmaksMail('contactUs', $params);
                 //$message=$result;
                 
                
            }
            else
                     die(var_dump($form->isValid()));
            
 
            
            
        }
        if (!isset($message))
        return new ViewModel(array('form' => $form));
        else
        return new ViewModel(array('message' => $message));            
    }

}

?>
