<div class ="menu-logo-text-container">
  <div class = "logo-texte-container">
    <div class = "logo"><a class="no-link" href="../public/index.php"><img class="logo-image" src="../public/img/logo.jpg" alt="Logo site"></a></div>
    <div class = textTitle><a class="no-link" href="../public/index.php">MyBlogPost</a></div>
    <div class ="orange-dot"><i class="fas fa-circle"></i></div>
  </div>
  <nav class = menu>
    <?php
    if ($this->session->get('pseudo')) {
      ?>
      <a class="menu-link" href="../public/index.php?route=logout">Déconnexion</a>
      <a class ="menu-link" href="../public/index.php?route=profile">Profil</a>

    <?php if($this->session->get('role') === 'admin') { ?>

            <a class="menu-link" href="../public/index.php?route=administration">Administration</a>
          <?php } ?>

          <?php }
          else { ?>
            <a class="menu-link" href="../public/index.php?route=register">Inscription</a>
            <a class="menu-link" href="../public/index.php?route=login">Connexion</a>
          <?php } ?>
  </nav>
</div>
