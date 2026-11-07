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

        <section class="filter-bar">
            <div class="filter-group">

                <div class="filter-dropdown" data-filter="client-status">
                    <button class="filter-btn active" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Clientes Ativos</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item active" href="#" data-value="actives">Clientes Ativos</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="unactives">Clientes Inativos</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown" data-filter="order">
                    <button class="filter-btn active" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Recente Primeiro</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item active" href="#" data-value="recent-first">Recentes Primeiro</a>
                        </li>
                        <li><a class="filter-menu-item" href="#" data-value="recent-last">Recentes Por Último</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="alphabetical-first">Ordem Alfabética
                                Crescente</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="alphabetical-last">Ordem Alfabética
                                Decrescente</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown" data-filter="client-type">
                    <button class="filter-btn" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Filtro B</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item" href="#" data-value="pf">Pessoa Física</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="pj">Pessoa Jurídica</a></li>
                    </ul>
                </div>

            </div>
        </section>

        <h1>
            Perfís
        </h1>

        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
                <div class="col-auto">
                    <button class="uptable-btn" data-open="md-cad-profiles">
                        <i class="bi bi-plus-square"></i>
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
                            <th>NOME</th>
                            <th>DESCRIÇÃO</th>
                            <th>PERMISSÕES</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>

                    <tbody class="table-content">

                        <tr class="status is-green">
                            <td>Operário de Máquinad</td>
                            <td><button class="btn">Mostrar Descrição</button></td>
                            <td><button class="btn">Mostrar Permissões</button></td>
                            <td><span class="action">
                                    <button class="action btn" data-open="md-edit-profiles"><i
                                            class="bi bi-pencil-square"></i></i></button>
                                    <button class="action btn trash"><i class="bi bi-archive"></i></button>
                                </span>
                            </td>
                        </tr>


                    </tbody>

                </table>
            </div>
        </section>


        <dialog class="modal-adm modal-view" id="md-cad-profiles">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Planos</h1>
            </div>


            <form action="" method="post">


                <fieldset>
                    <label for="name">Digite o Nome do Perfil</label>
                    <input type="text" name="name">
                    <label for="name">Digite a Descrição do Perfil</label>
                    <textarea name="descriprion" id=""></textarea>
                    <label for="document">Selecione as Permissões</label>
                    <option value=""></option>

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Cadastrar">
                    </div>

                </fieldset>
            </form>
        </dialog>


        <dialog class="modal-adm modal-view" id="md-edit-profiles">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Edição de Planos</h1>
            </div>


            <form action="" method="post">


                <fieldset>
                    <label for="name">Digite o Nome do Perfil</label>
                    <input type="text" name="name">
                    <label for="name">Digite a Descrição do Perfil</label>
                    <textarea name="descriprion" id=""></textarea>
                    <label for="document">Selecione as Permissões</label>
                    <option value=""></option>

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Cadastrar">
                    </div>

                </fieldset>
            </form>
        </dialog>

    </main>


    <script src="src/views/scripts/shared/navbars.js"></script>
    <script src="src/views/scripts/shared/sidebar.js"></script>
    <script src="src/views/scripts/shared/themes.js"></script>
    <script src="src/views/scripts/shared/pageSelect.js"></script>
    <script src="src/views/scripts/shared/filters.js"></script>
    <script src="src/views/scripts/shared/modals.js"></script>
</body>

</html>