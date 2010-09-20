<?php
namespace Models\Data;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 abstract class AbstractData
 {
     protected $_data;
     protected $_dataSrc;
     
     public function __construct()
     {
         $this->_data = array();
         $this->_dataSrc = false;
     }
     
     public function importData($dataSrc) {}
     
     public function getData()
     {
         return $this->_data;
     }
     
     protected function _getObject($type)
     {
         return \Models\BaseClass::getObject($type);
     }
     
     
 }