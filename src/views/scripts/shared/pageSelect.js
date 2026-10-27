
const pagesMenu = document.querySelectorAll(".menu-link");

document.addEventListener("DOMContentLoaded", function () {
    
    const urlParams = new URLSearchParams(window.location.search);
    const currentMethod = urlParams.get('method') || 'initDashboard' || 'initClients';

    const activeLink = document.querySelector(`.menu-link[href*="${currentMethod}"]`);
    

    if (activeLink) {
        activeLink.classList.add('active');
    }
});




pagesMenu.forEach(link => {
    link.addEventListener('click', function(selected){

        const selectedPage = selected.currentTarget;

        pagesMenu.forEach(page=> page.classList.remove('active'))

        selectedPage.classList.add('active');
    });
});

