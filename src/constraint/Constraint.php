<?php
namespace projet_4\src\constraint;

class Constraint {

  public function notBlank($name, $value) {
    if(empty($value)) {
      return '<p>Le champ '.$name.' est vide</p>';
    }
  }

  public function minLength($name,$value,$minSize) {
    if(strlen($value) < $minSize) {
      return '<p>Entrer au moins '.$minSize. ' dans le champ '.$name.'</p>';
    }
  }

  public function maxLength($name,$value,$minSize) {
    if(strlen($value) > $minSize) {
      return '<p>Entrer au maximum '.$minSize. ' dans le champ '.$name.'</p>';
    }
  }
}
