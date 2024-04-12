
// Aumenta imagem de Certificado

const options = document.querySelectorAll('.options');

options.forEach(option => {
    option.addEventListener('click', () => {
        const image = option.querySelector('img');
        // Remove a classe enlarged para garantir que a imagem não esteja aumentada antes de exibí-la em tela cheia
        image.classList.remove('enlarged');
        
        // Cria uma cópia da imagem
        const fullscreenImage = image.cloneNode(true);
        fullscreenImage.classList.add('fullscreen-image');
        
        // Adiciona a imagem em tela cheia ao corpo do documento
        document.body.appendChild(fullscreenImage);
        
        // Remove a imagem em tela cheia quando o usuário clicar nela
        fullscreenImage.addEventListener('click', () => {
            fullscreenImage.remove();
        });
    });
});
