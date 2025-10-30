<?php

namespace LOMU\controllers;

use LOMU\core\Controller;
use LOMU\core\Session;
use LOMU\core\Helper;
use LOMU\models\AuthenticationAdminModel;
use Rakit\Validation\Validator;

class AuthenticationAdminController extends Controller
{
       private AuthenticationAdminModel $authenticationModel;
      
       function __construct()
       {
              $this->authenticationModel = new AuthenticationAdminModel();
              Session::startSession();
       }

       function login()
       {
              parent::view("dashboard" . DS . "authentication" . DS . "login.php");
       } //end login

       function postLogin()
       {
              if (isset($_POST['login']) && isset($_POST['terms'])) {
                     $validator = new Validator();
                     $validation = $validator->make($_POST, [
                            'email'                 => 'required|email',
                            'password'              => 'required|min:6'
                     ]);
                     $validation->validate();
                     $validation->fails();
                     $errors = $validation->errors()->firstOfAll();
                     if (empty($errors)) {
                            $email = $_POST['email'];
                            $passord = $_POST['password'];
                            $data =  $this->authenticationModel->login($email, $passord);
                            if (!empty($data)) {
                                   Session::set(ADMINDATA, $data);
                                   Helper::redirect('AuthorizationAdmin/home');
                            } else {
                                   Helper::redirect('AuthenticationAdmin/login');
                            }
                     } else {
                            Helper::redirect('AuthenticationAdmin/login');
                     }
              } else {
                     Helper::redirect('AuthenticationAdmin/login');
              }
       } //end postLogin 

       function register()
       {
              parent::view("dashboard" . DS . "authentication" . DS . "register.php");
       } //end register

       function postRegister()
       {
              if (isset($_POST['register']) && isset($_POST['terms'])) {
                     $validator = new Validator();
                     $validation = $validator->make($_POST, [
                            'name'                  => 'required',
                            'email'                 => 'required|email',
                            'password'              => 'required|min:6'
                     ]);
                     $validation->validate();
                     $validation->fails();
                     $errors = $validation->errors()->firstOfAll();
                     $checkPasword = $_POST['password'] == $_POST['tpassword'];
                     if (empty($errors) && $checkPasword) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $passord = $_POST['password'];
                            $checkRegister =  $this->authenticationModel->register($name, $email, $passord);
                            if ($checkRegister) {
                                   Helper::redirect('AuthenticationAdmin/login');
                            } else {
                                   Helper::redirect('AuthenticationAdmin/register');
                            }
                     } else {
                            Helper::redirect('AuthenticationAdmin/register');
                     }
              } else {
                     Helper::redirect('AuthenticationAdmin/register');
              }
       } //end postRegister

} //end AuthenticationAdminController
