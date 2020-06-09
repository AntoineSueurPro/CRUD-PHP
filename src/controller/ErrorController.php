<?php
//CONTROLLER POUR LA GESTION DES ERREURS - RENVOI VERS LES PAGES D'ERREURS
namespace projet_4\src\controller;

class ErrorController extends Controller {

  public function errorNotFound() {
    return $this->view->render('error_404');
  }

  public function errorServer() {
    return $this->view->render('error_500');
  }
}
