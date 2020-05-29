<?php

namespace projet_4\config;
use projet_4\src\controller\BackController;
use projet_4\src\controller\ErrorController;
use projet_4\src\controller\FrontController;
use Exception;

class Router {
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct() {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->request = new Request();
    }

    public function run() {

      $route = $this->request->getGet()->get('route');
      try {
        if(isset($route)) {
          if ($route === 'article') {
            $this->frontController->article($this->request->getGet()->get('articleId'));
          }
          elseif($route === 'addArticle') {
            $this->backController->addArticle($this->request->getPost());
          }
          elseif($route === 'editArticle') {
            $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
          }
          elseif($route === 'deleteArticle') {
            $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
          }
          elseif ($route === 'addComment') {
            $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
          }
          elseif ($route === 'deleteComment') {
            $this->backController->deleteComment($this->request->getGet()->get('commentId'));
          }
          elseif ($route === 'flagComment') {
            $this->frontController->flagComment($this->request->getGet()->get('commentId'));
          }
          elseif ($route === 'register') {
            $this->frontController->register($this->request->getPost());
          }
          else {
            $this->errorController->errorNotFound();
          }
        }
        else {
          $this->frontController->home();
        }
      }
      catch(Exeption $e) {
        $this->errorController->errorServer();
      }
    }
}
