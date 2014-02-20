<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use SpiffyConfig\Annotation\Controller;
use SpiffyConfig\Annotation\Route;
use SpiffyCrud\Controller\AbstractCrud;
 
/**
 * @Controller\Invokable
 * 
 * @Route\Generic(name="application.test", type="crud", options={"route":"/test/crud"});
 */
class TestController extends AbstractCrud
{
    /**
     * @var string
     */
    protected $modelName = 'Application\Crud\Test';

    /**
     * @var string
     */
    protected $route = 'application.test';

   
}
