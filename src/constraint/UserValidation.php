<?php
//GERE LES CONTRAITES DE VALIDATION LIES AUX UTILISATEURS
namespace projet_4\src\constraint;
use projet_4\config\Parameter;

class UserValidation extends Validation {

  private $errors = [];
  private $constraint;

  public function __construct() {
    $this->constraint = new Constraint();
  }

  public function check(Parameter $post) {

    foreach ($post->all() as $key => $value) {
      $this->checkField($key,$value);
    }
    return $this->errors;
  }

  private function checkField($name, $value) {

    if($name === 'pseudo') {
      $error = $this->checkPseudo($name, $value);
      $this->addError($name,$error);
    }
    elseif ($name === 'password') {
      $error = $this->checkPassword($name, $value);
      $this->addError($name,$error);
    }
  }

  private function addError($name, $error) {
    if($error) {
      $this->errors += [ $name => $error];
    }
  }

  public function checkPseudo($name, $value) {

    if ($this->constraint->notBlank($name, $value)) {
      return $this->constraint->notBlank('pseudo', $value);
    }

    if ($this->constraint->minLength($name, $value, 2)) {
      return $this->constraint->minLength('pseudo', $value, 2);
    }

    if ($this->constraint->maxLength($name, $value, 20)) {
      return $this->constraint->maxLength('pseudo', $value, 20);
    }
  }

  public function checkPassword($name, $value) {

    if($this->constraint->notBlank($name, $value)) {
      return $this->constraint->notBlank('password', $value);
    }

    if($this->constraint->minLength('password', $value, 8)) {
      return $this->constraint->maxLength('password', $value, 8);
    }

    if ($this->constraint->maxLength('password', $value, 255)) {
      return $this->constraint->maxlength('password', $value, 255);
    }
  }
}
