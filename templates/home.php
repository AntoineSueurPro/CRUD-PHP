<?php $this->title = 'Accueil'; ?>
<section class="home flex">
  <div class="titre-separateur flex">
    <h1 class"titre-generique flex">Mon blog</h1>
    <div class="separateur flex"></div>
  </div>
<div class="test flex">
  <?php
  foreach ($articles as $article) { ?>
  <div class="article-container flex">
    <div class="title-date flex">
      <div class="article-title flex"><h2><a class="link-title" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
        <span class= "date-author">- Le <?= htmlspecialchars($article->getCreatedAt()); ?>  -  par <?= htmlspecialchars($article->getAuthor());?></span></h2></div>
    </div>
    <div><?= '<img class="img" src ="data:image/jpeg;base64,'.base64_encode($article->getImage()).'"/>';?></div>
    <div class="article-content flex"><?=substr($article->getContent(), 0, 550);?>... <a class="read" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">Lire l'article</a></p></div>
  </div>
  <?php } ?>
</div>
</section>
