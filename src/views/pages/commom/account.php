<?php /** @var stdClass $meusDados */ ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha conta</title>

    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="src/views/styles/global.css">
    <link rel="stylesheet" href="src/views/styles/account.css">
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

                    <a href="index.php?controller=ClienteController&method=listarTodosOsClientes    ">
                        <button class="" id="logistic-btn" title="Sistema Logístico">
                            <i class="bi bi-globe"></i>
                        </button>
                    </a>

                    <a href="index.php?controller=pagesController&method=initDashboard">
                        <button class="" id="financial-btn" title="Sistema Financeiro">
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
        </div>

    </aside>

    <main class="full-main">
        <section class="account">

            <!-- Perfil -->
            <section>
                <?php 
                    if($meusDados->foto !== "img_std_user.svg"){
                       echo "<img data-field='foto' alt='Foto do usuário' src='src/uploads/images/users/<?php $meusDados->foto;?>'>";
                    }
                    else{
                        echo "<i class='bi bi-person-circle'></i>";
                    }

                ?>
                <div>
                    <h2><?php echo $meusDados->nome; ?></h2>
                    <p><?php echo $meusDados->email?></p>
                </div>
            </section>

            <!-- Dados pessoais -->
            <section>
                <h3><i class="bi bi-person-vcard"></i> Dados pessoais</h3>
                <dl>
                    <div>
                        <dt>Nome completo</dt>
                        <dd><?php echo $meusDados->nome?></dd>
                    </div>
                    <div>
                        <dt>CPF</dt>
                        <dd><?php echo $meusDados->documento?></dd>
                    </div>
                </dl>
            </section>

            <!-- Contato -->
            <section>
                <h3><i class="bi bi-telephone"></i> Contato</h3>
                <dl>
                    <div>
                        <dt>E-mail</dt>
                        <dd><?php echo $meusDados->email?></dd>
                    </div>
                    <div>
                        <dt>Telefone</dt>
                        <dd><?php echo $meusDados->telefone_numero?></dd>
                    </div>
                </dl>
            </section>

            <!-- Endereço -->
            <section>
                <h3><i class="bi bi-geo-alt"></i> Endereço</h3>
                <dl>
                    <div>
                        <dt>Rua / Número</dt>
                        <dd><?php echo $meusDados->rua . " " . "/" . " " . $meusDados->endereco_numero?></dd>
                    </div>
                    <div>
                        <dt>Cidade / UF</dt>
                        <dd><?php echo $meusDados->cidade . " " . "/" . " ". $meusDados->estado?></dd>
                    </div>
                    <div>
                        <dt>CEP</dt>
                        <dd><?php echo $meusDados->cep?></dd>
                    </div>
                    <div>
                        <dt>Bairro</dt>
                        <dd><?php echo $meusDados->bairro?></dd>
                    </div>
                    <div>
                        <dt>Complemento</dt>
                        <dd><?php echo $meusDados->complemento?></dd>
                    </div>
                    
                </dl>
            </section>

            <!-- Acesso -->
            <section>
                <h3><i class="bi bi-shield-lock"></i> Acesso ao sistema</h3>
                <dl>
                    <div>
                        <dt>Perfil de acesso</dt>
                        <dd><?php echo $_SESSION["perfil"]?></dd>
                    </div>
                    <div>
                        <dt>Cargo</dt>
                        <dd><?php echo $_SESSION["cargo"]?></dd>
                    </div>
                    <div>
                        <dt>Usuário desde</dt>
                        <dd><?php echo $meusDados->criado_em?></dd>
                    </div>
                </dl>
            </section>

            <!-- Ações -->
            <footer>
                <button type="button" id="btn-edit-data" onclick="editSelfData()"><i class="bi bi-pencil-square"></i> Editar dados</button>
                <button type="button" onclick="changePassword()"><i class="bi bi-key"></i> Alterar senha</button>
                
            </footer>

            <p>Versão: Beta 2.7</p>

        </section>


        <dialog class="modal-adm modal-view" id="md-self-edit">
            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Edição de Conta</h1>
            </div>


            <form action="index.php?controller=FuncionarioController&method=alterarDadosCadastrais" method="post">
                <input type="hidden" name="id" value="<?php echo $meusDados->id_usuario; ?>">
                <input type="hidden" name="foto_antiga" value="<?php echo $meusDados->foto;?>">
                <fieldset>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="<?php echo $meusDados->nome; ?>">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" value="<?php echo $meusDados->documento; ?>">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value="<?php echo $meusDados->email; ?>" required>
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" value="<?php echo $meusDados->telefone_numero; ?>" required>

                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Editar">
                    </div>

                </fieldset>
                <fieldset>
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" placeholder="00000-000" value="<?php echo $meusDados->cep; ?>" required>
                    <label for="number">Número</label>
                    <input type="text" name="numero" value="<?php echo $meusDados->endereco_numero; ?>" required>
                    <label for="street">Rua</label>
                    <input type="text" name="rua" value="<?php echo $meusDados->rua; ?>"required>
                    <label for="complement">Complemento (opcional)</label>
                    <input type="text" name="complemento" value="<?php echo $meusDados->complemento; ?>"">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" name="bairro" value="<?php echo $meusDados->bairro; ?>" required>
                    <label for="city">Cidade</label>
                    <input type="text" name="cidade" value="<?php echo $meusDados->cidade; ?>" required>
                </fieldset>


            </form>
        </dialog>


        <dialog class="modal-adm modal-view" id="md-change-password">

            <div>
                <button id="exit"><i class="bi bi-x-lg"></i></button>
                <h1>Alterar Senha</h1>
            </div>


            <form action="index.php?controller=FuncionarioController&method=alterarSenha" method="post">
                <input type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>">
                <fieldset>
                    <label for="name">Digite Sua Senha Atual</label>
                    <input type="text" name="senha_antiga">
                    <label for="name">Digite Sua Nova Senha</label>
                    <input name="senha_nova" id=""></input>
                    <label for="document">Confirme Sua Senha</label>
                    <input type="text" name="confirma_senha_nova">
                    <div class="form-actions">
                        <input type="reset" value="Limpar">
                        <input type="submit" value="Salvar">
                    </div>
                </fieldset>
            </form>
        </dialog>
    </main>


    <script src="src/views/scripts/vendor/bootstrap/bootstrap.bundle.js"></script>
    <script src="src/views/scripts/shared/navbars.js"></script>
    <script src="src/views/scripts/shared/sidebar.js"></script>
    <script src="src/views/scripts/shared/themes.js"></script>
    <script src="src/views/scripts/shared/pageSelect.js"></script>
    <script src="src/views/scripts/shared/modals.js"></script>
    <script>
        conta();
    </script>
</body>

</html>
