<?php $this->title = 'Accueil'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
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
if ($this->session->get('pseudo')) {
  ?>
  <a href="../public/index.php?route=logout">Déconnexion</a>
  <a href="../public/index.php?route=profile">Profil</a>

<?php if($this->session->get('role') === 'admin') { ?>

        <a href="../public/index.php?route=administration">Administration</a>
      <?php } ?>

      <?php }
      else { ?>
        <a href="../public/index.php?route=register">Inscription</a>
        <a href="../public/index.php?route=login">Connexion</a>
      <?php } ?>
<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p>Le <?= htmlspecialchars($article->getCreatedAt()); ?>  -  par <?= htmlspecialchars($article->getAuthor());?></p>
        <p><?= htmlspecialchars($article->getContent());?></p>
    </div>
    <br>
    <?php
}
?>
