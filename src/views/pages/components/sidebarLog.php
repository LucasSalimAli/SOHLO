<!-- Pages-Links -->
<div class="sidebar-body">
    <!-- Stripe-Menu -->

    <div class="sidebar-nav">
        <!-- #region System-Modes -->
        <div class="nav-btn">

            <button class="active" id="toggle-sidebar-btn" onclick="toggleSidebar()" title="Retrair Sidebar">
                <i class="bi bi-caret-left-square" id="sidebar-extend-icon"></i>
            </button>

            <a href="index.php?controller=pagesController&method=initCustomers">
                <button class="active" id="logistic-btn" title="Sistema Logístico">
                    <i class="bi bi-globe"></i>
                </button>
            </a>


            <a href="index.php?controller=pagesController&method=initDashboard">

                <button class="" id="financial-btn" title="Sistema Financeiro">
                    <i class="bi bi-graph-up-arrow"></i>
                </button>
            </a>


            <a href="index.php?controller=pagesController&method=initHistory">
                <button class="" id="history-btn" onclick="historyLog()" title="Histórico">
                    <i class="bi bi-stopwatch"></i>
                </button>
            </a>
        </div>
        <!-- #endregion -->

        <!-- #region LogOut-Button -->
        <a href="landpage.html" class="logout-btn">
            <i class="bi bi-box-arrow-left"></i>
            <span>Log<br>Out</span>
        </a>
        <!-- #endregion -->
    </div>

    <div class="sidebar-submenu-panel">

        <!-- System-Indicator -->
        <h4 class="module-title">Sistema<br>Logistico</h4>

        <!-- Search-Box -->
        <div class="sidebar-search-box">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Pesquisar">
        </div>

        <hr class="sidebar-divider">

        <!-- #region Pages-Links -->
        <nav class="submenu-links">
            <a href="index.php?controller=pagesController&method=initCustomers" class="menu-link" id="log-client-pg"
                onclick="pageSelect()">Clientes</a>
            <a href="index.php?controller=pagesController&method=initEmployees" class="menu-link" id="fin-income-pg"
                onclick="pageSelect()">Funcionarios</a>
            <a href="index.php?controller=pagesController&method=initContracts" class="menu-link" id="fin-bill-pg onclick="
                pageSelect()">Contratos</a>
            <a href="index.php?controller=pagesController&method=initSchedule" class="menu-link" id="fin-flow-pg onclick="
                pageSelect()">Agenda</a>
            <a href="index.php?controller=pagesController&method=initRoutes" class="menu-link" id="fin-fines-pg onclick="
                pageSelect()">Rotas</a>
            <a href="index.php?controller=pagesController&method=initDashboards" class="menu-link" id="fin-price-adjust-pg"
                onclick="pageSelect()">Dashboards</a>
            <a href="index.php?controller=pagesController&method=initDiary" class="menu-link" id="fin-diary-pg onclick="
                pageSelect()">Relatório Diário</a>
        </nav>
        <!-- #endregion -->
    </div>
</div>