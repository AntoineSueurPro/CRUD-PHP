<?php
namespace projet_4\src\controller;
use projet_4\config\Parameter;
class FrontController extends Controller {

  public function home() {
    $articles = $this->articleDAO->getArticles();
    return $this->view->render('home', ['articles' => $articles]);
  }

  public function article($articleId) {
    $article = $this->articleDAO->getArticle($articleId);
    $comments = $this->commentDAO->getCommentsFromArticle($articleId);
    return $this->view->render('single', ['article' => $article, 'comments' => $comments]);
  }

  public function addComment(Parameter $post, $articleId) {

    if($post->get('submit')) {

      $errors = $this->validation->validate($post, 'Comment');
      if(!$errors) {
        $this->commentDAO->addComment($post, $articleId);
        $this->session->set('add_comment', 'Commentaire ajouté <br/>');
        header('Location: ../public/index.php?route=article&articleId='.$articleId);
      }
      $article = $this->articleDAO->getArticle($articleId);
      $comments = $this->commentDAO->getCommentsFromArticle($articleId);
      return $this->view->render('single', [
        'article' => $article,
        'comments' => $comments,
        'post' => $post,
        'errors' => $errors
      ]);
    }
  }

  public function flagComment($commentId) {
    $this->commentDAO->flagComment($commentId);
    $this->session->set('flag_comment', 'Commentaire signalé');
    header('Location: ../public/index.php');
  }
}
