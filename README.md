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


## 2.1-Histórias dos Usuários
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


## 2.2-Requisitos funcionais
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


## 2.3-Requisitos não funcionais

- Desempenho do Sistema
- Usabilidade
- Acessibilidade
- Formatação padrão de Relatórios
- Estabilidade do Sistema
- Segurança do Sistema
- Dashboards Gráficas

  

# 3-Regras-de-Negocios

## 3.1-Modelo de Negócio Canvas

### 3.1.1-Parcerias Chaves

    
Segmento destinado a definir quais serão os parceiros comerciais que irão apoiar as operações, como fornecedores ou alianças estratégicas. 

.	Empresas de Hospedagem
. Professores e Orientadores
.	Plataformas como GitHub e Figma
.	Fatec Jahu
 
### 3.1.2-Atividades Chaves
Segmento destinado a definir quais serão as atividades essenciais e indispensável para criar, entregar e operar sua proposta de valor corretamente.
 
.	Modelagem do FrontEnd
.	Definição de Requisitos
.	Modelagem de Dados
.	Documento do Projeto
.	Testes

### 3.1.3-Recursos Chaves
Segmento destinado a definir quais serão os ativos/ferramentas essenciais e indispensável para criar, entregar e operar sua proposta de valor corretamente.
 
.	Api de agenda/mapas 
.	Infraestrutura tecnológica  
.	Banco de dados 
.	Aplicativo/plataforma digital 


### 3.1.4-Proposta de Valor
Segmento destinado a definir quais serão os benefícios exclusivos e o valor que sua empresa oferece aos clientes e beneficiários.
 
	Divulgar os Serviços da Húmus.
	Facilitar a comunicação com o Cliente.
	Suporte técnico durante o desenvolvimento.
	Propor um serviço com interface personalizada, simples e intuitiva.
 

### 3.1.5-Relacionamento
Segmento destinado a definir como irá funcionar a interação e o desenvolvimento da comunicação com o cliente.
 
.	CRM (Customer Relationship Management) 
.	Coleta de Feedback 
.	Suporte durante os Testes


### 3.1.6-Canais
Segmento destinado a definir como irá alcançar e entregar sua proposta de valor aos segmentos do público-alvo. 

.	Whatsapp 
.	Redes sociais
.	Reuniões


### 3.1.7-Segmento dos Clientes
Segmento destinado a definir quais serão os grupos ou comunidades que irão se beneficiar com o produto e serviços desenvolvido.
 
.	Clientes da Empresa Húmus.
.	Funcionários da Empresa Húmus.


### 3.1.8-Estrutura de Custo
Segmento destinado a definir a composição de todas as despesas que uma empresa passa para operar, produzir e entregar seus produtos ou serviços. 

.	Desenvolvimento e manutenção do app  
.	Infraestrutura digital (hospedagem, armazenamento, custo de APIs...) 


### 3.1.9-Fonte de Receita
Segmento destinado a definir quais serão os diferentes meios que a empresa irá gerar dinheiro a partir dos seus produtos e serviços, ou seja, como ela captura valor.
 
.	Assinatura mensal 
.	Parcerias 

## 3.2-Imagem do Modelo Canvas
<img width="1600" height="900" alt="WhatsApp Image 2026-06-07 at 18 37 37" src="https://github.com/user-attachments/assets/7bb2ed11-22e9-4666-bbc0-f3d2b1b49407" />


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

