<?php

    class News {
        private $id;
        private $userId;
        private $categoryId;
        private $tittle;
        private $description;
        private $image;
        private $date;
        private $db;

        function __construct() {
            $this->db = Database::connect();
        }

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }

        public function getUserId(){
            return $this->userId;
        }
    
        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function getCategoryId(){
            return $this->categoryId;
        }
    
        public function setCategoryId($categoryId){
            $this->categoryId = $categoryId;
        }

        public function getTittle(){
            return $this->tittle;
        }
    
        public function setTittle($tittle){
            $this->tittle = $this->db->real_escape_string($tittle);
        }

        public function getDescription(){
            return $this->description;
        }
    
        public function setDescription($description){
            $this->description = $this->db->real_escape_string($description);
        }

        public function getImage(){
            return $this->image;
        }
    
        public function setImage($image){
            $this->image = $image;
        }

        public function getDate(){
            return $this->date;
        }
    
        public function setDate($date){
            $this->date = $date;
        }

        public function save() {
            $sql = "INSERT INTO noticias VALUES(null, {$this->getUserId()}, {$this->getCategoryId()}, '{$this->getTittle()}', '{$this->getDescription()}', '{$this->getImage()}', CURDATE());";
            $save = $this->db->query($sql);
            $result = false;
            if ($save) {
                $result = true;
            }
            return $result;
        }

        public function allNews() {
            $sql = "SELECT * FROM noticias ";
            $news = $this->db->query($sql);
            return $news;
        }

        public function homeNews($limit = null) {
            $sql = "SELECT * FROM noticias ";
            if (!empty($limit)) {
                $sql .="ORDER BY RAND() LIMIT $limit";
            }
            $news = $this->db->query($sql);
            return $news;
        }
    }

?>