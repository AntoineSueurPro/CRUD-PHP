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

  public function editArticle(Parameter $post, $articleId) {
    $article = $this->articleDAO->getArticle($articleId);

    if($post->get('submit')) {
      $this->articleDAO->editArticle($post, $articleId);
      $this->session->set('edit_article', 'L\'article a bien été modifié <br/>');
      header('Location: ../public/index.php');
    }
    return $this->view->render('edit_article', ['article' => $article]);
  }
}
