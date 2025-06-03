<?php
// partner_context.php
// Fournit une méthode centralisée pour déterminer l'id partenaire courant de manière sécurisée

function getCurrentPartnerId() {
    if (!isset($_SESSION['role'])) {
        return null;
    }
    $role = $_SESSION['role'];
    if ($role === 'Partenaire') {
        return $_SESSION['partner_id'] ?? null;
    }
    if ($role === 'Admin' && isset($_SESSION['partner_id'])) {
        return $_SESSION['partner_id'];
    }
    return null;
}
