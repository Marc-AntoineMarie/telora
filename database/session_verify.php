<?php
///////////////////// Gestion des droits d'accès ///////////////////
require_once __DIR__ . '/session.php';

// Vérification du rôle
if (!isset($_SESSION['role'])) {
    header('Location: ../login/login.php');
    exit;
}

$role = $_SESSION['role'];

// Bloquer toute navigation par idpartenaires en GET pour tous les rôles (sauf dans select_partner.php)
if (
    isset($_GET['idpartenaires'])
    && basename($_SERVER['SCRIPT_NAME']) !== 'select_partner.php'
) {
    error_log("[session_verify.php] Navigation par idpartenaires interdite pour le rôle $role, accès bloqué.");
    // Si la variable de session attendue n'est pas là, on va à la page de login pour casser la boucle
    if (
        ($role === 'Partenaire' && !isset($_SESSION['partner_id'])) ||
        ($role === 'Client' && !isset($_SESSION['client_id'])) ||
        ($role === 'Admin' && !isset($_SESSION['role']))
    ) {
        header('Location: ../login/login.php');
        exit;
    }
    // Sinon, on nettoie juste l'URL
    $cleanUrl = strtok($_SERVER['REQUEST_URI'], '?');
    header('Location: ' . $cleanUrl);
    exit;
}

// Pour le rôle Client : l'ID client doit obligatoirement être en session
if ($role === 'Client') {
    if (!isset($_SESSION['client_id'])) {
        header('Location: ../login/login.php');
        exit;
    }
}

// Pour le rôle Partenaire : l'ID partenaire doit obligatoirement être en session
if ($role === 'Partenaire') {
    if (!isset($_SESSION['partner_id'])) {
        header('Location: ../login/login.php');
        exit;
    }

    // Pour l'accès à certaines pages, l'ID client peut aussi être requis, finir plus tard
//     if (!isset($_SESSION['client_id'])) {
//         header('Location: ../clientlist/client.php');
//         exit;
//     }
// }
}

