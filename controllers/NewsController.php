<?php

require_once "./models/news.php";
require_once "./models/category.php";

class newsController
{

    public function index() {
        require_once './views/news/central.php';
    }

    public function create() {   
        Utils::isLogin();
        $category = new Category();
        $categories = $category->getAll();
        require_once './views/news/createNew.php';
    }

    public function add() {
        if (isset($_POST)) {
            $user_id = $_SESSION['login']->id;
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : false;
            $tittle = isset($_POST['tittle']) ? $_POST['tittle'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            if ($user_id && $category_id && $tittle && $description) {
                $new = new News();
                $new->setUserId($user_id);
                $new->setCategoryId($category_id);
                $new->setTittle($tittle);
                $new->setDescription($description);
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!(is_dir('img'))) {
                            mkdir('img', 0777, true);
                        }
                        $new->setImage($filename);
                        move_uploaded_file($file['tmp_name'], 'img/' . $filename);
                    }
                }
                $save = $new->save();
                if ($save) {
                    $_SESSION['new'] = 'complete';
                    header('Location:'.base_url);
                } else {
                    $_SESSION['new'] = 'failed';
                    header('Location:'.base_url.'news/create');
                }
            } else {
                $_SESSION['new'] = 'failed';
                header('Location:'.base_url.'news/create');
            }
        }
    }

    public function getAllNews() {
        Utils::isLogin();
        $new = new News();
        $allNews = $new->allNews();
        require_once 'views/news/allNews.php';
    }

    public function getNews() {
        Utils::isLogin();
        $new = new News();
        $allNews = $new->homeNews(6);
        require_once 'views/news/home.php';
    }

}
