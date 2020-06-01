<?php $this->title = 'Accueil'; ?>
<div class="titre-generique-separateur">
<h1 class="titre-generique">Mon blog</h1>
</div>

<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('delete_account'); ?>

<?php
foreach ($articles as $article)
{
    ?>
    <div class="container-article-home">
    <div class="article-home">
        <h2 class="titre-article"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p>Le <?= htmlspecialchars($article->getCreatedAt()); ?>  -  par <?= htmlspecialchars($article->getAuthor());?></p>
        <p class="article-content"><?= htmlspecialchars($article->getContent());?></p>
    </div>
  </div>
    <br>
    <?php
}
?>
