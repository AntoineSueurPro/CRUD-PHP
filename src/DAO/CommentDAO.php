<?php
namespace projet_4\src\DAO;
class CommentDAO extends DAO {
  public function getCommentsFromArticle($articleId) {

        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$articleId]);
    }
}
