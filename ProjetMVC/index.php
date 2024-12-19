<?php
// Démarrage de la session si nécessaire
session_start();

// Inclusion des fichiers nécessaires
require_once './app/controllers/taskController.php';

// Initialisation du contrôleur
$controller = new TaskController();

// Exécution de l'action
$controller->index();
?>
