<?php
namespace projet_4\config;
use projet_4\src\controller\FrontController;
use projet_4\src\controller\ErrorController;
use Exeption;

class Router {

    private $frontController;
    private $errorController;

    public function __construct() {

        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
    }

    public function run() {

        try {
            if(isset($_GET['route'])) {

                if($_GET['route'] === 'article') {

                    $this->frontController->article($_GET['articleId']);
                }
                else {
                    $this->errorController->errorNotFound();;
                }
            }
            else {
                $this->frontController->home();
            }
        }
        catch (Exception $e) {
            $this->errorController->errorServer();
        }
    }
}
