<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>

    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="src/views/styles/global.css">
</head>

<body>

    <header>
        <?php
        require_once __DIR__ . "/../components/admNavbar.php";
        ?>
    </header>

    <!-- Sidebar -->

    <aside class="sidebar">
        <div class="sidebar-body">


            <!-- Stripe-Menu -->
            <div class="sidebar-nav">
                <!-- #region System-Modes -->
                <div class="nav-btn">
                    <button class="active" id="toggle-sidebar-btn" onclick="#" title="Expandir Sidebar">
                        <i class="bi bi-caret-left-square" id="sidebar-extend-icon"></i>
                    </button>

                    <a href="index.php?controller=pagesController&method=initCustomers">
                        <button class="" id="logistic-btn" title="Sistema Logístico">
                            <i class="bi bi-globe"></i>
                        </button>
                    </a>

                    <a href="index.php?controller=pagesController&method=initDashboard">
                        <button class="" id="financial-btn" title="Sistema Financeiro">
                            <i class="bi bi-graph-up-arrow"></i>
                        </button>
                    </a>

                    <button class="active" id="history-btn" onclick="historyLog()" title="Histórico">
                        <i class="bi bi-stopwatch"></i>
                    </button>
                </div>
                <!-- #endregion -->

                <!-- #region LogOut-Button -->
                <a href="landpage.html" class="logout-btn">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log<br>Out</span>
                </a>
                <!-- #endregion -->
            </div>
        </div>

    </aside>

    <main class="full-main">
        <h1>Histórico</h1>
    </main>


    <script src="src/views/scripts/vendor/bootstrap/bootstrap.bundle.js"></script>
    <script src="src/views/scripts/shared/navbars.js"></script>
    <script src="src/views/scripts/shared/sidebar.js"></script>
    <script src="src/views/scripts/shared/themes.js"></script>
    <script src="src/views/scripts/shared/pageSelect.js"></script>
    <script>
        historyLog();
    </script>
</body>

</html>