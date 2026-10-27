// Seleciona os elementos do DOM
const htmlElement = document.documentElement;
const themeToggleBtn = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');



// Função autoinvocável para carregar o tema antes que o HTML termine de renderizar
(function () {
    // 1. Busca o tema salvo no LocalStorage. Se não existir nada, o padrão será 'light'
    const temaSalvo = localStorage.getItem('theme') || 'dark';
    
    // Aplica imediatamente o atributo no HTML
    document.documentElement.setAttribute('data-theme', temaSalvo);

    // 2. Aguarda o DOM carregar para gerenciar o botão e os ícones da Navbar
    document.addEventListener("DOMContentLoaded", function () {
        const botaoTema = document.getElementById('theme-toggle');
        const iconeTema = document.getElementById('theme-icon');

        // Função interna para alternar as classes de ícone do Bootstrap Icons
        function atualizarIcone(tema) {
            if (!iconeTema) return;
            if (tema === 'dark') {
                iconeTema.className = 'bi bi-moon-stars-fill fs-1'; // Ícone de lua para modo escuro
            } else {
                iconeTema.className = 'bi bi-sun fs-1'; // Ícone de sol para modo claro
            }
        }

        // Aplica o ícone correto baseado no tema inicial recuperado
        atualizarIcone(temaSalvo);

        // 3. OUVINTE DE CLIQUE: Executa a troca de tema ao clicar no botão
        if (botaoTema) {
            botaoTema.addEventListener('click', function () {
                const temaAtual = document.documentElement.getAttribute('data-theme');
                let novoTema = 'light';

                if (temaAtual === 'light') {
                    novoTema = 'dark';
                }

                // Altera o atributo no HTML em tempo real
                document.documentElement.setAttribute('data-theme', novoTema);
                
                // SALVA NO BROWSER: Grava a nova string ('light' ou 'dark') na memória do navegador
                localStorage.setItem('theme', novoTema);
                
                // Modifica o ícone correspondente
                atualizarIcone(novoTema);
            });
        }
    });
})();