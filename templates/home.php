<?php $this->title = 'Accueil';
$tab = array();
foreach ($articles as $article) {
  array_push($tab, $article);
}
$nb_articles = count(($articles)); //COMPTE LES NOMBRE D'ARTICLES
$nb_article_pages = 3;
$nb_pages = ceil($nb_articles/$nb_article_pages); //CEIL() PERMET D'AVOIR UN ENTIER ARRONDI AU SUPERIEUR
@$page = $_GET["page"]; //PERMET DE SAVOIR A QUEL PAGE ON SE SITUE
if(empty($page)) { //PERMET DE DEFINIR LA PAGE DE BASE COMME LA PAGE 1
  $page = 1;
}
$debut = ($page-1) * $nb_article_pages; //PERMET DE STOCKER NOTRE POSITION DANS LE TABLEAU
$fin = $debut + $nb_article_pages;//PERMET DE DEFINIR UN POINT DE STOP DE BOUCLE
if($fin > count(($tab))) {
  $fin = count(($tab));
}?>

<section class="home flex">
  <div class="titre-separateur flex">
    <h1 class="titre-generique flex">Mon blog</h1>
    <div class="separateur flex"></div>
  </div>
<div class="test flex">
  <?php
    for($i = $debut; $i < $fin; $i++) { //AFFICHE LE NOMBRE D'ARTICLE VOULU
      $article = $tab[$i]; ?>
      <div class="article-container flex">
        <div class="title-date flex">
          <div class="article-title flex"><h2><a class="link-title" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
            <span class= "date-author">- Le <?= htmlspecialchars($article->getCreatedAt()); ?>  -  par <?= htmlspecialchars($article->getAuthor());?></span></h2></div>
        </div>
      <?php  $image = $article->getImage();
        if($image === '') { ?>
          <div><img class="img" alt="image de présentation" src ="../public/img/test.jpg"/></div>
      <?php  }
        else { ?>
          <div><?= '<img class="img" alt="image de présentation" src ="data:image/jpeg;base64,'.base64_encode($article->getImage()).'"/>';?></div>
      <?php  } ?>
        <div class="article-content flex"><?=substr($article->getContent(), 0, 550);?>... <a class="read" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">Lire l'article</a></p></div>
      </div>
    <?php } ?>
    <div class="paginate">
      <a class="paginate-button" href='?page=1'>1 </a>
    <?php for ($i=2; $i <= $nb_pages; $i++) { //AFFIHE LE NOMBRE DE LIENS NECESSAIRES ?>
    - <a class="paginate-button" href='?page=<?= $i?>'><?= $i ?></a>
  <?php  } ?>
  </div>
</div>
</section>
