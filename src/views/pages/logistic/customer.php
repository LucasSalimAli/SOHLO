<?php
    $i = 0;
    foreach($clientes as $cliente){
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


        <div class="space">


            <div class="card-epsilon is-green">
                <h2>Total de Clientes Ativos</h2>
                <h3>-------</h3>
                <h1><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></h1>
            </div>


            <section class="card-section is-grid">
                <div class="card-alpha is-std">
                    <h2>Nº Clientes PJ</h2>
                    <h1>00</h1>
                </div>

                <div class="card-alpha is-std">
                    <h2>Nº Clientes PF</h2>
                    <h1><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></h1>
                </div>
            </section>
        </div>

        <section class="section-table">

            <!-- Botoes de Cima da Tabela -->
            <div class="row table-btns">
            <?php
            if (AutenticacaoController::autenticarPermissoes("Cadastrar-Clientes")){
                echo "
                <div class='col-auto'>
                    <button class='uptable-btn' data-open='md-sel-customer'>
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
                            <th>PLANO</th>
                            <th>EMAIL</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>

                    <tbody class="table-content">


                        <?php
                        foreach ($clientes as $cliente) {
                            echo "
                                        <tr class='status is-green'
                                            data-id='$cliente->id_usuario';
                                            data-name='$cliente->nome'
                                            data-email='$cliente->email'
                                            data-document='$cliente->documento'
                                            data-plan='$cliente->nome_plano'
                                            data-tel='$cliente->telefone_numero'
                                            data-created='$cliente->criado_em'
                                            data-cep='$cliente->cep'
                                            data-numero='$cliente->endereco_numero',
                                            data-complemento='$cliente->complemento'
                                            data-rua='$cliente->rua',
                                            data-cidade='$cliente->cidade'
                                            data-bairro='$cliente->bairro'>
                                            
                                        <td>$cliente->nome</td>
                                        <td>$cliente->nome_plano</td>
                                        <td>$cliente->email</td>
                                        <td><span class='action'>
                                            <button class='action btn' data-show='md-view-customer'><i
                                            class='bi bi-three-dots'></i></button>";
                                            if (AutenticacaoController::autenticarPermissoes("Excluir-Clientes")){
                                                echo "
                                                    <button class='action btn trash' data-show='md-delete'><i class='bi bi-archive'></i></button>";};
                                    echo "
                                            </span>
                                        </td>
                                        </tr>
                                        ";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </section>


        <dialog class="modal-adm" id="md-sel-customer">
            <h1>Selecione o Tipo de Cliente</h1>
            <br>
            <button data-open="md-cad-pf">Pessoa Física</button>
            <button data-open="md-cad-pj">Pessoa Jurídica</button>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-cad-pf">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Clientes PF</h1>
            </div>


            <form action="index.php?controller=ClienteController&method=inserirClientePf&origin=admin" method="post">


                <fieldset>
                    <label for="name">Digite o Nome do Cliente</label>
                    <input type="text" name="nome">
                    <label for="document">Digite o Cpf do Cliente</label>
                    <input type="text" name="cpf">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                    <label for="phone">Telefone</label>
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
                    <label for="tipo_plano" value="0">Tipo de Plano</label>
                    <select id="tipo_plano" name="tipo_plano" required>
                        <option value="0" selected>Selecione</option>
                        <?php
                        foreach ($return as $plano) {
                            echo ("<option value='{$plano->id_plano}'>{$plano->nome} - R$: {$plano->preco}");
                        }
                        ?>
                    </select>
                </fieldset>



            </form>
        </dialog>

        <dialog class="modal-adm modal-view" id="md-cad-pj">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Cadastro de Clientes PJ</h1>
            </div>


            <form action="" method="post">


                <fieldset>
                    <label for="name">Digite a Razão Social</label>
                    <input type="text" name="name">
                    <label for="name">Digite o Nome Fantasia</label>
                    <input type="text" name="name">
                    <label for="document">Digite o CNPJ da Empresa</label>
                    <input type="text" name="document">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                    <label for="phone">Telefone</label>
                    <input type="tel" name="tel" placeholder="(00) 0000-0000" required>
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

        <dialog class="modal-adm modal-view" id="md-view-customer">
            <header>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Informações do Cliente</h1>
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
                        <dt>Plano</dt>
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
                <h1>Excluir Cliente</h1>
            </div>

            <form action="index.php?controller=ClienteController&method=excluirClientes" method="post">
                <fieldset>
                    <input type="hidden" name="id">

                    <p>Tem Certeza que Quer Excluir esse Cliente?</p>
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