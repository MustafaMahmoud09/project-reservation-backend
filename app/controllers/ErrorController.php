<?php

namespace LOMU\controllers;

use LOMU\core\Controller;

class ErrorController extends Controller
{
  function notFound()
  {
    parent::view("error" . DS . "error.php", ['eNumber'=> 404]);
  }
}
