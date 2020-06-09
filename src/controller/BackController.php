<?php
//LE BACKCONTROLLER - SERT A GERER LES FONCTIONNALITES UTILISATEUR LIE A LA BDD
namespace projet_4\src\controller;

use projet_4\config\Parameter;

class BackController extends Controller {

  public function addArticle(Parameter $post) {
    if($this->checkAdmin()) {

      if($post->get('submit')) {
        $errors = $this->validation->validate($post, 'Article');

        if(!$errors) {
          $this->articleDAO->addArticle($post, $this->session->get('id'));
          $this->session->set('add_article', 'Nouvel article ajouté <br/>');
          header('Location: ../public/index.php');
        }
        return $this->view->render('add_article', ['post' => $post, 'errors' => $errors]);
      }
      return $this->view->render('add_article');
    }
  }

  public function editArticle(Parameter $post, $articleId) {
    if($this->checkAdmin()) {

      $article = $this->articleDAO->getArticle($articleId);

      if($post->get('submit')) {
        $errors = $this->validation->validate($post, 'Article');

        if(!$errors) {
          $this->articleDAO->editArticle($post, $articleId,$this->session->get('id'));
          $this->session->set('edit_article', 'Article modifié <br/>');
          header('Location: ../public/index.php?route=administration');
        }
        return $this->view->render('edit_article', ['post' => $post, 'errors' => $errors]);
      }
      $post->set('id' , $article->getId());
      $post->set('title', $article->getTitle());
      $post->set('content', $article->getContent());
      $post->set('author', $article->getAuthor());
      return $this->view->render('edit_article', ['post' => $post]);
    }
  }

  public function deleteArticle($articleId) {

    if($this->checkAdmin()) {
      $this->articleDAO->deleteArticle($articleId);
      $this->session->set('delete_article', 'Article supprimé');
      header('Location: ../public/index.php?route=administration');
    }
  }

  public function deleteComment($commentId) {

    if($this->checkAdmin()){
      $this->commentDAO->deleteComment($commentId);
      $this->session->set('delete_comment', 'Commentaire supprimé');
      header('Location: ../public/index.php?route=administration');
    }
  }

  public function logout() {

    if($this->checkLoggedIn()) {
      $this->logoutOrDelete('logout');
    }
    }

  public function profile() {

    if($this->checkLoggedIn()) {
      $profile = $this->userDAO->getProfile($this->session->get('pseudo'));
      return $this->view->render('profile', ['profile' => $profile]);
    }
  }

  public function updatePassword(Parameter $post) {

    if($this->checkLoggedIn()) {

      if($post->get('submit')) {
        $errors = $this->validation->validate($post, 'User');

        if(!$errors) {
        $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
        header('Location: ../public/index.php?route=profile');
      }
      return $this->view->render('update_password', ['post' => $post, 'errors' => $errors]);
    }
      return $this->view->render('update_password');
    }
    }

  public function deleteAccount() {

    if($this->checkLoggedIn()) {
      $this->userDAO->deleteAccount($this->session->get('pseudo'));
      $this->logoutOrDelete('delete_account');
    }
  }

  public function logoutOrDelete($param) {

    $this->session->stop();

    if($param === 'logout') {
      $this->session->set($param, "A bientot");
    }
    else {
      $this->session->set($param, 'Compte supprimé');
    }
    header('Location: ../public/index.php');
  }

  public function administration() {

    if($this->checkAdmin()) {

      $articles= $this->articleDAO->getArticles();
      $comments= $this->commentDAO->getFlagComments();
      $users = $this->userDAO->getUsers();
      return $this->view->render('administration', ['articles' => $articles, 'comments' => $comments, 'users' => $users]);
    }
  }

  public function updateAvatar(Parameter $post) {
    if($this->checkLoggedIn()) {
      if ($post->get('submit')) {
        if(empty(@file_get_contents($_FILES['image']['tmp_name']))) {
          $errors = '<p class="red"> Image non valide </p>';
        }
        else {
      $this->userDAO->updateAvatar($post, $this->session->get('pseudo'));
      header('Location: ../public/index.php?route=profile');
    }
  }

    @$this->view->render('update_avatar', ['errors' => $errors]);
  }
  else {
    header('Location: ../public/index.php');
  }
}

  public function unflagComment($commentId) {

    if($this->checkAdmin()) {
      $this->commentDAO->unflagComment($commentId);
      header('Location: ../public/index.php?route=administration');
    }
  }

  public function deleteUser($userId) {
    if($this->checkAdmin()) {
      $this->userDAO->deleteUser($userId);
      header('Location: ../public/index.php?route=administration');
    }
  }

  public function checkLoggedIn() {
    if(!$this->session->get('pseudo')) {
      header('Location: ../public/index.php?route=login');
    }
    else {
      return true;
    }
  }

  public function checkAdmin() {
    $this->checkLoggedIn();
    if(!($this->session->get('role') === 'admin')) {
      header('Location: ../public/index.php?route=profile');
    }
    else {
      return true;
    }
  }
}
