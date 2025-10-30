<?php

namespace LOMU\models;

use LOMU\core\Model;
use PDO;

class UserModel extends Model
{

  function SelectMenu()
  {
    $query = 'SELECT * FROM `menu`';
    $query = parent::connection()->prepare($query);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  function insertReservation(
    $name,
    $phone,
    $number,
    $date,
    $time,
    $message
  ) {
    $query = 'INSERT INTO `reservation`(`name`, `phone_number`, `number`, `date`, `time`, `message`) 
                                            VALUES (:name,:phone,:number,:date,:time,:message)';
    $dataPassing = [
      'name' => $name,
      'phone' => $phone,
      'number' => $number,
      'date' => $date,
      'time' => $time,
      'message' => $message
    ];
    $query = parent::connection()->prepare($query);
    $query->execute($dataPassing);
  }
  
}
