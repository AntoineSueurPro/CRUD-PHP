<?php $this->title = 'Accueil';
$tab = array();
foreach ($articles as $article) {
  array_push($tab, $article);
}
$nb_articles = count(($articles));
$nb_article_pages = 10;
$nb_pages = ceil($nb_articles/$nb_article_pages);
@$page = $_GET["page"];
if(empty($page)) {
  $page = 1;
}
$debut = ($page-1) * $nb_article_pages;
$fin = $debut + $nb_article_pages;
var_dump(count(($tab)));
if($fin > count(($tab))) {
  $fin = count(($tab));
}?>
<section class="home flex">
  <div class="titre-separateur flex">
    <h1 class"titre-generique flex">Mon blog</h1>
    <div class="separateur flex"></div>
  </div>
<div class="test flex">
  <?php
    for($i = $debut; $i < $fin; $i++) {
      $article = $tab[$i]; ?>
      <div class="article-container flex">
        <div class="title-date flex">
          <div class="article-title flex"><h2><a class="link-title" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
            <span class= "date-author">- Le <?= htmlspecialchars($article->getCreatedAt()); ?>  -  par <?= htmlspecialchars($article->getAuthor());?></span></h2></div>
        </div>
        <div><?= '<img class="img" src ="data:image/jpeg;base64,'.base64_encode($article->getImage()).'"/>';?></div>
        <div class="article-content flex"><?=substr($article->getContent(), 0, 550);?>... <a class="read" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">Lire l'article</a></p></div>
      </div>
    <?php } ?>
    <div class="paginate">
    <?php for ($i=1; $i <= $nb_pages; $i++) { ?>
      <a class="paginate-button" href='?page=<?= $i?>'><?= $i ?></a>
  <?php  } ?>
  </div>
</div>
</section>
