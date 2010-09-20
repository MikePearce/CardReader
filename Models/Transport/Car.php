<?php
namespace Models\Transport;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
class Car extends AbstractTransport
{
    protected $_registration;
    protected $_hireCompany;
    public $type = 'car';    
}