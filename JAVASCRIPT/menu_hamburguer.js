//hamburguer

document.addEventListener('DOMContentLoaded', function() {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const sidebar = document.querySelector('.sidebar');
    const closeBtn = document.querySelector('.close-btn');
  
    // Abrir e fechar o menu
    hamburgerMenu.addEventListener('click', function() {
        toggleMenu();
    });
  
    closeBtn.addEventListener('click', function() {
        toggleMenu();
    });
  
    // Fechar o menu ao clicar fora dele
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !hamburgerMenu.contains(event.target)) {
            if (sidebar.classList.contains('open')) {
                toggleMenu();
            }
        }
    });
  
    function toggleMenu() {
        hamburgerMenu.classList.toggle('open');
        sidebar.classList.toggle('open');
    }
  });
  