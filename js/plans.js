
const selectPlanos = document.getElementById('planos');
const totalPriceElement = document.querySelector('.total-price');

selectPlanos.addEventListener('change', function() {
  const opcaoSelecionada = selectPlanos.options[selectPlanos.selectedIndex];
  
  const novoPreco = opcaoSelecionada.getAttribute('data-price');
  
  totalPriceElement.textContent = novoPreco;
});