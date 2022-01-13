<?php

    class Category{
        
        private $id;
        private $name;
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

        public function getAll(){
            $sql = "SELECT * FROM categorias ORDER BY id ASC;";
            $categories = $this->db->query($sql);
            return $categories;
        }
    
        public function getOne(){
            $sql = "SELECT * FROM categorias WHERE id={$this->getId()};";
            $category = $this->db->query($sql);
            return $category->fetch_object();
        }
    
        public function save(){
            $sql = "INSERT INTO categorias VALUES(null, '{$this->getName()}');";
            $save = $this->db->query($sql);
            $result = false;
            if ( $save ) {
                $result = true;
            }
            return $result;
        }

    }
