        document.addEventListener('DOMContentLoaded', function() {
    // Récupérer les éléments
    const modal = document.getElementById('myModal');
    const openModalLink = document.getElementById('openModal');
    const closeBtn = document.querySelector('.close-btn');

    // Empêcher le comportement par défaut du lien
    openModalLink.addEventListener('click', (e) => {
        e.preventDefault(); // Empêche le lien de naviguer
        modal.style.display = 'flex';
    });

    // Fermer la modal
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fermer la modal si on clique en dehors
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});