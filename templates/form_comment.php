<?php
$route = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Publier' : 'Mettre à jour';
?>
<?php if($this->session->get('role')) { ?>
<form class="cool-form" method="post" action="../public/index.php?route=<?= $route; ?>&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <input  type="hidden" value="<?= $this->session->get('pseudo') ?>" name="pseudo">
    <textarea id="content-form-comment" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input class="comment-button flex" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>
<?php }
      else {?>
        <p class="message">Veuillez vous connecter pour publier un commentaire !</p>
        <?php } ?>
