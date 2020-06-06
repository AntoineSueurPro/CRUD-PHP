<?php $this->title = 'Administration'; ?>
<section class="admin-container">
<div class="titre-separateur flex">
  <h1 class="titre-generique">Administration</h1>
  <div class="separateur flex"></div>
</div>
<div class="titre-separateur flex">
  <h2 class="titre-generique">Article</h2>
  <div class="separateur flex"></div><br>
  <a href="../public/index.php?route=addArticle">Nouvel article</a>
</div>
<table class="table-admin">
    <tr>
        <td class="cool-grey">Titre</td>
        <td class="cool-grey">Contenu</td>
        <td class="cool-grey">Auteur</td>
        <td class="cool-grey">Date</td>
        <td class="cool-grey">Actions</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td class="table-content"><?= substr($article->getContent(), 0, 300);?></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
            <td>
                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<div class="titre-separateur flex">
  <h2 class="titre-generique">Commentaires signalés</h2>
  <div class="separateur flex"></div>
</div>
<table class="table-admin">
    <tr>
        <td class="cool-grey">Id</td>
        <td class="cool-grey">Pseudo</td>
        <td class="cool-grey">Message</td>
        <td class="cool-grey">Date</td>
        <td class="cool-grey">Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?> ... </td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td>
                <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<div class="titre-separateur flex">
  <h2 class="titre-generique">Utilisateurs</h2>
  <div class="separateur flex"></div>
</div>
<table class="table-admin">
    <tr>
        <td class="cool-grey">Id</td>
        <td class="cool-grey">Pseudo</td>
        <td class="cool-grey">Date</td>
        <td class="cool-grey">Rôle</td>
        <td class="cool-grey">Actions</td>
    </tr>
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getId());?></td>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td>Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td>
                <?php
                if($user->getRole() != 'admin') {
                ?>
                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                <?php }
                else {
                    ?>
                Suppression impossible
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</section>
