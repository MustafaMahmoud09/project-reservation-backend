<?php

namespace LOMU\models;

use Exception;
use LOMU\core\Model;
use PDO;

class AuthenticationAdminModel extends Model
{
      function login($email, $password)
      {
            $query = 'SELECT * FROM `admin` WHERE `email`=? AND `password`=?';
            $query = parent::connection()->prepare($query);
            $query->execute([$email, $password]);
            return $query->fetch(PDO::FETCH_ASSOC);
      } //end login    

      function register($name, $email, $password)
      {
            $query = 'INSERT INTO `admin`(`name`,`email`,`password`)VALUES(?,?,?)';
            $query = parent::connection()->prepare($query);
            try {
                  $query->execute([$name, $email, $password]);
                  return true;
            } catch (Exception) {
                  return false;
            }
      } //end register

} //end AuthenticationAdminModel
