<?php
/**
 * Page d'administration principale
 * 
 * Cette page est le point d'entrée pour les administrateurs et permet :
 * - La gestion des partenaires (liste, ajout)
 * - L'accès aux clients de chaque partenaire

 * Fonctionnalités clés :
 * - Vue d'ensemble de tous les partenaires
 * - Navigation vers les clients de chaque partenaire
 * - Point de départ de la navigation en marque blanche
 */

// Inclusion des dépendances nécessaires
// Ces fichiers fournissent :
// - La connexion à la base de données
// - Les fonctions de gestion des partenaires
// - Les utilitaires communs
require_once '../database/db.php';
require_once '../database/session_verify.php';
require_once '../database/login_request.php';
require_once '../database/partner_request.php';
require_once '../layout/admin/layout.main.php';
require_once '../modals/add_partner_modal.php';
?>
<header>
    <!-- LOGO -->
    <div class="logo">
        <img src="logo/Logo-ldap.png" alt="Telora Logo">
    </div>
    <!-- FIN LOGO -->
</header>

<body>
    <div class="container-body">
        <main>
            <!-- BANDE Telora -->
            <section class="hero">
                <h1>Telora</h1>
                <p class="subtitle">Solution de Gestion de Contacts Multi-Partenaires</p>
            </section>
            <!-- FIN BANDE Telora -->
            <!-- Boutons gestion partenaires -->
            <div class="button-container-2">
                <span class="mas">Ajouter</span>
                <a class="button" id="openModal">Ajouter</a>
            </div>
            <!-- -------------------------- -->
            <!-- Bloc partenaires -->
            <!-- -------------------------- -->
            <section class="partners">
                <h2>Partenaire</h2>
                <div class="container-carré" id="partner-list">
                    <?php
                    foreach ($Partners as $partner) {
                        echo '<a href="../controller/select_partner.php?idpartenaires=' . htmlspecialchars($partner['idpartenaires']) . '" class="carré">';
                        echo '<img src="logo/' . htmlspecialchars($partner['idpartenaires']) . '.png" alt="' . htmlspecialchars($partner['Nom']) . '">';
                        echo '<p>' . htmlspecialchars($partner['Nom']) . '</p>';
                        echo '</a>';
                    }
                    ?>
                </div>
            </section>
            <!-- -------------------------- -->
            <!-- FIN Bloc partenaires -->
            <!-- -------------------------- -->
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sass.js/dist/sass.sync.min.js"></script>
    <script src="../ressources/js/scss.js"></script>
    <script src="../ressources/js/modal_admin.js"></script>
</body>

</html>