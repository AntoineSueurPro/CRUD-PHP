<?php $this->title = "Inscription"; ?>
<div class="general-container">
<div class="titre-separateur flex">
  <h1 class"titre-generique flex">Inscription</h1>
  <div class="separateur flex"></div>
</div>
<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input class="cool_button" type="submit" value="OK" id="submit" name="submit">
        <a href="../public/index.php">Retour à l'accueil</a>
    </form>
</div>
</div>
<div class="pack"></div>
