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
            'Almaks\Controller\Projects' => 'Almaks\Controller\ProjectsController',
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
            
            'projects' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/almaks/projects',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almaks\Controller',
                        'controller' => 'Projects',
                        'action' => 'index',
                    ),
                ),
            ),
            
                 'almaks' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/almaks',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Almaks\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z_-][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),
            ),
            
        ),
    ),
);