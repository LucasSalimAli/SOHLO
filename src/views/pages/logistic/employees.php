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





        <section class="card-section">
            <div class="card-epsilon is-green">
                <h2>Total de Clientes Ativos</h2>
                <h3>-------</h3>
                <h1>Informação</h1>
            </div>
        </section>


        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
                <div class="col-auto">
                    <button class="uptable-btn" data-open="md-cad-employee">
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
                            <th>EXEMPLO DE TÍTULO DE COLUNA</th>
                            <th>EXEMPLO DE TÍTULO DE COLUNA</th>
                            <th>EXEMPLO DE TÍTULO DE COLUNA</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>

                    <tbody class="table-content">

                        <tr class="status is-green">
                            <td>Exemplo de Informação Normal</td>
                            <td><span class="btn">Exemplo de Botão Interno</span></td>
                            <td><span class="status-badge">Exemplo de Badge</span></td>
                            <td><span class="action">
                                    <button class="action btn" data-open="md-view-employee"><i
                                            class="bi bi-three-dots"></i></i></button>
                                    <button class="action btn" data-open="md-edit-employee"><i
                                            class="bi bi-pencil-square"></i></i></button>
                                    <button class="action btn trash"><i class="bi bi-archive"></i></button>
                                </span>
                            </td>
                        </tr>


                    </tbody>

                </table>
            </div>
        </section>


        <dialog class="modal-adm modal-view" id="md-cad-employee">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Funcionário</h1>
            </div>


            <form action="" method="post">


                <fieldset>
                    <label for="name">Digite o Nome do Funcionário</label>
                    <input type="text" name="name">
                    <label for="document">Digite o Cpf do Funcionário</label>
                    <input type="text" name="document">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                    <label for="phone">Telefone</label>
                    <input type="tel" name="tel" placeholder="(00) 0000-0000" required>

                    <label for="document">Digite o Cargo do Funcionário</label>
                    <input type="text" name="cargo">

                    <label for="document">Selecione o Perfil do Funcionário</label>
                    <option value=""></option>

                    <label for="password">Senha</label>
                    <input type="password" name="password" required>
                    <label for="password-confirm">Confirme a senha</label>
                    <input type="password" name="password_confirm" required>

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Cadastrar">
                    </div>

                </fieldset>
                <fieldset>
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" placeholder="00000-000" required>
                    <label for="number">Número</label>
                    <input type="text" name="number" maxlength="10" required>
                    <label for="street">Rua</label>
                    <input type="text" name="street" autocomplete="address-line1" required>
                    <label for="complement">Complemento (opcional)</label>
                    <input type="text" name="complement" autocomplete="address-line2">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" name="neighborhood" required>
                    <label for="city">Cidade</label>
                    <input type="text" name="city" required>
                    <label for="state">UF</label>
                    <input type="text" name="state" maxlength="2" placeholder="SP" required>
                </fieldset>



            </form>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-edit-employee">
            <div>
                <button type="button" id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Editar Funcionário</h1>
            </div>

            <form action="" method="post">
                <fieldset>
                    <input type="hidden" name="id">

                    <label for="edit-name">Funcionário</label>
                    <input type="text" id="edit-name" name="name" disabled>

                    <label for="edit-cargo">Cargo</label>
                    <input type="text" id="edit-cargo" name="cargo" maxlength="50" required>

                    <label for="edit-profile">Perfil</label>
                    <select id="edit-profile" name="profile" required>
                        <option value="" disabled>Selecione</option>
                    </select>

                    <div class="form-actions">
                        <input type="reset" value="Cancelar">
                        <input type="submit" value="Salvar">
                    </div>
                </fieldset>
            </form>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-view-employee">
            <header>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Informações do Funcionário</h1>
            </header>

            <section>
                <img data-field="photo" alt="Foto do cliente" hidden>
                <i class="bi bi-person-circle"></i>
                <div>
                    <h2 data-field="name"></h2>
                    <p data-field="email"></p>
                </div>
                <span data-field="status"></span>
            </section>

            <section>
                <h3>Dados pessoais</h3>
                <dl>
                    <div>
                        <dt>Nome</dt>
                        <dd data-field="name"></dd>
                    </div>
                    <div>
                        <dt>Documento</dt>
                        <dd data-field="document"></dd>
                    </div>
                    <div>
                        <dt>E-mail</dt>
                        <dd data-field="email"></dd>
                    </div>
                    <div>
                        <dt>Telefone</dt>
                        <dd data-field="tel"></dd>
                    </div>
                    <div>
                        <dt>Perfil</dt>
                        <dd data-field="plan"></dd>
                    </div>
                    <div>
                        <dt>Cargo</dt>
                        <dd data-field="plan"></dd>
                    </div>
                    <div>
                        <dt>Cliente desde</dt>
                        <dd data-field="created"></dd>
                    </div>
                </dl>
            </section>

            <section>
                <h3>Endereço</h3>
                <dl>
                    <div>
                        <dt>CEP</dt>
                        <dd data-field="cep"></dd>
                    </div>
                    <div>
                        <dt>Número</dt>
                        <dd data-field="number"></dd>
                    </div>
                    <div>
                        <dt>Rua</dt>
                        <dd data-field="street"></dd>
                    </div>
                    <div>
                        <dt>Complemento</dt>
                        <dd data-field="complement"></dd>
                    </div>
                    <div>
                        <dt>Bairro</dt>
                        <dd data-field="neighborhood"></dd>
                    </div>
                    <div>
                        <dt>Cidade</dt>
                        <dd data-field="city"></dd>
                    </div>
                    <div>
                        <dt>UF</dt>
                        <dd data-field="state"></dd>
                    </div>
                </dl>
            </section>

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