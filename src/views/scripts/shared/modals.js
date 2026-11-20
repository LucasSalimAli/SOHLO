document.addEventListener("click", (e) => {
  // Botões que só abrem outro modal
  const abrir = e.target.closest("[data-open]");
  if (abrir) {
    const alvo = document.getElementById(abrir.dataset.open);
    if (!alvo) return;

    abrir.closest("dialog")?.close();
    alvo.showModal();
    return;
  }

  // Botões que preenchem um formulário antes de abrir
  const editar = e.target.closest("[data-edit]");

  if (editar) {
    const alvo = document.getElementById(editar.dataset.edit);
    if (!alvo) return;

    const form = alvo.querySelector("form");
    const linha = editar.closest("tr");

    form.reset();

    for (const [campo, valor] of Object.entries(linha.dataset)) {
      // Tratamento especial para as permissões
      if (campo === "permissions") {
        const permissoes = valor.split(",").filter(Boolean);

        form
          .querySelectorAll('input[name="permissoes[]"]')
          .forEach((checkbox) => {
            checkbox.checked = permissoes.includes(checkbox.value);
          });

        continue;
      }

      // Preenchimento dos campos comuns
      if (form.elements[campo]) {
        form.elements[campo].value = valor;
      }
    }

    editar.closest("dialog")?.close();
    alvo.showModal();
    return;
  }

  // Botões que mostram permissões
  const mostrarPermissoes = e.target.closest('[data-show="md-permission"]');

  if (mostrarPermissoes) {
    const alvo = document.getElementById("md-permission");
    const linha = mostrarPermissoes.closest("tr");
    const lista = alvo.querySelector("#lista-permissoes");

    lista.innerHTML = "";

    const permissoes = linha.dataset.permissionNames.split(",").filter(Boolean);

    permissoes.forEach((nome) => {
      const item = document.createElement("li");
      item.textContent = nome.trim();
      lista.appendChild(item);
    });

    alvo.showModal();
    return;
  }

  // Botões que mostram dados em texto (ex.: descrição)
  // Botões que mostram dados no modal (textos e, se tiver, inputs do form)
  const mostrar = e.target.closest("[data-show]");
  if (mostrar) {
    const alvo = document.getElementById(mostrar.dataset.show);
    if (!alvo) return;

    const form = alvo.querySelector("form");

    for (const [campo, valor] of Object.entries(
      mostrar.closest("tr").dataset,
    )) {
      alvo.querySelectorAll(`[data-field="${campo}"]`).forEach((el) => {
        if (el.tagName === "IMG") {
          el.src = `src/uploads/images/users/${valor}`;
        } else {
          el.textContent = valor;
        }
      });

      if (form?.elements[campo]) {
        form.elements[campo].value = valor;
      }
    }

    mostrar.closest("dialog")?.close();
    alvo.showModal();
    return;
  }

  if (e.target.closest("#exit")) {
    e.target.closest("dialog").close();
  }
});

function editSelfData() {
  const modals = document.getElementById("md-self-edit");
  modals.showModal();
}

function changePassword() {
  const modals = document.getElementById("md-change-password");
  modals.showModal();
}
