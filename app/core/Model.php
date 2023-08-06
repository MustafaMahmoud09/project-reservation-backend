<?php

 namespace LOMU\core;
 use PDO;

 class Model{

   protected function connection(){

       return new PDO(DNS,USERNAME,PASSWORD);
     
   }
 }

?>