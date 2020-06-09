<section>
  <div class="titre-separateur flex">
    <h1 class="titre-generique">Modifier mon Avatar</h1>
    <div class="separateur flex"></div>
  </div>
  <div class="form-container flex">
    <?php if(isset($errors)) { ?>
       <p> <?= $errors ?> </p>
     <?php } ?>
    <form name="updateAvatar" method="post" action="" enctype = "multipart/form-data">
    <label>Taille max : 1Mo</label><br><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input type="file" name="image" /><br/>
    <input type="submit" name="submit" id='submit' value="envoyer" />
  </form>
  </div>
</section>
