<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Créer une vache</title>
</head>
<body>
    <?php 
    include "en-tete.php";
    ?>

    <form action="creer-vache-traitement.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nom">Nom de la vache :</label>
            <input type="text" name="nom"/>
        </div>
        <div>
            <label for="image-vache">Choisir une image :</label>
            <input type="file" name="image-vache"/>
        </div>			
        <input type="submit" value="Créer la vache">
    </form>

    <?php
    include "pied-page.php";
    ?>
</body>
</html>
