<?php
namespace projet_4\src\DAO;
use projet_4\config\Parameter;

use projet_4\src\model\Avatar;

class AvatarDAO extends DAO {

  private function buildObject($row) {

    $avatar = new Avatar();
    $avatar->setId($row['id']);
    $avatar->setName($row['nom']);
    $avatar->setSize($row['taille']);
    $avatar->setType($row['type']);
    $avatar->setPseudo($row['pseudo']);
    $avatar->setBin($row['bin']);
    return $avatar;
  }

  public function getAvatar($pseudo) {
    $sql = "SELECT * FROM images WHERE pseudo = ?";
    $result = $this->createQuery($sql, [$pseudo]);
    $avatar = $result->fetch();
    $result->closeCursor();
    return $this->buildObject($avatar);
  }

  public function updateAvatar(Parameter $post, $pseudo) {
    $sql = 'DELETE FROM images WHERE pseudo = ?';
    $this->createQuery($sql, [$pseudo]);
    $sql = 'INSERT INTO images (nom, taille, type, pseudo, bin) VALUES (?, ?, ?, ?, ?)';
    $this->createQuery($sql, [$_FILES["image"]["name"], $_FILES["image"]["size"], $_FILES["image"]["type"],  $pseudo, file_get_contents($_FILES["image"]["tmp_name"])]);
  }
}
