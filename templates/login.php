<?php $this->title = "Connexion"; ?>
<div class="general-container">
<div class="titre-separateur flex">
  <h1 class"titre-generique flex">Connexion</h1>
  <div class="separateur flex"></div>
</div>
<?= $this->session->show('error_login'); ?>
<div class="log-form">
    <form method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input class="cool-input push" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input class="push" type="password" id="password" name="password"><br>
        <input class="log-button" type="submit" value="OK" id="submit" name="submit"><br>
        <a href="../public/index.php">Retour à l'accueil</a>
    </form>
</div>
</div>
<div class="pack"></div>
