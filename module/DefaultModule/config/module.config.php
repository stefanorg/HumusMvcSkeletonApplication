<?php
return [
    'view' => array(
        'classname' => 'HumusMvc\View',
        'useViewRenderer' => true,
        'useStreamWrapper' => false,
        'doctype' => 'XHTML1'
    ),
    'front_controller' => array(
        'controller_directory' => array(
            'Default' => __DIR__ . '/../src/controllers'
        ),
        'base_url' => '/',
        'params' => array(
            'displayExceptions' => true, // true for development
            'disableOutputBuffering' => true
        ),
        'plugins' => array(
            'actionStack' => 'Zend_Controller_Plugin_ActionStack',
            'putHandler' => array(
                'class' => 'Zend_Controller_Plugin_PutHandler',
                'stack_index' => 10
            ),
            'errorHandler' => 'Zend_Controller_Plugin_ErrorHandler'
        ),
        'throw_exceptions' => false,
        'return_response' => false,
        'default_module' => 'Default',
        'default_action' => 'index',
        'default_controller_name' => 'index',

        'view' => array(
            'classname' => 'HumusMvc\View',
            'useViewRenderer' => true,
            'useStreamWrapper' => false,
            'doctype' => 'XHTML1'
        ),
    )

];