<?php

use LOMU\core\App;
  
  //path   

  define("DS",DIRECTORY_SEPARATOR);  
  
  define("ROOT",dirname(__DIR__)); 

  define("APP",ROOT.DS."app"); 

  define("VENDOR",ROOT.DS."vendor");

  define("CONTROLLERS",APP.DS."controllers");
   
  define("CORE",APP.DS."core");

  define("VIEWS",APP.DS."views");

  define("MODELS",APP.DS."models");

  //connection

  define("HOST","localhost"); 

  define("DBNAME","reversation_dp");

  define("USERNAME","root");

  define("PASSWORD","");

  define("DNS","mysql:host=".HOST.";dbname=".DBNAME);
  
  //domain

  define("DOMAIN","http://localhost/project%20mvc%20one/public/");

  //css

  define("BACKASSET",DOMAIN."backasset"); 

  define("FRONTASSET",DOMAIN."frontasset"); 

  //upload 

  define("UPLOADSET",ROOT.DS.'public'.DS.'upload'); 

  define("UPLOADDATABASE",DOMAIN.'upload/'); 
  //session

  define("ADMINDATA","ADMINDATA");

  require_once VENDOR.DS."autoload.php"; 

  $objApp=new App();
?>