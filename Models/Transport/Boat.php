<?php
namespace Models\Transport;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
class Boat extends AbstractTransport
{
    protected $_dock;
    protected $_cruiseCompany;
    public $type = 'boat';
}