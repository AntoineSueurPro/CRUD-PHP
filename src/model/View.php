<?php
//MODEL DE CLASS VIEW - SERS A GERER LES VUES DE MON APPLICATION
namespace projet_4\src\model;
use projet_4\config\Request;

class View
{
    private $file;
    private $title;
    private $request;
    private $session;

    public function __construct() {
      $this->request = new Request();
      $this->session = $this->request->getSession();
    }

    public function render($template, $data = []) // PERMET DE RENDRE LA VUE DEMANDEE
    {
        $this->file = '../templates/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data); //CONTENT SERA LES DONNEES DU TEMPLATE DEMANDE
        $view = $this->renderFile('../templates/base.php', [ //BASE.PHP EST LE TEMPLATE DE BASE QUI VA RECEVOIR LES DONNEES
            'content' => $content,
            'session' =>$this->session,
            'title' => $this->title
        ]);
        echo $view;
    }

    private function renderFile($file, $data) //PERMET D'EXTRAIRE LES DONNES DU TEMPLATE DEMANDE
    {
        if(file_exists($file)){
            extract($data);
            ob_start(); //STOCKAGE EN MEMOIRE TAMPON
            require $file;
            return ob_get_clean(); //RETOURNE LES DONNES
        }
        header('Location: index.php?route=notFound');
    }
}
