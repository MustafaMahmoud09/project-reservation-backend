<?php

 namespace LOMU\controllers;
 
 use LOMU\core\Controller;
 use LOMU\core\Helper;
 use LOMU\core\Session;
 use LOMU\models\AuthorizationAdminModel;
 use Rakit\Validation\Validator;

 class AuthorizationAdminController extends Controller{
  
    private AuthorizationAdminModel $authorizationAdminModel;

    private $adminName;

    function __construct(){

           $this->authorizationAdminModel=new AuthorizationAdminModel();

           Session::startSession();
          
           if(!Session::itemExist(ADMINDATA)){

                 Helper::redirect("AuthenticationAdmin\login");

          }

           $this->adminName=$_SESSION[ADMINDATA]['name'];

    }

    function home(){

            parent::view("dashboard".DS."authorization".DS."home.php",['nameAdmin'=>$this->adminName]); 
    
    }

 
    function addMenu(){

          parent::view("dashboard".DS."authorization".DS."add.php",['nameAdmin'=>$this->adminName]); 
             
    }

    function postAddMenu(){
              
              if(isset($_POST['add'])){ 

                    $validator = new Validator;

                    $validation = $validator->make($_POST + $_FILES, [
                                       'title'                 => 'required',
                                       'description'           => 'required',
                                       'image'                 => 'required',
                                       'price'                 => 'required'
                                     ]);


                    $validation->validate();
                    $validation->fails();

                    $error=$validation->errors()->firstOfAll();
              
                    if(empty($error)){
                    
                            $adminId=Session::get(ADMINDATA)['id']; 
                           
                            $title=$_POST['title'];

                            $des=$_POST['description'];

                            $price=$_POST['price'];

                            $nameImage=$_FILES['image']['name'];

                            $pathFileUpload = UPLOADSET.DS.$nameImage;                                  

                            $pathFileSetInDB =UPLOADDATABASE.$nameImage;

                            $tmpName = $_FILES['image']['tmp_name']; 

                            move_uploaded_file($tmpName,$pathFileUpload); 

                            $this->authorizationAdminModel->addMenu($title,$des,$price,$pathFileSetInDB,$adminId);

                            Helper::redirect("AuthorizationAdmin/addMenu");  

                  }else{
                      
                             Helper::redirect("AuthorizationAdmin/addMenu");      

                   }
         
         }else{

                    Helper::redirect("AuthorizationAdmin/addMenu");                                              

         }
    
 }

    function controllMenu(){

           $menu= $this->authorizationAdminModel->selectAllMenu();

           parent::view("dashboard".DS."authorization".DS."controll.php"
           ,['nameAdmin'=>$this->adminName,'menu'=>$menu]); 
        
    }


    function logout(){

           Session::endSession();

           Helper::redirect("AuthenticationAdmin/login"); 

     }  


    function update($idItem){

           $dataMenuSelected=$this->authorizationAdminModel->selectById($idItem);

            parent::view("dashboard".DS."authorization".DS."update.php"
                ,['idItem'=>$idItem,'nameAdmin'=>$this->adminName,'dataMenu'=>$dataMenuSelected]);

    } 

    function postUpdateMenu($id){
             
          if(isset($_POST['update'])){

                $validator = new Validator;

                $validation = $validator->make($_POST, [
                                   'title'                 => 'required',
                                   'description'           => 'required',
                                   'price'                 => 'required'
                                 ]);

                $validation->validate();
                $validation->fails();

                $error=$validation->errors()->firstOfAll();
                
                if(empty($error)){

                         $title = $_POST['title'];   
                         
                         $des = $_POST['description'];

                         $price = $_POST['price'];

                         $name = $_FILES['image']['name'];

                         $temp_name = $_FILES['image']['tmp_name'];
               
                         $setImageInDB = UPLOADDATABASE.'/'.$name;
                         
                         $setImageInFolder = UPLOADSET.DS.$name;

                        if(!empty($name)){

                                  move_uploaded_file($temp_name,$setImageInFolder);          
                                      
                        }else{

                                 $setImageInDB="";

                        }       

                        $this->authorizationAdminModel->updateMenu($id,$title,$des,$price,$setImageInDB);

               }

        
        }       

          Helper::redirect('AuthorizationAdmin/controllMenu');

    }
    

    function delete($idItem){

            $this->authorizationAdminModel->deleteById($idItem);
           
            Helper::redirect('AuthorizationAdmin\controllMenu');

    }

    function reservation(){

             $data=$this->authorizationAdminModel->selectReservation();        

             parent::view('dashboard'.DS.'authorization'.DS.'reservation.php',['allReservation'=>$data]);

    }

}  

?>