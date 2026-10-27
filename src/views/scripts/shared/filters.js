(function () {
  const filterDropdowns = document.querySelectorAll(".filter-dropdown");

  function closeFilter(dropdown) {
    dropdown.classList.remove("open");
    dropdown
      .querySelector(".filter-btn")
      .setAttribute("aria-expanded", "false");
  }

  function closeAllFilters(except = null) {
    filterDropdowns.forEach((dropdown) => {
      if (dropdown !== except) closeFilter(dropdown);
    });
  }

  function openFilter(dropdown) {
    closeAllFilters(dropdown);
    dropdown.classList.add("open");
    dropdown.querySelector(".filter-btn").setAttribute("aria-expanded", "true");
  }

  function selectFilterOption(dropdown, item) {
    const toggle = dropdown.querySelector(".filter-btn");

    dropdown.querySelectorAll(".filter-menu-item").forEach((option) => {
      option.classList.remove("active");
      option.removeAttribute("aria-current");
    });

    item.classList.add("active");
    item.setAttribute("aria-current", "true");

    toggle.querySelector(".filter-label").textContent = item.textContent.trim();
    toggle.classList.add("active");

    
    document.dispatchEvent(
      new CustomEvent("filterchange", {
        detail: {
          filter: dropdown.dataset.filter,
          value: item.dataset.value,
          label: item.textContent.trim(),
        },
      }),
    );
  }

  filterDropdowns.forEach((dropdown) => {
    const toggle = dropdown.querySelector(".filter-btn");

    toggle.addEventListener("click", () => {
      if (dropdown.classList.contains("open")) {
        closeFilter(dropdown);
      } else {
        openFilter(dropdown);
      }
    });

    dropdown.querySelectorAll(".filter-menu-item").forEach((item) => {
      item.addEventListener("click", (event) => {
        event.preventDefault(); 
        selectFilterOption(dropdown, item);
        closeFilter(dropdown);
        toggle.focus();
      });
    });

    
    dropdown.addEventListener("keydown", (event) => {
      if (event.key !== "ArrowDown" && event.key !== "ArrowUp") return;
      event.preventDefault();

      openFilter(dropdown);
      const items = [...dropdown.querySelectorAll(".filter-menu-item")];
      const current = items.indexOf(document.activeElement);
      const step = event.key === "ArrowDown" ? 1 : -1;
      const next =
        current === -1
          ? step === 1
            ? 0
            : items.length - 1
          : (current + step + items.length) % items.length;

      items[next].focus();
    });
  });

  
  document.addEventListener("click", (event) => {
    if (!event.target.closest(".filter-dropdown")) closeAllFilters();
  });

 
  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") return;
    const openDropdown = document.querySelector(".filter-dropdown.open");
    if (!openDropdown) return;
    closeFilter(openDropdown);
    openDropdown.querySelector(".filter-btn").focus();
  });
})();
