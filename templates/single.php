<?php $this->title = "Article";
$nb = count(($comments))?>
<section class="article-comment flex">
  <div class="titre-separateur flex">
    <h1 class="titre-generique">Mon blog</h1>
    <div class="separateur flex"></div>
  </div>
<div class="test flex">
  <div class="article-container flex">
    <div class="title-date flex">
      <div class="article-title flex"><h2><a class="link-title" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
        <span class= "date-author">- Le <?= htmlspecialchars($article->getCreatedAt()); ?> </span></h2></div>
    </div>
    <?php  $image = $article->getImage();
      if($image === '') { ?>
        <div><img class="img" alt="image de présentation" src ="../public/img/test.jpg"/></div>
    <?php  }
      else { ?>
        <div><?= '<img class="img" alt="image de présentation" src ="data:image/jpeg;base64,'.base64_encode($article->getImage()).'"/>';?></div>
    <?php  } ?>
    <div class="article-content flex">
      <?= $article->getContent() ?>
      <p><?= $article->getAuthor();?></p>
    </div>
  </div>
        <div class="titre-separateur flex">
          <h1 class="titre-generique">Commentaires <span class="light">(<?= $nb ?>)</span></h1>
          <div class="separateur flex"></div>
        </div>
        <div class="comment-full-container">
          <?php if(count(($comments)) === 0) { ?>
          <div class="no-comment flex"><p>Il n'y a aucun commentaire. Soyez le premier à commenter !</p></div>
        <?php } else { ?>
        <?php foreach ($comments as $comment) { ?>
          <div class="comment-container flex">
            <p><span class="pseudo" ><?= htmlspecialchars($comment->getPseudo());?></span><span class="date-comment"> - Posté le <?= htmlspecialchars($comment->getCreatedAt());?></span></p>
            <div class="comment-content flex">
              <div class="content-comment flex"><?= $comment->getContent() ?></div>
              <?php
              if($comment->isFlag()) {
                ?>
                <p class="red">Commentaire signalé</p>
                <?php
              }
              else {
                ?>
                <p><a class="read" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
                <?php
              }
              ?>
            </div>
          </div>
              <?php
            }
          }
            ?>
    <div class="post-comment flex">
        <div class="titre-separateur-2 flex">
          <h1>Publier un commentaire</h1>
          <div class="separateur flex"></div>
        </div>
    </div>
    <div class="comment-form flex">
      <?php include('form_comment.php'); ?>
    </div>
   </div>
  </div>
</section>
