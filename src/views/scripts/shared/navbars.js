(function () {
  const dropdowns = document.querySelectorAll(".nav-dropdown");
  const menuToggle = document.getElementById("nav-menu-toggle");
  const menu = document.getElementById("navbar-actions");
  const menuIcon = menuToggle.querySelector("i");

  /* ===== Dropdown do usuário ===== */
  function closeAll() {
    dropdowns.forEach((dropdown) => {
      dropdown.classList.remove("open");
      dropdown
        .querySelector(".nav-dropdown-toggle")
        .setAttribute("aria-expanded", "false");
    });
  }

  dropdowns.forEach((dropdown) => {
    const toggle = dropdown.querySelector(".nav-dropdown-toggle");

    toggle.addEventListener("click", () => {
      const willOpen = !dropdown.classList.contains("open");
      closeAll();
      if (willOpen) {
        dropdown.classList.add("open");
        toggle.setAttribute("aria-expanded", "true");
      }
    });
  });

  /* ===== Menu hambúrguer ===== */
  function setMenu(open) {
    menu.classList.toggle("open", open);
    menuToggle.setAttribute("aria-expanded", String(open));
    menuToggle.setAttribute("aria-label", open ? "Fechar menu" : "Abrir menu");
    menuIcon.classList.toggle("bi-list", !open);
    menuIcon.classList.toggle("bi-x-lg", open);
    if (!open) closeAll();
  }

  menuToggle.addEventListener("click", () => {
    setMenu(!menu.classList.contains("open"));
  });

  // Ao voltar para tela grande, garante que o painel não fique "aberto"
  window
    .matchMedia("(min-width: 901px)")
    .addEventListener("change", (e) => {
      if (e.matches) setMenu(false);
    });

  /* ===== Fechar clicando fora / Esc ===== */
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".nav-dropdown")) closeAll();
    if (!e.target.closest(".navbar-adm")) setMenu(false);
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setMenu(false);
  });
})();


(function () {
  const brandsNavbar = document.getElementById("navbar-brands");
  if (!brandsNavbar) return; // página sem a navbar da área Brand

  const brandsToggle = document.getElementById("brands-menu-toggle");
  const brandsCollapse = document.getElementById("brands-collapse");
  const brandsIcon = brandsToggle.querySelector("i");
  const desktopQuery = window.matchMedia("(min-width: 1025px)");

  function setBrandsMenu(open) {
    brandsNavbar.classList.toggle("open", open);
    brandsToggle.setAttribute("aria-expanded", String(open));
    brandsToggle.setAttribute("aria-label", open ? "Fechar menu" : "Abrir menu");
    brandsIcon.classList.toggle("bi-list", !open);
    brandsIcon.classList.toggle("bi-x-lg", open);
  }

  brandsToggle.addEventListener("click", () => {
    setBrandsMenu(!brandsNavbar.classList.contains("open"));
  });

  // Clicou num link (âncora ou botão): fecha o painel
  brandsCollapse.addEventListener("click", (event) => {
    if (event.target.closest("a")) setBrandsMenu(false);
  });

  // Clicar fora fecha
  document.addEventListener("click", (event) => {
    if (!event.target.closest("#navbar-brands")) setBrandsMenu(false);
  });

  // Esc fecha e devolve o foco ao botão
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && brandsNavbar.classList.contains("open")) {
      setBrandsMenu(false);
      brandsToggle.focus();
    }
  });

  // Voltou para tela grande com o painel aberto: fecha
  desktopQuery.addEventListener("change", (event) => {
    if (event.matches) setBrandsMenu(false);
  });
})();