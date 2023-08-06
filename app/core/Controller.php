<?php

 namespace LOMU\core;

 class Controller{

   protected function view($path,$array=[]){

         extract($array);  
        
         require_once VIEWS.DS.$path;

    }


 }

?>