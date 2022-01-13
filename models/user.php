<?php

    class User {

        private $id;
        private $name;
        private $lastName;
        private $email;
        private $password;
        private $role;
        private $date;
        private $db;

        public function __construct() {
            $this->db =  Database::connect();
        }

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }

        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $this->db->real_escape_string($name);
        }

        public function getLastName(){
            return $this->lastName;
        }
    
        public function setLastName($lastName){
            $this->lastName = $this->db->real_escape_string($lastName);
        }

        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $this->db->real_escape_string($email);
        }

        public function getPassword(){
            return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
        }
    
        public function setPassword($password){
            $this->password = $password;
        }

        public function getRole(){
            return $this->role;
        }
    
        public function setRole($role){
            $this->role = $role;
        }

        public function getDate(){
            return $this->date;
        }
    
        public function setDate($date){
            $this->date = $date;
        }

        public function save() {
            $sql = "INSERT INTO usuarios VALUES(null, '{$this->getName()}','{$this->getLastName()}','{$this->getEmail()}','{$this->getPassword()}','admin', CURDATE())";
            $save = $this->db->query($sql);
            $result = false;
            if ($save) {
                $result = true;
            }
            return $result;
        }

        public function delete() {
            $sql = "DELETE FROM usuarios WHERE id = {$this->id}";
            $delete = $this->db->query($sql);
            $result = false;
            if ($delete) {
                $result = true;
            }
            return $result;
        }

        public function login(){
            $email = $this->email;
            $password = $this->password;
            $result = false;
            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $login = $this->db->query($sql);
            if ( $login && $login->num_rows == 1 ) {
                $usuario = $login->fetch_object();
                //verificar contraseña
                $verify = password_verify($password, $usuario->password);    
                if ( $verify ) {
                    $result = $usuario;
                }
            }
            return $result;
        }

        public function allUsers() {
            $sql = "SELECT * FROM usuarios";
            $users = $this->db->query($sql);
            return $users;
        }
    }
?>