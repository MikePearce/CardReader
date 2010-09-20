<?php
namespace Models\Transport;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 abstract class AbstractTransport
 {
     public $startDest;
     public $endDest;
     public $date;
     public $journeyLeg;
     protected $_decorators;
     
     /**
      * This is the identification of the vehicle:
      *     - Flight Number
      *     - Train Number
      *     - Boat Number
      * @param string $_number;
      **/
     public $number;
     
     /**
      * Set some blanks
      **/
     public function __construct()
     {
         $this->startDest  = FALSE;
         $this->endDest    = FALSE;
         $this->date       = FALSE;
         $this->number     = FALSE;
         $this->misc       = FALSE;
     }
     
     /**
      * Add a filter decorator
      **/
     public function addDecorator($dec) 
     {
         $this->_decorators[] = $dec;
     }
     
     /**
      * Apply decorators to SELF
      **/
     public function decorate()
     {
         foreach ($this->_decorators AS $decorator)
         {
             $decorator->run($this);
         }
     }
     
 }