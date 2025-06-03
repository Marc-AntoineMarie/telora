<?php
/**
 * Page de connexion de l'application
 * 
 * Cette page gère :
 * - L'authentification des utilisateurs
 * - La redirection selon le rôle (Admin/Partenaire/Client)
 * - La sécurité des sessions
 * 
 * Processus d'authentification :
 * 1. Vérification des identifiants
 * 2. Création de la session
 * 3. Redirection vers la page appropriée
 * 4. Gestion des erreurs de connexion
 */

// Inclusion des dépendances nécessaires
// Ces fichiers fournissent :
// - La connexion à la base de données
// - Les fonctions d'authentification
// - Les utilitaires de sécurité

require_once '../database/session.php';
require_once '../database/db.php';
require_once '../database/login_request.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars($_POST['login'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');

    $userLogin = new UserLogin($pdo);
    $error = $userLogin->login($login, $password);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telora - Connexion</title>
    <link rel="icon" type="image/png" href="../admin/logo/Logo-ldap.png">
    <link rel="shortcut icon" type="image/png" href="../admin/logo/Logo-ldap.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 400px; padding: 20px;">
            <h1 class="text-center">Connexion</h1>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Identifiant :</label>
                    <input type="text" id="login" name="login" class="form-control" required>
                </div>
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control pr-5" required>
                    <span class="password-toggle" id="togglePassword"
                        style="position: absolute; top: 38px; right: 20px; cursor: pointer;">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
            const passwordInput = document.getElementById("password");
            const icon = this.querySelector("i");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    </script>
</body>

</html>