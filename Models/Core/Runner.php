<?php
namespace Models\Core;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 class Runner
 {
     
     /**
      * Where should we expect the data from
      **/
     private $_dataSrc;
     
     /**
      * Location info, so either filename, or array of DB connections vars
      **/
     private $_data;
     
     /**
      * What format do you want the data output in?
      **/
     private $_output;
     
     /**
      * Set some sensible defaults;
      **/
     public function __construct()
     {
         $this->_dataSrc    = 'csv';
         $this->_data       = 'test.csv';
         $this->_output     = 'text';
     }
     
     /**
      * Set the data source (csv, db, etc)
      * @param string $src
      * @todo Add checks for recognised src
      **/
     public function setDataSrc($src)
     {
         $this->_dataSrc = $src;
     }
     
     /**
      * Set the data location
      * @param mixed
      * @todo Add support for DB config array, XML src etc.
      **/
     public function setData($data)
     {
         $this->_data = $data;
     }
     
     /**
      * How do you want the data delivered?
      * @param string $output
      **/
     public function setOutput($output)
     {
         $this->_output = $output;
     }
     
    /**
    * Let's start this baby!
    */
    public function run() 
    {
        // Grab the class first
        try {

            // Get the data
            $data = \Models\BaseClass::getObject(
                'Models\Data\\'.ucfirst($this->_dataSrc)
            );
            $data->importData($this->_data);
            $boardingCards = $data->getData();

            // Make something meaningful from it
            $sorter = \Models\BaseClass::getObject('Models\Core\Sorter');
            $sorter->setBoardingCards($boardingCards);
            $sortedBoardingCards = $sorter->sort();

            // Send it back
            $output = \Models\BaseClass::getObject(
                'Models\Output\\'. ucfirst($this->_output)
            );
            $output->setData($sortedBoardingCards);
            $output->out();

        }
        catch (Exception $e) {

            // @todo Need a better way of handling exceptions
            print $e;
        }

    }
 }