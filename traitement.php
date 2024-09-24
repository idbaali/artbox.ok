<?php
// Code à exécuter si l'un des champs est vide
if (empty($_POST['titre']) || empty($_POST['artiste']) || empty($_POST['image']) || empty($_POST['description']))
|| !filter_var($_POST['image'], FILTER_VALIDE_URL) 
|| strlen($_POST['description']) < 3 {
    
    // redirection sur le formulaire
    header('location = ajouter.php');
} else {
    // inser
}

?>
