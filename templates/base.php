<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a201253c55.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/kboxiw6t58hnx5roazu5n0ykco7bd00bo7xv0su7t7t3h5sk/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
    <script>
    tinymce.init({
      selector: '#content-form-comment',
      menubar: false
    });

    tinymce.init({
      selector: '#content-article',
    });
  </script>
  </script>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
</head>
<body>
    <?php include('menu.php'); ?>
    <div id="content">
        <?= $content ?>
    </div>
    <?php include('footer.php') ?>
</body>
</html>
