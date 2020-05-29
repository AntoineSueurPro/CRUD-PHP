<?php
namespace projet_4\src\DAO;
use projet_4\config\Parameter;

class UserDAO extends DAO {

  public function register(Parameter $post) {
    $sql = 'INSERT INTO user (pseudo, password, createdAt) VALUES (?, ?, NOW())';
    $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT)]);
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
    $sql = 'SELECT id, password FROM user WHERE pseudo = ?';
    $data = $this->createQuery($sql, [$post->get('pseudo')]);
    $result = $data->fetch();
    $isPasswordValid = password_verify($post->get('password'), $result['password']);
    return ['result' => $result, 'isPasswordValid' => $isPasswordValid];
  }

  public function updatePassword(Parameter $post, $pseudo) {
    $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
    $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
  }
}
