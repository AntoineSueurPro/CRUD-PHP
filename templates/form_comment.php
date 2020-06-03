<?php
$route = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>
<?php if($this->session->get('role')) { ?>
<form method="post" action="../public/index.php?route=<?= $route; ?>&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <input  type="hidden" value="<?= $this->session->get('pseudo') ?>" name="pseudo">
    <label for="content">Message</label><br>
    <textarea id="content-form-comment" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>
<?php }
      else {?>
        <p>Veuillez vous connecter pour publier un commentaire !</P>
        <?php } ?>
