<?php

namespace LOMU\core;

class App
{

     private $controller;
     private $method;
     private $params = [];

     function __construct()
     {
          $this->url();
          $this->render();
     }

     private function url()
     {
          $queryString = $_SERVER["QUERY_STRING"];

          if (!empty($queryString)) {
               $url = explode('/', $queryString);
               $this->controller = (isset($url[0])) ? $url[0] . "Controller" : "Error";
               $this->method = (isset($url[1])) ? $url[1] : "notFound";
               unset($url[0], $url[1]);
               $this->params = array_values($url);
          } else {
               $this->controller = "ErrorController";
               $this->method = "notFound";
          }

          $this->controller = "LOMU\controllers\\" . $this->controller;
     }

     private function render()
     {
          if (class_exists($this->controller)) {
               $this->controller = new $this->controller;
               if (method_exists($this->controller, $this->method)) {
                    call_user_func_array(
                         [$this->controller, $this->method],
                         $this->params
                    );
                    return 0;
               } else {
                    $check = true;
               }
          } else {
               $check = true;
          }

          if ($check) {
               $this->controller = new ("LOMU\controllers\ErrorController");
               $this->method = "notFound";
               $this->params = [];
               call_user_func_array([$this->controller, $this->method], $this->params);
          }
     }
     
}
