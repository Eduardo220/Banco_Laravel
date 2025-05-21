const input = document.querySelector('#senha');
const img = document.querySelector('.senha-imagem');

function trocarImagem() {
  if (input.type === 'password') {
    input.type = 'text';
    img.src = '/img/visibilidade.svg';
  } else {
    input.type = 'password';
    img.src = '/img/visibilidade-off.svg';
  }
}

img.addEventListener('click', trocarImagem);