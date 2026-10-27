PI - Template Documentação Git

<p align=left style=font-size:28px> <strong> <em> Documentação do
PI </em> </strong> </p>
<details>
<summary><strong>Sumário</strong></summary>

- [1. Introdução](#1-introdução)
- [2. Documento de Requisitos](#2-Requisitos)
- [3. Regras de Negócio](#3-Regras-de-Negocios)
- [4. Estudo de Viabilidade](#4-Estudo-de-Viabilidade)
- [5. Design](#5-Design)
- [6. Protótipo](#6-Protótipo)
- [7. Aplicação](#7-Aplicação)
- [8. Considerações Finais](#8-Considerações-Finais)
- [Referências Bibliograficas](#Referênicas-Bibliograficas)


</details>

Para cada semestre, do 1º ao 6º, iremos utilizar este template para documentar o PI -
incrementalmente.

# 1-Introdução
O Maior problema que a Húmus-Compostagem enfrenta agora é a falta de um sistema para o auxilio organizacional. Atualmente a Húmus sofre com problemas para organizar as coletas de resíduos (confirmação de presença no dia da coleta) e gerenciamento financeiro.


## 1.1-Objetivos

### 1.1.1-Objetivo Geral
O Objetivo é a criação de um sistema para a Húmus, de forma que, com  isso, a empresa consiga um melhor gerenciamento de tempo e recursos, além  de automatizar tarefas repetitivas e demoradas. Com, no futuro, um sistema  completo integrando empresa e clientes.

### 1.1.2-Objetivo Específico
O objetivo desse P.I. do primeiro semestre, é a realização de um site  estático com o intuito de apresentar ao cliente a ideia/proposta do que o sistema  irá se tornar no futuro. Por hora, as funcionalidades do sistema não serão  implementadas, e o sistema será focado na seção Financeira



# 2-Requisitos
Um documento de requisitos é a parte da documentação onde se esclarece o que o sistema deve ou não fazer; Suas funcionalidades, comportamentos e restrições. Os Requisitos são “instruções” claras, consistentes e não podem ser ambíguas. Dessa forma garantido o pleno entendimento do que o cliente espera que seja desenvolvido.


## 2.1-Requisitos Funcionais
### RF 01 - Cadastrar Usuário:
O sistema deve permitir o cadastro de usuários categorizados em 4 tipos:
 
#### 01 - Cadastrar Funcionário:
Dados cadastrais necessários:
-	Nome.
-	CPF.
-	Foto.
-	Telefone de Contato.
-	E-mail.
-	Senha.
-	Cargo.
-	Endereço (Estado, Cidade, CEP, Rua, Bairro, Número, Complemento, Ponto de Referência).
 
#### 02 - Cadastrar Cliente Pessoa Física:
Dados cadastrais necessários:
-	Nome.
-	CPF.
-	Foto.
-	E-mail.
-	Telefone de Contato.
-	Senha.
-	Plano Escolhido.
-	Dia Escolhido para Coleta.
-	Endereço (Estado, Cidade, CEP, Rua, Bairro, Número, Complemento, Ponto de Referência).
 
#### 03 - Cadastrar Cliente Pessoa Jurídica:
Dados cadastrais necessários:
-	Razão Social.
-	Nome Fantasia.
-	Foto/Logo.
-	CNPJ.
-	Inscrição Estadual.
-	E-mail.
-	Telefone de Contato.
-	Descrição da Empresa.
-	Tipo de Unidade (Matriz / Filial).
-	Empresa Matriz (Obrigatório apenas caso o Tipo de Unidade seja "Filial").
-	Endereço (Estado, Cidade, CEP, Rua, Bairro, Número, Complemento, Ponto de Referência).
*Nota: O usuário do tipo Administrador Root não possui tela de cadastro no sistema, sendo criado diretamente via banco de dados.
 
### RF 02 - Realizar Login no Sistema:
O sistema deverá permitir o Login dos usuários cadastrados, e barrar o acesso de usuários NÃO cadastrados. 
Dados Necessários:
-	CPF / CNPJ ou Email
-	Senha
 
### RF 03 - Editar Perfil:
O sistema deverá permitir ao usuário a alteração de dados de seu perfil.
#### Para Pessoas (Funcionários e Cliente PF): 
-	Edição de Nome.
-	Foto.
-	Telefone.
-	Endereço.
-	E-mail.
-	Senha.
 
#### Para Empresas (Cliente PJ): 
-	Nome Fantasia.
-	Foto/Logo.
-	Telefone.
-	Endereço.
-	E-mail.
-	Senha.
 
#### Campos Bloqueados (Somente Leitura): 
-	CPF/CNPJ.
-	Inscrição Estadual.
-	Plano Contratado.
-	Razão Social.
 
### RF 04 - Apagar Usuários:
O administrador poderá apagar usuários do sistema, caso o cliente tenha cancelado o contrato, ou o funcionário seja desligado.<br>
O sistema deverá marcar como inativado os usuários desligados, para preservar a informação. 
 
### RF 05 - Agenda:
O sistema deverá criar uma visualização em agenda para informar ao usuário os dias de coleta, e em quais clientes a coleta está agendada para o respectivo dia.  

**Deve Conter:**
-	Calendário
-	Dia Atual
-	Dias Coletados
-	Dias Cancelados (quando o cliente cancela a coleta)
-	Dias Faltados (quando marca a coleta, e não comparece)
-	Clientes agendados para o dia.
 
 
### RF 06 - Permitir Alteração de Valores dos Planos:
O sistema deve permitir a Alteração do preço dos Planos disponíveis:
-	Anual Semanal.
-	Anual Quinzenal.
-	Mensal Semanal.
-	Mensal Quinzenal.
      
**Nota: Para Clientes PJs, deverá ser possível mudar o valor dos Planos, Mediante Aprovação das Empresas Contratantes.**
 
 
### RF 07 - Permitir Alteração de Valores dos Produtos:
**O sistema deverá permitir a Alteração dos Valores dos Produtos Oferecidos:**
-	Adubo Orgânico.
-	Fertilizante.
 
### RF 08 - Esqueceu Senha:
- O sistema deverá permitir registrar outra senha caso o usuário esqueça a atual.  
- Deverá ser mandado uma confirmação por email para confirmar que é o usuário.  
- A senha não poderá ser a mesma da anterior.
 
 
### RF 09 - Criar Histórico Imutável do Sistema:
#### O Sistema deverá registrar, de forma imutável, toda e qualquer alteração no sistema, com informações de:
-	Data e Hora.
-	Registro da Alteração (Descrição).
-	O que foi Alterado.
-	Valor Antigo.
-	Valor Novo.
-	Quem realizou a Alteração (Nome do funcionário e Cargo).
  
#### O Sistema poderá filtrar as Informações por Categorias, dependendo da Seleção do Usuário:
-	TimeStamps (Hoje, Esta Semana, Este Mês, Este Ano, 5 Anos, Total).
 
**NOTA - Como o histórico será compartilhado com a Parte de Logística, informações serão adicionadas posteriormente.**
 	
 
### RF 10 - Visualizar Contas da Empresa (apenas se der tempo):
O sistema deverá manter controle sobre as contas da empresa, permitindo o cadastro de cada uma.  
O Sistema deverá informar ao Usuário:
-	Número de Contas Pagas.
-	Número de Contas Abertas.
-	Número de Contas Vencidas.
-	Nome da Conta.
-	Status (pago, à pagar, atrasada).
-	Data de Pagamento.
-	Data de Vencimento (se houver).
-	Comprovante (caso não esteja anexado, mostrar botão de Anexar. Caso anexado, mostrar botão de Visualizar e Editar).
-	Valor da Conta.

   
### RF 11 - Pesquisar
O Sistema deverá conter uma caixa de pesquisa, que permitirá vasculhar o sistema inteiro para mostrar a informação.  
Durante a pesquisa, a página principal será substituída por uma tabela que informará o resultado, fugindo de todas as tabelas predefinidas pelas páginas.
 
### RF 12 - Alterar Informações da Tabela:
O Sistema deverá permitir a alteração de dados das tabelas.  
Um botão de edição deverá estar presente em todas as tabelas que podem receber edição.  
Um menu com botões de função (adicionar, remover, editar, salvar) deverá aparecer.
 
### RF 13 - Notificações:
O sistema deverá gerar notificações para os usuários. <br>
As notificações deverão constar no sistema:
-	Nome.
-	Data de Criação.
-	Origem.
-	Conteúdo.
-	Check (foi lida ou não).

    
**A geração poderá ser feita de forma manual (pelas páginas), ou automatizada pelo sistema(implementação futura).**



## 2.2-Requisitos Não Funcionais
### RNF 01 - Desempenho do Sistema:
O sistema deve carregar as páginas, dashboards e resultados de buscas em no máximo 2 segundos para conexões padrão de internet.

### RNF 02 - Usabilidade:
A Interface deve ser intuitiva, seguindo o design pré-estabelecido e aprovado pelo cliente.<br>
As Funções devem poder ser acessadas com média de 3 cliques.

### RNF 03 - Acessibilidade:
O Sistema deve ser acessível para todos os tipos de usuário.
**Deve conter:**
-	Navegação por Teclado.
-	Modo de Daltonismo.
-	Fontes Legíveis e de Bom Tamanho.
 
### RNF 04 - Temas:
O Sistema deve oferecer suporte a dois temas:
-	Modo Claro.
-	Modo Escuro.
  
A Alteração deverá ser feita de forma manual.

### RNF 05 - Responsividade:
A interface do sistema deve ser responsiva, adaptando-se automaticamente a diferentes resoluções de tela (Monitores de Desktop, Notebooks e Tablets).

### RNF 06 - Segurança:
Todas as Senhas **DEVEM** ser criptografadas antes de serem Subidas ao Banco de Dados.<br>
O sistema DEVE utilizar o protocolo HTTPS.

### RNF 07 - Atualização de Dados com Botão Refresh:
O sistema não deve recarregar a página inteira ao atualizar informações; as tabelas, filtros e dashboards devem atualizar seus dados via requisições assíncronas ao clicar no botão "Refresh".

### RNF 08 - Preferencias do Usuário:
O sistema deve armazenar no perfil as Preferências do Usuário, como:
-	Tema.
-	Layout da Página de Dashboards.



## 2.3-Histórias dos Usuários

### HU 01 – Cadastrar Funcionário:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Cadastrar Funcionários ao sistema – Para que – Possa otimizar a gestão de recursos e tarefas da empresa.

### HU 02 – Entrar no Sistema:
Como – Funcionário da Húmus – Quero Poder – Entrar no Sistema S.O.H.L.O. de forma rápida e segura – Para que – Possa utilizar o sistema sem preocupações.

### HU 03 – Editar Perfil:
Como – Usuário do Sistema S.O.H.L.O. – Quero Poder – Editar as informações do meu perfil – Para que – Possa sempre manter os dados atualizados e corrigir possíveis erros ao me cadastrar.

### HU 04 – Fluxo de Caixa:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Visualizar o Fluxo de Caixa da Empresa – Para que – Possa manter controle sobre os Gastos e Lucro da empresa.

### HU 05 – Alterar Preços:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Alterar os preços dos planos, produtos e multas – Para que – Consiga manter a empresa funcionando.

### HU 06 – Visualizar Receita:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Visualizar quais clientes estão em débito, quais pagaram, e quais estão de forma atrasada – Para que – Possa manter um controle sobre meu fluxo de caixa e o Lucro da empresa.

### HU 07 – Visualizar Gráficos:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Visualizar gráficos sobre meu sistema financeiro – Para que – Possa conferir as informações de forma rápida e visual, sem ter que analisar tabelas.

### HU 08 – Relatório Diário:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Visualizar um resumo sobre o dia de hoje – Para que – Quando estiver com pressa, possa conferir os resultados que a empresa gerou hoje.

### HU 09 – Visualizar Histórico:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Ter um histórico completo e imutável do sistema – Para que – Possa saber sobre qualquer alteração feita no sistema.

### HU 10 – Visualizar Contas:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Visualizar as contas da empresa – Para que – Possas saber o estado delas.

### HU 11 – Pesquisar:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Usar uma barra de pesquisa – Para que – Possa pesquisar qualquer informação no sistema de forma rápida e fácil.

### HU 12 – Simular Alterações de Preços:
Como – Administrador do Sistema S.O.H.L.O. – Quero poder – Simular a Alteração dos preços antes de realmente mudá-los – Para que – Possa saber se a mudança será benéfica ou maléfica para a empresa.

### HU 13 – Alterar Informações:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Alterar as informações do sistema – Para que – Possa adicionar, corrigir ou deletar de forma manual novos dados ao sistema.

### HU 14 – Notificar:
Como – Administrador do Sistema S.O.H.L.O. – Quero Poder – Receber Notificações do Sistema – Para que – Possa ser alertado sobre qualquer informação importante que o sistema está avaliando.

## 2.4-Diagramas de Casos de Uso
## Acesso ao Sistema

### UC 01 - Realizar login:
Resumo. O visitante informa CPF/CNPJ ou e-mail e a senha para entrar no sistema. Quem não está cadastrado, ou está inativo, não entra.  
Ator: Visitante  
Pré-condições: ter cadastro ativo.  
Regras: RN21–23
<br><br>
Fluxo principal:
1.	O visitante abre a tela de login.
2.	Informa CPF/CNPJ ou e-mail e a senha.
3.	O sistema confere as credenciais.
4.	O sistema autentica o usuário e abre a página inicial conforme o seu perfil.
<br><br>
Fluxos alternativos:
-	A1. Credenciais inválidas: o sistema exibe uma mensagem genérica, sem dizer se errou o usuário ou a senha, e mantém a tela de login.
-	A2. Usuário inativo: o acesso é negado.
-	A3. Usuário não cadastrado: o acesso é negado, com a mesma mensagem genérica.
   
   
### UC 02 - Realizar cadastro:
Resumo. O visitante se cadastra sozinho pelo site, como pessoa física ou empresa, escolhendo o plano e o dia de coleta.  
Ator: Visitante   
Regras: RF 01, RN01–10
<br><br>
Fluxo principal:
1.	O visitante abre a página de cadastro correspondente de pessoa física ou jurídica.
2.	O sistema exibe o formulário correspondente (RF 01).
3.	O visitante preenche os dados.
4.	O sistema valida os dados.
5.	O sistema criptografa a senha e salva o cliente.
6.	O sistema confirma o cadastro e leva o cliente ao login.
<br><br>
Fluxos alternativos:
-	A1. Dados inválidos (CPF/CNPJ, e-mail repetido, foto fora do formato, senha fora do padrão): o sistema informa o erro e mantém o formulário preenchido.
-	A2. O visitante abandona o formulário: nada é salvo.
   
   
### UC 03 - Redefinir senha:
Resumo. O visitante que esqueceu a senha pede um link por e-mail e define uma nova senha, diferente da anterior.  
Ator: Visitante.  
Pré-condições: ter cadastro ativo, com e-mail.  
Regras: RF 08, RN10, RN60–63
<br><br>
Fluxo principal:
1.	O Visitante escolhe “Esqueci minha senha”.
2.	O Visitante informa o e-mail cadastrado.
3.	O sistema envia um link ao e-mail e exibe sempre a mesma resposta, exista o e-mail ou não.
4.	O visitante abre o link, que vale por 1 hora e só pode ser usado uma vez.
5.	Informa a nova senha.
6.	O sistema confere que a senha é diferente da atual e segue o padrão.
7.	O sistema criptografa e salva a nova senha.
8.	O sistema confirma a troca e leva o visitante ao login.
<br><br>
Fluxos alternativos:
-	A1. Link expirado ou já usado: o sistema informa e permite pedir um novo.
-	A2. Nova senha igual à anterior: o sistema recusa e pede outra.
-	A3. Nova senha fora do padrão: o sistema recusa e pede outra.
  
### UC 04 - Validar dados do usuário:
Resumo. Passo reaproveitado pelos três cadastros: confere se os dados informados seguem as regras antes de salvar.  
Ator: Sistema (caso incluído pelo UC02, UC07 e UC27)   
Pré-condições: dados preenchidos em um formulário de cadastro.  
Regras: RN03–10
<br><br>
Fluxo principal:
1.	Confere o CPF ou CNPJ: precisa ser válido e único.
2.	Confere se o e-mail é único.
3.	Confere os campos obrigatórios do tipo de usuário, com ao menos um telefone e um endereço. Complemento e ponto de referência são opcionais.
4.	Confere se a foto está em JPG ou PNG, com até 2 MB.
5.	Confere se a senha tem no mínimo 8 caracteres, com letra e número.
6.	Se o usuário é uma filial, confere se a Matriz já existe (Esperar resposta do André).
7.	Devolve ao caso de uso que chamou: aprovado, ou a lista de erros.
<br><br>
Fluxos alternativos:  
-	A1. Qualquer verificação falha: o sistema devolve a lista de erros, e o cadastro não é salvo.
 
  
## Funcionários
### UC 05 - Visualizar funcionários:
Resumo: Mostra a lista de funcionários com o perfil de acesso de cada um.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para ver funcionários.  
Regras: RN37
<br><br>
Fluxo principal:
1.	O funcionário escolhe a aba de Funcionários.
2.	O sistema exibe a lista.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A2. Nenhum funcionário cadastrado: o sistema exibe a lista vazia.
 
 
### UC 06 - Filtrar funcionários:
Resumo. Restringe a lista de funcionários pelos critérios escolhidos.  
Ator: Funcionário com permissão.  
Regras: RNF 07.  
Estende: UC05.
<br><br>
Fluxo principal:
1.	O funcionário seleciona os filtros.
2.	O sistema atualiza a lista, sem recarregar a página inteira.
3.	O funcionário pode limpar o filtro e voltar à lista completa.
<br><br>
Fluxos alternativos:
-	A1. Nenhum funcionário atende ao filtro: o sistema exibe a lista vazia.
 
 
### UC 07 - Cadastrar funcionários:
Resumo. O Administrador cadastra um novo funcionário, com dados pessoais, endereço e perfil de acesso.  
Ator: Administrador  
Pré-condições: autenticado como Administrador.  
Regras: RF 01, RN01–10.
<br><br>
Fluxo principal:
1.	O Administrador abre a aba de funcionários.
2.	O Administrador seleciona a opção "editar".
3.	O Administrador seleciona o botão "+".
4.	O sistema exibe o formulário: nome, CPF, foto, telefone, e-mail, senha, cargo (perfil) e endereço.
5.	O Administrador preenche e confirma.
6.	O sistema valida os dados.
7.	O sistema criptografa a senha e salva o funcionário.
8.	O sistema registra a criação no histórico, sem exibir dados pessoais.
9.	O sistema confirma o cadastro.
<br><br>
Fluxos alternativos:
-	A1. Dados inválidos: o sistema informa o erro e mantém o formulário preenchido.
-	A2. O Administrador cancela: nada é salvo.
 
 
### UC 08 - Atribuir perfis:
Resumo. Um funcionário com permissão troca o perfil de acesso de outro funcionário, concedendo ou retirando acessos.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com a permissão de conceder permissões.  
Regras: RN27, RN37, RN40.
<br><br>
Fluxo principal:
1.	O Funcionário abre a aba "Funcionários".
2.	O Funcionário seleciona a opção "editar".
3.	O Funcionário seleciona a opção "lápis".
4.	O Funcionário seleciona o Funcionário ao qual quer alterar perfil.
5.	O funcionário escolhe o novo perfil e confirma.
6.	O sistema salva a troca.
7.	O sistema registra a alteração no histórico.
<br><br>
Fluxos alternativos:
-	A1. Tentativa de conceder acima das próprias permissões ou de mexer nas do Administrador: o sistema recusa.
-	A2. Tentativa de Alterar Perfis de cargos "a cima" do próprio: o sistema recusa.
-	A2. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A3. O funcionário cancela: nada é alterado.
 
 
### UC 09 - Visualizar permissões de um Funcionário:
Resumo. Mostra as permissões de um funcionário, conforme o perfil dele.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para consultar funcionários  
Regras: RN37, RN40.
<br><br>
Fluxo principal:
1.	O Funcionário abre a aba "Funcionários".
2.	O Funcionário seleciona a opção "Editar".
3.	O Funcionário seleciona o funcionário ao qual quer ver as informações.
4.	O sistema exibe o perfil e a lista de permissões que ele concede.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
 
 
### UC 10 - Editar perfil de funcionários:
Resumo. O Administrador altera dados administrativos de um funcionário já cadastrado. Dados pessoais seguem o sigilo da RN26.   
Ator: Administrador.  
Pré-condições: autenticado como Administrador e funcionário ativo.  
Regras: RF 03, RN26–29
<br><br>
Fluxo principal:
1.	O Funcionário abre a aba "Funcionários".
2.	O Funcionário seleciona a opção "Editar".
3.	O Funcionário seleciona a opção "Lápis".
4.	O sistema exibe os campos que podem ser alterados.
5.	O Administrador altera os dados e salva.
6.	O sistema valida os dados, mantendo o e-mail único.
7.	O sistema registra a alteração no histórico, exceto dados pessoais.
<br><br>
Fluxos alternativos:
-	A1. E-mail já cadastrado ou dado inválido: o sistema informa o erro e não salva.
-	A2. Campo bloqueado: o sistema não permite a edição.
-	A3. O Administrador cancela: nada é alterado.
 
 
### UC 11 - Inativar funcionário:
Resumo. O Administrador marca como inativo um funcionário desligado. O registro permanece no banco, para preservar a informação.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador e funcionário ativo.  
Regras: RF 04, RN30–33.
<br><br>
Fluxo principal:
1.	O Funcionário abre a aba "Funcionários".
2.	O Funcionário seleciona a opção "editar".
3.	O Funcionário seleciona a opção "-".
4.	O Administrador escolhe o funcionário.
5.	Informa o motivo do desligamento.
6.	O sistema pede a confirmação.
7.	O Administrador confirma.
8.	O sistema marca o funcionário como inativo, por exclusão lógica.
9.	O sistema registra a ação no histórico (UC38).
<br><br>
Fluxos alternativos:
-	A1. O Administrador cancela: nada é alterado.
 
 
## Perfis e permissões
### UC 12 - Visualizar perfis de acesso:
Resumo. Mostra a lista dos perfis de acesso (cargos) existentes no sistema.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para ver perfis.  
Regras: RN37–38
<br><br>
Fluxo principal:
1.	O funcionário escolhe a área de Perfis e Permissões.
2.	O Funcionário seleciona "Perfis".
3.	O sistema exibe a lista, com a descrição de cada perfil, e quantos funcionários cada perfil tem atribuído.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
 
 
### UC 13 - Visualizar todas as permissões:
Resumo. Mostra a lista geral de todas as permissões do sistema, usada para montar ou conferir os perfis.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para ver perfis.  
Regras: RN37–38.
<br><br>
Fluxo principal:
1.	O funcionário escolhe a aba de Perfis e Permissões.
2.	O Funcionário seleciona "Permissões".
3.	O Sistema exibe todas as permissões, com o nome e a descrição de cada uma.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
 
 
### UC 14 - Cadastrar perfil de acesso:
Resumo. O Administrador cria um novo perfil e escolhe quais permissões ele terá.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador.   
Regras: RN37–38, RN43.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a área de Perfis e Permissões.
2.	O Administrador seleciona "Perfis".
3.	O Administrador seleciona "Editar".
4.	O Administrador seleciona "+".
5.	O Administrador informa o Nome do Perfil.
6.	O Administrador Informa a descrição do perfil.
7.	Marca as permissões que o perfil terá.
8.	Confirma, e o sistema salva o perfil.
9.	O sistema registra a criação no histórico.
<br><br>
Fluxos alternativos:
-	A1. Dados obrigatórios faltando: o sistema informa o erro e mantém o formulário.
-	A2. O Administrador cancela: nada é salvo.
 
 
### UC 15 - Editar perfil de acesso:
Resumo. O Administrador altera a descrição de um perfil e marca ou desmarca as suas permissões, concedendo e revogando acessos.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador e perfil existente.  
Regras: RN38, RN40, RN43.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a área de Perfis e Permissões.
2.	O Administrador seleciona "Perfis".
3.	O Administrador seleciona "Editar".
4.	O Administrador seleciona "Lápis".
5.	Altera o nome, a descrição e marca ou desmarca permissões.
6.	Salva, e o sistema atualiza o perfil.
7.	O sistema registra a alteração no histórico, com o valor antigo e o novo.
<br><br>
Fluxos alternativos:
-	A1. Perfil do Root: o sistema não o edita, e qualquer mudança é feita pela equipe de desenvolvimento.
-	A2. O Administrador cancela: nada é alterado.
 
 
### UC 16 - Desativar perfil de acesso:
Resumo. O Administrador desativa um perfil que não é mais usado.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador e perfil sem funcionários vinculados.  
Regras: RN38, RN42, RN43.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a área de Perfis e Permissões.
2.	O Administrador seleciona "Perfis".
3.	O Administrador seleciona "Editar".
4.	O Administrador seleciona "-".
5.	O sistema confere se nenhum funcionário usa o perfil.
6.	O sistema pede a confirmação, e o Administrador confirma.
7.	O sistema desativa o perfil.
8.	O sistema registra a ação no histórico.
<br><br>
Fluxos alternativos:
-	A1. Perfil em uso: o sistema recusa e pede que os funcionários sejam reatribuídos antes.
-	A2. Perfil do Root: o sistema não permite.
-	A3. O Administrador cancela: nada é alterado.


## Planos
### UC 17 - Visualizar planos:
Resumo. Mostra os planos oferecidos pela empresa e os seus preços.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para ver planos.  
Regras: RF 06, RN44
<br><br>
Fluxo principal:
1.	O funcionário escolhe a aba de Planos.
2.	O sistema exibe a lista de planos, com a descrição e o preço de cada um.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A2. Nenhum plano cadastrado: o sistema exibe a lista vazia com um aviso.
 
### UC 18 - Filtrar planos:
Resumo. Restringe a lista de planos pelos critérios escolhidos. É opcional na consulta.  
Ator: Funcionário com permissão.  
Pré-condições: Funcionário autenticado com permissão.  
Regras: RNF 07.
Estende: UC17.
<br><br>
Fluxo principal:
1.	O funcionário informa os critérios do filtro.
2.	O sistema atualiza a lista, sem recarregar a página inteira.
3.	O funcionário pode limpar o filtro e voltar à lista completa.
<br><br>
Fluxos alternativos
-	A1. Nenhum plano atende ao filtro: o sistema exibe um aviso de lista vazia.
 
### UC 19 - Editar dados do plano:
Resumo. O funcionário com permissão altera o nome, a descrição e o preço de um plano. A mudança de preço segue as regras de desconto do plano anual e de vigência.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado, com permissão para alterar planos, e plano ativo.  
Regras: RF 06, RN19, RN44–48, RN52.
<br><br>
Fluxo principal:
1.	O Funcionário escolhe a aba Planos.
2.	O Funcionário seleciona "Editar".
3.	O Funcionário seleciona "Lápis".
4.	O Funcionário seleciona o plano a qual quer editar.
5.	Altera os dados e, se for o caso, o preço.
6.	Salva as alterações.
7.	O sistema valida o preço: maior que zero e, no plano anual, menor que 12 vezes o preço do mensal de mesma frequência.
8.	O sistema atualiza o plano.
9.	O sistema registra a alteração no histórico, com o valor antigo e o novo.
<br><br>
Fluxos alternativos:
-	A1. Preço inválido: o sistema recusa e informa a regra que não foi cumprida.
-	A2. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A3. Plano de cliente PJ: a alteração do valor depende da aprovação da empresa contratante, e sem aprovação vale o preço anterior.
-	A4. O funcionário cancela: nada é alterado.
 
 
### UC 20 - Cadastrar plano:
Resumo. O Administrador cria um novo plano.  
Ator: Administrador.  
Pré-condições: Autenticado como Administrador.  
Regras: RN44–46, RN52
<br><br>
Fluxo principal:
1.	O Administrador escolhe a aba de Planos.
2.	O Administrador seleciona "Editar".
3.	O Administrador seleciona "+".
4.	O Administrador Informa nome, descrição e preço.
5.	O sistema valida o preço.
6.	O sistema salva o plano.
7.	O sistema registra a criação no histórico.
<br><br>
Fluxos alternativos:
-	A1. Preço inválido: o sistema recusa e informa a regra que não foi cumprida.
-	A2. O Administrador cancela: nada é salvo.
 
 
### UC 21 · Desativar plano:
Resumo. O Administrador desativa um plano que não será mais oferecido. O registro permanece no banco, porque planos vinculados a clientes nunca são apagados.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador e plano ativo.  
Regras: RN50, RN31.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a aba de Planos.
2.	O Administrador seleciona "Editar".
3.	O Administrador seleciona "-".
4.	O sistema pede a confirmação, e o Administrador confirma.
5.	O sistema marca o plano como inativo, por exclusão lógica.
6.	O sistema registra a ação no histórico.
<br><br>
Fluxos alternativos:
-	A1. O Administrador cancela: nada é alterado.


## Produtos
### UC 22 - Visualizar produtos:
Resumo. Mostra os produtos oferecidos e os seus preços.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para ver produtos.  
Regras: RF 07, RN49
<br><br>
Fluxo principal
1.	O funcionário escolhe a aba Produtos.
2.	O sistema exibe a lista de produtos, com a descrição e o preço de cada um.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A2. Nenhum produto cadastrado: o sistema exibe a lista vazia.
 
 
### UC 23 - Filtrar produtos:
Resumo. Restringe a lista de produtos pelos critérios escolhidos. É opcional na consulta.  
Ator: Funcionário com permissão.  
Regras: RNF 07 · Estende: UC22.  
<br><br>
Fluxo principal:
1.	O funcionário seleciona os critérios do filtro.
2.	O sistema atualiza a lista, sem recarregar a página inteira.
3.	O funcionário pode limpar o filtro e voltar à lista completa.
<br><br>
Fluxos alternativos:
-	A1. Nenhum produto atende ao filtro: o sistema exibe um aviso de lista vazia.
 
 
### UC 24 - Editar dados do produto:
Resumo. O funcionário com permissão altera o nome, a descrição e o preço de um produto.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado, com permissão para alterar produtos, e produto ativo.  
Regras: RF 07, RN49, RN52.
<br><br>
Fluxo principal:
1.	O Funcionário escolhe a aba de Produtos.
2.	O Funcionário seleciona "Editar".
3.	O Funcionário seleciona "Lápis".
4.	Altera os dados.
5.	Salva as alterações.
6.	O sistema atualiza o produto.
7.	O sistema registra a alteração no histórico, com o valor antigo e o novo.
<br><br>
Fluxos alternativos:
-	A1. Preço inválido: o sistema recusa e informa o erro.
-	A2. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A3. O funcionário cancela: nada é alterado.
 
 
### UC 25 - Cadastrar produto:
Resumo. O Administrador cadastra um novo produto oferecido pela empresa.  
Ator: Administrador   
Pré-condições: autenticado como Administrador.  
Regras: RN49.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a aba de Produtos.
2.	O Administrador seleciona "Editar".
3.	O Administrador seleciona "+".
4.	Informa nome, descrição e preço.
5.	Confirma.
6.	O sistema confere se o preço é maior que zero.
7.	O sistema salva o produto.
8.	O sistema registra a criação no histórico.
<br><br>
Fluxos alternativos:
-	A1. Preço inválido: o sistema recusa e informa o erro.
-	A2. O Administrador cancela: nada é salvo.
 
 
### UC 26 - Inativar produto:
Resumo. O Administrador inativa um produto que não será mais oferecido. O registro permanece no banco.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador e produto ativo.  
Regras: RN50, RN31.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a aba de Produtos.
2.	O Administrador seleciona "Editar".
3.	O Administrador seleciona "-".
4.	O sistema pede a confirmação, e o Administrador confirma.
5.	O sistema marca o produto como inativo, por exclusão lógica.
6.	O sistema registra a ação no histórico.
<br><br>
Fluxos alternativos:
-	A1. O Administrador cancela: nada é alterado.
 
## Clientes
### UC 27 - Cadastrar cliente pelo sistema:
Resumo. O funcionário com permissão cadastra o cliente diretamente no sistema, para quem prefere falar com uma pessoa em vez de usar o site.  
Ator: Funcionário com permissão:   
Pré-condições: autenticado e com permissão para cadastrar clientes  
Regras: RF 01, RN01–10 · Inclui: UC04
<br><br>
Fluxo principal:
1.	O Funcionário escolhe a aba de Clientes.
2.	O Funcionário seleciona "Editar".
3.	O Funcionário seleciona "+".
4.	O Funcionário escolhe se é pessoa física ou jurídica.
5.	O sistema exibe o formulário correspondente.
6.	O funcionário preenche os dados junto com o cliente (pessoalmente ou por telefone), e escolhe o plano e o dia de coleta.
7.	O sistema valida os dados.
8.	Um link é enviado para o Email informado.
9.	A senha de acesso é definida e criptografada.
10.	O método de pagamento é informado e "cadastrado".
11.	O sistema salva o cliente.
12.	O sistema confirma o cadastro.
<br><br>
Fluxos alternativos:
-	A1. Dados inválidos: o sistema informa o erro e mantém o formulário preenchido.
-	A2. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A3. O funcionário cancela: nada é salvo.
 
 
### UC 28 - Visualizar clientes e seus planos:
Resumo. Mostra a lista de clientes e seus planos/informações pertinentes.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para ver clientes.  
Regras: RN26.
<br><br>
Fluxo principal:
1.	O Funcionário escolhe a aba de Clientes.
2.	O sistema exibe a lista, com o plano contratado, data de cadastro, data de renovação do plano.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A2. Nenhum cliente cadastrado: o sistema exibe a lista vazia com um aviso.
 
 
### UC 29 - Filtrar clientes:
Resumo. Restringe a lista de clientes pelos critérios escolhidos. É opcional na consulta.  
Ator: Funcionário com permissão.  
Pré-condições: lista de clientes aberta.  
Regras: RNF 07 · Estende: UC28.
Fluxo principal
<br><br>
1.	O funcionário informa os critérios do filtro.
2.	O sistema atualiza a lista, sem recarregar a página inteira.
3.	O funcionário pode limpar o filtro e voltar à lista completa.
<br><br>
Fluxos alternativos
-	A1. Nenhum cliente atende ao filtro: o sistema exibe a lista vazia.
 
### UC 30 - Inativar clientes:
Resumo. O Administrador marca como inativo um cliente que cancelou o contrato. O registro permanece no banco, para preservar a informação.  
Ator: Administrador.  
Pré-condições: autenticado como Administrador e cliente ativo.  
Regras: RF 04, RN30–36.
<br><br>
Fluxo principal:
1.	O Administrador escolhe a aba de Clientes.
2.	O Administrador seleciona "Editar".
3.	O Administrador seleciona "-".
4.	Informa o motivo, que é o cancelamento do contrato.
5.	O sistema pede a confirmação, e o Administrador confirma.
6.	O sistema marca o cliente como inativo, por exclusão lógica.
7.	Se o cliente é uma Matriz, o sistema inativa também todas as suas filiais.
8.	O sistema cancela as coletas futuras .
9.	O sistema registra a ação no histórico.
<br><br>
Fluxos alternativos:
-	A1. O Administrador cancela: nada é alterado.
 
 
## Perfil do usuário
### UC 31 - Visualizar perfil:
Resumo. O usuário vê os seus próprios dados cadastrais. Os campos bloqueados aparecem somente para leitura.  
Ator: Usuário.  
Pré-condições: autenticado.  
Regras: RF 03, RN26.
<br><br>
Fluxo principal
1.	O usuário escolhe Meu perfil.
2.	O sistema exibe os dados do usuário.
<br><br>
Fluxos alternativos
-	Não tem.
 
 
### UC 32 - Alterar dados cadastrais:
Resumo. O usuário altera os dados do próprio perfil que o sistema libera para o seu tipo.  
Ator: Usuário.  
Pré-condições: autenticado.  
Regras: RF 03, RN25–29.
Fluxo principal:
1.	O usuário abre o perfil e escolhe Editar.
2.	O sistema libera os campos do seu tipo: nome, foto, telefone, endereço e e-mail para pessoas, e nome fantasia, foto ou logo, telefone, endereço e e-mail para empresas.
3.	O usuário altera os dados e salva.
4.	O sistema valida os dados, mantendo o e-mail únco e a foto em JPG ou PNG com até 2 MB.
5.	O sistema atualiza o perfil, sem exibir a alteração no histórico.
 
Fluxos alternativos:
-	A1. E-mail já cadastrado ou dado inválido: o sistema informa o erro e não salva.
-	A2. Campo bloqueado: o sistema não permite a edição.
-	A3. O usuário cancela: nada é alterado.
 
 
### UC 33 - Alterar senha:
Resumo. O usuário troca a própria senha.  
Ator: Usuário.  
Pré-condições: autenticado.   
Regras: RF 03, RN10.
<br><br>
Fluxo principal:
1.	O usuário escolhe Alterar senha.
2.	Informa a senha atual e a nova senha.
3.	O sistema confere a senha atual e se a nova segue o padrão.
4.	O sistema criptografa e salva a nova senha.
5.	O sistema confirma a troca.
<br><br>
Fluxos alternativos:
-	A1. Senha atual incorreta: o sistema recusa a troca.
-	A2. Nova senha fora do padrão: o sistema recusa e pede outra.
-	A3. O usuário cancela: nada é alterado.
 
 
### UC 34 - Alterar preferências:
Resumo. O usuário escolhe suas preferências e o sistema guarda a escolha no perfil.  
Ator: Usuário.  
Pré-condições: autenticado.  
Regras: RNF 04, RNF 08.
<br><br>
Fluxo principal:
1.	O usuário abre as configurações.
2.	O Usuário altera duas preferências sobre o sistema.
3.	O sistema aplica a escolha na hora.
4.	O sistema salva as preferências no perfil do usuário.
<br><br>
Fluxos alternativos:
-	A1. O usuário desfaz a escolha: o sistema volta à preferência anterior.


## Notificações
### UC 35 - Gerar notificações:
Resumo. O sistema cria avisos para um ou vários usuários quando acontece algo relevante.  
Ator: Sistema.  
Pré-condições: ocorrência de um evento que gera aviso.  
Regras: RF 13, RN74, RN76.
<br><br>
Fluxo principal:
1.	Um evento no sistema dispara a geração da notificação.
2.	O sistema monta a notificação: nome, data de criação, origem (sistema financeiro ou logístico) e conteúdo.
3.	O sistema define o destinatário, que pode ser um ou vários usuários.
4.	O sistema salva a notificação como não lida.
<br><br>
Fluxos alternativos
-	A1. Destinatário inativo: o sistema não entrega a notificação. 
 
 
### UC 36 - Visualizar notificações:
Resumo. O usuário vê as suas notificações, com as não lidas em destaque.  
Ator: Usuário.  
Pré-condições: autenticado.   
Regras: RF 13, RN74.
<br><br>
Fluxo principal:
1.	O usuário clica nas Notificações.
2.	O sistema exibe a lista, com nome, data e origem, e destaca as não lidas.
3.	O usuário pode abrir uma notificação para ver o conteúdo.
<br><br>
Fluxos alternativos:
-	A1. Nenhuma notificação: o sistema exibe um aviso de lista vazia e o ícone fica vazio.
 
 
### UC 37 - Marcar notificação como lida:
Resumo. O usuário visualiza uma notificação e ela é marcada como lida.  
Ator: Usuário.  
Pré-condições: autenticado e com uma notificação não lida.   
Regras: RN75.
<br><br>
Fluxo principal:
1.	O usuário abre a notificação.
2.	O sistema registra a data de leitura.
3.	O sistema passa a exibir a notificação como lida, sem apagá-la.
<br><br>
Fluxos alternativos
-	A1. Notificação já lida: não acontece nada.


## Histórico
### UC 38 - Registrar ação no histórico:
Resumo. Sempre que dados são criados, alterados ou inativados, o sistema grava um registro no histórico que ninguém consegue editar ou apagar.  
Ator: Sistema, acionado por outros casos de uso.  
Pré-condições: ação concluída em outro caso de uso.  
Regras: RF 09, RN29, RN64–68.
<br><br>
Fluxo principal:
1.	Outro caso de uso conclui uma criação, alteração, inativação ou mudança de status.
2.	O sistema monta o registro: data e hora, descrição, o que foi alterado, valor antigo e valor novo.
3.	O sistema identifica o autor: nome e cargo do funcionário, guardados como texto no momento da ação. Para um cliente, o nome e o tipo Cliente. Para ações automáticas, Sistema.
4.	O sistema grava o registro.
<br><br>
Fluxos alternativos:
-	A1. Alteração de dado pessoal: o dado não é exibido no histórico.
-	A2. Falha ao gravar o registro: o sistema desfaz a ação original.
 
 
### UC 39 - Visualizar histórico:
Resumo. O funcionário com permissão consulta os registros do histórico, sem poder alterá-los.  
Ator: Funcionário com permissão.  
Pré-condições: autenticado e com permissão para consultar o histórico.  
Regras: RF 09, RN64–70.
<br><br>
Fluxo principal:
1.	O funcionário escolhe a aba Histórico.
2.	O sistema exibe os registros, dos mais recentes aos mais antigos, com todos os campos.
3.	O funcionário pode filtrar por período ou exportar.
<br><br>
Fluxos alternativos:
-	A1. Sem permissão: o sistema nega o acesso e informa o usuário.
-	A2. Nenhum registro: o sistema exibe um aviso de lista vazia.
 
 
### UC 40 - Filtrar dados do histórico:
Resumo. Restringe a lista do histórico a um período. O filtro só muda a visualização.  
Ator: Funcionário com permissão.  
Regras: RN69, RNF 07 · Estende: UC39.
<br><br>
Fluxo principal:
1.	O funcionário escolhe o período no filtro.
2.	O sistema atualiza a lista, sem recarregar a página inteira.
3.	Os registros em si não são alterados.
<br><br>
Fluxos alternativos:
-	A1. Nenhum registro no período: o sistema exibe um aviso de lista vazia.
 
 
### UC 41 - Exportar histórico:
Resumo. O funcionário com permissão gera um arquivo com os registros do histórico.   
Ator: Funcionário com permissão · Pré-condições: permissão para acessar o histórico.  
Regras: RN64.
<br><br>
Fluxo principal:
1.	O Funcionário escolhe a aba do Histórico.
2.	O Funcionário seleciona "Exportar".
3.	Escolhe o formato do arquivo.
4.	O sistema gera o arquivo com os registros exibidos, respeitando o filtro atual.
5.	O funcionário baixa o arquivo.
<br><br>
Fluxos alternativos:
-	A1. Nenhum registro para exportar: o sistema informa e não gera o arquivo.
-	A2. Sem permissão: o sistema nega o acesso e informa o usuário.

## 2.5- Imagem dos Diagramas de Casos de Uso
Imagem 01 - Diagrama "Visão Geral"
<img width="1592" height="889" alt="Visão Geral" src="https://github.com/user-attachments/assets/ae1c7b03-5a7a-4646-8774-c95966d2442c" />

Fonte: Autores.
<br><br><br>
Imagem 02 - Diagrama "Acesso ao Sistema"
<img width="1108" height="793" alt="Acesso ao Sistema" src="https://github.com/user-attachments/assets/8abca515-9d5c-4636-9191-365448d27a92" />

Fonte: Autores
<br><br><br>
Imagem 03 - Diagrama "Funcionários"
<img width="1168" height="716" alt="Funcionarios" src="https://github.com/user-attachments/assets/b92edf03-3464-44ef-84e5-0197c7b0cf1f" />

Fonte: Autores
<br><br><br>
Imagem 04 - Diagrama "Perfil e Permissões"
<img width="801" height="596" alt="Perfil do Usuário" src="https://github.com/user-attachments/assets/2fd47419-16f7-472c-abaa-9fdcd4e25e19" />

Fonte: Autores
<br><br><br>
Imagem 05 - Diagrama "Planos"
<img width="1152" height="668" alt="Planos" src="https://github.com/user-attachments/assets/d620ea5a-d7a4-4e25-ae36-6ff107063148" />

Fonte: Autores
<br><br><br>
Imagem 06 - Diagrama "Produtos"
<img width="1110" height="674" alt="Produtos" src="https://github.com/user-attachments/assets/9c34e677-270f-4975-b699-a4beb2500da2" />

Fonte: Autores
<br><br><br>
Imagem 07 - Diagrama "Clientes"
<img width="1289" height="666" alt="Clientes" src="https://github.com/user-attachments/assets/be4b57c5-1aea-4581-aea7-3d2bc13c4184" />

Fonte: Autores
<br><br><br>
Imagem 08 - Diagrama "Perfil do Usuário"
<img width="801" height="596" alt="Perfil do Usuário" src="https://github.com/user-attachments/assets/725f32e7-1e61-455f-a6f5-bf5766643f0d" />

Fonte: Autores
<br><br><br>
Imagem 09 - Diagrama "Notificações"
<img width="880" height="666" alt="Notificacoes" src="https://github.com/user-attachments/assets/e822c64f-83da-4a29-9a80-6b16b5fe0e1e" />

Fonte: Autores
<br><br><br>
Imagem 10 - "Histórico"
<img width="921" height="666" alt="Historico" src="https://github.com/user-attachments/assets/8c7995b6-a87f-465c-8a7d-b573d8e5c20b" />

Fonte: Autores

# 3-Regras-de-Negocios
## 3.1- Regras de Negócios
### 3.1.1- Tipos de usuário e cadastro (RF 01)
- RN 01 Existem quatro tipos de usuário: Funcionário, Cliente Pessoa Física, Cliente Pessoa Jurídica e Administrador Root.
- RN 02 O Administrador Root é criado somente direto no banco de dados. Nenhuma tela o edita ou inativa.
- RN 03 CPF e CNPJ devem ser válidos (dígitos verificadores) e únicos no sistema. 
- RN 04 O e-mail é único entre todos os usuários, pois também serve de login.
- RN 05 Os dados listados como necessários no RF 01 são obrigatórios para cada tipo de usuário. Complemento e ponto de referência são opcionais.
- RN 06 A foto (ou logo) é em formatos PNG ou JPG de até 2MB. Caso não inserida, será colocado a imagem de um usuário padrão.
- RN 07 Um usuário pode ter mais de um telefone e mais de um endereço, mas o cadastro exige ao menos um de cada.
- RN 08 Cliente PJ do tipo Filial só é cadastrado vinculado a uma Matriz já existente. Matriz não informa matriz, e uma filial não pode ser matriz de outra.
- RN 09 Somente o Administrador cadastra funcionários.
- RN 10 A senha segue requisitos mínimos (8 caracteres, com letra e número) e é sempre armazenada criptografada, nunca em texto puro (RNF 06).

### 3.1.2- Assinatura, titular e membros
- RN 11 Todo cliente, pessoa física ou empresa, possui uma assinatura de um plano.
- RN 12 Cada assinatura tem exatamente um titular, que é o administrador da conta.
- RN 13 Outras pessoas da mesma casa ou empresa entram como membros: têm acesso próprio, sem pagar um plano novo. Uma casa ou empresa paga uma assinatura só.
- RN 14 Cada usuário pertence a uma única assinatura.
- RN 15 Só o titular altera o plano, o endereço de coleta e cancela a assinatura. Os membros consultam a agenda, confirmam coletas e recebem notificações.
- RN 16 O titular adiciona e remove membros. (Pensar Melhor)
- RN 17 O titular só pode ser inativado ou substituído depois de transferir a titularidade a um membro (pelo próprio titular ou pelo Administrador).
- RN 18 Cancelar o contrato inativa a assinatura e o acesso de todos os membros.
- RN 19 A assinatura registra a data de início e o preço contratado no momento. Se o preço for alterado, o novo preço só será aplicado na renovação (mensal ou anual).
- RN 20 O plano mensal dura 1 mês e o anual dura 12 meses, contados da data de início.

### 3.1.3- Login (RF 02)
- RN 21 O login usa CPF/CNPJ ou e-mail, mais a senha.
- RN 22 Usuário não cadastrado ou inativo não acessa o sistema.
- RN 23 A mensagem de erro é genérica, sem revelar se o usuário ou a senha estava errado.

### 3.1.4- Perfil (RF 03)
- RN 24 O usuário edita apenas os campos liberados para o seu tipo: Pessoas (nome, foto, telefone, endereço, e-mail, senha) e Empresas (nome fantasia, foto/logo, telefone, endereço, e-mail, senha).
- RN 25 CPF/CNPJ, Inscrição Estadual, Plano Contratado e Razão Social são somente leitura. Alteração à pensar.
- RN 26 O cargo do funcionário só é alterado por quem tem permissão para isso.
- RN 27 E-mail alterado continua obedecendo à unicidade da RN04.
- RN 28 Toda alteração de perfil gera registro no histórico, sem mostrar dados sensíveis (Número do Cpf, Senha, Telefone).

### 3.1.5- Inativação de usuários (RF 04)
- RN 29 Somente o Administrador (ou perfil com permissão) inativa usuários.
- RN 30 Inativar é exclusão lógica: o registro permanece no banco, marcado como inativo, para preservar a informação.
- RN 31 Funcionário é inativado por desligamento, e cliente por cancelamento de contrato. O motivo é registrado.
- RN 32 Usuário inativo não acessa o sistema e não aparece nas listas de trabalho, mas continua aparecendo nas consultas ao histórico.
- RN 33 CPF/CNPJ e e-mail de inativos continuam reservados para possível recadastro do mesmo cliente.
- RN 34 Caso uma Empresa Matriz seja inativada, todas as Filiais a seguem.
- RN 35 Coletas futuras de uma assinatura inativada são canceladas.

### 3.1.6- Perfis e permissões
- RN 35 Cada funcionário tem um perfil (cargo), e cada perfil tem um conjunto de permissões. O funcionário só executa o que o seu perfil permite.
- RN 36 O Administrador cria, edita e desativa perfis e escolhe as permissões de cada um.
- RN 37 Permissões são distribuídas por quem possui a permissão de "distribuir permissões". E nenhuma permissão distribuída pode ser "maior" que as pertencentes ao funcionário.
- RN 38 O perfil do Root não pode ser editado nem removido por ele. Tendo que ser alterado diretamente no banco de dados pelos devs.
- RN 39 Perfil em uso por algum funcionário não pode ser removido antes de reatribuir essas pessoas.
- RN 40 Alterar um perfil ou suas permissões gera registro no histórico.

### 3.1.7- Planos e produtos (RF 06 e RF 07)
- RN 41 Existem quatro planos: Anual Semanal, Anual Quinzenal, Mensal Semanal e Mensal Quinzenal.
- RN 42 Só quem tem permissão altera preços, e o preço deve ser maior que zero.
- RN 43 O preço do plano anual deve ser menor que 12 vezes o preço do mensal de mesma frequência. É o desconto do plano anual.
- RN 44 O novo preço vale para novas contratações e renovações, sem alterar contratos em andamento (sugestão).
- RN 45 Para cliente PJ, a alteração do valor do plano depende da aprovação da empresa contratante. Sem aprovação, vale o preço anterior. Prazo e forma da aprovação na Parte C.
- RN 46 Os produtos oferecidos são Adubo Orgânico e Fertilizante. O preço deve ser maior que zero, e só quem tem permissão o altera.
- RN 47 Planos e produtos com assinaturas ou vendas associadas nunca são apagados, apenas inativados.
- RN 48 Cada item de venda guarda o valor do produto no momento da venda, e o valor total é a soma de quantidade × valor dos itens.
- RN 49 Toda alteração de preço gera registro no histórico.

### 3.1.8- Agenda e coletas (RF 05)
- RN 50 Toda coleta pertence a uma assinatura, e não a um usuário individual, para que uma casa ou empresa não tenha coletas duplicadas.
- RN 51 Cada coleta tem um status: Agendada, Coletada, Cancelada (o cliente cancelou), Faltada (o cliente não compareceu) ou Não realizada (a empresa não coletou).
- RN 52 A frequência segue o plano: semanal a cada 7 dias e quinzenal a cada 14.
- RN 53 O dia da coleta é escolhido pelo cliente ao se cadastrar.
- RN 54 A agenda exibe calendário, dia atual, dias coletados, cancelados e faltados, e os clientes agendados para cada dia.
- RN 55 Só quem tem permissão altera o status de uma coleta (coletador). Cancelamentos são feitos automaticamente pelo sistema.
- RN 56 Toda mudança de status gera registro no histórico. (à pensar).

### 3.1.9- Esqueceu a senha (RF 08)
- RN 57 A troca de senha exige confirmação por link enviado ao e-mail cadastrado.
- RN 58 O link vale por tempo limitado e só pode ser usado uma vez (Tempo de Uma Hora).
- RN 59 A nova senha não pode ser igual à anterior. A checagem compara a senha nova com o hash atual, e não dois hashes entre si.
- RN 60 A resposta é a mesma exista o e-mail ou não, para não revelar quem é cadastrado.

### 3.1.10- Histórico imutável (RF 09)
- RN 61 O histórico só recebe inserções. Ninguém edita ou exclui um registro, nem o Root, e o banco reforça isso com permissões de apenas inserir e consultar.
- RN 62 Cada registro guarda data e hora, descrição, o que foi alterado, valor antigo, valor novo e o autor com nome e cargo.
- RN 63 O nome e o cargo do autor são guardados como texto no momento da ação, para não mudarem se o cargo for renomeado depois. Quando o autor é um cliente, registra-se o nome dele e o tipo Cliente.
- RN 64 Ações automáticas do sistema aparecem com o autor "Sistema".
- RN 65 Criação, alteração, inativação e mudança de status geram registro.
- RN 66 O filtro por período (Hoje, Esta Semana, Este Mês, Este Ano, 5 Anos, Total) só muda a visualização.
- RN 67 O histórico é compartilhado com a parte de Logística, e campos adicionais serão definidos depois.

### 3.1.11- Pesquisa, edição de tabelas e notificações (RF 11, 12 e 13)
- RN 68 A pesquisa respeita as permissões: cada usuário só encontra o que tem direito de ver, e o cliente só vê dados da própria assinatura.
- RN 69 O botão de edição aparece só em tabelas editáveis e só para quem tem permissão. Remover um registro significa inativá-lo.
- RN 70 Toda edição salva gera registro no histórico.
- RN 71 A notificação tem nome, data de criação, origem (sistema financeiro ou logístico), conteúdo e marca de lida ou não lida.
- RN 72 Sem data de leitura, a notificação está não lida. Marcá-la como lida não a apaga.
- RN 73 Notificações são geradas pelo sistema para os usuários. Mudança de preço para clientes PJ são discutidas por fora.


## 3.1-Modelo de Negócio Canvas

### 3.1.1-Parcerias Chaves

Segmento destinado a definir quais serão os parceiros comerciais que irão apoiar as operações, como fornecedores ou alianças estratégicas. 

- Fatec – Jahu
- Húmus – Compostagem

 
### 3.1.2-Parcerias Chave
Segmento destinado a definir quais serão as atividades essenciais e indispensável para criar, entregar e operar sua proposta de valor corretamente.
 
-	Desenvolvimento do Frontend da aplicação.
-	Desenvolvimento do Backend da aplicação.
-	Modelagem do Banco de Dados da Aplicação.
-	Criação da Landpage do site.


### 3.1.3-Recursos Chaves
Segmento destinado a definir quais serão os ativos/ferramentas essenciais e indispensável para criar, entregar e operar sua proposta de valor corretamente.
 
- Máquinas para desenvolvimento e testes.
- Sistema de Gerenciamento de Tarefas.


### 3.1.4-Proposta de Valor
Segmento destinado a definir quais serão os benefícios exclusivos e o valor que sua empresa oferece aos clientes e beneficiários.
 
-	Criar um sistema que ajude a empresa Húmus-Compostagem a realizar seu trabalho com mais eficiência.
-	Desenvolver uma interface de cadastro/visualização de Clientes e Funcionários para o controle de pessoas atreladas a empresa.
-	Desenvolver um sistema de Agenda para mostrar ao usuário datas importantes para o serviço.
-	Desenvolver um sistema totalmente personalidade para a Húmus-Compostagem. 

 
### 3.1.5-Relacionamento
Segmento destinado a definir como irá funcionar a interação e o desenvolvimento da comunicação com o cliente.
 
- CRM (Customer Relationship Management) 
-	Suporte Técnico
-	Manutenção


### 3.1.6-Canais
Segmento destinado a definir como irá alcançar e entregar sua proposta de valor aos segmentos do público-alvo. 

-	Instagram da Empresa.
-	Site da Húmus-Compostagem.
-	Clientes da Empresa.
-	Funcionários da Empresa.


### 3.1.7-Segmento de Mercado
Segmento destinado a definir quais serão os grupos ou comunidades que irão se beneficiar com o produto e serviços desenvolvido.
 
-	Empresa de Compostos de Resíduos Orgânicos.


### 3.1.8-Estrutura de Custo
Segmento destinado a definir a composição de todas as despesas que uma empresa passa para operar, produzir e entregar seus produtos ou serviços. 

-	Hospedagem em Nuvem.
-	Compra de Domínio Web.
-	Certificação de Proteção Web.


### 3.1.9-Fonte de Receita
Segmento destinado a definir quais serão os diferentes meios que a empresa irá gerar dinheiro a partir dos seus produtos e serviços, ou seja, como ela captura valor.
 
- Planos e produtos vendidos pela empresa parceira.


## 3.2-Imagem do Modelo Canvas
Imagem 11 - Modelo de Negócios Canvas
<img width="1920" height="1080" alt="Navy Blue and White Friendly Rounded Business Model Canvas Brainstorm" src="https://github.com/user-attachments/assets/4f023bfc-9f22-46de-a01b-9e4a227bb9d3" />
Fonte: Autores


# 4-Estudo-de-Viabilidade

## 4.1-Viabilidade de Mercado

### 4.1.1-Condicionantes de Futuro e Potencialidades
A Húmus-Compostagem consiste numa empresa de pequeno porte que  já tem alguns clientes, com as decisões certas para divulgar a ideia e  conscientizar as pessoas sobre sua importância ela pode crescer. Existe  possibilidade de parcerias com ONGS ambientais ou empresas/instituições  governamentais.

### 4.1.2-Público Alvo
Pessoas que tem o interesse em investir para contribuir com a ecologia  e com o descarte ideal do lixo orgânico, empresas no geral.


## 4.2-Viabilidade Técnica
 A equipe de desenvolvimento tem acesso aos computadores da faculdade para realizar o progresso do projeto, alguns notebooks pessoais e assistência dos professores para dúvidas e estamos adquirindo o conhecimento para realizar o avanço do projeto ao longo do tempo.

## 4.3-Viabilidade Financeira
 A empresa Húmus-Compostagem já possui uma fonte de renda adquirida pela assinatura mensal, porém com a expansão de clientes e com a melhora na logística de transporte e comunicação com os clientes advinda do nosso desenvolvimento do projeto a tendencia é aumentar; além das outras fontes de renda que serão implantadas como as taxas de multas e possíveis parcerias. 
 Já que estamos fazendo o projeto para adquirir experiência não temos custos de salário das pessoas, e por enquanto nenhum custo técnico como custo de hospedagem/manutenção. 

## 4.4-Viabilidade Operacional
 O desenvolvimento do projeto proporcionará melhorias realistas ao longo do tempo, fornecendo uma melhora para um dos problemas no negócio do cliente desde o começo por meio da integração ao WhatsApp e E-mail, proporcionando melhora na comunicação; depois sistemas de agendamento, multa para confirmações falsas, integração com outros softwares, GPS em tempo real e ajuda na gestão financeira.

## 4.5-Conclusão
Devido a reais possibilidades de crescimento da empresa, pelo desenvolvimento técnico que será adquirido ao decorrer do projeto, pela disponibilidade de maquinas para trabalhar e por bom planejamento, ideias para implementar no site e resolver dificuldades no negócio da Húmus-Compostagem avaliamos que esse projeto é viável para desenvolvimento. 



# 5-Design
## 5.1 - Paletas de Cores
<img width="1373" height="733" alt="Paleta_Home (1)" src="https://github.com/user-attachments/assets/3d603838-bfea-41af-bf14-84f8fcf5e936" />
<img width="1372" height="733" alt="Paleta_ADM (1)" src="https://github.com/user-attachments/assets/bd6ef762-11ba-4b1a-9280-aa5f89affedd" />

## 5.2-Tipografia
. Freestyle Script
. Science Gothic
. Gilroy
. AnonymousPro

## 5.3-Logo

<img width="837" height="195" alt="Captura de tela 2026-05-13 235249" src="https://github.com/user-attachments/assets/fd80f934-2652-4a40-b53e-dfb785d454b7" />

 

## 5.4-Wireframe

### 5.4.1-Pagina Inicial (Dark)
<img width="1448" height="5128" alt="Main Page Dark" src="https://github.com/user-attachments/assets/9f5945a5-a0c9-4689-a08f-f4a569c9bd17" />

### 5.4.2-Modelo Página ADM(Dark)
<img width="1440" height="1024" alt="Manager Page Dark (Dashboards)" src="https://github.com/user-attachments/assets/f7607594-1ff9-42a2-abb6-cf64f6452b35" />

## 5.5-Modelo de Navegação

### 5.5.1-Navegação Geral

<img width="1440" height="752" alt="Captura de tela 2026-05-13 234846" src="https://github.com/user-attachments/assets/1190a550-f962-4398-b932-c61512366504" />

### 5.5.2-Navegação Sistema Financeiro
<img width="2323" height="1154" alt="Nav" src="https://github.com/user-attachments/assets/f3d0e2bf-d461-445e-9672-7e04aa2868d9" />




# 6-Protótipo

## 6.1-Pagina Principal (Dark)
<img width="1920" height="1200" alt="Captura de tela 2026-06-03 233053" src="https://github.com/user-attachments/assets/fb66c9a6-e27c-4de1-adf3-01c7d7fba0ff" />
<img width="1920" height="1200" alt="Captura de tela 2026-06-03 233108" src="https://github.com/user-attachments/assets/06c5feeb-ffb7-42b6-974f-de897a3a0b18" />


## 6.2-Pagina ADM Receitas (Dark)
<img width="1920" height="1200" alt="Captura de tela 2026-06-03 233229" src="https://github.com/user-attachments/assets/d6532504-3986-47f0-a0b8-2f80ba64e992" />

## 6.3-Página ADM Receitas( (Light)
<img width="1920" height="1200" alt="Captura de tela 2026-06-03 233334" src="https://github.com/user-attachments/assets/1dda95e0-78dc-41c4-9844-e7245d46be62" />


## 6.4-Link Do Figma
 https://www.figma.com/design/IBaVFkxqLwspxBMtnUBCyK/H%C3%BAmus_Prototype?node-id=0-1&t=JqQmjEeGkf0BhI6R-1




# 7-Aplicação
O processo começou com a criação da Navbar e Sideber como um template.
<img width="1920" height="1200" alt="Captura de tela 2026-06-07 213037" src="https://github.com/user-attachments/assets/3560eef8-d6b8-4641-a4a9-f9896b9e06a0" />
Após isso foram sendo adicionados as  “funcionalidades” de cada página.
Cada pessoa do grupo foi responsável por algumas páginas. E, dessa forma, fomos montando o sistema.
Por exemplo, cada página listada foi feita por um membro do grupo.
Lucas: (Index/Ajuste de Preço/Receita)
Manuela: (Cadastro de Empresa [1,2,3,5])
João: (Histórico/Contas a Pagar)
Kawam: (Cadastro de Pessoas [1,2,3])
Ryan: (Multas/Fluxo de Caixa/Dashboards)
Leandro: (Login/Relatório Diário)



Index – Feito por Lucas
"<img width="1920" height="1200" alt="Captura de tela 2026-06-07 213257" src="https://github.com/user-attachments/assets/557c6a11-6b06-4b46-bf47-394867f28a3c" />


Login – Feito por Leandro
<img width="1920" height="1200" alt="Captura de tela 2026-06-07 213314" src="https://github.com/user-attachments/assets/8460e9cc-4bf6-4c86-b900-7d6ebdbf1e64" />


 
Cadastro de Pessoa – Feito por Kawam
<img width="1920" height="1200" alt="Captura de tela 2026-06-07 230323" src="https://github.com/user-attachments/assets/5428f141-7d68-432f-a83c-ab4c91ef8cdc" />



Cadastro de Empresa – Feito por Manuela
<img width="1920" height="1200" alt="Captura de tela 2026-06-07 230401" src="https://github.com/user-attachments/assets/ff9d7100-55b3-4646-82cc-e34e437b7185" />



Histórico – Feito por João
<img width="1920" height="1200" alt="Captura de tela 2026-06-07 230832" src="https://github.com/user-attachments/assets/6a719a64-8f9d-40a2-8bb7-90922577826d" />



Fluxo de Caixa – Feito por Ryan
<img width="1920" height="1200" alt="Captura de tela 2026-06-07 230859" src="https://github.com/user-attachments/assets/ac91a3a9-2736-4b67-8f36-755305063b02" />



# 8-Considerações-Finais

Estamos trabalhando ativamente nesse sistema desde o dia do Hackaton, (25/03/2026). Entretanto, depois de muita pesquisa, finalmente começamos o Design no Figma. Um trabalho árduo e cansativo, que levou duas semanas e meia para ser "finalizado.

No Figma desenvolvemos todas as páginas da aplicação Financeira, além de algumas páginas do Sistema de Cliente (que não é o foco desse P.I.) e algumas extras que terão na versão completa (Página de Configurações e Edição de Perfil). 

Eu, Lucas, em nome de todos, acredito que a maior dificuldade que todo o grupo enfrentou, foi a divisão de tarefas. Cada pessoa trabalhou em uma coisa, algumas mais do que outras. No final, para juntar tudo em um único sistema funcional foi trabalhoso. Muitas e muitas linhas de código, várias com conflitos e diferenças mínimas que quebravam todo o sistema, sendo necessário uma verificação manual de todo o código.
A documentação em si foi feita de forma tranquila, cada um ajudando a sua maneira.
A apresentação foi feita de forma tranquila também, com pouca necessidade de alteração.
Tirando isso, a maior dificuldade foi o tempo. O trabalho que nós pegamos e que gostaríamos de ter desenvolvido demanda muito tempo, o que nós não tínhamos. Por isso fomos diminuindo o escopo até ficarmos focado no Sistema Financeiro. E mesmo assim é uma aplicação não funcional.

Acredito que, em nome de todos do Grupo 1 (Aether V), nós iremos nos dedicar muito mais no próximo semestre, para conseguirmos concluir esse sistema de forma espetacular.





# Referências-Bibliográficas

Ícones -
.	https://icons.getbootstrap.com/
.	https://www.flaticon.com/

Imagens -
.	Húmus Compostagem 
.	https://gemini.google.com/

Fontes Tipográficas -
. https://www.dafontfree.io/
.	https://fonts.google.com/

Sistemas Inspirados - 
.	https://www.nationalparks.org/?utm_source=tailwindcss
.	https://www.mintlify.com/?utm_source=tailwindcss
.	https://pt.ubunlog.com/interface-da-web-de-cockpit-para-servidores-ubuntu-20-04/

Ferramentas Utilizadas -
.	https://www.figma.com 
.	https://code.visualstudio.com  
·	https://github.com 

