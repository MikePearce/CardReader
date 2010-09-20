<?php
namespace Models\Core;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 class Sorter
 {
     /**
      * Array of objects containing the boarding cards
      **/
     private $_cards;
     
     /**
      * Setter for the cards
      * @param array $cards;
      **/
     public function setBoardingCards($cards)
     {
         $this->_cards = $cards;
     }
     
     /**
      * Sort them!
      * I make the assumption that, while the user can have start and end
      * destinations the same, they can't start and end in the same place on
      * the same day as we're not storing TIME
      *
      * - This took a bit of time. Easy at first glance, not so. Not sure
      * if there's a way to do it without looping this many times, but I'm
      * running out of time!
      * 
      **/
     public function sort()
     {
         $sorted = array();
         
         // First, by date
         foreach($this->_cards AS $card)
         {
             $sorted[strtotime($card->date)][] = $card;
         }
         
         // Now, for each date, find the start/end dest
         $leg = 0;
         $new_array = array();
         foreach ($sorted AS $date) {
             
             $startDestinations = $endDestinations = array();
                          
              // Foreach card in the date block, sort
              foreach($date AS $card) {
                  $startDestinations[$card->startDest_filtered] = $card;
                  $endDestinations[$card->endDest_filtered] = $card;
              }
              
              // Get the beginning and end destinations
              $startCard  = array_pop(array_diff_key($startDestinations, $endDestinations));
              
              // Now razz through each card the sort them based on start>end
              $start = $startCard->startDest_filtered;
              foreach($date AS $card)
              {
                  $targetCard = $this->findStart($date, $start);
                  $start = $targetCard->endDest_filtered;
                  $targetCard->journeyLeg = $leg++;
                  $new_array[$targetCard->journeyLeg] = $targetCard;
              }
         }
         
         // And done...
         return $new_array;
     }
     
     /**
      * Iterate through the cards finding the start destination
      * @param array $cards
      * @param string $startDest
      **/
     public function findStart($cards, $startDest)
     {
         foreach($cards AS $card)
         {
             if ($card->startDest_filtered == $startDest)
             {
                 return $card;
             }
         }
         return false;
     }
     

 }
 