<?php
include '../database/db.php';
// Inclusion unique pour éviter la redéclaration de la classe
require_once '../database/partner_request.php';
?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Ajouter un Partenaire</h2>
        <form action="V1_admin.php" method="POST">
            <input type="hidden" name="action" value="1">
            <!-- Nom -->
            <div class="input-group">
                <label class="input-group__label" for="nom">Nom <span class="text-danger">*</span></label>
                <input type="text" id="nom" name="Nom" class="input-group__input" required>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label class="input-group__label" for="email">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="Email" class="input-group__input" required>
            </div>

            <!-- Téléphone -->
            <div class="input-group">
                <label class="input-group__label" for="telephone">Téléphone <span class="text-danger">*</span></label>
                <input type="tel" id="telephone" name="Telephone" class="input-group__input" required>
            </div>

            <!-- Adresse -->
            <div class="input-group">
                <label class="input-group__label" for="adresse">Adresse</label>
                <textarea id="adresse" name="Adresse" class="input-group__input" rows="2"></textarea>
            </div>

            <!-- Bouton de soumission -->
            <div class="text-center mt-3">
                <button type="submit" name="add_partner" class="btn">Ajouter</button>
            </div>
            </input>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>