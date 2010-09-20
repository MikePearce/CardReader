<?php
namespace Models\Transport;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
class Bus extends AbstractTransport
{
    protected $_hireCompany;
    public $type = 'bus';
}