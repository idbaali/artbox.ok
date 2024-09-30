<?php
// Code à exécuter si l'un des champs est vide
if (empty($_POST['titre']) 
    || empty($_POST['artiste']) 
    || empty($_POST['image']) 
    || empty($_POST['description'])
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL) 
    || strlen($_POST['description']) < 3 ) {
    // redirection sur le formulaire
    header('location: ajouter.php?erreur=true');
} else {
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);

    include 'bdd.php';
    $bdd = connexion();

    $requete = $bdd->prepare('INSERT INTO oeuvres (titre, artiste, image, description) VALUES (?, ?, ?, ?)');
    $requete->execute([$titre, $artiste, $image, $description]);
    
    // redirection sur le formulaire derniere id ajouté
    header('Location: oeuvre.php?id=' . $bdd->lastInsertId());

}


?>
