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

);