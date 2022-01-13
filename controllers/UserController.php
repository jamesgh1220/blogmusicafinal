<?php

require_once './models/user.php';

class userController{

    /*public function index() {
        require_once 'views/layout/login.php';
    }*/

    public function register() {
        require_once 'views/user/register.php';
    }

    public function save() {
        if (isset($_POST)) {
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false; 
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
            }else{
                $errors = array();
            }
            $user_validate = false;
            if ( !empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ) {
                $user_validate = true;
            } else {
                $errors['name']= 'El nombre es incorrecto';
            }
            if (!empty($lastName) && !is_numeric($lastName) && !preg_match("/[0-9]/", $lastName)) {
                $user_validate = true;
            }else{
                $errors['lastName'] = 'Los apellidos son incorrectos.';
            }
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $user_validate = true;
            }else{
                $errors['email'] = 'El email es incorrecto.';
            }
            if (!empty($password) && strlen($password) >= 6) {
                $user_validate = true;
            }else{
                $errors['password'] = 'La contraseña es incorrecta';
            }
            
            if (count($errors) == 0 && $user_validate == true) {
                $user = new User();
                $user->setName($name);
                $user->setLastName($lastName);
                $user->setEmail($email);($name);
                $user->setPassword($password);
                $save = $user->save();
                if ($save) {
                    $_SESSION['register'] = 'complete';
                }else{
                    $_SESSION['register'] = 'failed';
                }
            }else {
                $_SESSION['errors'] = $errors;
                $_SESSION['register'] = 'failed';
            }
        }else {
            $_SESSION['register'] = 'failed';
        }
        header("Location:".base_url);
    }

    public function login(){
        if (isset($_POST)) {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $login = $user->login();
            if ($login && is_object($login)) {
                $_SESSION['login'] = $login;
                if ($login->role == 'admin') {
                    $_SESSION['admin'] = true;
                    
                }
                header('Location:'.base_url.'news/index');
            }else{
                $_SESSION['error_login'] = 'failed';
            }
        }
        header('Location:'.base_url);
        /* Cambiar a que lleve a home ya autenticado */
    }

    public function logout(){
        if ( isset($_SESSION['login']) ) {
            unset($_SESSION['login']);
        }
        if ( isset($_SESSION['admin']) ) {
            unset($_SESSION['admin']);
        }
        header('Location:'.base_url);
    }

    public function getUsers() {
        Utils::isAdmin();
        $user = new User();
        $allUsers = $user->allUsers();
        require_once 'views/user/allUsers.php';
    }

    public function delete() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = new User();
            $user->setId($id);      
            $delete = $user->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        header('Location:'.base_url.'user/getUsers');
    }

}
