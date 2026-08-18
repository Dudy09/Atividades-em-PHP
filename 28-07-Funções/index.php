<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <header class="topo">
        <div class="navbar-top">
            <div class="navbar-logo">
                <img src="img/new-php-logo.svg" alt="Logo" style="width: 116px;">
            </div>
            <div class="navbar-actions">
                <input type="search" id="nome" class="navbar-search" placeholder="Pesquisar...">
                
                <nav class="navbar-menu">
                    <ul class="menu-items">
                        <li><a href="index.php" class="menu-link">Inicio</a></li>
                        <li><a href="Sobre.php" class="menu-link">sobre</a></li>
                        <li><a href="Contatos.php" class="menu-link">contatos</a></li>
                        <input type="button" value="Conta" id="Conta" class="Conta_Conta">
                        <a class="btn btn-outline-light ms-lg-3 mt-2 mt-lg-0" href="Suporte.php">Suporte</a>
                    </ul>
                </nav> 
            </div>
        </div>
            
        </div>
        <nav class="navbar-menu menu1">
            <ul class="menu-items">
                <li><a href="Guia.php" class="menu-link">Guia</a></li>
                <li><a href="Post.php" class="menu-link">Post</a></li>
                <li><a href="Blog-oficial.php" class="menu-link">Blog oficial</a></li>
                <li><a href="Post-da-comunidade.php" class="menu-link">Post da comunidade</a></li>
                <li><a href="Blog-da-comunidade.php" class="menu-link">Blog da comunidade</a></li>
            </ul>
        </nav>
    </header>

    <main class="page-body">

        <div class="layout-grid">
            <article class="content-main">
                <section class="main-card">
                    <div class="headline-text">
                        <img src="img/php-logo-black.png" alt="Logo" style="width: 250px; margin: 0 auto; justify-content: center; display: flex;">
                        <div style="margin: 0 auto; justify-content: center; display: flex; width: 600px; margin-top: 10px; font-size: 1.2em;">
                            <p>Bem vindo ao seu guia de php, esse site é especialiçado em datar tudo sobre a linguagem mais usada na criação web</p>
                        </div>
                        <div style="margin: 0 auto; justify-content: center; display: flex; width: 600px; margin-top: 10px; font-size: 1.2em;">
                            <a class="btn btn-outline-primary ms-lg-3 mt-2 mt-lg-0" href="https://www.php.net/releases/8.5/pt_BR.php"> php 8.5</a>
                            <a class="btn btn-outline-info ms-lg-3 mt-2 mt-lg-0" href="https://www.php.net/downloads.php">downloads</a>
                        </div>
                        <hr>
                        <h1><strong>Guia de php</strong></h1>
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="">Introdução</a></li>
                            <li><a href="">Instalação</a></li>
                            <li><a href="">Variáveis</a></li>
                            <li><a href="funcoes.php">Funções</a></li>
                            </ul>
                        <div style="margin: 0 auto; justify-content: center; display: flex;">
                            <img src="img/caixa.png">
                        </div>
                        <div style="margin: 0 auto; justify-content: center; display: flex;">
                            <p> Desculpa ainda estamos de munçadas, algumas das nossas páginas não estão disponíveis.</p>
                        </div>
                            
                        <hr>
                    </div>

                    <div class="main-summary">
                    
                    </div>

                </section>
            </article>
        

            <aside class="sidebar">
                <div class="sidebar-box">
                    <h2>Abas do nosso site:</h2>
                        <p>Inicio</p>
                        <p>Funções
                            <ul>
                                <li>Funções de string</li>
                                <li>Funções de array</li>
                                <li>Funções de data</li>
                            </ul>
                        </p>
                        <p>Sobre</p>
                        <p>Contato</p>
                </div>
            </aside>
        </div>

    <footer class="baixo">

        <hr>

        <div>
            <h2 style="margin-left: 150px;"><strong>Informações</strong></h2>
        </div>

        <main style="display: flex; justify-content: center; align-items: center;">

            <article class="cartão" style="margin-right: 30px;">
                <p style="font-size: 16px;">Participe:<br></p>
                <p class="sub_titulo">Crie seu perfil musical<br></p>
                <p class="sub_titulo">Envie suas duvidas<br></p>
                <p class="sub_titulo">Envie postagens<br></p>
                <p class="sub_titulo">Correções de postagens<br></p>
            </article>

            <article class="cartão">
                <p style="font-size: 16px;">Sobre o site:<br></p>
                <p class="sub_titulo">Ajuda<br></p>
                <p class="sub_titulo">Termos de uso e privacidade<br></p>
                <p class="sub_titulo">Sobre postagens<br></p>
                <p class="sub_titulo">Padrões para envios<br></p>
            </article>

            <article class="cartão" style="margin-left: 30px;">
                <p style="font-size: 16px;">Nosso site:<br></p>
                <p class="sub_titulo">Página inicial<br></p>
                <p class="sub_titulo">Lista de postagens<br></p>
                <p class="sub_titulo">Envie sugestôes<br></p>
            </article>
        </main>

        <hr style="margin-top: 50px;">

        <footer class="footer">
            <main class="footer_main">
                <form style="max-width: 500px;" action="#" method="post">
                    <h3>Entre em contato conosco</h3>
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
                    </div>

                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com">
                    </div>

                    <div>
                        <label for="assunto">Assunto:</label>
                        <input type="text" id="assunto" name="assunto" placeholder="Assunto da mensagem">
                    </div>

                    <div>
                        <label for="mensagem">Mensagem:</label>
                        <textarea id="mensagem" name="mensagem" placeholder="Digite sua mensagem aqui..." rows="5"></textarea>
                    </div>
                    <div style="margin: 0 auto; justify-content: center; display: flex;">
                        <button type="submit">Enviar Mensagem</button>
                    </div>
                </form>
            </main>
        </footer>

        <h3 style="text-align: center; font-size: 14px; color: #000; margin-top: 20px;"><strong>© 2026 Todos os direitos reservados de sites de letras por Arthur De Gois Carramão Almeida. R.M:250533</strong></h3>
    </footer>

    </main>

    

    
    
</body>
</html>
