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
      <div class="article-title flex"><h2><a class="link-title" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2></div>
      <div class="date flex">Le <?= htmlspecialchars($article->getCreatedAt()); ?>  -  par <?= htmlspecialchars($article->getAuthor());?></div>
    </div>
    <div><img class="img" src="../public/img/test.jpg" alt="Logo site"/></div>
    <div class="article-content flex"><?=substr($article->getContent(), 0, 550);?>... <a class="read" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">Lire l'article</a></p></div>
  </div>
  <?php } ?>
</div>
</section>
