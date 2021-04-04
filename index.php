<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Afficher toutes les vaches</title>
</head>
<body>
    <?php
    include "en-tete.php";

    try {

        include "connexion.php";

        $sth = $dbh->prepare("SELECT `id_vache`, `nom`, `date_creation`, `nom_image` FROM `vache`;");

        $sth->execute();
        $vaches = $sth->fetchAll();
    
        foreach($vaches as $vache)
        {
        ?>
            <div class="liste-vache espacement">
                <h4>
                <a href="modifier-vache.php?id_vache=<?=$vache['id_vache']?>" title=""><?=$vache['nom']?></a>
                </h4>
                <span><?=$vache['date_creation']?></span>
                <img src="images-vache/<?=$vache['nom_image']?>" alt="image d'une vache">
            </div>		
        <?php 		
        }
    } catch (\Throwable $e) {
        echo("Erreur lors de la récupération des vaches.");
        echo($e->getMessage());
    }

    include "pied-page.php";
    ?>
</body>
</html>
