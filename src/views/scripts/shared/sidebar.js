let isExtended = true;

const activePages = document.querySelectorAll(".menu-link");

const logisticBtn = document.getElementById("logistic-btn");
const financialBtn = document.getElementById("financial-btn");
const historyBtn = document.getElementById("history-btn");
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector("main");

const recallBtn = document.getElementById("toggle-sidebar-btn");
const recallIcon = document.getElementById("sidebar-extend-icon");


function sidebarExtends() {
  sidebar.classList.remove("small");
  content.classList.remove("full-main");
  recallBtn.classList.add("active");
  recallIcon.classList.replace("bi-caret-right-square", "bi-caret-left-square");
  
  isExtended = true;
}

function sidebarRetracts() {
  sidebar.classList.add("small");
  content.classList.add("full-main");
  recallBtn.classList.remove("active");
  recallBtn.title.replace("Expandir Sidebar");
  recallIcon.classList.replace("bi-caret-left-square", "bi-caret-right-square");
  recallBtn.title = "Expandir Sidebar";
  isExtended = false;
}




function toggleSidebar() {
  if (isExtended === true) {
    sidebarRetracts();
  } else if (isExtended === false) {
    sidebarExtends();
  }
  console.log(isExtended);
}

function historyLog() {
  sidebarRetracts();
  logisticBtn.classList.remove("active");
  financialBtn.classList.remove("active");
  historyBtn.classList.add("active");
}

