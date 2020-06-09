<?php
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>
<section class="edit-article">
<form method="post" action="../public/index.php?route=<?= $route; ?>" enctype = "multipart/form-data">
    <label for="title">Titre</label><br><br>
    <input class="input flex" type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>"></textarea><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?><br>
    <label for="image">Choisir une image : </label>
    <input type="file" name="image"><br><br>
    <label for="content">Contenu</label><br>
    <textarea class="content-article" id="content-article" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit"><br><br>
    <a href="../public/index.php">Retour à l'accueil</a>
</form>
</section>
