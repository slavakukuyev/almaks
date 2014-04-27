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
        ),
    ),
    'router' => array(
        'routes' => array(
            'sayhello' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/almaks',
                    'defaults' => array(
                        'controller' => 'Almaks\Controller\Index',
                        'action' => 'index',
                    )
                )
            )
        )
    ),
);