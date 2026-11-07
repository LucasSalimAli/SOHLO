document.addEventListener("click", (e) => {
  const abrir = e.target.closest("[data-open]");
  if (abrir) {
    const alvo = document.getElementById(abrir.dataset.open);
    if (!alvo) return;

    abrir.closest("dialog")?.close();
    alvo.showModal();
    return;
  }

  if (e.target.closest("#exit")) {
    e.target.closest("dialog").close();
  }
});
