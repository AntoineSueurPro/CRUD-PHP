<?php
//LES CONTRAINTES VOULUES SONT ICI
namespace projet_4\src\constraint;

class Constraint {

  public function notBlank($name, $value) {
    if(empty($value)) {
      return '<p class="red">Le champ est vide</p>';
    }
  }

  public function minLength($name,$value,$minSize) {
    if(strlen($value) < $minSize) {
      return '<p class="red">Entrer au moins '.$minSize. ' caratères dans le champ</p>';
    }
  }

  public function maxLength($name,$value,$minSize) {
    if(strlen($value) > $minSize) {
      return '<p class="red">Entrer au maximum '.$minSize. ' dans le champ</p>';
    }
  }
}
