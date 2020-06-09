<?php
//ARTICLEDAO - DATA OBJECT ACCESS - GERE TOUT CE QUI CONCERNES LES ARTICLE - RECUPERE, STOCK ET EFFECTUE DES ACTIONS SUR LA BDD - UTILISE LE MODEL ARTICLE POUR INSTANCIER DES OBJETS AVEC LES INFORMATIONS RECUPEREES
namespace projet_4\src\DAO;

use projet_4\src\model\Article;
use projet_4\config\Parameter;

class ArticleDAO extends DAO {

  private function buildObject($row) {

    $article = new Article();
    $article->setId($row['id']);
    $article->setTitle($row['title']);
    $article->setContent($row['content']);
    $article->setAuthor($row['pseudo']);
    $article->setCreatedAt($row['createdAt']);
    $article->setImage($row['image']);
    return $article;
  }

  public function getArticles() {

    $sql = 'SELECT article.id, article.title, article.content, article.image, user.pseudo, article.createdAt FROM article INNER JOIN user ON article.user_id = user.id ORDER BY article.id DESC';
    $result = $this->createQuery($sql);
    $articles = [];

    foreach ($result as $row) {
      $articleId = $row["id"];
      $articles[$articleId] = $this->buildObject($row);
    }
    $result->closeCursor();
    return $articles;
  }

  public function getArticle($articleId) {

    $sql = 'SELECT article.id, article.title, article.content, user.pseudo, article.createdAt, article.image FROM article INNER JOIN user ON article.user_id = user.id WHERE article.id = ?';
    $result = $this->createQuery($sql, [$articleId]);
    $article = $result->fetch();
    $result->closeCursor();
    return $this->buildObject($article);
  }

  public function addArticle(Parameter $post, $userId) {

    $sql = 'INSERT INTO article(title, content, createdAt, user_id, image) VALUES (?, ?, NOW(), ?, ?)';
    $this->createQuery($sql,[$post->get('title'), $post->get('content'), $userId, file_get_contents($_FILES["image"]["tmp_name"])]);
  }

  public function editArticle(Parameter $post, $articleId, $userId) {
    if(empty(file_get_contents($_FILES["image"]["tmp_name"]))){

      $sql = 'UPDATE article SET title=:title, content=:content, user_id=:user_id WHERE id=:articleId';
      $this->createQuery($sql, [
        'title' => $post->get('title'),
        'content' => $post->get('content'),
        'user_id' => $userId,
        'articleId' => $articleId
      ]);
    }
    else {
    $sql = 'UPDATE article SET title=:title, content=:content, user_id=:user_id, image=:image WHERE id=:articleId';
    $this->createQuery($sql, [
      'title' => $post->get('title'),
      'content' => $post->get('content'),
      'image' => file_get_contents($_FILES["image"]["tmp_name"]),
      'user_id' => $userId,
      'articleId' => $articleId
    ]);
  }
  }

  public function deleteArticle($articleId) {
    $sql ='DELETE FROM comment WHERE article_id = ?';
    $this->createQuery($sql, [$articleId]);
    $sql = 'DELETE FROM article WHERE id = ?';
    $this->createQuery($sql, [$articleId]);
  }
}
