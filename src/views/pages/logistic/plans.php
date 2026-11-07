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

        <h1>Planos</h1>



        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
                <div class="col-auto">
                    <button class="uptable-btn" data-open="md-cad-plans">
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
                            <th>PREÇOS</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>

                    <tbody class="table-content">

                        <tr class="status is-green">
                            <td>Operário de Máquinad</td>
                            <td><button class="btn">Mostrar Descrição</button></td>
                            <td>1212</td>
                            <td><span class="action">
                                    <button class="action btn" data-open="md-edit-plans"><i
                                            class="bi bi-pencil-square"></i></i></button>
                                    <button class="action btn trash"><i class="bi bi-archive"></i></button>
                                </span>
                            </td>
                        </tr>


                    </tbody>

                </table>
            </div>
        </section>


        <dialog class="modal-adm modal-view" id="md-cad-plans">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Planos</h1>
            </div>


            <form action="" method="post">


                <fieldset>
                    <label for="name">Digite o Nome do Plano</label>
                    <input type="text" name="name">
                    <label for="name">Digite a Descrição do Plano</label>
                    <textarea name="descriprion" id=""></textarea>
                    <label for="document">Digite o Valor do Plano</label>
                    <input type="text" name="price">

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Cadastrar">
                    </div>

                </fieldset>
            </form>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-edit-plans">

            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Edição de Plano</h1>
            </div>


            <form action="" method="post">
                <fieldset>
                    <label for="name">Digite o Nome do Plano</label>
                    <input type="text" name="name">
                    <label for="name">Digite a Descrição do Plano</label>
                    <textarea name="descriprion" id=""></textarea>
                    <label for="document">Digite o Valor do Plano</label>
                    <input type="text" name="price">

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