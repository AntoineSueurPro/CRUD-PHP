<?php
require 'Database.php';
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>
        <?php
        $db = new Database(); //Creation de l'objet db de classe Database.
      echo $db -> getConnection(); // Methode de classe pour se connecter à la db.
         ?>
    </div>
</body>
</html>
