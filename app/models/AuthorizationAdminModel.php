<?php

 namespace LOMU\models;
 use Exception;
 use LOMU\core\Model;
 use PDO;

 class AuthorizationAdminModel extends Model{
   
    function addMenu($title,$description,$price,$path,$adminId){

             $query='INSERT INTO `menu`( `title`, `description`, `price`, `path`, `id_admin`)
                                   VALUES (:title,:des,:price,:path,:id)';
            
             $query=parent::connection()->prepare($query);

             $arrayDataPasing=['title'=>$title,'des'=>$description,'price'=>$price,'path'=>$path,'id'=>$adminId]; 

             $query->execute($arrayDataPasing);

    }


    function selectAllMenu(){
     
             $query ='SELECT * FROM `amin_menu`'; 
            
             $query= parent::connection()->prepare($query);
              
             $query->execute();

             return $query->fetchAll(PDO::FETCH_ASSOC);
  
  }


  function selectById($id){

              $query = 'SELECT * FROM `menu` WHERE `id` = ?'; 
  
              $query = parent::connection()->prepare($query);
    
              $query->execute([$id]);

              return $query->fetch(PDO::FETCH_ASSOC);

} 


  function deleteById($id){
        
             $query='DELETE FROM `menu` WHERE `id`=?';     

             $query= parent::connection()->prepare($query);       
  
             try{

                      $query->execute([$id]);  

             }catch(Exception){}
  
   }

 
   function updateMenu($id,$title,$des,$price,$path){

             if(!empty($path)){            

                   $query ='UPDATE `menu` SET `title`=?,`description`= ?,
                              `price`=?,`path`=? WHERE id = ?';  

                   $query = parent::connection()->prepare($query);

                   $query->execute([$title,$des,$price,$path,$id]); 

             }else {
              
                  $query ='UPDATE `menu` SET `title`=?,`description`= ?,
                         `price`=? WHERE id = ?';  

                  $query = parent::connection()->prepare($query);

                  $query->execute([$title,$des,$price,$id]); 

             }

   } 
  
   function selectReservation(){
    
                 $query = 'SELECT * FROM `reservation`';

                 $query= parent::connection()->prepare($query);

                 $query->execute();

                 return $query->fetchAll(PDO::FETCH_ASSOC); 

   }
 
  }
 
?>