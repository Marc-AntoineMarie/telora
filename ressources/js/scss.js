// Attendre que SASS soit chargé
window.addEventListener('load', function () {
// Compiler le SCSS
fetch('../public/scss/styles.scss')
    .then(response => response.text())
    .then(scss => {
        if (typeof Sass !== 'undefined') {
            Sass.compile(scss, function (result) {
                if (result.status === 0) {
                    const style = document.createElement('style');
                    style.textContent = result.text;
                    document.head.appendChild(style);
                } else {
                    console.error('Erreur SASS:', result.message);
                }
            });
        } else {
            console.error('SASS nest pas chargé correctement');
        }
    })
    .catch(error => console.error('Erreur de chargement du SCSS:', error));
});