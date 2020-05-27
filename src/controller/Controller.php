<?php
namespace projet_4\src\controller;

use projet_4\src\DAO\ArticleDAO;
use projet_4\src\DAO\CommentDAO;
use projet_4\src\model\View;
use projet_4\config\Request;

abstract class Controller {

  protected $articleDAO;
  protected $commentDAO;
  protected $view;
  private $request;
  protected $get;
  protected $post;
  protected $session;

  public function __construct() {

    $this->articleDAO = new ArticleDAO();
    $this->commentDAO = new CommentDAO();
    $this->view = new View();
    $this->request = new Request();
    $this->get = $this->request->getGet();
    $this->post = $this->request->getPost();
    $this->session = $this->request->getSession();

  }
}
