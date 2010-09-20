<?php
namespace Models\Decorators;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 class StringFilter
 {
     public $_fields = array('startDest', 'endDest');
     
     public function run(\Models\Transport\AbstractTransport $o)
     {
         foreach ($this->_fields AS $field) {
             $new = $field ."_filtered";
             $o->{$new} = strtoupper(str_replace(' ', '', $o->{$field}));
         }
     }
 }