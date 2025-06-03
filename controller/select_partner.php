<?php
// Contrôleur pour sélectionner un partenaire (admin uniquement)
require_once __DIR__ . '/../database/session_verify.php';

// Vérifier que l'utilisateur est admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login/login.php');
    exit;
}

if (isset($_GET['idpartenaires'])) {
    $_SESSION['partner_id'] = intval($_GET['idpartenaires']);
    // Log facultatif pour le debug
    error_log('[select_partner.php] Admin a sélectionné le partenaire ' . $_SESSION['partner_id']);
    // Redirection vers la liste des clients du partenaire
    header('Location: ../clientlist/clientlist.php');
    exit;
}
// Si pas d'ID, retour à la page admin
header('Location: ../admin/V1_admin.php');
exit;
