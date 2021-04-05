# Démonstration du téléversement d'images en PHP

## Prérequis

Tout d’abord, assurez-vous que PHP est configuré pour autoriser le téléchargement de fichiers.

Dans votre fichier __php.ini__, recherchez la configuration `file_uploads` et réglez-la sur :

```txt
file_uploads = On
```

## Structure de base d'un formulaire permettant le téléversement de fichiers

```html
<!DOCTYPE html>
<html>
<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Choisir une image :</label>
            <input type="file" name="image"/>
        </div>
        <input type="submit" value="Soumettre une image">
    </form>

</body>
</html>
```

Voici quelques règles à suivre pour le formulaire HTML de création :

- Assurez-vous que le formulaire utilise __method="post"__.
- Le formulaire a également besoin de l’attribut suivant : enctype="multipart/form-data". Il spécifie le type de contenu à utiliser lors de la soumission du formulaire.

> Sans les exigences ci-dessus, le téléchargement du fichier ne fonctionnera pas.

Autres choses à remarquer :

- L’attribut type="file" du \<input> tag affiche le champ d’entrée comme un contrôle de sélection de fichiers, avec un bouton "Parcourir" à côté.

Le formulaire ci-dessus envoie des données à un fichier appelé "upload.php", que nous allons créer ensuite.

## Téléverser un fichier

Voici le code de base pour le téléversement d'un fichier.

```php
<?php

// Autres codes PHP nécessaires à la validation
$dossierCible = "images-chargees/";

$fichierCible = $dossierCible . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $fichierCible)) {
    echo("Succès lors du chargement du fichier.");
}
else {
    echo("Erreur lors du chargement du fichier.");
}
?>
```

## Vérifier si le fichier existe déjà

Il est possible de vérifier si un fichier existe :

```php
<?php
if (file_exists($fichierCible)) {
  echo("Le fichier existe déjà.");
}
?>
```

## Limiter la taille du fichier

Le champ d’entrée dans notre formulaire HTML ci-dessus est nommé "image".

Il est également possible de vérifier la taille du fichier. Si le fichier est supérieur à 500 [KB](https://en.wikipedia.org/wiki/KB), un message d’erreur s’affiche :

```php
<?php
if ($_FILES["image"]["size"] > 500000) {
  echo("L'image est trop volumineuse.");
}
?>
```

> Notez que le "size" d'une image est calculé en "[bytes](https://fr.wikipedia.org/wiki/Byte#:~:text=font%2036%20bits.-,Distinction%20entre%20byte%20et%20octet,des%20bytes%20de%20huit%20bits.)".

## Limitez le type de fichier

Il est également possible de restreindre les types de fichiers acceptés :

```php
<?php
$extensionFichier = strtolower(pathinfo($fichierCible, PATHINFO_EXTENSION));

// Par exemple, acceptez les fichiers de type "jpg"
if($extensionFichier != "jpg") {
    echo("Désolé, seuls les fichiers `jpg` sont acceptés.");
}
?>
```

## Références

- <https://www.w3schools.com/php/php_file_upload.asp>

_Dans le cadre du cours 420-2A4-MT Serveur et données web_

Tous droits réservés 2021 © Alexis Garon-Michaud
