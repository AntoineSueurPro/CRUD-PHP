<?php
namespace projet_4\src\constraint;

class Validation {

  public function validate($date, $name) {

    if($name === 'Article') {
      $articleValidation = new ArticleValidation();
      $errors = $articleValidation->check($data);
      return $errors;
    }
  }
}
