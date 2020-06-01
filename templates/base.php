<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a201253c55.js" crossorigin="anonymous"></script>
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
