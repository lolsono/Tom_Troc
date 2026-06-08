<?php
session_start();
?>

<div class="user">
    <h2>page utilisateur une fois connecter</h2>
    <p>votre nom utilisateur<?= $_SESSION['name'] ?></p>
    <a href="index.php">Retour à la page d'accueil</a>
</div>
