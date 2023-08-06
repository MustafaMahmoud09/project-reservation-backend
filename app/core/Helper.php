<?php

 namespace LOMU\core;

 class Helper{

    static function redirect($path){

          header("LOCATION: ".DOMAIN.$path);

    } 

 }

?>