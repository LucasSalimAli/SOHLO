<?php
$i = 0;
foreach ($funcionarios as $funcionario) {
    $i++;
}
?>

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
        <!-- Pessoas, essa parte aqui é de componentes. O Arquivo para fazer a alteração está na pasta "Componnents" -->
        <?php
        require_once __DIR__ . "/../components/admNavbar.php";
        ?>
    </header>

    <!-- Sidebar -->

    <aside class="sidebar">
        <!-- Pessoas, essa parte aqui é de componentes. O Arquivo para fazer a alteração está na pasta "Componnents" -->
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





        <section class="card-section">
            <div class="card-epsilon is-green">
                <h2>Total de Funcionarios</h2>
                <h3>-------</h3>
                <h1><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></h1>
            </div>
        </section>


        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
                <?php
                if (AutenticacaoController::autenticarPermissoes("Cadastrar-Funcionarios")) {
                    echo "<div class='col-auto'>
                        <button class='uptable-btn' data-open='md-cad-employee' title='Cadastrar'>
                        <i class='bi bi-plus-square'></i>
                        </button>
                        </div>";
                }
                ;
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
                            <th>EMAIL</th>
                            <th>CARGO</th>
                            <th>PERFIL</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>

                    <tbody class="table-content">

                        <?php
                        foreach ($funcionarios as $funcionario) {
                            echo "
                                        <tr class='status is-green'
                                            data-id='$funcionario->id_usuario'
                                            data-name='$funcionario->nome'
                                            data-email='$funcionario->email'
                                            data-document='$funcionario->documento'
                                            data-cargo='$funcionario->cargo'
                                            data-perfil='$funcionario->perfil_nome'
                                            data-perfilId='$funcionario->id_perfil'
                                            data-tel='$funcionario->telefone_numero'
                                            data-created='$funcionario->criado_em'
                                            data-cep='$funcionario->cep'
                                            data-numero='$funcionario->endereco_numero',
                                            data-complemento='$funcionario->complemento'
                                            data-rua='$funcionario->rua',
                                            data-cidade='$funcionario->cidade'
                                            data-bairro='$funcionario->bairro'>
                                            
                                        <td>$funcionario->nome</td>
                                        <td>$funcionario->email</td>
                                        <td>$funcionario->cargo</td>
                                        <td>$funcionario->perfil_nome</td>
                                        <td><span class='action'>
                                            <button class='action btn' data-show='md-view-employee' title='Ver Mais Informações'><i
                                            class='bi bi-three-dots'></i></button>";

                            if ($funcionario->id_perfil !== 1) {
                                if (AutenticacaoController::autenticarPermissoes("Editar-Funcionarios")) {
                                    echo "
                                            <button class='action btn' data-show='md-edit-employee' title='Editar'>
                                            <i class='bi bi-pencil-square'></i>
                                            </button>";
                                }
                                ;

                                if (AutenticacaoController::autenticarPermissoes("Excluir-Funcionarios")) {
                                    echo "
                                                <button class='action btn trash' data-show='md-delete' title='Excluir'><i class='bi bi-archive'></i></button>
                                                </span>
                                                ";
                                }
                                ;
                            }
                            ;
                            echo "   
                                        </td>
                                        </tr>
                                    ";
                        }
                        ?>


                    </tbody>

                </table>
            </div>
        </section>


        <dialog class="modal-adm" id="md-cad-employee">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Funcionário</h1>
            </div>


            <form action="index.php?controller=FuncionarioController&method=inserirFuncionarios" method="post">

                <fieldset>
                    <label for="nome">Digite o Nome do Funcionário</label>
                    <input type="text" name="nome">
                    <label for="cpf">Digite o Cpf do Funcionário</label>
                    <input type="text" name="cpf">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" placeholder="(00) 0000-0000" required>

                    <label for="password">Senha</label>
                    <input type="password" name="senha" required>
                    <label for="password-confirm">Confirme a senha</label>
                    <input type="password" name="confirma_senha" required>

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Cadastrar">
                    </div>

                </fieldset>
                <fieldset>
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" placeholder="00000-000" required>
                    <label for="number">Número</label>
                    <input type="text" name="numero" maxlength="10" required>
                    <label for="street">Rua</label>
                    <input type="text" name="rua" autocomplete="address-line1" required>
                    <label for="complement">Complemento (opcional)</label>
                    <input type="text" name="complemento" autocomplete="address-line2">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" name="bairro" required>
                    <label for="city">Cidade</label>
                    <input type="text" name="cidade" required>
                </fieldset>

                <fieldset>
                    <label for="cargo">Digite o Cargo do Funcionário</label>
                    <input type="text" name="cargo">

                    <label for="perfil" value="0">perfil</label>
                    <select id="perfil" name="perfil" required>
                        <option value="0" selected>Selecione</option>
                        <?php
                        foreach ($perfis as $perfil) {
                            echo ("<option value='{$perfil->getIdPerfil()}'>{$perfil->getNome()}");
                        }
                        ?>
                    </select>
                    <input type="hidden" name="foto" accept="image/*" onchange="previewImagem(event)">
                </fieldset>

            </form>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-edit-employee">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Editar Funcionário</h1>
            </div>

            <form action="index.php?controller=FuncionarioController&method=editarFuncionario" method="post">
                <fieldset>
                    <input type="hidden" name="id">

                    <label for="edit-name">Funcionário</label>
                    <input type="text" id="edit-name" name="name" disabled>

                    <label for="edit-cargo">Cargo</label>
                    <input type="text" id="edit-cargo" name="cargo" maxlength="50" required>

                    <label for="edit-profile">Perfil</label>
                    <select id="perfil" name="perfil" required>
                        <option value="0" selected>Selecione</option>
                        <?php
                        foreach ($perfis as $perfil) {
                            echo ("<option value='{$perfil->getIdPerfil()}'>{$perfil->getNome()}</option>");
                        }
                        ?>
                    </select>
                    <br><br>
                    <div class="form-actions">
                        <input type="reset" value="Limpar">
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
                        <dd data-field="perfil"></dd>
                    </div>
                    <div>
                        <dt>Cargo</dt>
                        <dd data-field="cargo"></dd>
                    </div>
                    <div>
                        <dt>Funcionario desde</dt>
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
                        <dd data-field="numero"></dd>
                    </div>
                    <div>
                        <dt>Rua</dt>
                        <dd data-field="rua"></dd>
                    </div>
                    <div>
                        <dt>Complemento</dt>
                        <dd data-field="complemento"></dd>
                    </div>
                    <div>
                        <dt>Bairro</dt>
                        <dd data-field="bairro"></dd>
                    </div>
                    <div>
                        <dt>Cidade</dt>
                        <dd data-field="cidade"></dd>
                    </div>

                </dl>
            </section>

        </dialog>

        <dialog class="modal-adm modal-view" id="md-delete">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Excluir Funcionário</h1>
            </div>

            <form action="index.php?controller=FuncionarioController&method=excluirFuncionario" method="post">
                <fieldset>
                    <input type="hidden" name="id">

                    <p>Tem Certeza que Quer Excluir esse Funcionario?</p>
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