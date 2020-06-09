<?php $this->title = 'Modifier mon mot de passe'; ?>
<section>
<div class="titre-separateur flex">
  <h1 class"titre-generique flex">Modifier mon mot de passe</h1>
  <div class="separateur flex"></div>
</div>
<div class="form-container flex">
    <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password">Mot de passe</label><br>
        <input class="push" type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input class="push cool_button" type="submit" value="Valider" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>
<br>
</section>
