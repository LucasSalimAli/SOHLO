<!-- #region NavBar -->
<nav class="navbar-adm">

    <!-- Logo -->
    <a class="navbar-brand" href="#">S.O.H.L.O.</a>

    <!-- Hambúrguer (só aparece em telas pequenas) -->
    <button class="nav-menu-toggle" id="nav-menu-toggle" type="button" aria-label="Abrir menu"
        aria-controls="navbar-actions" aria-expanded="false">
        <i class="bi bi-list"></i>
    </button>

    <!-- Navbar-Elements -->
    <div class="navbar-actions" id="navbar-actions">

        <p class="user-status">
            Administrador
            <i class="bi bi-unlock2-fill icon-sm"></i>
        </p>

        <button class="nav-icon-btn" type="button" title="Notificações">
            <i class="bi bi-bell icon-lg"></i>
            <span class="nav-label">Notificações</span>
        </button>

        <button class="nav-icon-btn" id="theme-toggle" type="button" title="Alternar tema">
            <i id="theme-icon" class="bi bi-sun icon-lg"></i>
            <span class="nav-label">Alternar tema</span>
        </button>

        <div class="nav-dropdown">
            <button class="nav-icon-btn nav-dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                <span class="user-name">Nome_Usuário</span>
                <i class="bi bi-person-circle icon-lg"></i>
            </button>
            <ul class="nav-dropdown-menu">
                <li><a class="nav-dropdown-item" href="#">Configurações</a></li>
                <li><a class="nav-dropdown-item" href="#">Minha Conta</a></li>
            </ul>
        </div>

    </div>
</nav>
<!-- #endregion -->