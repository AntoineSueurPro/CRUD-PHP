
<?php
namespace projet_4\src\controller;
use projet_4\src\DAO\ArticleDAO;
use projet_4\src\DAO\CommentDAO;
use projet_4\src\model\View;

abstract class Controller {

  protected $articleDAO;
  protected $commentDAO;
  protected $view;

  public function __construct() {

    $this->articleDAO = new ArticleDAO();
    $this->commentDAO = new CommentDAO();
    $this->view = new View();

  }
}
