<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>

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
        require_once __DIR__ . "/../components/sidebarFin.php";
        ?>
    </aside>

    <main>

        <section class="filter-bar">
            <div class="filter-group">

                <div class="filter-dropdown" data-filter="period">
                    <button class="filter-btn active" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Total</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item active" href="#" data-value="total">Total</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="week">Esta Semana</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="month">Este Mês</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="year">Ano Completo</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown" data-filter="filter-a">
                    <button class="filter-btn" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Filtro A</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item" href="#" data-value="option-1">Opção 1</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="option-2">Opção 2</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown" data-filter="filter-b">
                    <button class="filter-btn" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Filtro B</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item" href="#" data-value="option-x">Opção X</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="option-y">Opção Y</a></li>
                    </ul>
                </div>

            </div>
        </section>
        

        <div class="space">
            <section class="graph">
                <h1>Teste de Gráfico para ficar legals,kcjhkdfhjcdbjcdbkjbjdhcbjkh bhkjjdbcjfcbhljdchbljdcbcjlbccjldcbhl    </h1>
            </section>

            <section class="card-section is-grid">
                <div class="card-delta is-green">
                    <h2>Legenda</h2>
                    <h1>Informação</h1>
                </div>

                <div class="card-delta is-green">
                    <h2>Legenda</h2>
                    <h1>Informação</h1>
                </div>

                <div class="card-delta is-green">
                    <h2>Legenda</h2>
                    <h1>Informação</h1>
                </div>

                <div class="card-delta is-green">
                    <h2>Legenda</h2>
                    <h1>Informação</h1>
                </div>
            </section>
        </div>

        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
                <div class="col-auto">
                    <button class="uptable-btn">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>

                <div class="col-auto">
                    <button class="uptable-btn">
                        <i class="bi bi-arrow-clockwise"></i>
                    </button>
                </div>
            </div>


            <!-- Tabela -->
            <div class="table-container table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>EXEMPLO DE TÍTULO DE COLUNA</th>
                            <th>EXEMPLO DE TÍTULO DE COLUNA</th>
                            <th>EXEMPLO DE TÍTULO DE COLUNA</th>
                        </tr>
                    </thead>

                    <tbody class="table-content">

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                        </tr>


                    </tbody>

                </table>
            </div>
        </section>






    </main>

    <script src="src/views/scripts/vendor/bootstrap/bootstrap.bundle.js"></script>
    <script src="src/views/scripts/shared/navbars.js"></script>
    <script src="src/views/scripts/shared/sidebar.js"></script>
    <script src="src/views/scripts/shared/themes.js"></script>
    <script src="src/views/scripts/shared/pageSelect.js"></script>
    <script src="src/views/scripts/shared/filters.js"></script>


</body>

</html>