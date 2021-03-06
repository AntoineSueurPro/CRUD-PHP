<?php
//COMMENTDAO - DATA OBJECT ACCESS - GERE TOUT CE QUI CONCERNES LES COMMENTS - RECUPERE, STOCK ET EFFECTUE DES ACTIONS SUR LA BDD - UTILISE LE MODEL COMMENT POUR INSTANCIER DES OBJETS AVEC LES INFORMATIONS RECUPEREES
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
        $comment->setFlag($row['flag']);
        $comment->setAvatar($row['avatar']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag, avatar FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $post, $articleId, $pseudo) {
      $sql = 'SELECT avatar AS avatar from user WHERE pseudo = ?';
      $result = $this->createQuery($sql, [$pseudo]);
      $avatar = $result->fetch();
      $sql = 'INSERT INTO comment (pseudo, content, createdAt, flag, article_id, avatar) VALUES (?,?,NOW(),?,?,?)';
      $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), 0, $articleId, $avatar['avatar']]);
    }

    public function deleteComment($commentId) {
      $sql = 'DELETE FROM comment WHERE id = ?';
      $this->createQuery($sql, [$commentId]);
    }

    public function flagComment($commentId) {
      $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
      $this->createQuery($sql, [1, $commentId]);
    }

    public function getFlagComments() {
      $sql = 'SELECT id, pseudo, content, createdAt, flag, avatar FROM comment WHERE flag = ? ORDER BY createdAt DESC';
      $result = $this->createQuery($sql,[1]);
      $comments = [];
      foreach ($result as $row) {
        $commentId = $row["id"];
        $comments[$commentId] = $this->buildObject($row);
      }
      $result->closeCursor();
      return $comments;
    }

    public function unflagComment($commentId) {
      $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
      $this->createQuery($sql, [0, $commentId]);
    }
}
