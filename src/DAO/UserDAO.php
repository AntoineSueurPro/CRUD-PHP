<?php
namespace projet_4\src\DAO;
use projet_4\config\Parameter;
use projet_4\src\model\User;

class UserDAO extends DAO {

  private function buildObject($row) {

    $user = new User();
    $user->setId($row['id']);
    $user->setPseudo($row['pseudo']);
    $user->setCreatedAt($row['createdAt']);
    $user->setRole($row['name']);
    $user->setAvatar($row['avatar']);
    return $user;
  }

  public function register(Parameter $post) {
    $sql = 'INSERT INTO user (pseudo, password, createdAt, role_id, avatar) VALUES (?, ?, NOW(), ?, ?)';
    if(empty($_FILES["image"])) {
      $_FILES["image"] = 1;
    }
    $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT), 2, file_get_contents($_FILES["image"]["tmp_name"])]);
  }

  public function checkUser(Parameter $post) {
    $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
    $result = $this->createQuery($sql, [$post->get('pseudo')]);
    $isUnique = $result->fetchColumn();
    if($isUnique) {
      return '<p>Le pseudo est déjà pris.</p>';
    }
  }

  public function login(Parameter $post) {
    $sql = 'SELECT user.id, user.role_id, user.password, role.name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = ?';
    $data = $this->createQuery($sql, [$post->get('pseudo')]);
    $result = $data->fetch();
    $isPasswordValid = password_verify($post->get('password'), $result['password']);
    return ['result' => $result, 'isPasswordValid' => $isPasswordValid];
  }

  public function updatePassword(Parameter $post, $pseudo) {
    $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
    $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
  }

  public function deleteAccount($pseudo) {
    $sql = 'DELETE FROM user WHERE pseudo = ?';
    $this->createQuery($sql, [$pseudo]);
  }

  public function getUsers() {
    $sql = 'SELECT user.id, user.pseudo, user.createdAt, role.name, user.avatar FROM user INNER JOIN role ON user.role_id = role.id ORDER BY user.id DESC';
    $result = $this->createQuery($sql);
    $users = [];

    foreach($result as $row) {
      $userId = $row['id'];
      $users[$userId] = $this->buildObject($row);
    }
    $result->closeCursor();
    return $users;
  }

  public function deleteUser($userId) {
    $sql = 'DELETE FROM user WHERE id = ?';
    $this->createQuery($sql,[$userId]);
  }

  public function updateAvatar(Parameter $post, $pseudo) {
    $sql = 'UPDATE user SET avatar = ? WHERE pseudo = ?';
    $this->createQuery($sql,[file_get_contents($_FILES["image"]["tmp_name"]), $pseudo]);
    $sql = 'UPDATE comment SET avatar = ? WHERE pseudo = ?';
    $this->createQuery($sql,[file_get_contents($_FILES["image"]["tmp_name"]), $pseudo]);
  }

  public function getProfile($pseudo) {
    $sql = 'SELECT user.id, user.createdAt, role.name, user.avatar, user.pseudo FROM user INNER JOIN role ON user.role_id = role.id WHERE pseudo = ?';
    $result = $this->createQuery($sql, [$pseudo]);
    $profil = $result->fetch();
    $result->closeCursor();
    return $this->buildObject($profil);
  }
}
