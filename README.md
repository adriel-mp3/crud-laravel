<h1 align="center">CRUD Laravel</h1>
<p align="center">
  <a href="#como-rodar-o-projeto"/> 
  <a href="#construido-com">Construido com</a> · 
  <a href="#screenshots">Screenshots</a>  · 
  <a href="#consideraçoes-finais">Considerações Finais</a>  · 
</p>
<div align="center">
    <img src="./.github/user-table"/>
</div>
      
## Como Rodar o Projeto

1. **Requisitos do Ambiente:**
   - Certifique-se de ter o PHP instalado. Você pode verificar a instalação usando o comando `php -v` no terminal.
   - Instale o Composer, que é o gerenciador de dependências do PHP. Consulte o [site oficial do Composer](https://getcomposer.org/) para obter instruções de instalação.
   - Instale o Laravel Installer globalmente usando o Composer: `composer global require laravel/installer`.
   - Certifique-se de ter um servidor de banco de dados (como MySQL, PostgreSQL ou SQLite) instalado e configurado.
   - Instale o Node.js e o npm para gerenciar dependências JavaScript. Consulte o [site oficial do Node.js](https://nodejs.org/) para obter instruções de instalação.

2. **Clone o Projeto:**
   - Clone o repositório do projeto do Laravel para o seu ambiente local usando Git. Vá para o diretório onde deseja armazenar o projeto e execute o seguinte comando:
     ```bash
     git clone https://github.com/adriel-mp3/crud-laravel.git nome-do-projeto
     ```

3. **Instale as Dependências do PHP:**
   - Navegue até o diretório do projeto e execute o seguinte comando para instalar as dependências do PHP:
     ```bash
     cd nome-do-projeto
     composer install
     ```

4. **Instale as Dependências do JavaScript (Tailwind CSS):**
   - Execute o seguinte comando para instalar as dependências do JavaScript usando o npm:
     ```bash
     npm install
     ```

5. **Crie um Arquivo de Configuração do Ambiente:**
   - Copie o arquivo `.env.example` para um novo arquivo chamado `.env`. Configure as informações do banco de dados e outras configurações necessárias no arquivo `.env`.

6. **Gere a Chave de Aplicação:**
   - Execute o seguinte comando para gerar a chave de aplicação no Laravel:
     ```bash
     php artisan key:generate
     ```

7. **Migrar o Banco de Dados:**
   - Execute as migrações do banco de dados para criar as tabelas necessárias:
     ```bash
     php artisan migrate
     ```

8. **Inicie o Servidor Embutido:**
   - Inicie o servidor embutido do Laravel com o seguinte comando:
     ```bash
     php artisan serve
     ```
     O servidor será iniciado em `http://localhost:8000` por padrão.

9. **Compilar os Recursos JavaScript e CSS:**
   - Execute o seguinte comando para compilar os recursos JavaScript e CSS:
     ```bash
     npm run dev
     ```

10. **Acesse o Projeto:**
    - Abra seu navegador e acesse `http://localhost:8000` para ver o projeto Laravel em execução.

## Construido com
- <a href="https://laravel.com/">Laravel 10</a>
- <a href="https://tailwindcss.com/">Tailwind CSS</a>
- <a href="https://www.php.net/">PHP 7.4.8</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">JavaScript</a>
- <a href="https://jquery.com/">JQuery</a>
- <a href="https://robinherbots.github.io/Inputmask/">Input Mask (CPF & CNPJ)</a>
- <a href="https://github.com/LaravelLegends/pt-br-validator">LaravelLegends/pt-br-validator (Validação server-side CPF & CNPJ)</a>
- <a href="https://figma.com/">Figma (Prototipação)</a>

### Motivação para escolhas específicas:

Utilizei o Tailwind CSS pela facilidade de criação de telas personalizadas e pela rapidez no desenvolvimento. O Laravel 10 e o PHP 7.4.8 fornecem uma base sólida para o desenvolvimento back-end, enquanto o JQuery simplifica a manipulação do DOM. O Input Mask e o LaravelLegends/pt-br-validator são essenciais para garantir a validação adequada dos dados do usuário. O Figma foi utilizado para prototipar e visualizar o design antes da implementação.
<hr/>

## Screenshots
Algumas imagens das operações principais do projeto:

### Listar Usuários

<img src="./.github/user-table"/>

### Editar Usuário

<img src="./.github/user-table"/>


### Visualizar Usuário

<img src="./.github/user-table"/>

### Cadastrar Usuário

<img src="./.github/user-table"/>

## Considerações Finais

Este projeto reflete meu comprometimento em entregar resultados, mesmo ao lidar com tecnologias novas. Foi feito com carinho e dedicação, com espaço para melhorias é claro. Porém o mais importante para mim é estar disposto a sempre aprender e evoluir.

## Obrigado!

Agradeço pela confiança e parceria durante todo o processo. Estou à disposição para qualquer esclarecimento adicional e espero que possamos conversar novamente no futuro. Até logo!

## Links

<a href="https://www.linkedin.com/in/adriel-santos-dev/">Linkedin</a>
