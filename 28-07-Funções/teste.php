<?php

    if(!empty($_POST))
    {
        $tipo = $_POST["cor"];
        if($tipo == "vermelho")
        {
            echo "ola";
        }
    }

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                        <li><a href="#raizes" class="menu-link">Inicio</a></li>
                        <li><a href="#guerra" class="menu-link">sobre</a></li>
                        <li><a href="#envolvidos" class="menu-link">contatos</a></li>
                        <input type="button" value="Conta" id="Conta" class="Conta_Conta">
                        <a class="btn btn-outline-light ms-lg-3 mt-2 mt-lg-0" href="#">Suporte</a>
                    </ul>
                </nav> 
            </div>
        </div>
            
        </div>
        <nav class="navbar-menu menu1">
            <ul class="menu-items">
                <li><a href="#raizes" class="menu-link">a</a></li>
                <li><a href="#guerra" class="menu-link">b</a></li>
                <li><a href="#envolvidos" class="menu-link">c</a></li>
                <li><a href="#Intensificação" class="menu-link">d</a></li>
                <li><a href="#consequencias" class="menu-link">e</a></li>
            </ul>
        </nav>
    </header>

    <main class="page-body">

        <div class="layout-grid">
            <article class="content-main">
                <section class="main-card">
                    <div class="headline-text">
                        <h1><strong>Funções em PHP</strong></h1>
                        <p>O que são funções em PHP?</p>
                        <p>Para que servem?</p>
                        <hr>
                        <h1><strong>Relacionados</strong></h1>
                        <ul>
                            <li><a href="funcoes%20de%20string.php">Funções de string</a></li>
                            <li><a href="funcoes%20de%20array.php">Funções de array</a></li>
                            <li><a href="funcoes%20de%20data.php">Funções de data</a></li>
                        </ul>
                        <hr>
                        <h1><strong>Funções de String</strong></h1>
                        <p>Descrição</p>
                    </div>
                    
                    <hr>

                    <div class="main-summary">
                        <h3>Lista de Funções de String</h3>
                        <ul>
                            <li><a href="">addcslashes</a> — Escapa string com barras invertidas no estilo C</li>
                            <li><a href="">addslashes</a> — Adiciona barras invertidas a uma string</li>
                            <li><a href="">bin2hex</a> — Converte um dado binário em representação hexadecimal</li>
                            <li><a href="">chop</a> — Sinônimo de rtrim</li>
                            <li><a href="">chr</a> — Gera uma string de um byte a partir de um número</li>
                            <li><a href="">chunk_split</a> — Divide uma string em pedaços menores</li>
                            <li><a href="">convert_cyr_string</a> — Converte de um conjunto de caracteres cirílico para outro</li>
                            <li><a href="">convert_uudecode</a> — Decodifica uma string codificada com uuencode</li>
                            <li><a href="">convert_uuencode</a> — Codifica uma string com uuencode</li>
                            <li><a href="">count_chars</a> — Retorna informação sobre caracteres usados em uma string</li>
                            <li><a href="">crc32</a> — Calcula polinômio crc32 de uma string</li>
                            <li><a href="">crypt</a> — Hash unidirecional de string</li>
                            <li><a href="">echo</a> — Envia uma ou mais strings para a saída</li>
                            <li><a href="">explode</a> — Divide uma string com base em outra string</li>
                            <li><a href="">fprintf</a> — Escreve uma string formatada para um fluxo</li>
                            <li><a href="">get_html_translation_table</a> — Retorna a tabela de tradução usada por htmlspecialchars e htmlentities</li>
                            <li><a href="">hebrev</a> — Converte texto hebraico lógico para texto visual</li>
                            <li><a href="">hebrevc</a> — Converte texto hebraico lógico para texto visual com conversão de novas linhas</li>
                            <li><a href="">hex2bin</a> — Decodifica uma string binária codificada em hexadecimal</li>
                            <li><a href="">html_entity_decode</a> — Converte entidades HTML aos seus caracteres correspondentes</li>
                            <li><a href="">htmlentities</a> — Converte todos os caracteres aplicáveis em entidades HTML</li>
                            <li><a href="">htmlspecialchars</a> — Converte caracteres especiais para entidades HTML</li>
                            <li><a href="">htmlspecialchars_decode</a> — Converte entidades especiais HTML de volta para caracteres</li>
                            <li><a href="">implode</a> — Aglutina elementos de um array com uma string</li>
                            <li><a href="">join</a> — Sinônimo de implode</li>
                            <li><a href="">lcfirst</a> — Torna minúsculo o primeiro caractere de uma string</li>
                            <li><a href="">levenshtein</a> — Calcula a distância Levenshtein entre duas strings</li>
                            <li><a href="">localeconv</a> — Obtém informação de formatação numérica</li>
                            <li><a href="">ltrim</a> — Retira espaços em branco (ou outros caracteres) do início de uma string</li>
                            <li><a href="">md5</a> — Calcula o hash md5 de uma string</li>
                            <li><a href="">md5_file</a> — Calcula o hash md5 de um arquivo</li>
                            <li><a href="">metaphone</a> — Calcula a chave de Metaphone de uma string</li>
                            <li><a href="">money_format</a> — Formata um número como uma string de moeda</li>
                            <li><a href="">nl_langinfo</a> — Consulta informação de língua e localidade</li>
                            <li><a href="">nl2br</a> — Insere quebras de linha HTML antes de todos os caracteres de nova linha em um string</li>
                            <li><a href="">number_format</a> — Formata um número com milhares agrupados</li>
                            <li><a href="">ord</a> — Converte o primeiro byte de uma string para um valor entre 0 e 255</li>
                            <li><a href="">parse_str</a> — Interpreta uma string como uma requisição URL</li>
                            <li><a href="">print</a> — Exibe uma string</li>
                            <li><a href="">printf</a> — Envia uma string formatada para a saída</li>
                            <li><a href="">quoted_printable_decode</a> — Converte uma string Quoted-Printable para uma string de 8 bits</li>
                            <li><a href="">quoted_printable_encode</a> — Converte uma string de 8 bits para uma string Quoted-Printable</li>
                            <li><a href="">quotemeta</a> — Escapa meta caracteres</li>
                            <li><a href="">rtrim</a> — Retira espaços em branco (ou outros caracteres) do final de uma string</li>
                            <li><a href="">setlocale</a> — Define informação de localidade</li>
                            <li><a href="">sha1</a> — Calcula o hash SHA1 de uma string</li>
                            <li><a href="">sha1_file</a> — Calcula a hash sha1 de um arquivo</li>
                            <li><a href="">similar_text</a> — Calcula a similaridade entre duas strings</li>
                            <li><a href="">soundex</a> — Calcula a chave soundex de uma string</li>
                            <li><a href="">sprintf</a> — Retorna uma string formatada</li>
                            <li><a href="">sscanf</a> — Interpreta a entrada de uma string de acordo com um formato</li>
                            <li><a href="">str_contains</a> — Determina se uma string contém uma substring fornecida</li>
                            <li><a href="">str_decrement</a> — Decrementa uma string alfanumérica</li>
                            <li><a href="">str_ends_with</a> — Verifica se uma string termina com uma substring fornecida</li>
                            <li><a href="">str_getcsv</a> — Analisa uma string CSV e retorna os dados em um array</li>
                            <li><a href="">str_increment</a> — Incrementa uma string alfanumérica</li>
                            <li><a href="">str_ireplace</a> — Versão insensível a maiúsculas/minúsculas de str_replace</li>
                            <li><a href="">str_pad</a> — Preenche uma string até um determinado comprimento com outra string</li>
                            <li><a href="">str_repeat</a> — Repete uma string</li>
                            <li><a href="">str_replace</a> — Substitui todas as ocorrências da string de pesquisa com a string de substituição</li>
                            <li><a href="">str_rot13</a> — Executa a transformação rot13 em uma string</li>
                            <li><a href="">str_shuffle</a> — Embaralha uma string aleatoriamente</li>
                            <li><a href="">str_split</a> — Converte uma string em um array</li>
                            <li><a href="">str_starts_with</a> — Verifica se uma string começa com uma substring fornecida</li>
                            <li><a href="">str_word_count</a> — Retorna informação sobre palavras usadas em uma string</li>
                            <li><a href="">strcasecmp</a> — Comparação binária segura de strings insensível a maiúsculas/minúsculas</li>
                            <li><a href="">strchr</a> — Sinônimo de strstr</li>
                            <li><a href="">strcmp</a> — Comparação binária segura de strings</li>
                            <li><a href="">strcoll</a> — Comparação de strings baseada em localidade</li>
                            <li><a href="">strcspn</a> — Encontra o tamanho do segmento inicial que não corresponde à máscara</li>
                            <li><a href="">strip_tags</a> — Retira as tags HTML e PHP de uma string</li>
                            <li><a href="">stripcslashes</a> — Remove o escape de strings escapadas com addcslashes</li>
                            <li><a href="">stripos</a> — Encontra a posição da primeira ocorrência de uma substring em uma string, de forma insensível a maiúsculas/minúsculas</li>
                            <li><a href="">stripslashes</a> — Desfaz os escapes de uma string escapada</li>
                            <li><a href="">stristr</a> — strstr insensível a maiúsculas/minúsculas</li>
                            <li><a href="">strlen</a> — Retorna o tamanho de uma string</li>
                            <li><a href="">strnatcasecmp</a> — Comparação de strings insensível a maiúsculas/minúsculas usando o algoritmo de "ordem natural"</li>
                            <li><a href="">strnatcmp</a> — Comparações de strings usando um algoritmo de "ordem natural"</li>
                            <li><a href="">strncasecmp</a> — Comparação binária de strings, insensível a maiúsculas/minúsculas, dos primeiros n caracteres</li>
                            <li><a href="">strncmp</a> — Comparação de strings segura para binários dos primeiros n caracteres</li>
                            <li><a href="">strpbrk</a> — Procura na string por um dos caracteres de um conjunto</li>
                            <li><a href="">strpos</a> — Encontra a posição da primeira ocorrência de uma substring em uma string</li>
                            <li><a href="">strrchr</a> — Encontra a última ocorrência de um caractere em uma string</li>
                            <li><a href="">strrev</a> — Reverte uma string</li>
                            <li><a href="">strripos</a> — Encontra a posição da última ocorrência de uma substring em uma string, insensível a maiúsculas/minúsculas</li>
                            <li><a href="">strrpos</a> — Encontra a posição da última ocorrência de uma substring em uma string</li>
                            <li><a href="">strspn</a> — Encontra o comprimento do segmento inicial de uma string composta totalmente de caracteres contidos em uma máscara informada</li>
                            <li><a href="">strstr</a> — Encontra a primeira ocorrência de uma string</li>
                            <li><a href="">strtok</a> — Divide uma string em tokens</li>
                            <li><a href="">strtolower</a> — Converte uma string para minúsculas</li>
                            <li><a href="">strtoupper</a> — Converte uma string em maiúsculas</li>
                            <li><a href="">strtr</a> — Traduz caracteres ou substitui substrings</li>
                            <li><a href="">substr</a> — Retorna parte de uma string</li>
                            <li><a href="">substr_compare</a> — Comparação binária de duas strings a partir de uma posição até n caracteres</li>
                            <li><a href="">substr_count</a> — Conta o número de ocorrências de uma substring</li>
                            <li><a href="">substr_replace</a> — Substitui o texto dentro de uma parte de uma string</li>
                            <li><a href="">trim</a> — Retira espaços (ou outros caracteres) do início e do final de uma string</li>
                            <li><a href="">ucfirst</a> — Transforma o primeiro caractere de uma string em maiúsculo</li>
                            <li><a href="">ucwords</a> — Converte para maiúsculas o primeiro caractere de cada palavra</li>
                            <li><a href="">utf8_decode</a> — Converte uma string de UTF-8 para ISO-8859-1, substituindo caracteres inválidos ou não representáveis</li>
                            <li><a href="">utf8_encode</a> — Converte uma string ISO-8859-1 em UTF-8</li>
                            <li><a href="">vfprintf</a> — Escreve uma string formatada para um fluxo</li>
                            <li><a href="">vprintf</a> — Mostra uma string formatada</li>
                            <li><a href="">vsprintf</a> — Retorna uma string formatada</li>
                            <li><a href="">wordwrap</a> — Quebra uma string em um dado número de caracteres</li>
                        </ul>
                    </div>

                    <hr>

                    <div class="main-summary">
                    
                        <div alt="corpo que eu tenho que colar toda vez" style="width: 450px;">
                            <h2>addslashes</h2>
                            <div alt="parte da demostração" style="background-color: #fff; color: black; border: 1px solid #8f8f8f;">
                                
                                <?php
                                    echo addcslashes('foo[ ]', 'A..z');
                                    //A primeira parte é nossa palavra, sengunda parte é de qual letra até qual letra queremos que tenha uma para divindo
                                    //Lembrando que tem diferenciação entre letras maiúsculas e minúsculas, então se você colocar de A..Z, ele só vai escapar as letras maiúsculas, se colocar de a..z, ele só vai escapar as letras minúsculas
                                    // saída:  \f\o\o\[ \]
                                ?>
                            </div>
                            <div alt="parte da descrição">
                                <p>A primeira parte é nossa palavra, sengunda parte é de qual letra até qual letra queremos que tenha uma para divindo</p>
                                <p>Lembrando que tem diferenciação entre letras maiúsculas e minúsculas, então se você colocar de A..Z, ele só vai escapar as letras maiúsculas, se colocar de a..z, ele só vai escapar as letras minúsculas</p>
                                <p>saída:  \f\o\o\[ \]</p>
                            </div>
                        </div>

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
        <div>
            <h2 style="margin-left: 300px; margin-top: 50px">Mais ouvidas de YUNG LIXO (yun li)</h2>
        </div>

        <div style="display: flex; align-items: center; justify-content: center;">
            <ol class="lista-musicas">
                <li id="especial">Tomodachi (feat. Sho-sensei)</li>
                <li class="teste">Máquina do Tempo</li>
                <li class="teste">Primavera</li>
                <li class="teste">Dirty Dancing</li>
                <li class="teste">Joias da Família</li>
                <li class="teste">Lost in Translation</li>
                <li class="teste">Deixa Doer</li>
                <li class="teste">Memórias</li>
                <li class="teste">Sombra</li>
                <li class="teste">Anjos da Guarda</li>
                <li class="teste">Transparência (feat. Hakuro)</li>
                <li class="teste">Melhor Não</li>
                <li class="teste">Sonhar</li>
                <li id="teste2">Não Me Faça Falar (part. Biffe e Hakuro)</li>
                <li class="teste">O Filho Pródigo</li>
                <li class="teste">Polaroid</li>
                <li class="teste">Prefiro Morrer</li>
                <li class="teste">Sakura</li>
                <li class="teste">We Gold</li>
                <li class="teste">i walk (part. Massaru)</li>
            </ol>
        </div>

        <hr>

        <main style="display: flex; justify-content: center; align-items: center;">
            <article class="cartão" style="margin-right: 30px;">
                <p style="font-size: 16px;">Músicas<br></p>
                <p class="sub_titulo">Top músicas<br></p>
                <p class="sub_titulo">Top artistas<br></p>
                <p class="sub_titulo">Top álbuns<br></p>
                <p class="sub_titulo">Atualizações<br></p>
                <p class="sub_titulo">Lançamentos<br></p>
                <p class="sub_titulo">Playlists do Letras</p>
            </article>

            <article class="cartão" style="margin-right: 30px;">
                <p style="font-size: 16px;">Participe<br></p>
                <p class="sub_titulo">Crie seu perfil musical<br></p>
                <p class="sub_titulo">Envie álbuns<br></p>
                <p class="sub_titulo">Envie letras<br></p>
                <p class="sub_titulo">Correções de letras<br></p>
                <p class="sub_titulo">Assine o Letras<br></p>
            </article>

            <article class="cartão">
                <p style="font-size: 16px;">Sobre o site<br></p>
                <p class="sub_titulo">Ajuda<br></p>
                <p class="sub_titulo">Termos de uso e privacidade<br></p>
                <p class="sub_titulo">Sobre o Letras<br></p>
                <p class="sub_titulo">Trabalhe no Letras<br></p>
                <p class="sub_titulo">Padrões para envios<br></p>
            </article>

            <article class="cartão" style="margin-left: 30px;">
                <p style="font-size: 16px;">Nosso site<br></p>
                <p class="sub_titulo">Página inicial<br></p>
                <p class="sub_titulo">Lista de estilos<br></p>
                <p class="sub_titulo">Enviar nova letra<br></p>
            </article>
        </main>

        <hr style="margin-top: 50px;">

        <footer class="footer">
            <main class="footer_main">
                <form style="max-width: 500px;" action="#" method="post">
                    <h3>Entre em contato comigo</h3>
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

                    <button type="submit">Enviar Mensagem</button>
                </form>
            </main>
        </footer>

        <p style="text-align: center; font-size: 14px; color: #ccc;">© 2026 Todos os direitos reservados de sites de letras por Arthur De Gois Carramão Almeida. R.M:250533</p>
    </footer>

    </main>

    

    
    
</body>
</html>