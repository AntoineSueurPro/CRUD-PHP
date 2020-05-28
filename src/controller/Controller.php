<?php
namespace projet_4\src\controller;

use projet_4\src\DAO\ArticleDAO;
use projet_4\src\DAO\CommentDAO;
use projet_4\src\model\View;
use projet_4\config\Request;
use projet_4\src\constraint\Validation;

abstract class Controller {

  protected $articleDAO;
  protected $commentDAO;
  protected $view;
  private $request;
  protected $get;
  protected $post;
  protected $session;
  protected $validation;

  public function __construct() {

    $this->articleDAO = new ArticleDAO();
    $this->commentDAO = new CommentDAO();
    $this->view = new View();
    $this->request = new Request();
    $this->validation = new Validation();
    $this->get = $this->request->getGet();
    $this->post = $this->request->getPost();
    $this->session = $this->request->getSession();

  }
}
