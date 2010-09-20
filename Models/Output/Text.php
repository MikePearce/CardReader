<?php
namespace Models\Output;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 class Text extends AbstractOutput
 {
     /**
      * Output the data as a sting
      * @todo Make this a bit cleverer
      **/
     public function out()
     {
         print "This is your travel itinerary: \n";
         foreach ($this->_data AS $card)
         {
             echo 'Leg: '. $card->journeyLeg ." ";
             echo 'take the '. $card->type .' '. $card->number ." ";
             echo 'from '. $card->startDest .' ';
             if ($card->start_info) {
                 echo '('.$card->start_info .") ";                 
             }
             echo 'to '. $card->endDest ." ";
             if ($card->end_info) {
                 echo '('.$card->end_info .")";                 
             }
             echo "\n";


         }
         
     }
 }