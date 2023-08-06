<?php

 namespace LOMU\controllers;

 use LOMU\core\Controller;
 use LOMU\core\Helper;
 use LOMU\models\UserModel; 
 use Rakit\Validation\Validator;

 class HomeUserController extends Controller{

        private UserModel $userModel;

        function __construct(){
 
                   $this->userModel=new UserModel();    

        } 

         function home(){

                  $dataMenu = $this->userModel->SelectMenu();

                  parent::view("userboard".DS."index.php",['dataMenu'=>$dataMenu]);
                  
         }


         function postReservation(){

                     if(isset($_POST['add'])){

                             $validator = new Validator();
           
                             $validation = $validator->make($_POST , [
                                  'name'                 => 'required',
                                  'phone'              => 'required',
                                  'person'                 => 'required',
                                  'date'              => 'required',
                                  'time'                 => 'required',
                                  'message'              => 'required',
                              ]);
                     
                              $validation->validate();
                     
                              $validation->fails();
                       
                              $errors = $validation->errors()->firstOfAll();
          
                              if(empty($errors)){
                               
                                     $name=$_REQUEST['name'];

                                     $phone=$_REQUEST['phone'];

                                     $person=$_POST['person'];

                                     $date=$_REQUEST['date'];

                                     $time=$_REQUEST['time'];

                                     $message=$_REQUEST['message'];
                             
                                     $this->userModel->insertReservation($name,$phone,$person,$date,$time,$message);

                              }

                     }
                    

                     Helper::redirect('HomeUser/home');        
         }
         

 }

?>