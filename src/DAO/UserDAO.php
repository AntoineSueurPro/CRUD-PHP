<?php
namespace projet_4\src\DAO;
use projet_4\config\Parameter;

class UserDAO extends DAO {

  public function register(Parameter $post) {
    $sql = 'INSERT INTO user (pseudo, password, createdAt) VALUES (?, ?, NOW())';
    $this->createQuery($sql,[$post->get('pseudo'), $post->get('password'), PASSWORD_BCRYPT]);
  }
}
