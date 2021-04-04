<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Modifier une vache</title>
</head>
<body>
    <?php 
    include "en-tete.php";

    // Normalement on veut valider le paramètre à l'entrée,
    // mais pour la démonstration, je vais faire vite!

    try {
        include "connexion.php";

        $sth = $dbh->prepare("SELECT `nom` FROM `vache` WHERE `id_vache` = ':id_vache';");
    
        $sth->bindParam(':id_vache', $_GET['id_vache'], PDO::PARAM_INT);

        $sth->execute();
        $vache = $sth->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="modifier-vache-traitement.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="nom">Nom de la vache :</label>
                <input type="text" name="nom" id="nom" value="<?=htmlspecialchars($vache['nom'])?>"/>
            </div>
            <div>
                <label for="image-vache">Choisir une image :</label>
                <input type="file" name="image-vache"/>
            </div>			
            <input type="submit" value="Modifier la vache">
            <input type="hidden" name="id_vache" value="<?=htmlspecialchars($_GET['id_vache'])?>">
        </form>

    <?php
    } catch (\Throwable $e) {
        # code...
    }

    include "pied-page.php";
    ?>
</body>
</html>
