<?php
function executarFuncaoString(string $acao, array $dados): string
{
    $acao = strtolower($acao);

    $mapaFuncoes = [
        'addcslashes' => fn() => addcslashes($dados['string'] ?? '', ($dados['parametro1'] ?? '') . '..' . ($dados['parametro2'] ?? '')),
        'addslashes' => fn() => addslashes($dados['texto'] ?? ''),
        'strlen' => fn() => strlen($dados['texto'] ?? ''),
        'substr' => fn() => substr($dados['texto'] ?? '', (int)($dados['inicio'] ?? 0), ($dados['tamanho'] ?? null) !== '' ? (int)$dados['tamanho'] : null),
        'explode' => fn() => implode(' | ', explode($dados['separador'] ?? ',', $dados['texto'] ?? '')),
        'str_replace' => fn() => str_replace($dados['buscar'] ?? '', $dados['substituir'] ?? '', $dados['texto'] ?? ''),
        'trim' => fn() => trim($dados['texto'] ?? ''),
        'strtolower' => fn() => strtolower($dados['texto'] ?? ''),
        'strtoupper' => fn() => strtoupper($dados['texto'] ?? ''),
        'ucfirst' => fn() => ucfirst($dados['texto'] ?? ''),
        'ucwords' => fn() => ucwords($dados['texto'] ?? ''),
        'strpos' => fn() => strpos($dados['haystack'] ?? '', $dados['needle'] ?? ''),
        'strrev' => fn() => strrev($dados['texto'] ?? ''),
        'implode' => fn() => implode($dados['separador'] ?? ', ', explode(',', $dados['texto'] ?? '')),
        'str_repeat' => fn() => str_repeat($dados['texto'] ?? '', max(1, (int)($dados['vezes'] ?? 1))),
        'str_contains' => fn() => str_contains($dados['texto'] ?? '', $dados['buscar'] ?? '') ? 'true' : 'false',
        'str_starts_with' => fn() => str_starts_with($dados['texto'] ?? '', $dados['buscar'] ?? '') ? 'true' : 'false',
        'str_ends_with' => fn() => str_ends_with($dados['texto'] ?? '', $dados['buscar'] ?? '') ? 'true' : 'false',
        'str_pad' => fn() => str_pad($dados['texto'] ?? '', max(1, (int)($dados['tamanho'] ?? 10)), $dados['caractere'] ?? ' ', (int)($dados['lado'] ?? STR_PAD_RIGHT)),
        'str_word_count' => fn() => (string) str_word_count($dados['texto'] ?? ''),
        'strip_tags' => fn() => strip_tags($dados['texto'] ?? ''),
        'lcfirst' => fn() => lcfirst($dados['texto'] ?? ''),
        'md5' => fn() => md5($dados['texto'] ?? ''),
        'sha1' => fn() => sha1($dados['texto'] ?? ''),
        'str_shuffle' => fn() => str_shuffle($dados['texto'] ?? ''),
        'str_split' => fn() => implode(' | ', str_split($dados['texto'] ?? '', max(1, (int)($dados['tamanho'] ?? 1)))),
        'wordwrap' => fn() => wordwrap($dados['texto'] ?? '', max(1, (int)($dados['largura'] ?? 10)), $dados['quebra'] ?? "\n", (bool)($dados['quebrar'] ?? false)),
        'bin2hex' => fn() => bin2hex($dados['texto'] ?? ''),
        'hex2bin' => fn() => hex2bin($dados['texto'] ?? ''),
        'str_ireplace' => fn() => str_ireplace($dados['buscar'] ?? '', $dados['substituir'] ?? '', $dados['texto'] ?? ''),
        'stripos' => fn() => (string) stripos($dados['texto'] ?? '', $dados['buscar'] ?? ''),
        'substr_count' => fn() => (string) substr_count($dados['texto'] ?? '', $dados['buscar'] ?? ''),
        'strtr' => fn() => strtr($dados['texto'] ?? '', $dados['buscar'] ?? '', $dados['substituir'] ?? ''),
        'strcasecmp' => fn() => (string) strcasecmp($dados['texto'] ?? '', $dados['comparar'] ?? ''),
        'strcmp' => fn() => (string) strcmp($dados['texto'] ?? '', $dados['comparar'] ?? ''),
        'str_rot13' => fn() => str_rot13($dados['texto'] ?? ''),
        'str_increment' => fn() => str_increment($dados['texto'] ?? ''),
        'str_decrement' => fn() => str_decrement($dados['texto'] ?? ''),
        'str_getcsv' => fn() => implode(' | ', str_getcsv($dados['texto'] ?? '', ($dados['separador'] ?? ',')[0] ?? ',')),
        'strstr' => fn() => strstr($dados['texto'] ?? '', $dados['buscar'] ?? ''),
        'stristr' => fn() => stristr($dados['texto'] ?? '', $dados['buscar'] ?? ''),
        'strrchr' => fn() => strrchr($dados['texto'] ?? '', $dados['caractere'] ?? ''),
        'strripos' => fn() => (string) strripos($dados['texto'] ?? '', $dados['buscar'] ?? ''),
        'strrpos' => fn() => (string) strrpos($dados['texto'] ?? '', $dados['buscar'] ?? ''),
        'strspn' => fn() => (string) strspn($dados['texto'] ?? '', $dados['mascara'] ?? ''),
        'strcoll' => fn() => (string) strcoll($dados['texto'] ?? '', $dados['comparar'] ?? ''),
        'strcspn' => fn() => (string) strcspn($dados['texto'] ?? '', $dados['mascara'] ?? ''),
        'stripcslashes' => fn() => stripcslashes($dados['texto'] ?? ''),
        'stripslashes' => fn() => stripslashes($dados['texto'] ?? ''),
        'strnatcasecmp' => fn() => (string) strnatcasecmp($dados['texto'] ?? '', $dados['comparar'] ?? ''),
        'strnatcmp' => fn() => (string) strnatcmp($dados['texto'] ?? '', $dados['comparar'] ?? ''),
        'strncasecmp' => fn() => (string) strncasecmp($dados['texto'] ?? '', $dados['comparar'] ?? '', max(0, (int)($dados['comprimento'] ?? 5))),
        'strncmp' => fn() => (string) strncmp($dados['texto'] ?? '', $dados['comparar'] ?? '', max(0, (int)($dados['comprimento'] ?? 5))),
        'strpbrk' => fn() => strpbrk($dados['texto'] ?? '', $dados['mascara'] ?? ''),
        'strtok' => fn() => strtok($dados['texto'] ?? '', $dados['separador'] ?? ' '),
        'substr_compare' => fn() => (string) substr_compare($dados['texto'] ?? '', $dados['comparar'] ?? '', (int)($dados['inicio'] ?? 0), ($dados['comprimento'] ?? '') !== '' ? (int)$dados['comprimento'] : strlen($dados['comparar'] ?? '')),
        'substr_replace' => fn() => substr_replace($dados['texto'] ?? '', $dados['substituir'] ?? '', (int)($dados['inicio'] ?? 0), ($dados['comprimento'] ?? '') !== '' ? (int)$dados['comprimento'] : null),
        'ltrim' => fn() => ltrim($dados['texto'] ?? ''),
        'rtrim' => fn() => rtrim($dados['texto'] ?? ''),
    ];

    if (!isset($mapaFuncoes[$acao])) {
        return '';
    }

    return (string) $mapaFuncoes[$acao]();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest') {
    $acao = $_POST['acao'] ?? '';
    $resultado = executarFuncaoString($acao, $_POST);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'resultado' => $resultado,
        'acao' => $acao,
    ]);
    exit;
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="reset-funcao.js" defer></script>
    <style>
        .func-name {
            display: none;
        }
        .func-toggle {
            cursor: pointer;
        }
    </style>

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
                            <li><a href="" class="menu-link">sobre</a></li>
                            <li><a href="" class="menu-link">contatos</a></li>
                            <input type="button" value="Conta" id="Conta" class="Conta_Conta">
                            <a class="btn btn-outline-light ms-lg-3 mt-2 mt-lg-0" href="erro404.php">Suporte</a>
                        </ul>
                    </nav> 
                </div>
            </div>
                
            </div>
            <nav class="navbar-menu menu1">
                <ul class="menu-items">
                    <li><a href="a" class="menu-link">Guia</a></li>
                    <li><a href="" class="menu-link">Post</a></li>
                    <li><a href="" class="menu-link">Blog oficial</a></li>
                    <li><a href="" class="menu-link">Post da comunidade</a></li>
                    <li><a href="" class="menu-link">Blog da comunidade</a></li>
                </ul>
            </nav>
        </header>


        <main class="page-body">

            <div class="layout-grid">
                <article class="content-main">
                    <section class="main-card">
                        <div class="headline-text">
                            <h1><strong>Funções de String</strong></h1>
                            <p>Descrição</p>
                            <hr>
                            <h1><strong>Relacionados</strong></h1>
                            <ul>
                                <li><a href="funcoes.php">Funções em php</a></li>
                                <li><a href="funcoes-string.php">Funções de string</a></li>
                                <li><a href="funcoes-array.php">Funções de array</a></li>
                                <li><a href="funcoes-data.php">Funções de matematica</a></li>
                            </ul>
                        </div>
                        
                        <hr>

                        <div class="box-card">
                            <div class="tape-strip"></div>
                            <div class="box-header">
                                <h2 class="box-title">Funções de String</h2>
                                <p class="box-subtitle">Ferramentas para organizar, cortar e formatar textos recebidos.</p>
                            </div>
                        <!-- contenteditable="true" deixa eu editar a caixa de texto -->
                            <!-- ITEM 1 -->
                            <details class="func-item"> <!-- Consegue fazer o usuario recolher ou expandir esta parte -->
                                <summary class="func-toggle"> ADDCSLASHES <p style="font-size: 0.8em;">Escapa string com barras invertidas no estilo C<p> </summary> <!-- Sempre vem com um summary que faz o titulo, tudo apartir daqui fica dentro da parte de expandir-->
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">addcslashes</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Adiciona barras invertidas antes de caracteres especiais para evitar erros de escape.</p>
                                    <div class="code-container" contenteditable="false">
                                        <span class="code-keyword">echo</span> <span class="code-func">addcslashes</span>(<span class="code-keyword">'foo[ ]'</span>, <span class="code-keyword">'A..z'</span>); <span class="code-comment">// Saída: O\'Reilly</span>
                                    </div>
                                </div>
                                <form method="post" id="form-addcslashes" data-ajax="true" data-result-id="resultado-addcslashes">
                                    <input type="hidden" name="acao" value="addcslashes">
                                    <input type="text" name="string" id="string-addcslashes" placeholder="Seu texto">
                                    <input type="text" name="parametro1" id="parametro1-addcslashes" placeholder="A">
                                    <input type="text" name="parametro2" id="parametro2-addcslashes" placeholder="z">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-addcslashes" data-result-id="resultado-addcslashes">Reset</button>
                                </form>

                                <?php
                                $resultado_exibido = '';
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $string = $_POST['string'] ?? '';
                                    $parametro1 = $_POST['parametro1'] ?? '';
                                    $parametro2 = $_POST['parametro2'] ?? '';

                                    if ($string !== '' && $parametro1 !== '' && $parametro2 !== '') {
                                        $resultado = addcslashes($string, $parametro1 . '..' . $parametro2);
                                        $resultado_exibido = 'Resultado: ' . htmlspecialchars($resultado);
                                    }
                                }

                                if ($resultado_exibido !== '') {
                                    echo '<div id="resultado-addcslashes" style="margin-top: 12px; font-weight: 600;">' . $resultado_exibido . '</div>';
                                }
                                ?>
                            </details>


                            <!-- ITEM 2 -->
                            <details class="func-item">
                                <summary class="func-toggle"> ADDSLASHES <p style="font-size: 0.8em;">ADICIONA BARRAS INVERTIDAS ANTES DE CARACTERES ESPESCIAIS PARA EVITAR ERROS DE ESCAPE.<p> </summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">addslashes($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Adiciona barras invertidas antes de caracteres especiais para evitar erros de escape.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$texto</span> = <span class="code-str">"O'Reilly"</span>;
                                        <span class="code-keyword">echo</span> <span class="code-func">addslashes</span>(<span class="code-keyword">$texto</span>); <span class="code-comment">// Saída: O\'Reilly</span>
                                    </div>
                                </div>
                                <form method="post" id="form-addslashes" data-ajax="true" data-result-id="resultado-addslashes">
                                    <input type="hidden" name="acao" value="addslashes">
                                    <input type="text" name="texto" id="texto-addslashes" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-addslashes" data-result-id="resultado-addslashes">Reset</button>
                                </form>

                                <?php
                                $resultado_addslashes = '';
                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto'])) {
                                    $texto = $_POST['texto'] ?? '';

                                    if ($texto !== '') {
                                        $resultado_addslashes = 'Resultado: ' . htmlspecialchars(addslashes($texto));
                                    }
                                }

                                if ($resultado_addslashes !== '') {
                                    echo '<div id="resultado-addslashes" style="margin-top: 12px; font-weight: 600;">' . $resultado_addslashes . '</div>';
                                }
                                ?>
                            </details>

                            <!-- ITEM 3 -->
                            <details class="func-item">
                                <summary class="func-toggle">STRLEN <p style="font-size: 0.8em;">Retorna o tamanho de uma string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strlen($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Retorna o número de caracteres em uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$texto</span> = <span class="code-str">"Olá Mundo"</span>;<br>
                                        <span class="code-keyword">echo</span> <span class="code-func">strlen</span>(<span class="code-keyword">$texto</span>); <span class="code-comment">// Saída: 9</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strlen" data-ajax="true" data-result-id="resultado-strlen">
                                    <input type="hidden" name="acao" value="strlen">
                                    <input type="text" name="texto" id="texto-strlen" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strlen" data-result-id="resultado-strlen">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 4 -->
                            <details class="func-item">
                                <summary class="func-toggle">SUBSTR <p style="font-size: 0.8em;">Retorna parte de uma string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">substr($string, $start, $length)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Extrai uma parte de uma string começando em uma posição.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$texto</span> = <span class="code-str">"Hello World"</span>;<br>
                                        <span class="code-keyword">echo</span> <span class="code-func">substr</span>(<span class="code-keyword">$texto</span>, <span class="code-num">0</span>, <span class="code-num">5</span>); <span class="code-comment">// Saída: Hello</span>
                                    </div>
                                </div>
                                <form method="post" id="form-substr" data-ajax="true" data-result-id="resultado-substr">
                                    <input type="hidden" name="acao" value="substr">
                                    <input type="text" name="texto" id="texto-substr" placeholder="Digite o texto">
                                    <input type="number" name="inicio" id="inicio-substr" placeholder="Posição inicial" value="0">
                                    <input type="number" name="tamanho" id="tamanho-substr" placeholder="Tamanho">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-substr" data-result-id="resultado-substr">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 5 -->
                            <details class="func-item">
                                <summary class="func-toggle">EXPLODE <p style="font-size: 0.8em;">Divide uma string com base em outra string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">explode($delimiter, $string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Divide uma string em um array usando um separador.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$texto</span> = <span class="code-str">"maçã,banana,laranja"</span>;<br>
                                        <span class="code-keyword">$array</span> = <span class="code-func">explode</span>(<span class="code-str">","</span>, <span class="code-keyword">$texto</span>); <span class="code-comment">// Array</span>
                                    </div>
                                </div>
                                <form method="post" id="form-explode" data-ajax="true" data-result-id="resultado-explode">
                                    <input type="hidden" name="acao" value="explode">
                                    <input type="text" name="texto" id="texto-explode" placeholder="texto,com,separador">
                                    <input type="text" name="separador" id="separador-explode" placeholder="Separador" value=",">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-explode" data-result-id="resultado-explode">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 6 -->
                            <details class="func-item">
                                <summary class="func-toggle">STR_REPLACE <p style="font-size: 0.8em;">Substitui todas as ocorrências da string de pesquisa</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_replace($search, $replace, $string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Substitui todas as ocorrências de uma substring.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$texto</span> = <span class="code-str">"Olá Mundo"</span>;<br>
                                        <span class="code-keyword">echo</span> <span class="code-func">str_replace</span>(<span class="code-str">"Mundo"</span>, <span class="code-str">"PHP"</span>, <span class="code-keyword">$texto</span>); <span class="code-comment">// Olá PHP</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_replace" data-ajax="true" data-result-id="resultado-str_replace">
                                    <input type="hidden" name="acao" value="str_replace">
                                    <input type="text" name="texto" id="texto-str_replace" placeholder="Texto original">
                                    <input type="text" name="buscar" id="buscar-str_replace" placeholder="Buscar">
                                    <input type="text" name="substituir" id="substituir-str_replace" placeholder="Substituir por">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_replace" data-result-id="resultado-str_replace">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 7 -->
                            <details class="func-item">
                                <summary class="func-toggle">TRIM <p style="font-size: 0.8em;">Retira espaços do início e final de uma string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">trim($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Remove espaços em branco do início e fim.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$texto</span> = <span class="code-str">"   Olá   "</span>;<br>
                                        <span class="code-keyword">echo</span> <span class="code-func">trim</span>(<span class="code-keyword">$texto</span>); <span class="code-comment">// Saída: Olá</span>
                                    </div>
                                </div>
                                <form method="post" id="form-trim" data-ajax="true" data-result-id="resultado-trim">
                                    <input type="hidden" name="acao" value="trim">
                                    <input type="text" name="texto" id="texto-trim" placeholder="  Digite com espaços  ">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-trim" data-result-id="resultado-trim">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 8 -->
                            <details class="func-item">
                                <summary class="func-toggle">STRTOLOWER <p style="font-size: 0.8em;">Converte uma string para minúsculas</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strtolower($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte todos os caracteres para minúsculas.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strtolower</span>(<span class="code-str">"OLÁ MUNDO"</span>); <span class="code-comment">// Saída: olá mundo</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strtolower" data-ajax="true" data-result-id="resultado-strtolower">
                                    <input type="hidden" name="acao" value="strtolower">
                                    <input type="text" name="texto" id="texto-strtolower" placeholder="DIGITE EM MAIÚSCULA">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strtolower" data-result-id="resultado-strtolower">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 9 -->
                            <details class="func-item">
                                <summary class="func-toggle">STRTOUPPER <p style="font-size: 0.8em;">Converte uma string em maiúsculas</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strtoupper($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte todos os caracteres para maiúsculas.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strtoupper</span>(<span class="code-str">"olá mundo"</span>); <span class="code-comment">// Saída: OLÁ MUNDO</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strtoupper" data-ajax="true" data-result-id="resultado-strtoupper">
                                    <input type="hidden" name="acao" value="strtoupper">
                                    <input type="text" name="texto" id="texto-strtoupper" placeholder="Digite em minúscula">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strtoupper" data-result-id="resultado-strtoupper">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 10 -->
                            <details class="func-item">
                                <summary class="func-toggle">UCFIRST <p style="font-size: 0.8em;">Transforma o primeiro caractere em maiúsculo</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">ucfirst($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte apenas o primeiro caractere para maiúscula.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">ucfirst</span>(<span class="code-str">"olá mundo"</span>); <span class="code-comment">// Saída: Olá mundo</span>
                                    </div>
                                </div>
                                <form method="post" id="form-ucfirst" data-ajax="true" data-result-id="resultado-ucfirst">
                                    <input type="hidden" name="acao" value="ucfirst">
                                    <input type="text" name="texto" id="texto-ucfirst" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-ucfirst" data-result-id="resultado-ucfirst">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 11 -->
                            <details class="func-item">
                                <summary class="func-toggle">UCWORDS <p style="font-size: 0.8em;">Primeira letra de cada palavra em maiúscula</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">ucwords($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte a primeira letra de cada palavra para maiúscula.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">ucwords</span>(<span class="code-str">"olá mundo php"</span>); <span class="code-comment">// Saída: Olá Mundo Php</span>
                                    </div>
                                </div>
                                <form method="post" id="form-ucwords" data-ajax="true" data-result-id="resultado-ucwords">
                                    <input type="hidden" name="acao" value="ucwords">
                                    <input type="text" name="texto" id="texto-ucwords" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-ucwords" data-result-id="resultado-ucwords">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 12 -->
                            <details class="func-item">
                                <summary class="func-toggle">STRPOS <p style="font-size: 0.8em;">Encontra a posição da primeira ocorrência</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strpos($haystack, $needle)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Retorna a posição da primeira ocorrência de uma substring.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strpos</span>(<span class="code-str">"Hello World"</span>, <span class="code-str">"World"</span>); <span class="code-comment">// Saída: 6</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strpos" data-ajax="true" data-result-id="resultado-strpos">
                                    <input type="hidden" name="acao" value="strpos">
                                    <input type="text" name="haystack" id="haystack-strpos" placeholder="Texto completo">
                                    <input type="text" name="needle" id="needle-strpos" placeholder="Buscar por">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strpos" data-result-id="resultado-strpos">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 13 -->
                            <details class="func-item">
                                <summary class="func-toggle">STRREV <p style="font-size: 0.8em;">Reverte uma string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strrev($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Inverte a ordem dos caracteres em uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strrev</span>(<span class="code-str">"PHP"</span>); <span class="code-comment">// Saída: PHP (inverso)</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strrev" data-ajax="true" data-result-id="resultado-strrev">
                                    <input type="hidden" name="acao" value="strrev">
                                    <input type="text" name="texto" id="texto-strrev" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strrev" data-result-id="resultado-strrev">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 14 -->
                            <details class="func-item">
                                <summary class="func-toggle">IMPLODE <p style="font-size: 0.8em;">Aglutina elementos de um array com uma string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">implode($separator, $array)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Junta elementos de um array em uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">$array</span> = <span class="code-str">["maçã", "banana", "laranja"]</span>;<br>
                                        <span class="code-keyword">echo</span> <span class="code-func">implode</span>(<span class="code-str">", "</span>, <span class="code-keyword">$array</span>); <span class="code-comment">// maçã, banana, laranja</span>
                                    </div>
                                </div>
                                <form method="post" id="form-implode" data-ajax="true" data-result-id="resultado-implode">
                                    <input type="hidden" name="acao" value="implode">
                                    <input type="text" name="texto" id="texto-implode" placeholder="maçã,banana,laranja">
                                    <input type="text" name="separador" id="separador-implode" placeholder="Separador para juntar" value=", ">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-implode" data-result-id="resultado-implode">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 15 -->
                            <details class="func-item">
                                <summary class="func-toggle">STR_REPEAT <p style="font-size: 0.8em;">Repete uma string</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_repeat($input, $times)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Repete uma string um número específico de vezes.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_repeat</span>(<span class="code-str">"Ha"</span>, <span class="code-num">3</span>); <span class="code-comment">// Saída: HaHaHa</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_repeat" data-ajax="true" data-result-id="resultado-str_repeat">
                                    <input type="hidden" name="acao" value="str_repeat">
                                    <input type="text" name="texto" id="texto-str_repeat" placeholder="Digite o texto">
                                    <input type="number" name="vezes" id="vezes-str_repeat" placeholder="Quantas vezes?" value="3">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_repeat" data-result-id="resultado-str_repeat">Reset</button>
                                </form>
                            </details>

                            <!-- ITEM 16 -->
                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Verifica se a string contém uma substring.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_contains</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Verifica se uma string contém outra string informada.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_contains</span>(<span class="code-str">"PHP e MySQL"</span>, <span class="code-str">"MySQL"</span>); <span class="code-comment">// Saída: true</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_contains" data-ajax="true" data-result-id="resultado-str_contains">
                                    <input type="hidden" name="acao" value="str_contains">
                                    <input type="text" name="texto" id="texto-str_contains" placeholder="Digite o texto">
                                    <input type="text" name="buscar" id="buscar-str_contains" placeholder="Buscar no texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_contains" data-result-id="resultado-str_contains">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Verifica se a string começa com o valor informado.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_starts_with</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Confere se a string começa com um prefixo específico.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_starts_with</span>(<span class="code-str">"desenvolvimento"</span>, <span class="code-str">"des"</span>); <span class="code-comment">// Saída: true</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_starts_with" data-ajax="true" data-result-id="resultado-str_starts_with">
                                    <input type="hidden" name="acao" value="str_starts_with">
                                    <input type="text" name="texto" id="texto-str_starts_with" placeholder="Digite o texto">
                                    <input type="text" name="buscar" id="buscar-str_starts_with" placeholder="Prefixo">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_starts_with" data-result-id="resultado-str_starts_with">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Verifica se a string termina com o valor informado.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_ends_with</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Confere se a string termina com um sufixo específico.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_ends_with</span>(<span class="code-str">"arquivo.php"</span>, <span class="code-str">".php"</span>); <span class="code-comment">// Saída: true</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_ends_with" data-ajax="true" data-result-id="resultado-str_ends_with">
                                    <input type="hidden" name="acao" value="str_ends_with">
                                    <input type="text" name="texto" id="texto-str_ends_with" placeholder="Digite o texto">
                                    <input type="text" name="buscar" id="buscar-str_ends_with" placeholder="Sufixo">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_ends_with" data-result-id="resultado-str_ends_with">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Preenche uma string até chegar ao tamanho desejado.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_pad</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Completa a string com um caractere até atingir um tamanho específico.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_pad</span>(<span class="code-str">"PHP"</span>, <span class="code-num">8</span>, <span class="code-str">"-"</span>, <span class="code-func">STR_PAD_RIGHT</span>); <span class="code-comment">// Saída: PHP-----</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_pad" data-ajax="true" data-result-id="resultado-str_pad">
                                    <input type="hidden" name="acao" value="str_pad">
                                    <input type="text" name="texto" id="texto-str_pad" placeholder="Digite o texto">
                                    <input type="number" name="tamanho" id="tamanho-str_pad" placeholder="Tamanho final" value="10">
                                    <input type="text" name="caractere" id="caractere-str_pad" placeholder="Caractere" value=" ">
                                    <input type="number" name="lado" id="lado-str_pad" placeholder="Lado: 0 esquerda / 1 centro / 2 direita" value="2">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_pad" data-result-id="resultado-str_pad">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Conta quantas palavras existem em uma frase.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_word_count</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Retorna a quantidade de palavras em uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_word_count</span>(<span class="code-str">"PHP para iniciantes"</span>); <span class="code-comment">// Saída: 4</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_word_count" data-ajax="true" data-result-id="resultado-str_word_count">
                                    <input type="hidden" name="acao" value="str_word_count">
                                    <input type="text" name="texto" id="texto-str_word_count" placeholder="Digite uma frase">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_word_count" data-result-id="resultado-str_word_count">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Remove tags HTML e PHP da string.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strip_tags</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Remove tags HTML e PHP de um texto para deixar o conteúdo limpo.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strip_tags</span>(<span class="code-str">"&lt;b&gt;PHP&lt;/b&gt; &lt;i&gt;legal&lt;/i&gt;"</span>); <span class="code-comment">// Saída: PHP legal</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strip_tags" data-ajax="true" data-result-id="resultado-strip_tags">
                                    <input type="hidden" name="acao" value="strip_tags">
                                    <input type="text" name="texto" id="texto-strip_tags" placeholder="Digite com tags HTML">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strip_tags" data-result-id="resultado-strip_tags">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Coloca a primeira letra em minúscula.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">lcfirst</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte o primeiro caractere para minúsculo.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">lcfirst</span>(<span class="code-str">"PHP e HTML"</span>); <span class="code-comment">// Saída: pHP e HTML</span>
                                    </div>
                                </div>
                                <form method="post" id="form-lcfirst" data-ajax="true" data-result-id="resultado-lcfirst">
                                    <input type="hidden" name="acao" value="lcfirst">
                                    <input type="text" name="texto" id="texto-lcfirst" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-lcfirst" data-result-id="resultado-lcfirst">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Calcula o hash MD5 da string.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">md5</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Gera um hash criptográfico em formato MD5.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">md5</span>(<span class="code-str">"php"</span>); <span class="code-comment">// Saída: hash em MD5</span>
                                    </div>
                                </div>
                                <form method="post" id="form-md5" data-ajax="true" data-result-id="resultado-md5">
                                    <input type="hidden" name="acao" value="md5">
                                    <input type="text" name="texto" id="texto-md5" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-md5" data-result-id="resultado-md5">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Calcula o hash SHA1 da string.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">sha1</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Gera um hash criptográfico em formato SHA1.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">sha1</span>(<span class="code-str">"php"</span>); <span class="code-comment">// Saída: hash em SHA1</span>
                                    </div>
                                </div>
                                <form method="post" id="form-sha1" data-ajax="true" data-result-id="resultado-sha1">
                                    <input type="hidden" name="acao" value="sha1">
                                    <input type="text" name="texto" id="texto-sha1" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-sha1" data-result-id="resultado-sha1">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Embaralha os caracteres da string.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_shuffle</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Mistura aleatoriamente os caracteres de uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_shuffle</span>(<span class="code-str">"PHP"</span>); <span class="code-comment">// Saída: ordem aleatória</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_shuffle" data-ajax="true" data-result-id="resultado-str_shuffle">
                                    <input type="hidden" name="acao" value="str_shuffle">
                                    <input type="text" name="texto" id="texto-str_shuffle" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_shuffle" data-result-id="resultado-str_shuffle">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Divide a string em pedaços com tamanho definido.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_split</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte uma string em um array de pedaços com tamanho definido.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">implode</span>(<span class="code-str">" | "</span>, <span class="code-func">str_split</span>(<span class="code-str">"PHP"</span>, <span class="code-num">1</span>)); <span class="code-comment">// P | H | P</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_split" data-ajax="true" data-result-id="resultado-str_split">
                                    <input type="hidden" name="acao" value="str_split">
                                    <input type="text" name="texto" id="texto-str_split" placeholder="Digite o texto">
                                    <input type="number" name="tamanho" id="tamanho-str_split" placeholder="Tamanho do pedaço" value="2">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_split" data-result-id="resultado-str_split">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Quebra a linha de um texto no tamanho informado.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">wordwrap</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Quebra uma string em linhas com largura definida.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">wordwrap</span>(<span class="code-str">"PHP para iniciantes"</span>, <span class="code-num">5</span>, <span class="code-str">"&lt;br&gt;"</span>, <span class="code-keyword">true</span>); <span class="code-comment">// Quebra em linhas</span>
                                    </div>
                                </div>
                                <form method="post" id="form-wordwrap" data-ajax="true" data-result-id="resultado-wordwrap">
                                    <input type="hidden" name="acao" value="wordwrap">
                                    <input type="text" name="texto" id="texto-wordwrap" placeholder="Digite um texto longo">
                                    <input type="number" name="largura" id="largura-wordwrap" placeholder="Largura" value="10">
                                    <input type="text" name="quebra" id="quebra-wordwrap" placeholder="Quebra" value="\n">
                                    <label style="display:block; margin-top:8px;">
                                        <input type="checkbox" name="quebrar" value="1"> Quebrar palavras longas
                                    </label>
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-wordwrap" data-result-id="resultado-wordwrap">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Converte uma string em hexadecimal.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">bin2hex</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Converte os bytes de uma string para uma representação hexadecimal.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">bin2hex</span>(<span class="code-str">"PHP"</span>); <span class="code-comment">// Saída: 504850</span>
                                    </div>
                                </div>
                                <form method="post" id="form-bin2hex" data-ajax="true" data-result-id="resultado-bin2hex">
                                    <input type="hidden" name="acao" value="bin2hex">
                                    <input type="text" name="texto" id="texto-bin2hex" placeholder="Digite o texto">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-bin2hex" data-result-id="resultado-bin2hex">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Converte hexadecimal de volta para string.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">hex2bin</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Transforma uma sequência hexadecimal em uma string original.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">hex2bin</span>(<span class="code-str">"504850"</span>); <span class="code-comment">// Saída: PHP</span>
                                    </div>
                                </div>
                                <form method="post" id="form-hex2bin" data-ajax="true" data-result-id="resultado-hex2bin">
                                    <input type="hidden" name="acao" value="hex2bin">
                                    <input type="text" name="texto" id="texto-hex2bin" placeholder="Digite o valor hexadecimal">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-hex2bin" data-result-id="resultado-hex2bin">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Troca texto sem diferenciar maiúsculas e minúsculas.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">str_ireplace</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Substitui uma substring ignorando maiúsculas e minúsculas.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">str_ireplace</span>(<span class="code-str">"php"</span>, <span class="code-str">"HTML"</span>, <span class="code-str">"php e php"</span>); <span class="code-comment">// HTML e HTML</span>
                                    </div>
                                </div>
                                <form method="post" id="form-str_ireplace" data-ajax="true" data-result-id="resultado-str_ireplace">
                                    <input type="hidden" name="acao" value="str_ireplace">
                                    <input type="text" name="texto" id="texto-str_ireplace" placeholder="Texto original">
                                    <input type="text" name="buscar" id="buscar-str_ireplace" placeholder="Buscar">
                                    <input type="text" name="substituir" id="substituir-str_ireplace" placeholder="Substituir por">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-str_ireplace" data-result-id="resultado-str_ireplace">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Encontra a posição da substring ignorando maiúsculas.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">stripos</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Busca a primeira ocorrência sem diferenciar maiúsculas e minúsculas.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">stripos</span>(<span class="code-str">"Estudo em PHP"</span>, <span class="code-str">"php"</span>); <span class="code-comment">// Saída: 10</span>
                                    </div>
                                </div>
                                <form method="post" id="form-stripos" data-ajax="true" data-result-id="resultado-stripos">
                                    <input type="hidden" name="acao" value="stripos">
                                    <input type="text" name="texto" id="texto-stripos" placeholder="Texto completo">
                                    <input type="text" name="buscar" id="buscar-stripos" placeholder="Buscar">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-stripos" data-result-id="resultado-stripos">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Conta quantas vezes uma substring aparece.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">substr_count</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Calcula quantas ocorrências de uma substring existem em uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">substr_count</span>(<span class="code-str">"PHP PHP PHP"</span>, <span class="code-str">"PHP"</span>); <span class="code-comment">// Saída: 3</span>
                                    </div>
                                </div>
                                <form method="post" id="form-substr_count" data-ajax="true" data-result-id="resultado-substr_count">
                                    <input type="hidden" name="acao" value="substr_count">
                                    <input type="text" name="texto" id="texto-substr_count" placeholder="Digite o texto">
                                    <input type="text" name="buscar" id="buscar-substr_count" placeholder="Substring">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-substr_count" data-result-id="resultado-substr_count">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Troca caracteres com base em um mapa de tradução.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strtr</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Traduz caracteres específicos para outros caracteres.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strtr</span>(<span class="code-str">"a-b-c"</span>, <span class="code-str">"-"</span>, <span class="code-str">"/"</span>); <span class="code-comment">// Saída: a/b/c</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strtr" data-ajax="true" data-result-id="resultado-strtr">
                                    <input type="hidden" name="acao" value="strtr">
                                    <input type="text" name="texto" id="texto-strtr" placeholder="Digite o texto">
                                    <input type="text" name="buscar" id="buscar-strtr" placeholder="Caractere antigo">
                                    <input type="text" name="substituir" id="substituir-strtr" placeholder="Caractere novo">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strtr" data-result-id="resultado-strtr">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Compara duas strings sem diferenciar maiúsculas e minúsculas.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strcasecmp</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Compara duas strings de forma insensível ao caso.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strcasecmp</span>(<span class="code-str">"PHP"</span>, <span class="code-str">"php"</span>); <span class="code-comment">// Saída: 0</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strcasecmp" data-ajax="true" data-result-id="resultado-strcasecmp">
                                    <input type="hidden" name="acao" value="strcasecmp">
                                    <input type="text" name="texto" id="texto-strcasecmp" placeholder="Primeira string">
                                    <input type="text" name="comparar" id="comparar-strcasecmp" placeholder="Segunda string">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strcasecmp" data-result-id="resultado-strcasecmp">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Compara duas strings respeitando maiúsculas e minúsculas.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strcmp</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Compara duas strings de forma sensível ao caso.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strcmp</span>(<span class="code-str">"PHP"</span>, <span class="code-str">"php"</span>); <span class="code-comment">// Diferença</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strcmp" data-ajax="true" data-result-id="resultado-strcmp">
                                    <input type="hidden" name="acao" value="strcmp">
                                    <input type="text" name="texto" id="texto-strcmp" placeholder="Primeira string">
                                    <input type="text" name="comparar" id="comparar-strcmp" placeholder="Segunda string">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strcmp" data-result-id="resultado-strcmp">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Remove escapes de barras invertidas em strings escapadas.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">stripcslashes</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Remove os escapes adicionados por addcslashes.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">stripcslashes</span>(<span class="code-str">"O\\'Reilly"</span>); <span class="code-comment">// O'Reilly</span>
                                    </div>
                                </div>
                                <form method="post" id="form-stripcslashes" data-ajax="true" data-result-id="resultado-stripcslashes">
                                    <input type="hidden" name="acao" value="stripcslashes">
                                    <input type="text" name="texto" id="texto-stripcslashes" placeholder="Digite o texto com escapes">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-stripcslashes" data-result-id="resultado-stripcslashes">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Procura a primeira ocorrência sem diferenciar letras maiúsculas e minúsculas.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">stristr</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Busca uma substring ignorando o caso da letra.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">stristr</span>(<span class="code-str">"Curso de PHP"</span>, <span class="code-str">"php"</span>); <span class="code-comment">// PHP</span>
                                    </div>
                                </div>
                                <form method="post" id="form-stristr" data-ajax="true" data-result-id="resultado-stristr">
                                    <input type="hidden" name="acao" value="stristr">
                                    <input type="text" name="texto" id="texto-stristr" placeholder="Texto completo">
                                    <input type="text" name="buscar" id="buscar-stristr" placeholder="Buscar">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-stristr" data-result-id="resultado-stristr">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Encontra a última ocorrência de uma substring.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strrpos</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Retorna a última posição de uma substring dentro de uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strrpos</span>(<span class="code-str">"PHP PHP"</span>, <span class="code-str">"PHP"</span>); <span class="code-comment">// 4</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strrpos" data-ajax="true" data-result-id="resultado-strrpos">
                                    <input type="hidden" name="acao" value="strrpos">
                                    <input type="text" name="texto" id="texto-strrpos" placeholder="Texto completo">
                                    <input type="text" name="buscar" id="buscar-strrpos" placeholder="Buscar">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strrpos" data-result-id="resultado-strrpos">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Encontra a primeira ocorrência de uma substring.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">strstr</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Retorna a parte da string a partir da primeira ocorrência do valor pesquisado.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">strstr</span>(<span class="code-str">"Curso de PHP"</span>, <span class="code-str">"de"</span>); <span class="code-comment">// de PHP</span>
                                    </div>
                                </div>
                                <form method="post" id="form-strstr" data-ajax="true" data-result-id="resultado-strstr">
                                    <input type="hidden" name="acao" value="strstr">
                                    <input type="text" name="texto" id="texto-strstr" placeholder="Texto completo">
                                    <input type="text" name="buscar" id="buscar-strstr" placeholder="Buscar">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-strstr" data-result-id="resultado-strstr">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Substitui texto dentro de uma parte específica da string.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">substr_replace</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Troca parte de uma string por outro valor, a partir de uma posição.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">substr_replace</span>(<span class="code-str">"PHP Java"</span>, <span class="code-str">"Python"</span>, <span class="code-num">4</span>, <span class="code-num">4</span>); <span class="code-comment">// PHP Python</span>
                                    </div>
                                </div>
                                <form method="post" id="form-substr_replace" data-ajax="true" data-result-id="resultado-substr_replace">
                                    <input type="hidden" name="acao" value="substr_replace">
                                    <input type="text" name="texto" id="texto-substr_replace" placeholder="Texto original">
                                    <input type="text" name="substituir" id="substituir-substr_replace" placeholder="Novo valor">
                                    <input type="number" name="inicio" id="inicio-substr_replace" placeholder="Posição inicial" value="4">
                                    <input type="number" name="comprimento" id="comprimento-substr_replace" placeholder="Comprimento" value="4">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-substr_replace" data-result-id="resultado-substr_replace">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle"><p style="font-size: 0.8em;">Compara duas strings a partir de uma posição.</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">substr_compare</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Compara uma parte da string com outra string e retorna o resultado da comparação.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">substr_compare</span>(<span class="code-str">"PHP123"</span>, <span class="code-str">"123"</span>, <span class="code-num">3</span>, <span class="code-num">3</span>); <span class="code-comment">// 0</span>
                                    </div>
                                </div>
                                <form method="post" id="form-substr_compare" data-ajax="true" data-result-id="resultado-substr_compare">
                                    <input type="hidden" name="acao" value="substr_compare">
                                    <input type="text" name="texto" id="texto-substr_compare" placeholder="Texto principal">
                                    <input type="text" name="comparar" id="comparar-substr_compare" placeholder="Texto para comparar">
                                    <input type="number" name="inicio" id="inicio-substr_compare" placeholder="Posição inicial" value="3">
                                    <input type="number" name="comprimento" id="comprimento-substr_compare" placeholder="Tamanho" value="3">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-substr_compare" data-result-id="resultado-substr_compare">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle">LTRIM <p style="font-size: 0.8em;">Remove espaços do início</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">ltrim($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Remove espaços em branco do início de uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">ltrim</span>(<span class="code-str">"   Olá"</span>); <span class="code-comment">// Saída: Olá</span>
                                    </div>
                                </div>
                                <form method="post" id="form-ltrim" data-ajax="true" data-result-id="resultado-ltrim">
                                    <input type="hidden" name="acao" value="ltrim">
                                    <input type="text" name="texto" id="texto-ltrim" placeholder="   Digite com espaços">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-ltrim" data-result-id="resultado-ltrim">Reset</button>
                                </form>
                            </details>

                            <details class="func-item">
                                <summary class="func-toggle">RTRIM <p style="font-size: 0.8em;">Remove espaços do final</p></summary>
                                <div class="func-content">
                                    <div class="func-table">
                                        <div class="func-cell-left"><span class="func-name">rtrim($string)</span></div>
                                        <div class="func-cell-right"><span class="badge-string">String</span></div>
                                    </div>
                                    <p class="func-desc">Remove espaços em branco do final de uma string.</p>
                                    <div class="code-container">
                                        <span class="code-keyword">echo</span> <span class="code-func">rtrim</span>(<span class="code-str">"Olá   "</span>); <span class="code-comment">// Saída: Olá</span>
                                    </div>
                                </div>
                                <form method="post" id="form-rtrim" data-ajax="true" data-result-id="resultado-rtrim">
                                    <input type="hidden" name="acao" value="rtrim">
                                    <input type="text" name="texto" id="texto-rtrim" placeholder="Digite com espaços   ">
                                    <button type="submit">Run Code</button>
                                    <button type="button" data-reset-form="form-rtrim" data-result-id="resultado-rtrim">Reset</button>
                                </form>
                            </details>
                        </div>

                    </section>
                </article>

                <aside class="sidebar">
                    <div class="sidebar-box">
                        <h2>Abas do nosso site:</h2>
                            <p><a href="index.php"><strong>Inicio</strong></a></p>
                            <p><a href="funcoes.php"><strong>Funções</strong></a></p>
                                <ul>
                                    <li><a href="funcoes-string.php"><strong>Funções de string</strong></a></li>
                                    <li><a href="funcoes-array.php"><strong>Funções de array</strong></a></li>
                                    <li><a href="funcoes-math.php"><strong>Funções de math</strong></a></li>
                                </ul>
                            <p><a href="sobre.php"><strong>Sobre</strong></a></p>
                            <p><a href="contato.php"><strong>Contato</strong></a></p>
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