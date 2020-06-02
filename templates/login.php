<?php $this->title = "Connexion"; ?>
<div class="general-container">
<div class="titre-separateur flex">
  <h1 class"titre-generique flex">Connexion</h1>
  <div class="separateur flex"></div>
</div>
<?= $this->session->show('error_login'); ?>
<div>
    <form method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input class="cool_button" type="submit" value="OK" id="submit" name="submit">
        <a href="../public/index.php">Retour à l'accueil</a>
    </form>
</div>
</div>
<div class="pack"></div>
