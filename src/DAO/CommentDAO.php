<?php
namespace projet_4\src\DAO;
use projet_4\src\model\Comment;
use projet_4\config\Parameter;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $post, $articleId) {
      $sql = 'INSERT INTO comment (pseudo, content, createdAt, article_id) VALUES (?,?,NOW(), ?)';
      $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'),$articleId]);
    }

    public function deleteComment($commentId) {
      $sql = 'DELETE FROM comment WHERE id = ?';
      $this->createQuery($sql, [$commentId]);
    }
}
