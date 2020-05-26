<?php

namespace projet_4\src\controller;

class ErrorController {

  public function errorNotFound() {
    echo "ERROR 404 NOT FOUND";
  }

  public function errorServer() {
    echo "ERROR 405 SERVER";
  }
}
