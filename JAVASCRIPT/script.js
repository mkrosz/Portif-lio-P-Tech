
// Função para copiar o conteúdo da classe 'codigo' para a área de transferência
function copiarCodigo() {
  var codigoContent = document.querySelector(".codigo").innerText;

  // Copiando o conteúdo da classe 'codigo' para a área de transferência
  navigator.clipboard.writeText(codigoContent).then(
    function () {
      // Exibindo mensagem de confirmação
      document.getElementById("copiadoMensagem").style.display = "block";
      // Ocultando a mensagem após 2 segundos
      setTimeout(function () {
        document.getElementById("copiadoMensagem").style.display = "none";
      }, 2000);
    },
    function (err) {
      console.error("Falha ao copiar: ", err);
    }
  );
}

// Faz uma trransição suave ao passar para baixo através do botão "Ver mais"
// Precisa adicionar essa biblioteca no HTML para funcionar (<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>)
function scrollToElement(elementId) {
  var elementOffset = $("#" + elementId).offset().top;
  $("html, body").animate(
    {
      scrollTop: elementOffset,
    },
    1000
  );
}

// Muda a imagem em destaque com mouse hover e volta a imagem original quando o mouse hover está desligado
// Tem um timeout de 200ms para melhor transição entre as imagens
$(document).ready(function () {
  var originalImgSrc = $(".select-image img").attr("src"); // Armazena o src da imagem original

  var timeout; // Variável para armazenar o timeout

  $(".tbs").hover(
    function () {
      // Ao passar o mouse sobre a imagem
      var imgSrc = $(this).find("img").attr("src");
      clearTimeout(timeout); // Limpa o timeout existente (se houver)
      timeout = setTimeout(function () {
        $(".select-image img").attr("src", imgSrc);
      }, 200); // Executa a alteração após 200 milissegundos
    },
    function () {
      // Quando o mouse sai da imagem
      clearTimeout(timeout); // Limpa o timeout existente (se houver)
      timeout = setTimeout(function () {
        $(".select-image img").attr("src", originalImgSrc); // Restaura a imagem original após meio segundo
      }, 200); // Executa a restauração após 200 milissegundos
    }
  );
});

$(document).ready(function () {
  $(".search-icon").click(function () {
    $(".nav-menu").toggleClass("show-search-box");
  });

  $(".search-input").on("input", function () {
    var searchText = $(this).val().toLowerCase();
    // Usando expressão regular para encontrar todas as ocorrências da letra 'a'
    var regex = /a/g;
    // Aplicando a expressão regular ao texto de pesquisa
    var matches = searchText.match(regex);
    if (matches) {
      // Exibindo o número de ocorrências encontradas
      $("body").append(
        "<p>Encontrado " + matches.length + ' ocorrências de "a".</p>'
      );
    } else {
      // Caso não haja ocorrências
      $("body").append("<p>Nenhuma ocorrência encontrada.</p>");
    }
  });
});

// Carrossel de imagens
let count = 0; // Iniciando de 0 para corresponder aos índices dos elementos
const totalImages = 3; // Total de imagens no carrossel

// Chamada inicial para exibir a primeira imagem
showImage(count);

setInterval(function () {
  moveSlide(1); // Chama a função para exibir a próxima imagem a cada 2 segundos
}, 2000);

function moveSlide(direction) {
  count = (count + direction + totalImages) % totalImages; // Atualiza o índice da imagem
  showImage(count); // Exibe a imagem atualizada
}

function showImage(index) {
  const images = document.querySelectorAll(".carousel-images img"); // Seleciona todas as imagens do carrossel
  images.forEach((img) => (img.style.display = "none")); // Oculta todas as imagens
  images[index].style.display = "block"; // Exibe a imagem atual
}

// Função para mudar de aba no P-Tech
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;

  // Esconde todos os elementos com a classe "tab"
  tabcontent = document.getElementsByClassName("tab");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  // Remove a classe "active" de todos os botões de abas
  tablinks = document.getElementsByClassName("tab-button-js");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("active");
  }

  // Mostra o conteúdo da aba atual e adiciona a classe "active" ao botão da aba atual
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("active");
}

//Aumenta imagem de Certificado
/*
 // Obtém todas as divs com a classe "options"
 const options = document.querySelectorAll('.options');

 // Itera sobre cada div e adiciona um evento de clique
 options.forEach(option => {
     option.addEventListener('click', () => {
         // Obtém a imagem dentro da div clicada
         const image = option.querySelector('img');
         // Adiciona uma classe para aumentar o tamanho da imagem
         image.classList.toggle('enlarged');
     });
 });*/