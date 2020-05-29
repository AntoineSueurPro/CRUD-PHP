<?php
namespace projet_4\src\controller;

use projet_4\config\Parameter;

class BackController extends Controller {

  public function addArticle(Parameter $post) {

    if($post->get('submit')) {
      $errors = $this->validation->validate($post, 'Article');

      if(!$errors) {
        $this->articleDAO->addArticle($post);
        $this->session->set('add_article', 'Nouvel article ajouté <br/>');
        header('Location: ../public/index.php');
      }
      return $this->view->render('add_article', ['post' => $post, 'errors' => $errors]);
    }
    return $this->view->render('add_article');
  }

  public function editArticle(Parameter $post, $articleId) {
    $article = $this->articleDAO->getArticle($articleId);

    if($post->get('submit')) {
      $errors = $this->validation->validate($post, 'Article');

      if(!$errors) {
        $this->articleDAO->editArticle($post, $articleId);
        $this->session->set('edit_article', 'Article modifié <br/>');
        header('Location: ../public/index.php');
      }
      return $this->view->render('edit_article', ['post' => $post, 'errors' => $errors]);
    }
    $post->set('id' , $article->getId());
    $post->set('title', $article->getTitle());
    $post->set('content', $article->getContent());
    $post->set('author', $article->getAuthor());
    return $this->view->render('edit_article', ['post' => $post]);
  }

  public function deleteArticle($articleId) {
    $this->articleDAO->deleteArticle($articleId);
    $this->session->set('delete_article', 'Article supprimé');
    header('Location: ../public/index.php');
  }

  public function deleteComment($commentId) {
    $this->commentDAO->deleteComment($commentId);
    $this->session->set('delete_comment', 'Commentaire supprimé');
    header('Location: ../public/index.php');
  }

  public function logout() {
    $this->session->stop();
    header('Location: ../public/index.php');
  }

  public function profile() {
    return $this->view->render('profile');
  }

  public function updatePassword(Parameter $post) {

    if($post->get('submit')) {
      $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
      $this->session->set('update_password', 'Mot de passe modifié <br/>');
      header('Location: ../public/index.php?route=profile');
    }
    return $this->view->render('update_password');
  }
}
