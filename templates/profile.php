<?php $this->title = 'Mon profil'; ?>
  <?php  $avatar = $profile->getAvatar();
    if($avatar === '') { ?>
      <style type="text/css">
      .avatar-image {
      background-image: url('../public/img/test.jpg');
      }
      </style>
  <?php  }
    else { ?>
      <style type="text/css">
      .avatar-image {
      background-image: url(<?='"data:image/jpeg;base64,'.base64_encode( $profile->getAvatar()).'"'; ?>);
      }
      </style>
  <?php  } ?>

<section class="profile flex">
  <div class="titre-separateur flex">
    <h1 class="titre-generique">Mon blog</h1>
    <div class="separateur flex"></div>
  </div>
  <div class="avatar-image flex"></div>
  <div class="user-and-role flex">
    <p class="pseudo-role flex"><?= $this->session->get('pseudo'); ?></p>
    <p class="pseudo-role flex">Role : <?php if($this->session->get('role') === 'admin') { ?>
            <span class="red">Admin</span>
    <?php }
          else { ?>
            <span class="pseudo-role flex">User</span>
        <?php  } ?></p>
  </div>
  <div class="profile-button flex">
  <a href="../public/index.php?route=updatePassword"><div class="button_orange flex">Modifier mon mot de passe<br></div></a>
  <a href="../public/index.php?route=updateAvatar"><div class="button_orange flex">Modifier mon avatar<br></div></a>
  <a href="../public/index.php?route=deleteAccount"><div class="button_orange flex">Supprimer mon compte</div></a><br>
  <a href="../public/index.php">Retour à l'accueil</a>
</section>
