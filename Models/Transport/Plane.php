<?php
namespace Models\Transport;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
class Plane extends AbstractTransport
{
    protected $_airline;
    protected $_gate;
    public $type = 'flight';    
}