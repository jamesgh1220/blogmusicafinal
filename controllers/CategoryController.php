<?php

require_once "./models/category.php";

    class categoryController {

        public function index() {
            Utils::isAdmin();
            $category = new Category();
            $categories = $category->getAll();
            require_once 'views/category/index.php';
        }

        public function addCategory() {
            Utils::isAdmin();
            require_once 'views/category/create.php';
        }

        public function save() {
            if ( isset($_POST) && isset($_POST['name'])) {
                $name = $_POST['name'];
                $category = new Category();
                $category->setName($name);
                $save = $category->save();
                if ($save) {
                    header('Location:'.base_url.'category/index');
                }else{
                    header('Location:'.base_url.'category/addCategory');
                }
            }
        }
    }

?>