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

        <!-- <section class="filter-bar">
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
        </section> -->

        <h1>
            Perfís
        </h1>

        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
                <?php
                if (AutenticacaoController::autenticarPermissoes("Cadastrar-Perfis")){
                    echo "
                <div class='col-auto'>
                    <button class='uptable-btn' data-open='md-cad-profiles'>
                        <i class='bi bi-plus-square'></i>
                    </button>
                </div>";};

                ?>

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

                        <?php
                        foreach ($perfis as $perfil) {
                            $id = (int) $perfil->getIdPerfil();
                            $nome = htmlspecialchars((string) $perfil->getNome(), ENT_QUOTES);
                            $descricao = htmlspecialchars((string) $perfil->getDescricao(), ENT_QUOTES);

                            $idsPermissoesPerfil = implode(',', array_map(
                                fn($p) => (int) $p['id_permissao'],
                                $perfil->getPermissoes()
                            ));

                            $nomesPermissoesPerfil = htmlspecialchars(implode(', ', array_map(
                                fn($p) => $p['nome'],
                                $perfil->getPermissoes()
                            )), ENT_QUOTES);

                            echo
                                "
                                <tr class='status is-green'
                                    data-id='{$id}'
                                    data-name='{$nome}'
                                    data-description='{$descricao}'
                                    data-permissions='{$idsPermissoesPerfil}'
                                    data-permission-names='{$nomesPermissoesPerfil}'>

                                    <td>{$nome}</td>
                                    <td><button class='btn' data-show='md-description'>Mostrar Descrição</button></td>
                                    <td><button class='btn' data-show='md-permission'>Mostrar Permissões</button></td>
                                    <td><span class='action'>
                                ";
                            if ($id !== 1) {
                                if (AutenticacaoController::autenticarPermissoes("Editar-Perfis")){
                                                echo "
                                        <button class='action btn' data-edit='md-edit-profile'>
                                            <i class='bi bi-pencil-square'></i>
                                        </button>";};
                                if (AutenticacaoController::autenticarPermissoes("Deletar-Perfis")){
                                                echo " 
                                        <button class='action btn trash' data-show='md-delete'>
                                            <i class='bi bi-archive'></i>
                                        </button>";};
                            };
                            echo "</span>
                                </td>
                                </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </section>


        <dialog class="modal-adm modal-view" id="md-cad-profiles">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Planos</h1>
            </div>


            <form action="index.php?controller=PerfilController&method=inserirPerfil" method="post">


                <fieldset>
                    <label for="name">Digite o Nome do Perfil</label>
                    <input type="text" name="name">
                    <label for="name">Digite a Descrição do Perfil</label>
                    <textarea name="description" id=""></textarea>
                    <label for="permissions">Selecione as Permissões</label>
                    <?php foreach ($permissoes as $permissao) { ?>

                        <label>
                            <input type="checkbox" name="permissoes[]" value="<?= $permissao->id_permissao ?>">
                            <?= htmlspecialchars($permissao->nome) ?>
                        </label>
                    <?php } ?>
                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Cadastrar">
                    </div>

                </fieldset>
            </form>
        </dialog>


        <dialog class="modal-adm modal-view" id="md-edit-profile">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Edição de Planos</h1>
            </div>


            <form action="index.php?controller=PerfilController&method=editarPerfil" method="post">


                <fieldset>
                    <input type="hidden" name="id" id="edit-id">

                    <label for="edit-name">Digite o Nome do Perfil</label>
                    <input type="text" name="name" id="edit-name">

                    <label for="edit-description">Digite a Descrição do Perfil</label>
                    <textarea name="description" id="edit-description"></textarea>

                    <label>Selecione as Permissões</label>

                    <?php foreach ($permissoes as $permissao) { ?>
                        <label>
                            <input type="checkbox" name="permissoes[]" value="<?= $permissao->id_permissao ?>">
                            <?= htmlspecialchars($permissao->nome) ?>
                        </label>
                    <?php } ?>

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Salvar Alterações">
                    </div>
                </fieldset>
            </form>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-description">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Descrição</h1>
            </div>
            <br><br>
            <p data-field="description"></p>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-permission">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Permissoes</h1>
            </div>
            <br><br>
            <ul id="lista-permissoes"></ul>
        </dialog>


        <dialog class="modal-adm modal-view" id="md-delete">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Excluir Perfil</h1>
            </div>

            <form action="index.php?controller=PerfilController&method=excluirPerfil" method="post">
                <fieldset>
                    <input type="hidden" name="id">

                    <p>Tem Certeza que Quer Excluir esse Perfil?</p>
                    <br>
                    <br>
                    <br>
                    <div class="form-actions">
                        <input type="reset" onclick="this.closest('dialog').close()" value="Não">
                        <input type="submit" value="Sim">
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