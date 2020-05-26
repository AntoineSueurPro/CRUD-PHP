<?php

namespace projet_4\src\controller;

use projet_4\src\DAO\ArticleDAO;
use projet_4\src\model\View;

class BackController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addArticle($post)
    {
        if(isset($post['submit'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_article', [
            'post' => $post
        ]);
    }
}
