<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Almaks\Controller\Index' => 'Almaks\Controller\IndexController',
            'Almaks\Controller\ContactUs' => 'Almaks\Controller\ContactUsController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'contact' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/almaks/contact-us',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almaks\Controller',
                        'controller' => 'ContactUs',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
);