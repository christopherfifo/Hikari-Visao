
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.querySelector('.header__nav');
    const button = document.querySelector('.header__icon-btn');
    const navLinks = document.querySelectorAll('.nav__a');
  
    button.addEventListener('click', () => {
      nav.classList.toggle('active');
    });
  
    nav.addEventListener('click', (event) => {
      if (event.target === nav) {
        nav.classList.remove('active');
      }
    });
  
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        nav.classList.remove('active');
      });
    });
  });
  
// Seleciona os botões e as imagens
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');
const images = document.querySelectorAll('.slider');

// Variável para rastrear o índice atual da imagem
let currentIndex = 0;

// Adiciona eventos de clique nos botões
prevBtn.addEventListener('click', showPrevImage);
nextBtn.addEventListener('click', showNextImage);

function updateImageVisibility() {
    images.forEach((img, index) => {
        // Exibe apenas a imagem atual
        img.style.display = index === currentIndex ? 'block' : 'none';
    });
}

// Mostra a imagem anterior
function showPrevImage() {
    currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
    updateImageVisibility();
}

// Mostra a próxima imagem
function showNextImage() {
    currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
    updateImageVisibility();
}

// Inicializa mostrando a primeira imagem
updateImageVisibility();




