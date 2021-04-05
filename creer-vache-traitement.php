<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Confirmation de la création d'une vache</title>
</head>
<body>
    <?php 
    include "en-tete.php";

    $dossierCible = "images-vache/"; 
    $fichierCible = $dossierCible . basename($_FILES['image-vache']['name']);

    // Essayer de téléverser l'image
    if (move_uploaded_file($_FILES['image-vache']['tmp_name'], $fichierCible)) {
        
        try {
            
            // Pour garder la démonstration simple, l'exemple est dénudé de validations des données!

            include "connexion.php";

            $sth = $dbh->prepare("INSERT INTO `vache`(`nom`, `nom_image`) VALUES (:nom, :nom_image);");

            $sth->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $sth->bindParam(':nom_image', $_FILES['image-vache']['name'], PDO::PARAM_STR);
            ?>

            <div class="centrer centrer-texte">

            <?php
            if ($sth->execute()) {
                echo("Succès lors de la création de la vache.");
            } else {
                echo("Erreur lors de la création de la vache.");
            }
            ?>

            </div>
            
            <?php
        } catch (\Throwable $e) {
            echo("Erreur lors de la création de la vache.");
            echo($e->getMessage());
        }
    } else {
        echo("Erreur lors de la sauvegarde de l'image.");
    }

    include "pied-page.php";
    ?>
</body>
</html>
