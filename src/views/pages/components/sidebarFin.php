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
                <button class="" id="logistic-btn" title="Sistema Logístico">
                    <i class="bi bi-globe"></i>
                </button>
            </a>


            <a href="index.php?controller=pagesController&method=initDashboard">

                <button class="active" id="financial-btn" title="Sistema Financeiro">
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
        <h4 class="module-title">Sistema<br>Financeiro</h4>

        <!-- Search-Box -->
        <div class="sidebar-search-box">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Pesquisar">
        </div>

        <hr class="sidebar-divider">

        <!-- #region Pages-Links -->
        <nav class="submenu-links">
            <a href="index.php?controller=pagesController&method=initDashboard" class="menu-link" id="fin-dashboard-pg"
                onclick="pageSelect()">Dashboards</a>
            <a href="index.php?controller=pagesController&method=initIncome" class="menu-link" id="fin-income-pg"
                onclick="pageSelect()">Receita</a>
            <a href="index.php?controller=pagesController&method=initBill" class="menu-link" id="fin-bill-pg"
                onclick=pageSelect()">Contas à Pagar</a>
            <a href="index.php?controller=pagesController&method=initFlow" class="menu-link" id="fin-flow-pg"
                onclick=pageSelect()">Fluxo de Caixa</a>
            <a href="index.php?controller=pagesController&method=initFine" class="menu-link" id="fin-fines-pg"
                onclick=pageSelect()">Multas</a>
            <a href="index.php?controller=pagesController&method=initPrice" class="menu-link" id="fin-price-adjust-pg"
                onclick="pageSelect()">Ajuste de Preço</a>
            <a href="index.php?controller=pagesController&method=initDiary" class="menu-link" id="fin-diary-pg onclick="
                pageSelect()">Relatório Diário</a>
        </nav>
        <!-- #endregion -->
    </div>
</div>