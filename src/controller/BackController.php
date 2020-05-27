<?php
namespace projet_4\src\controller;

use projet_4\config\Parameter;

class BackController extends Controller {

  public function addArticle(Parameter $post) {

    if($post->get('submit')) {
      $this->articleDAO->addArticle($post);
      $this->session->set('add_article', 'Nouvel article ajouté <br/>');
      header('Location: ../public/index.php');
    }
    return $this->view->render('add_article', ['post' => $post]);
  }
}
