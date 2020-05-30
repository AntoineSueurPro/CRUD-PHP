<?php $this->title = 'Mon profil'; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('update_password'); ?>
<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <?php if($this->session->get('role') === 'admin') { ?>
            <p>Admin</p>
    <?php }
          else { ?>
            <p>User<p>
        <?php  } ?>
    <a href="../public/index.php?route=updatePassword">Modifier son mot de passe</a><br>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>
