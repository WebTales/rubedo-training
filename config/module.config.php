<?php
return array(
    /**
     * Template definitions
     */
    'templates' => array(
        'themes' => array(
            'training' => array(
                'label' => 'Training',
                'basePath' => realpath(__DIR__ . '/../theme/training'),
                'css' => array(
                    '/css/bootstrap.css',
                ),
                'js' => array(
                    '/js/training.js',
                ),
            ),
        ),
    ),

    /**
     * Your block definition : back-office json configuration file
     */
    'blocksDefinition' => array(
        'signUp' => array(
            'maxlifeTime' => 60,
            'definitionFile' => realpath(__DIR__ . "/blocks/") . '/signUp.json'
        ),
        'trainingComments' => array(
            'maxlifeTime' => 60,
            'definitionFile' => realpath(__DIR__ . "/blocks/") . '/trainingComments.json'
        )
    ),

    /**
     * Service definitions
     */
    'service_manager' => array(
        'invokables' => array(
            'RubedoTraining\\Collection\\TrainingComments' => 'RubedoTraining\\Collection\\TrainingComments',
        ),
        'aliases' => array(
            'API\\Collection\\TrainingComments' => 'RubedoTraining\\Collection\\TrainingComments',
            'TrainingComments' => 'RubedoTraining\\Collection\\TrainingComments',
        ),
    ),

    /**
     * Controller definitions
     */
    'controllers' => array(
        'invokables' => array(
            'RubedoTraining\\Backoffice\\Controller\\TrainingComments' => 'RubedoTraining\\Backoffice\\Controller\\TrainingCommentsController'
        ),
    ),

    /**
     * Route definitions (for BO controllers)
     */
    'router' => array (
        'routes' => array(
            'training-comments' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/backoffice/training-comments',
                    'defaults' => array(
                        '__NAMESPACE__' => 'RubedoTraining\\Backoffice\\Controller',
                        'controller' => 'training-comments',
                        'action' => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            '__NAMESPACE__' => 'RubedoTraining\\Backoffice\\Controller',
                            'constraints' => array(
                                'controller' => 'training-comments',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ),
                            'defaults' => array()
                        )
                    )
                )
            ),
        ),
    ),

    /**
     * API namespace definitions
     */
    'namespaces_api' => array(
        'RubedoTraining',
    ),

);