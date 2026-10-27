<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboards</title>

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
        <?php
        require_once __DIR__ . "/../components/sidebarLog.php";
        ?>
    </aside>

    <main>
        <h1>Contratos</h1>
    </main>
    

    <script src="src/views/scripts/vendor/bootstrap/bootstrap.bundle.js"></script>
    <script src="src/views/scripts/shared/navbars.js"></script>
    <script src="src/views/scripts/shared/sidebar.js"></script>
    <script src="src/views/scripts/shared/themes.js"></script>
    <script src="src/views/scripts/shared/pageSelect.js"></script>
</body>

</html>