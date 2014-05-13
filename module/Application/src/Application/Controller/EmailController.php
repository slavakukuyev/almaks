<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mail;
use Zend\Mime\Part as MimePart;
use Zend\Mime\Message as MimeMessage;

class EmailController extends AbstractActionController {

    public function indexAction() {
        
    }

    public function sendAlmaksMail($type, $params) {
        $result = NULL;
        if ($type == 'contactUs') {
            $result = $this->contactUs($type, $params);
        }

        return $result;
    }

    private function contactUs($email, $name, $password) {
        $view = new ViewModel(array('title' => 'confirmation', 'email' => $email, 'name' => $name, 'password' => $password));
        $view->setTemplate('store/email/'+ $type);
        $renderer = $this->getServiceLocator()->get('ViewRenderer');
        $content = $renderer->render($view);


        $html = new MimePart($content);
        $html->type = "text/html";
        $body = new MimeMessage();
        $body->setParts(array($html,));


        $mail = new Mail\Message();
        $mail->setBody($body);
        $mail->setFrom('slava.speedo@gmail.com', 'MyStore');
        $mail->addTo($email, $name);
        $mail->setSubject('Confirmation Mail');

        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }

}
