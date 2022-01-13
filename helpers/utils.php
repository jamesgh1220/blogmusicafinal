<?php

    class Utils{

        public static function isAdmin(){
            if ( !isset($_SESSION['admin']) ) {
                header('Location:'.base_url);
            }else {
                return true;
            }
        }

        public static function isLogin(){
            if ( !isset($_SESSION['login']) ) {
                header('Location:'.base_url.'news/index');
            }else {
                return true;
            }
        }

        public static function deleteSession($name){
            if ( isset($_SESSION[$name]) ) {
                $_SESSION[$name] = null;
                unset($_SESSION[$name]);
            }
            return $name;
        } 

        public static function getError($errores, $campo){
            $alerta = "";
            if(isset($errores[$campo]) && !empty($campo)){
                $alerta = "<p class = 'alert-form'>".$errores[$campo].'</p>';
            }
            return $alerta;
        }
        
        public static function deleteErrors(){
            unset($_SESSION['errors']);
            return true;
        }
    }

?>