<?php
namespace Models\Data;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 class Csv extends \Models\Data\AbstractData
 {
     /**
      * Grab the data
      * @param string The location of the file
      */
     public function importData($dataSrc)
     {
         if ( $dataSrc AND ($fh = @fopen($dataSrc, 'r')) )
         {
             $ret = array();

             //@todo Run a check to see if it's actually a CSV file.
             //@todo Run a check to make sure the columns are correct
             $firstRow = false;
             while ( ($row = fgetcsv($fh, 1000, ",")) )
             {
                 if (!$firstRow)
                 {
                     $firstRow = true;
                     continue;
                 }
                 // Get the correct object
                 $o = $this->_getObject("Models\Transport\\".ucfirst($row[3]));
                 
                 // Add a decorator to create a kind of key for each start/end dest
                 $o->addDecorator(\Models\BaseClass::getObject(
                     "Models\Decorators\StringFilter"
                 ));
                 
                 // Then assign the data
                 $o->startDest  = $row[0];
                 $o->endDest    = $row[1];
                 $o->date       = $row[2];
                 $o->number     = $row[4];
                 $o->start_info = $row[5];
                 $o->end_info   = $row[6];
                 
                 // Apply decorators for filtering
                 $o->decorate();
                 
                 // And add to the array
                 array_push($this->_data, $o);
             }

         }
         else {
            throw new \Exception('Unable to open file '. $dataSrc);
         }
     }
 }