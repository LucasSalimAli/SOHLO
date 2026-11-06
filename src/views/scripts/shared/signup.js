(function () {
  const signupForm = document.getElementById("signup-form");
  if (!signupForm) return; // página sem o formulário de cadastro

  const steps = [...signupForm.querySelectorAll(":scope > fieldset")];
  const progressItems = [...document.querySelectorAll(".signup-progress li")];
  const backButton = document.getElementById("signup-back-btn");
  const nextButton = document.getElementById("signup-next-btn");
  const submitButton = document.getElementById("signup-submit-btn");

  // O que aparece para cada tipo de cliente
  const customerGroups = {
    individual: [
      document.getElementById("individual-fields"),
      document.getElementById("individual-plan"),
    ],
    company: [
      document.getElementById("company-fields"),
      document.getElementById("company-summary"),
    ],
  };

  let currentStep = 0;

  /* ===== Etapas ===== */
  function showStep(index) {
    currentStep = index;

    steps.forEach((step, i) => {
      step.hidden = i !== index;
    });

    progressItems.forEach((item, i) => {
      item.classList.toggle("active", i === index);
      item.classList.toggle("done", i < index);
      if (i === index) {
        item.setAttribute("aria-current", "step");
      } else {
        item.removeAttribute("aria-current");
      }
    });

    backButton.hidden = index === 0;
    nextButton.hidden = index === steps.length - 1;
    submitButton.hidden = index !== steps.length - 1;
  }

  function focusFirstField() {
    const field = steps[currentStep].querySelector(
      "input:not(:disabled), select:not(:disabled), textarea:not(:disabled)"
    );
    if (field) field.focus();
  }

  function goNext() {
    showStep(currentStep + 1);
    focusFirstField();
  }

  function goBack() {
    showStep(currentStep - 1);
    focusFirstField();
  }

  /* ===== PF ou PJ ===== */
  function toggleGroup(group, visible) {
    group.hidden = !visible;
    group.disabled = !visible; // desativado: não é enviado ao PHP
  }

  function updateCustomerType() {
    const selected = signupForm.querySelector(
      'input[name="customer_type"]:checked'
    );
    const isCompany = Boolean(selected) && selected.value === "company";

    customerGroups.individual.forEach((group) => toggleGroup(group, !isCompany));
    customerGroups.company.forEach((group) => toggleGroup(group, isCompany));

    // Textos que mudam conforme o tipo (título da etapa 3 e rótulo do progresso)
    document
      .querySelectorAll("[data-individual][data-company]")
      .forEach((element) => {
        element.textContent = isCompany
          ? element.dataset.company
          : element.dataset.individual;
      });
  }

  /* ===== Eventos ===== */
  nextButton.addEventListener("click", goNext);
  backButton.addEventListener("click", goBack);

  signupForm
    .querySelectorAll('input[name="customer_type"]')
    .forEach((radio) => radio.addEventListener("change", updateCustomerType));

  // Enter numa etapa que não é a última funciona como "Próximo"
  signupForm.addEventListener("submit", (event) => {
    if (currentStep < steps.length - 1) {
      event.preventDefault();
      goNext();
    }
  });

  /* ===== Início ===== */
  // O PHP pode reabrir o formulário numa etapa (ex.: data-start-step="2" depois de um erro)
  const startStep = Number(signupForm.dataset.startStep) || 1;

  updateCustomerType();
  showStep(Math.min(Math.max(startStep, 1), steps.length) - 1);
})();