<?php
namespace Models;

/**
 * @author Mike Pearce <mike@mikepearce.net>
 * @package cardReader
 * @since 20/09/10
 */
 
 class BaseClass
 {
     public static function getObject($className)
     {
         if ($class = new $className) {
             return $class;
         }
         else {
             throw new \Exception("Class doesn't exist: ". $className);
         }
     }
     
 }