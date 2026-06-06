document.addEventListener('DOMContentLoaded', () => {
    const campoSenha = document.getElementById('password');
    const campoConfirmar = document.getElementById('password_confirm');

    const reqComprimento = document.getElementById('req-comprimento');
    const reqMaiuscula = document.getElementById('req-maiuscula');
    const reqNumero = document.getElementById('req-numero');
    const reqCombina = document.getElementById('req-combina');

    if (!campoSenha || !campoConfirmar) return;

    // Escuta a digitação no campo da senha principal
    campoSenha.addEventListener('input', () => {
        const valor = campoSenha.value;

        validarRequisito(reqComprimento, valor.length >= 8);
        validarRequisito(reqMaiuscula, /[A-Z]/.test(valor));
        validarRequisito(reqNumero, /[0-9]/.test(valor));

        checarSenhasIguais();
    });

   
    campoConfirmar.addEventListener('input', () => {
        checarSenhasIguais();
    });

    function checarSenhasIguais() {
        const senha1 = campoSenha.value;
        const senha2 = campoConfirmar.value;

        // Verifica se são iguais E se o campo de confirmação não está vazio
        const saoIguais = senha1 === senha2 && senha2 !== "";

        validarRequisito(reqCombina, saoIguais);
    }

    function validarRequisito(elemento, statusValido) {
        if (!elemento) return;
        const icone = elemento.querySelector('i');

        if (statusValido) {
            elemento.classList.remove('invalido');
            elemento.classList.add('valido');
            if (icone) icone.className = 'bi bi-check-circle-fill';
        } else {
            elemento.classList.remove('valido');
            elemento.classList.add('invalido');
            if (icone) icone.className = 'bi bi-x-circle-fill';
        }
    }
});