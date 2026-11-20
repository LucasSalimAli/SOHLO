<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se | S.O.H.L.O.</title>

    <!-- Ícones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="src/views/styles/shared/navbars.css">
    <link rel="stylesheet" href="src/views/styles/pages/signup.css">
</head>

<body>

    <header>

    </header>

    <main class="signup-page">
        <section>
            <h1>Crie sua conta</h1>

            <ol class="signup-progress" aria-label="Etapas do cadastro">
                <li class="active" aria-current="step">
                    <span>1</span>
                    <span>Dados pessoais</span>
                </li>
                <li>
                    <span>2</span>
                    <span>Endereço</span>
                </li>
                <li>
                    <span>3</span>
                    <span>Plano</span>
                </li>
            </ol>

            <!-- enctype é obrigatório por causa do upload da foto -->
            <form class="signup-form" id="signup-form" method="post" enctype="multipart/form-data" novalidate>

                <!-- ===== ETAPA 1: Dados pessoais ===== -->
                <fieldset>
                    <legend>Dados pessoais</legend>

                    <div class="signup-upload">
                        <span>Foto de perfil (opcional)</span>
                        <label>
                            <input type="file" name="foto" accept="image/*" onchange="previewImagem(event)">
                            <span>
                                <img id="img_user" alt="Pré-visualização da imagem escolhida">
                                <i class="bi bi-cloud-arrow-up"></i>
                                <strong>Escolher imagem</strong>
                            </span>
                        </label>
                        
                    </div>

                    <div class="signup-grid">
                        <div>
                            <label for="name">Nome completo</label>
                            <input type="text" id="name" name="nome" value="<?php echo htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[0] ?></small>
                        </div>
                        <div>
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" inputmode="numeric" placeholder="000.000.000-00" value="<?php echo htmlspecialchars($_POST['cpf'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[1] ?></small>
                        </div>
                    </div>

                    <div class="signup-grid">
                        <div>
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[2] ?></small>
                        </div>
                        <div>
                            <label for="telefone">Telefone</label>
                            <input type="tel" id="telefone" name="telefone" inputmode="tel"
                                placeholder="(00) 90000-0000" value="<?php echo htmlspecialchars($_POST['telefone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[3] ?></small>
                        </div>
                        <div>
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" required>
                            <small role="alert"><?php echo $msg[4] ?></small>
                        </div>
                        <div>
                            <label for="confirma-senha">Confirme a senha</label>
                            <input type="password" id="confirma-senha" name="confirma_senha" required>
                            <small role="alert"><?php echo $msg[5] ?></small>
                        </div>
                    </div>
                </fieldset>

                <!-- ===== ETAPA 2: Endereço ===== -->
                <fieldset>
                    <legend>Endereço</legend>

                    <div class="signup-grid">
                        <div>
                            <label for="zip-code">CEP</label>
                            <input type="text" id="zip-code" name="cep" placeholder="00000-000" value="<?php echo htmlspecialchars($_POST['cep'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[6] ?></small>
                        </div>
                        <div>
                            <label for="number">Número</label>
                            <input type="text" id="number" name="numero" maxlength="5" value="<?php echo htmlspecialchars($_POST['numero'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[7] ?></small>
                        </div>
                        <div>
                            <label for="street">Rua</label>
                            <input type="text" id="street" name="rua" value="<?php echo htmlspecialchars($_POST['rua'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[8] ?></small>
                        </div>
                        <div>
                            <label for="complement">Complemento (opcional)</label>
                            <input type="text" id="complement" name="complemento" value="<?php echo htmlspecialchars($_POST['complemento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div>
                            <label for="neighborhood">Bairro</label>
                            <input type="text" id="neighborhood" name="bairro" value="<?php echo htmlspecialchars($_POST['bairro'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[9] ?></small>
                        </div>
                        <div>
                            <label for="city">Cidade</label>
                            <input type="text" id="city" name="cidade" placeholder="Jahu" value="<?php echo htmlspecialchars($_POST['cidade'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <small role="alert"><?php echo $msg[10] ?></small>
                        </div>

                    </div>
                </fieldset>

                <!-- ===== ETAPA 3: Escolha do plano ===== -->
                <fieldset>
                    <legend>Escolha do plano</legend>

                    <fieldset>
                        <div class="signup-grid">
                            <div>
                                <label for="tipo_plano" value="0">Tipo de Plano</label>
                                <select id="tipo_plano" name="tipo_plano" required>
                                    <option value="0" selected>Selecione</option>
                                    <?php 
                                        foreach ($return as $plano){
                                            echo("<option value='{$plano->id_plano}'>{$plano->nome} - R$: {$plano->preco}");
                                        }
                                    ?>
                                </select>
                                <small role="alert"><?php echo $msg[11] ?></small>
                            </div>
                        </div>
                    </fieldset>


                    <!-- <fieldset>
                        <div class="signup-grid">
                            <div>
                                <label for="dia-coleta" value="0">Dia da coleta</label>
                                <select id="dia-coleta" name="dia_coleta" required>
                                    <option value="" selected>Selecione</option>
                                    <option value="segunda">Segunda-feira</option>
                                    <option value="terça">Terça-feira</option>
                                    <option value="quarta">Quarta-feira</option>
                                    <option value="quinta">Quinta-feira</option>
                                    <option value="sexta">Sexta-feira</option>
                                </select>
                                <small role="alert"><?php echo $msg[12] ?></small>
                            </div>
                        </div>

                    </fieldset> -->


                </fieldset>

                <!-- Botões -->
                <div class="signup-actions">
                    <button type="button" class="btn back" id="signup-back-btn" hidden>Voltar</button>
                    <button type="button" class="btn next" id="signup-next-btn">Próximo</button>
                    <input type="submit" class="btn next" id="signup-submit-btn" value="Criar Conta" hidden>
                </div>
            </form>


            <p>É uma empresa? <a class="btn"
                    href="index.php?controller=ClienteController&method=inserirClientePj">Cadastre-se como
                    Pessoa Jurídica</a></p>

            <p><a class="btn to-login" href="index.php?controller=AutenticacaoController&method=login">Já tenho uma conta
                    Húmus</a></p>
        </section>
    </main>

    <script src="src/views/scripts/shared/themes.js"></script>
    <!-- <script src="src/views/scripts/shared/navbars.js"></script> -->
    <script src="src/views/scripts/shared/signup.js"></script>

    <script>
        function previewImagem(event) {
        const input = event.target;
        const imagemPreview = document.getElementById('img_user');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagemPreview.src = e.target.result;
                imagemPreview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            imagemPreview.src = '';     
            imagemPreview.style.display = 'none';
        }
    }
    </script>
</body>

</html>