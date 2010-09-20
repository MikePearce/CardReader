<?php
namespace Models\Transport;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
class Train extends AbstractTransport
{
    protected $_platform;
    protected $_trainCompany;
    public $type = 'Train';
}