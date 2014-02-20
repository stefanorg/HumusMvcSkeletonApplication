<?php

namespace Application\Crud;
use SpiffyConfig\Annotation\Service;
use SpiffyCrud\Model\AbstractModel;

/**
 * @Service\Invokable(key="spiffy_crud|manager")
 */
class Test extends AbstractModel
{
    /**
     * @var string
     */
    protected $displayName = 'Riccardino Test';
 
    /**
     * @var string
     */
    protected $entityClass = 'Application\Entity\Test';
}