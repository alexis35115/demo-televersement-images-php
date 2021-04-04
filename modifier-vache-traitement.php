<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Confirmation de la modification d'une vache</title>
</head>
<body>
    <?php 
    include "en-tete.php";

    // On écrase la photo à toutes les fois

    //  accepter seulement X formats et la taille?


    $repertoireImagesVache = $_SERVER['DOCUMENT_ROOT'] . "/demo-televersement-images-php/images-vache/"; 

    $destinationImage = $repertoireImagesVache . $_FILES['image-vache']['name'];

    $imageSource = $_FILES['image-vache']['tmp_name'];

    // Essayer de téléverser l'image
    if (move_uploaded_file($imageSource,$destinationImage)) {
        
        // Quand le téléversement fonctionne

        try {
            
            // VALIDER LES DONNÉES?


            include "connexion.php";

            $sth = $dbh->prepare("UPDATE `vache` SET `nom`=:nom,`nom_image`=:nom_image WHERE `id_vache` = :id_vache");

            $sth->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $sth->bindParam(':nom_image', $_FILES['image-vache']['name'], PDO::PARAM_STR);
            $sth->bindParam(':id_vache', $_POST['id_vache'], PDO::PARAM_INT);

            ?>

            <div class="centrer centrer-texte">

            <?php

            if ($sth->execute()) {
                echo("Succès lors de la modification de la vache.");
            } else {
                echo("Erreur lors de la modification de la vache.");
            }
            ?>

            </div>
            
            <?php
        } catch (\Throwable $e) {
            echo("Erreur lors de la modification de la vache.");
            echo($e->getMessage());
        }

    } else {
        echo("Erreur lors de la sauvegarde de l'image.");
    }
    
    include "pied-page.php";
    ?>
</body>
</html>
