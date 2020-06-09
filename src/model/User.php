<?php
//MODEL DE LA CLASS USER
namespace projet_4\src\model;

class User {

  private $id;
  private $pseudo;
  private $password;
  private $createdAt;
  private $avatar;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getPseudo() {
    return $this->pseudo;
  }

  public function setPseudo($pseudo) {
    $this->pseudo = $pseudo;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

  public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
  }

  public function getRole() {
    return $this->role;
  }

  public function setRole($role) {
    $this->role = $role;
  }

  public function getAvatar() {
    return $this->avatar;
  }

  public function setAvatar($avatar) {
    $this->avatar = $avatar;
  }
}
