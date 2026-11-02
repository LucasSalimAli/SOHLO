# Coding Standards — S.O.H.L.O.

 **TENHAM EM MENTE QUE O CÓDIGO HTML SERÁ MUDADO EM PHP** 

---

## 1. Geral

### Nomenclatura do Projeto
* **Brand:** Refere-se a tudo acessível por qualquer pessoa (index, páginas de cadastros, planos, etc.).
* **System:** Refere-se ao sistema S.O.H.L.O..

### Idioma
* Todas as classes, funções, objetos, IDs, etc., deverão ser escritos em **Inglês** para melhor conformidade com o padrão mundial.

### Estrutura de Pastas
 **PROIBIDA A CRIAÇÃO DE NOVAS PASTAS/ESTRUTURAS** 
*Usaremos a Arquitetura Model View Controller. Esta estrutura representa estritamente a **View** do projeto.*

```text
.
└── root/
    ├── src/
    │   ├── assets/
    │   │   ├── fonts
    │   │   └── images
    │   ├── controllers
    │   ├── models
    │   └── views/
    │       ├── pages/
    │       │   ├── brand
    │       │   ├── shared
    │       │   ├── components
    │       │   ├── financial
    │       │   └── logistics
    │       ├── scripts/
    │       │   ├── shared
    │       │   └── vendor
    │       └── styles/
    │           ├── components 
    │           ├── pages
    │           ├── shared
    │           ├── vendor
    │           └── global.css
    └── index.php
```
 **PROIBIDA A CRIAÇÃO DE NOVAS PASTAS/ESTRUTURAS** 

---

## 2. FrontEnd

### Classes/IDs (HTML, CSS e JavaScript)
* Todas as classes e IDs no HTML e CSS deverão seguir o padrão **kebab-case**, pois é o método usual adotado mundialmente (Ex: `hero-brand`).
* Todas as classes e funções em JavaScript serão feitas em **camelCase**.

### Cores
Para alterar as cores de certas estruturas (como cards ou linhas de tabela), utiliza-se a classe auxiliar `is-cor`. Exemplos:
* `is-std` (cor padrão, branco ou preto)
* `is-red` (vermelho)
* `is-green` (verde)
* `is-blue` (azul)

### Responsividade
* Usar obrigatoriamente a estratégia **Desktop-First** com os seguintes breakpoints: `@media (max-width: 1024px)`, `@media (max-width: 768px)` e `@media (max-width: 480px)`.
* **Proibido o uso de `!important` para forçar responsividade.** Ajuste a especificidade dos seletores de forma correta.

### Estruturas do Aplicativo

#### Cards
Os Cards seguirão a nomenclatura utilizando letras gregas para diferenciação entre seus tipos. Todos os cards deverão estar obrigatoriamente dentro de uma `<section class="card-section">`.

* **Card Alpha:**
  ```html
  <div class="card-alpha is-blue">
      <h1>
          <span class="is-symbol">\$</span>
          Informação
      </h1>
      <h2>Legenda</h2>
  </div>
  ```
* **Card Beta:**
  ```html
  <div class="card-beta is-green">
      <h1>Informação</h1>
      <h2>Legenda</h2>
  </div>
  ```
* **Card Gamma:**
  ```html
  <div class="card-gamma is-std">
      <h1>
          <span class="is-symbol">\$</span>
          Informação
      </h1>
      <h2>Legenda</h2>
  </div>
  ```
* **Card Delta:**
  ```html
  <div class="card-delta is-green">
      <h2>Legenda</h2>
      <h1>Informação</h1>
  </div>
  ```
* **Card Epsilon:**
  ```html
  <div class="card-epsilon is-green">
      <h2>Legenda</h2>
      <h3>-------</h3>
      <h1>Informação</h1>
  </div>
  ```
#### Filtros
Os filtros seguem esse modelo 
```html
<section class="filter-bar">
            <div class="filter-group">

                <div class="filter-dropdown" data-filter="period">
                    <button class="filter-btn active" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Filtro A</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item active" href="#" data-value="total">Opção Alpha</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="total">Opção Beta</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown" data-filter="filter-a">
                    <button class="filter-btn" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Filtro B</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item" href="#" data-value="option-1">Opção 1</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="option-2">Opção 2</a></li>
                    </ul>
                </div>

                <div class="filter-dropdown" data-filter="filter-b">
                    <button class="filter-btn" type="button" aria-haspopup="true" aria-expanded="false">
                        <span class="filter-label">Filtro C</span>
                    </button>
                    <ul class="filter-menu">
                        <li><a class="filter-menu-item" href="#" data-value="option-x">Opção X</a></li>
                        <li><a class="filter-menu-item" href="#" data-value="option-y">Opção Y</a></li>
                    </ul>
                </div>

            </div>
        </section>
```

#### Tabelas
As tabelas seguem essa nomenclatura e divisão. Elas se ajustam automaticamente a todos os tamanhos necessários dependendo do conteúdo e página.

```html
<section class="section-table">
    <!-- Botoes de Cima da Tabela -->
    <div class="row table-btns">
        <div class="col-auto">
            <button class="uptable-btn">
                <i class="bi bi-pencil-square"></i>
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
                </tr>
            </thead>
            <tbody class="table-content">
                <tr class="status is-green">
                    <td>Exemplo de Informação Normal</td>
                    <td><span class="btn">Exemplo de Botão Interno</span></td>
                    <td><span class="status-badge">Exemplo de Badge</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
```

---

## 3. BackEnd

### Definição de Variáveis
* Todas as variáveis deverão ser escritas no formato **snake_case** (letras minúsculas, em inglês e, caso seja nome composto, separadas por underline. Ex: `number_one`).
* Todo array em PHP deverá possuir índice de colunas nomeados e índice de linhas numéricos, quando a condição se aplicar (array de duas dimensões).
* Todas as variáveis deverão ter simbologia e significado claros, sendo **proibido o uso de nomes genéricos** (Ex: `number_one` ao invés de `n1`).


### Nomenclatura de Arquivos
* Todos os arquivos deverão possuir títulos simples, que deixem claro o seu conteúdo e sejam facilmente diferenciáveis (Ex: `logo_brand.png` ao invés de `logo.png`).

---

## 4. Ferramentas e Processos

### Extensões Obrigatórias do VS Code
Para manter o código alinhado e padronizado em todas as máquinas, todos devem instalar:
1. **Prettier**
2. **Better Comments**
3. **Auto Rename Tag**
4. **Error Lens**

### GitHub
* Utilizar o GitHub para qualquer nova adição ao projeto.
* Todos os commits, descrições e logs deverão ser escritos em **Inglês** para maior padronização mundial.
* É obrigatório o uso do padrão **CONVENTIONAL COMMITS** para facilitar o debugging e a leitura do histórico do projeto.

### ClickUp
* O **ClickUp SERÁ usado obrigatoriamente** para facilitar a organização das tarefas, conclusões, prazos e responsáveis.

---

**TENHAM EM MENTE QUE O CÓDIGO HTML SERÁ MUDADO EM PHP** 
