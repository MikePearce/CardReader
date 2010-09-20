<?php
namespace Models\Output;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 abstract class AbstractOutput
 {
     /**
      * Array of AbstractTransport objects
      **/
     protected $_data;
     
     /**
      * Setter
      * @param array $data
      **/
     public function setData($data)
     {
         $this->_data = $data;
     }
     
     /**
      * Outputs, whatever is chosen 
      **/
     public function out() {}
 }