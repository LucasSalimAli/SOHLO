PI - Template Documentação Git

<p align=left style=font-size:28px> <strong> <em> Documentação do
PI </em> </strong> </p>
<details>
<summary><strong>Sumário</strong></summary>

- [1. Introdução](#1-introdução)
- [1.1 Objetivos](#-objetivos)
- [1.2Metodologia](#-metodologia)
- [2. Requisitos](#2-requisitos)
- [2.1 Requisitos funcionais](#-requisitos-funcionais)
- [2.2 Requisitos não funcionais](#-requisitos-não-funcionais)
- [3. Modelo de casos de uso](#3-modelo-de-casos-de-uso)
- [4. Modelo do banco de dados](#4-modelo-do-banco-de-dados)
- [5. Banco de dados](#5-banco-de-dados)
- [6. Diagrama de classes](#6-diagrama-de-classes)
- [7. Estudo de viabilidade](#7-estudo-de-viabilidade)
- [8. Regras de negócio (Modelo canvas)](#8-regras-de-negócio-modelo-canvas)
- [9. Design](#9-design)
- [10. Protótipo](#10-protótipo)
- [11. Aplicação](#11-aplicação)

</details>

Para cada semestre, do 1º ao 6º, iremos utilizar este template para documentar o PI -
incrementalmente.

# 1 - Introdução
    O Maior problema que a Húmus-Compostagem enfrenta agora é a falta de um sistema para o auxilio organizacional. Atualmente a Húmus sofre com problemas para organizar as coletas de resíduos (confirmação de presença no dia da coleta) e gerenciamento financeiro.


## 1.1 - Objetivos

### 1.1.1 - Objetivo Geral
  O Objetivo é a criação de um sistema para a Húmus, de forma que, com  isso, a empresa consiga um melhor gerenciamento de tempo e recursos, além  de automatizar tarefas repetitivas e demoradas. Com, no futuro, um sistema  completo integrando empresa e clientes.

### 1.1.2 - Objetivo Específico
    O objetivo desse P.I. do primeiro semestre, é a realização de um site  estático com o intuito de apresentar ao cliente a ideia/proposta do que o sistema  irá se tornar no futuro. Por hora, as funcionalidades do sistema não serão  implementadas, e o sistema será focado na seção Financeira



# 2 - Requisitos
    Um documento de requisitos é a parte da documentação onde se esclarece o que o sistema deve ou não fazer; Suas funcionalidades, comportamentos e restrições. Os Requisitos são “instruções” claras, consistentes e não podem ser ambíguas. Dessa forma garantido o pleno entendimento do que o cliente espera que seja desenvolvido.


## 2.1 - Histórias dos Usuários
Acompanhamento de Impacto:
Como – Cliente da Húmus - Eu quero - Visualizar um painel com a quantidade de resíduos que já desviei do aterro sanitário - Para que - Eu possa enxergar minha contribuição ambiental.

Registro de Qualidade:
Como - Coletor da Húmus - Eu quero - Registrar se o resíduo estava contaminado (plásticos, metais) - Para que - O sistema gere um alerta  de reeducação para o cliente

Rotas:
Como - Motorista da Húmus - Eu quero – Poder acessar uma lista otimizada de endereços para coleta no dia -  Para que - Eu economize combustível e tempo na rota.

Agendamento:
Como - Cliente da Húmus-  Eu quero poder - Acessar a agenda- Para que – Eu possa verificar os dias de coleta.

Atraso da Empresa:
Como - Cliente da Húmus - Quero poder - Receber notificações de alerta - Para poder - Acompanhar os dias de atraso de contrato.

Alerta de Multa:
Como – Funcionário da Húmus - Quero poder - Enviar alertas de multa -  Para que - Eu possa notificar certos cientes que não compareceram na data da coleta.

Alerta de Confirmação: 
Como – Funcionário da Húmus – Quero Poder – Enviar alertas de confirmação – Para que – O cliente possa confirmar que estará presente no dia da coleta.


## 2.2 - Requisitos funcionais
RF1 – Cadastrar usuário
O sistema deve permitir o cadastro de usuários com os atributos: e-mail, nome usuário, senha, tipo de usuário(empresa ou pessoa), endereço(rua, cidade, bairro, CEP, logradouro, ponto de referência, complementos).

RF2 – Realizar login no sistema
O sistema deve permitir o Login de usuários cadastrados no sistema, e barrar o acesso de usuários não cadastrados.

RF3 – Editar perfil
O sistema deve permitir a alteração do perfil do usuário, com relação as suas informações pessoais. 

RF4 – Integrar o Sistema com  E-mail 
O Sistema deverá ser capaz de enviar e-mails aos usuários(gestores e clientes). Por hora será utilizado o e-mail para notificações e armazenamento de cadastros para a Húmus.

RF5 – Integrar o Sistema com Agendas Online 
O sistema deverá ser integrado com sistemas de agendas online(Google Agenda) 

RF6 – Integrar com o WhatsApp
O sistema deverá ser integrado ao WhatsApp para o contato entre cliente/empresa e, por hora, confirmar coletas, horários e grupos de rotas.

RF7 – Criar Notificações/Lembretes
O sistema deverá criar e gerenciar notificações para os usuários (Dia de pagamento, confirmação de disponibilidade no dia da coleta, possíveis atrasos, chegada do carro de coleta. Por hora, apenas por e-mail, porém futuramente também será pelo aplicativo.

RF8 – Validar Notificações/Lembretes
As notificações de confirmação devem ser concisas, diretas e de fácil entendimento, com as possibilidades de resposta sendo “Sim” ou “Não”. Por hora irá funcionar por meio do WhatsApp.

RF9 – Criar Rotas
O sistema deverá criar as rotas de coleta baseado na confirmação de disponibilidade do cliente(Confirmação, horário) e localização de seu endereço em comparação a outros, para criar a rota mais eficiente o possível. 

RF10 – Processar Fluxo de Caixa
O sistema deve processar o fluxo de caixa da empresa(Recebimentos, despesas) e em qual área determinada transação foi feita(ex: mensalidade, venda de húmus, gasto com combustível, manutenção da empresa, etc)

RF11 – Criar Multas
O sistema deverá possibilitar a criação de multas caso um cliente confirme que estaria no local, porém não comparece. Isso irá ocorrer por conta de gasto de deslocamento(combustível e tempo).

RF12 – Enviar Multas aos Clientes Multados
O sistema deverá enviar aos clientes multados as notificações de multas, de forma clara e direta.

RF13 – Gerar de Relatório
O sistema deverá criar relatórios baseados no input de dados do gestor do sistema. (peso, quantidade de poluentes, data da coleta, nome do cliente)

RF14 – Enviar Relatórios para o Cliente
O sistema deverá ser capaz de enviar relatórios aos clientes de forma automática, com formatação(Nome do cliente, peso, quantidade de poluentes não emitidos na atmosfera e no solo)

RF15 – Criar Dashboards
 O sistema deverá criar Dashboards para o gestor do sistema, para facilitar a análise de dados da empresa.


## 2.3 - Requisitos não funcionais

- Desempenho do Sistema
- Usabilidade
- Acessibilidade
- Formatação padrão de Relatórios
- Estabilidade do Sistema
- Segurança do Sistema
- Dashboards Gráficas

# 3 - Regras de Negócios

## 3.1 - Modelo de Negócio Canvas

### 3.1.1 - Parcerias Chaves

    
Segmento destinado a definir quais serão os parceiros comerciais que irão apoiar as operações, como fornecedores ou alianças estratégicas. 

	Empresas de Hospedagem
	Professores e Orientadores
	Plataformas como GitHub e Figma
	Fatec Jahu
 
### 3.1.2 - Atividades Chaves
Segmento destinado a definir quais serão as atividades essenciais e indispensável para criar, entregar e operar sua proposta de valor corretamente.
 
	Modelagem do FrontEnd
	Definição de Requisitos
	Modelagem de Dados
	Documento do Projeto
	Testes

### 3.1.3 - Recursos Chaves
Segmento destinado a definir quais serão os ativos/ferramentas essenciais e indispensável para criar, entregar e operar sua proposta de valor corretamente.
 
	Api de agenda/mapas 
	Infraestrutura tecnológica  
	Banco de dados 
	Aplicativo/plataforma digital 


### 3.1.4 - Proposta de Valor
Segmento destinado a definir quais serão os benefícios exclusivos e o valor que sua empresa oferece aos clientes e beneficiários.
 
	Divulgar os Serviços da Húmus.
	Facilitar a comunicação com o Cliente.
	Suporte técnico durante o desenvolvimento.
	Propor um serviço com interface personalizada, simples e intuitiva.
 

### 3.1.5 - Relacionamento
Segmento destinado a definir como irá funcionar a interação e o desenvolvimento da comunicação com o cliente.
 
	CRM (Customer Relationship Management) 
	Coleta de Feedback 
	Suporte durante os Testes


### 3.1.6 - Canais
Segmento destinado a definir como irá alcançar e entregar sua proposta de valor aos segmentos do público-alvo. 

	Whatsapp 
	Redes sociais
	Reuniões


### 3.1.7 - Segmento dos Clientes
Segmento destinado a definir quais serão os grupos ou comunidades que irão se beneficiar com o produto e serviços desenvolvido.
 
	Clientes da Empresa Húmus.
	Funcionários da Empresa Húmus.


### 3.1.8 - Estrutura de Custo
Segmento destinado a definir a composição de todas as despesas que uma empresa passa para operar, produzir e entregar seus produtos ou serviços. 

	Desenvolvimento e manutenção do app  
	Infraestrutura digital (hospedagem, armazenamento, custo de APIs...) 


### 3.1.9 - Fonte de Receita
Segmento destinado a definir quais serão os diferentes meios que a empresa irá gerar dinheiro a partir dos seus produtos e serviços, ou seja, como ela captura valor.
 
	Assinatura mensal 
	Parcerias 

## 3.2 - Imagem do Modelo Canvas

# 4 - Estudo de Viabilidade

## 4.1 - Viabilidade de Mercado

### 4.1.1 -	Condicionantes de Futuro e Potencialidades
 A Húmus-Compostagem consiste numa empresa de pequeno porte que  já tem alguns clientes, com as decisões certas para divulgar a ideia e  conscientizar as pessoas sobre sua importância ela pode crescer. Existe  possibilidade de parcerias com ONGS ambientais ou empresas/instituições  governamentais.

### 4.1.2 -	Público Alvo
  Pessoas que tem o interesse em investir para contribuir com a ecologia  e com o descarte ideal do lixo orgânico, empresas no geral.


## 4.2 - Viabilidade Técnica
 A equipe de desenvolvimento tem acesso aos computadores da faculdade para realizar o progresso do projeto, alguns notebooks pessoais e assistência dos professores para dúvidas e estamos adquirindo o conhecimento para realizar o avanço do projeto ao longo do tempo.

## 4.3 - Viabilidade Financeira
 A empresa Húmus-Compostagem já possui uma fonte de renda adquirida pela assinatura mensal, porém com a expansão de clientes e com a melhora na logística de transporte e comunicação com os clientes advinda do nosso desenvolvimento do projeto a tendencia é aumentar; além das outras fontes de renda que serão implantadas como as taxas de multas e possíveis parcerias. 
 Já que estamos fazendo o projeto para adquirir experiência não temos custos de salário das pessoas, e por enquanto nenhum custo técnico como custo de hospedagem/manutenção. 

## 4.4 - Viabilidade Operacional
 O desenvolvimento do projeto proporcionará melhorias realistas ao longo do tempo, fornecendo uma melhora para um dos problemas no negócio do cliente desde o começo por meio da integração ao WhatsApp e E-mail, proporcionando melhora na comunicação; depois sistemas de agendamento, multa para confirmações falsas, integração com outros softwares, GPS em tempo real e ajuda na gestão financeira.

## 4.5 - Conclusão
Devido a reais possibilidades de crescimento da empresa, pelo desenvolvimento técnico que será adquirido ao decorrer do projeto, pela disponibilidade de maquinas para trabalhar e por bom planejamento, ideias para implementar no site e resolver dificuldades no negócio da Húmus-Compostagem avaliamos que esse projeto é viável para desenvolvimento. 



# 5 - Design
## 5.1 - Paletas de Cores
 
 
 


## 5.2 - Tipografia
 -Freestyle Script
 -Science Gothic
 -Gilroy
 -AnonymousPro

## 5.3 - Logo
 

## 5.4 - Wireframe
### 5.4.1 - Pagina Inicial (Dark)


### 5.4.2 - Modelo Página ADM(Dark)
 

 

## 5.5 - Modelo de Navegação

# 6 - Protótipo

## 6.1 - Pagina Principal (Dark)



## 6.2 - Pagina ADM Receitas (Dark)


## 6.3 - Página ADM Receitas( (Light)


## - Link Do Figma
 https://www.figma.com/design/IBaVFkxqLwspxBMtnUBCyK/H%C3%BAmus_Prototype?node-id=0-1&t=JqQmjEeGkf0BhI6R-1
























# 9. Design
(Paleta de cor, Tipografia, Logo, Wireframes, Modelo de navegação)

# 10. Protótipo
(Gere um protótipo funcional na ferramenta que se sentir mais confortável (Figma, por
exemplo) e apresente aqui, indicando o link).

# 11. Aplicação
