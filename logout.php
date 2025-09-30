<?php
require_once 'functions.php';

// Détruire toutes les données de session
session_start();
$_SESSION = array();

// Supprimer le cookie de session si existe
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil
header('Location: index.php');
exit();
