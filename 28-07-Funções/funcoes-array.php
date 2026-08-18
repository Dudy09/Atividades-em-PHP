<?php
function executarFuncaoArray(string $acao, array $dados): string
{
    $acao = strtolower($acao);

    $mapaFuncoes = [
        'count' => fn() => (string) count(explode(',', $dados['array'] ?? '')),
        'array_merge' => fn() => implode(' | ', array_merge(explode(',', $dados['array1'] ?? ''), explode(',', $dados['array2'] ?? ''))),
        'array_pop' => function() use ($dados) { $arr = explode(',', $dados['array'] ?? ''); return array_pop($arr) ?? 'vazio'; },
        'array_shift' => function() use ($dados) { $arr = explode(',', $dados['array'] ?? ''); return array_shift($arr) ?? 'vazio'; },
        'array_slice' => fn() => implode(' | ', array_slice(explode(',', $dados['array'] ?? ''), (int)($dados['inicio'] ?? 0), ($dados['tamanho'] ?? '') !== '' ? (int)$dados['tamanho'] : null)),
        'in_array' => fn() => in_array($dados['elemento'] ?? '', explode(',', $dados['array'] ?? '')) ? 'true' : 'false',
        'array_search' => fn() => (string) (array_search($dados['elemento'] ?? '', explode(',', $dados['array'] ?? '')) !== false ? array_search($dados['elemento'] ?? '', explode(',', $dados['array'] ?? '')) : 'não encontrado'),
        'array_reverse' => fn() => implode(' | ', array_reverse(explode(',', $dados['array'] ?? ''))),
        'array_unique' => fn() => implode(' | ', array_unique(explode(',', $dados['array'] ?? ''))),
        'array_sum' => fn() => (string) array_sum(array_filter(array_map('intval', explode(',', $dados['array'] ?? '')))),
        'array_product' => fn() => (string) array_product(array_filter(array_map('intval', explode(',', $dados['array'] ?? '')))),
        'sort' => fn() => implode(' | ', ($arr = explode(',', $dados['array'] ?? '')) && sort($arr) ? $arr : []),
        'rsort' => fn() => implode(' | ', ($arr = explode(',', $dados['array'] ?? '')) && rsort($arr) ? $arr : []),
        'array_filter' => fn() => implode(' | ', array_filter(explode(',', $dados['array'] ?? ''), fn($v) => !empty($v))),
        'array_map' => fn() => implode(' | ', array_map('strtoupper', explode(',', $dados['array'] ?? ''))),
        'array_reduce' => fn() => (string) array_reduce(array_filter(array_map('intval', explode(',', $dados['array'] ?? ''))), fn($c, $i) => $c + $i, 0),
        'array_chunk' => fn() => implode(' | ', array_map(fn($c) => '[' . implode(', ', $c) . ']', array_chunk(explode(',', $dados['array'] ?? ''), max(1, (int)($dados['tamanho'] ?? 2))))),
        'array_combine' => fn() => implode(' | ', array_combine(explode(',', $dados['keys'] ?? ''), explode(',', $dados['values'] ?? ''))),
        'array_fill' => fn() => implode(' | ', array_fill(0, max(1, (int)($dados['quantidade'] ?? 3)), $dados['valor'] ?? 'item')),
        'range' => fn() => implode(' | ', range((int)($dados['inicio'] ?? 1), (int)($dados['fim'] ?? 10), (int)($dados['passo'] ?? 1))),
        'explode' => fn() => implode(' | ', explode($dados['separador'] ?? ',', $dados['texto'] ?? '')),
        'implode' => fn() => implode($dados['separador'] ?? ',', explode(',', $dados['array'] ?? '')),
        'array_intersect' => fn() => implode(' | ', array_intersect(explode(',', $dados['array1'] ?? ''), explode(',', $dados['array2'] ?? ''))),
        'array_diff' => fn() => implode(' | ', array_diff(explode(',', $dados['array1'] ?? ''), explode(',', $dados['array2'] ?? ''))),
    ];

    if (!isset($mapaFuncoes[$acao])) {
        return '';
    }

    return (string) $mapaFuncoes[$acao]();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest') {
    $acao = $_POST['acao'] ?? '';
    $resultado = executarFuncaoArray($acao, $_POST);

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
                            <li><a href="erro404.php" class="menu-link">sobre</a></li>
                            <li><a href="erro404.php" class="menu-link">contatos</a></li>
                            <input type="button" value="Conta" id="Conta" class="Conta_Conta">
                            <a class="btn btn-outline-light ms-lg-3 mt-2 mt-lg-0" href="erro404.php">Suporte</a>
                        </ul>
                    </nav> 
                </div>
            </div>
                
            </div>
            <nav class="navbar-menu menu1">
                <ul class="menu-items">
                    <li><a href="erro404.php" class="menu-link">Guia</a></li>
                    <li><a href="erro404.php" class="menu-link">Post</a></li>
                    <li><a href="erro404.php" class="menu-link">Blog oficial</a></li>
                    <li><a href="erro404.php" class="menu-link">Post da comunidade</a></li>
                    <li><a href="erro404.php" class="menu-link">Blog da comunidade</a></li>
                </ul>
            </nav>
        </header>


        <main class="page-body">

            <div class="layout-grid">
                <article class="content-main">
                    <section class="main-card">
                        <div class="headline-text">
                            <h1><strong>Funções de Array</strong></h1>
                            <p>Funções para manipular, organizar e processar arrays em PHP</p>
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
                                <h2 class="box-title">Funções de Array</h2>
                                <p class="box-subtitle">Ferramentas para organizar, filtrar e transformar dados em arrays.</p>
                            </div>
                        
                            <!-- COUNT -->
<details class="func-item">
    <summary class="func-toggle">
        COUNT
        <p style="font-size: 0.8em;">Conta a quantidade de elementos de um array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">count($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Retorna a quantidade de elementos presentes no array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"maçã,banana,laranja"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">count</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: 3</span>
        </div>

        <form method="post" id="form-count" data-ajax="true" data-result-id="resultado-count">
            <input type="hidden" name="acao" value="count">
            <input type="text" name="array" id="array-count"
                   placeholder="Ex: maçã,banana,laranja">

            <button type="submit">Run Code</button>
            <button type="button"
                    data-reset-form="form-count"
                    data-result-id="resultado-count">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_MERGE -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_MERGE
        <p style="font-size: 0.8em;">Combina dois ou mais arrays</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_merge($array1, $array2)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Combina os elementos de dois arrays em um único array.</p>

        <div class="code-container">
            <span class="code-keyword">$array1</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">$array2</span> =
            <span class="code-str">"D,E,F"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_merge</span>(
            <span class="code-keyword">$array1</span>,
            <span class="code-keyword">$array2</span>);
            <span class="code-comment">// Saída: A | B | C | D | E | F</span>
        </div>

        <form method="post" id="form-array-merge"
              data-ajax="true" data-result-id="resultado-array-merge">

            <input type="hidden" name="acao" value="array_merge">

            <input type="text" name="array1"
                   placeholder="Primeiro array: A,B,C">

            <input type="text" name="array2"
                   placeholder="Segundo array: D,E,F">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-merge"
                    data-result-id="resultado-array-merge">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_POP -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_POP
        <p style="font-size: 0.8em;">Remove o último elemento do array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_pop($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Remove e retorna o último elemento de um array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_pop</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: C</span>
        </div>

        <form method="post" id="form-array-pop"
              data-ajax="true" data-result-id="resultado-array-pop">

            <input type="hidden" name="acao" value="array_pop">

            <input type="text" name="array"
                   placeholder="Ex: A,B,C">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-pop"
                    data-result-id="resultado-array-pop">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_SHIFT -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_SHIFT
        <p style="font-size: 0.8em;">Remove o primeiro elemento do array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_shift($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Remove e retorna o primeiro elemento de um array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_shift</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: A</span>
        </div>

        <form method="post" id="form-array-shift"
              data-ajax="true" data-result-id="resultado-array-shift">

            <input type="hidden" name="acao" value="array_shift">

            <input type="text" name="array"
                   placeholder="Ex: A,B,C">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-shift"
                    data-result-id="resultado-array-shift">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_SLICE -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_SLICE
        <p style="font-size: 0.8em;">Retorna uma parte do array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_slice($array, $inicio, $tamanho)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Extrai uma parte de um array a partir de uma posição inicial.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,C,D,E"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_slice</span>(
            <span class="code-keyword">$array</span>, 1, 2);
            <span class="code-comment">// Saída: B | C</span>
        </div>

        <form method="post" id="form-array-slice"
              data-ajax="true" data-result-id="resultado-array-slice">

            <input type="hidden" name="acao" value="array_slice">

            <input type="text" name="array"
                   placeholder="Ex: A,B,C,D,E">

            <input type="number" name="inicio"
                   placeholder="Início">

            <input type="number" name="tamanho"
                   placeholder="Tamanho">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-slice"
                    data-result-id="resultado-array-slice">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- IN_ARRAY -->
<details class="func-item">
    <summary class="func-toggle">
        IN_ARRAY
        <p style="font-size: 0.8em;">Verifica se um elemento existe no array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">in_array($elemento, $array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Verifica se determinado valor está presente em um array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"PHP,HTML,CSS"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">in_array</span>(
            <span class="code-str">"PHP"</span>,
            <span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: true</span>
        </div>

        <form method="post" id="form-in-array"
              data-ajax="true" data-result-id="resultado-in-array">

            <input type="hidden" name="acao" value="in_array">

            <input type="text" name="elemento"
                   placeholder="Elemento">

            <input type="text" name="array"
                   placeholder="Ex: PHP,HTML,CSS">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-in-array"
                    data-result-id="resultado-in-array">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_SEARCH -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_SEARCH
        <p style="font-size: 0.8em;">Procura um elemento no array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_search($elemento, $array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Procura um valor no array e retorna sua posição.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"PHP,HTML,CSS"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_search</span>(
            <span class="code-str">"HTML"</span>,
            <span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: 1</span>
        </div>

        <form method="post" id="form-array-search"
              data-ajax="true" data-result-id="resultado-array-search">

            <input type="hidden" name="acao" value="array_search">

            <input type="text" name="elemento"
                   placeholder="Elemento">

            <input type="text" name="array"
                   placeholder="Ex: PHP,HTML,CSS">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-search"
                    data-result-id="resultado-array-search">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_REVERSE -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_REVERSE
        <p style="font-size: 0.8em;">Inverte a ordem dos elementos</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_reverse($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Retorna um novo array com os elementos em ordem inversa.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_reverse</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: C | B | A</span>
        </div>

        <form method="post" id="form-array-reverse"
              data-ajax="true" data-result-id="resultado-array-reverse">

            <input type="hidden" name="acao" value="array_reverse">

            <input type="text" name="array"
                   placeholder="Ex: A,B,C">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-reverse"
                    data-result-id="resultado-array-reverse">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_UNIQUE -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_UNIQUE
        <p style="font-size: 0.8em;">Remove valores duplicados</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_unique($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Remove valores duplicados de um array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,A,C,B"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_unique</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: A | B | C</span>
        </div>

        <form method="post" id="form-array-unique"
              data-ajax="true" data-result-id="resultado-array-unique">

            <input type="hidden" name="acao" value="array_unique">

            <input type="text" name="array"
                   placeholder="Ex: A,B,A,C,B">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-unique"
                    data-result-id="resultado-array-unique">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_SUM -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_SUM
        <p style="font-size: 0.8em;">Soma os valores de um array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_sum($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Calcula a soma dos valores numéricos de um array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"10,20,30"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_sum</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: 60</span>
        </div>

        <form method="post" id="form-array-sum"
              data-ajax="true" data-result-id="resultado-array-sum">

            <input type="hidden" name="acao" value="array_sum">

            <input type="text" name="array"
                   placeholder="Ex: 10,20,30">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-sum"
                    data-result-id="resultado-array-sum">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_PRODUCT -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_PRODUCT
        <p style="font-size: 0.8em;">Multiplica os valores de um array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_product($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Calcula o produto dos valores numéricos de um array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"2,3,4"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_product</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: 24</span>
        </div>

        <form method="post" id="form-array-product"
              data-ajax="true" data-result-id="resultado-array-product">

            <input type="hidden" name="acao" value="array_product">

            <input type="text" name="array"
                   placeholder="Ex: 2,3,4">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-product"
                    data-result-id="resultado-array-product">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- SORT -->
<details class="func-item">
    <summary class="func-toggle">
        SORT
        <p style="font-size: 0.8em;">Ordena o array em ordem crescente</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">sort($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Ordena os elementos do array em ordem crescente.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"30,10,20"</span>;<br>
            <span class="code-func">sort</span>(<span class="code-keyword">$array</span>);<br>
            <span class="code-keyword">echo</span> <span class="code-keyword">$array</span>;
            <span class="code-comment">// Saída: 10 | 20 | 30</span>
        </div>

        <form method="post" id="form-sort"
              data-ajax="true" data-result-id="resultado-sort">

            <input type="hidden" name="acao" value="sort">

            <input type="text" name="array"
                   placeholder="Ex: 30,10,20">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-sort"
                    data-result-id="resultado-sort">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- RSORT -->
<details class="func-item">
    <summary class="func-toggle">
        RSORT
        <p style="font-size: 0.8em;">Ordena o array em ordem decrescente</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">rsort($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Ordena os elementos do array em ordem decrescente.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"10,30,20"</span>;<br>
            <span class="code-func">rsort</span>(<span class="code-keyword">$array</span>);<br>
            <span class="code-keyword">echo</span> <span class="code-keyword">$array</span>;
            <span class="code-comment">// Saída: 30 | 20 | 10</span>
        </div>

        <form method="post" id="form-rsort"
              data-ajax="true" data-result-id="resultado-rsort">

            <input type="hidden" name="acao" value="rsort">

            <input type="text" name="array"
                   placeholder="Ex: 10,30,20">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-rsort"
                    data-result-id="resultado-rsort">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_FILTER -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_FILTER
        <p style="font-size: 0.8em;">Filtra valores vazios do array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_filter($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Remove valores considerados vazios do array.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,,B,,C"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_filter</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: A | B | C</span>
        </div>

        <form method="post" id="form-array-filter"
              data-ajax="true" data-result-id="resultado-array-filter">

            <input type="hidden" name="acao" value="array_filter">

            <input type="text" name="array"
                   placeholder="Ex: A,,B,,C">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-filter"
                    data-result-id="resultado-array-filter">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_MAP -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_MAP
        <p style="font-size: 0.8em;">Aplica uma função aos elementos do array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_map('strtoupper', $array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Converte cada elemento do array para letras maiúsculas.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"php,html,css"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_map</span>(
            <span class="code-str">'strtoupper'</span>,
            <span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: PHP | HTML | CSS</span>
        </div>

        <form method="post" id="form-array-map"
              data-ajax="true" data-result-id="resultado-array-map">

            <input type="hidden" name="acao" value="array_map">

            <input type="text" name="array"
                   placeholder="Ex: php,html,css">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-map"
                    data-result-id="resultado-array-map">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_REDUCE -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_REDUCE
        <p style="font-size: 0.8em;">Reduz o array a um único valor</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_reduce($array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Processa os valores do array e retorna a soma total.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"10,20,30"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_reduce</span>(<span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: 60</span>
        </div>

        <form method="post" id="form-array-reduce"
              data-ajax="true" data-result-id="resultado-array-reduce">

            <input type="hidden" name="acao" value="array_reduce">

            <input type="text" name="array"
                   placeholder="Ex: 10,20,30">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-reduce"
                    data-result-id="resultado-array-reduce">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_CHUNK -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_CHUNK
        <p style="font-size: 0.8em;">Divide o array em partes menores</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_chunk($array, $tamanho)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Divide um array em vários arrays menores.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,C,D"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_chunk</span>(
            <span class="code-keyword">$array</span>, 2);
            <span class="code-comment">// Saída: [A, B] | [C, D]</span>
        </div>

        <form method="post" id="form-array-chunk"
              data-ajax="true" data-result-id="resultado-array-chunk">

            <input type="hidden" name="acao" value="array_chunk">

            <input type="text" name="array"
                   placeholder="Ex: A,B,C,D">

            <input type="number" name="tamanho"
                   placeholder="Tamanho" min="1">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-chunk"
                    data-result-id="resultado-array-chunk">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_COMBINE -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_COMBINE
        <p style="font-size: 0.8em;">Combina chaves e valores</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_combine($keys, $values)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Cria um array usando um array como chaves e outro como valores.</p>

        <div class="code-container">
            <span class="code-keyword">$keys</span> =
            <span class="code-str">"nome,idade"</span>;<br>
            <span class="code-keyword">$values</span> =
            <span class="code-str">"Arthur,16"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_combine</span>(
            <span class="code-keyword">$keys</span>,
            <span class="code-keyword">$values</span>);
        </div>

        <form method="post" id="form-array-combine"
              data-ajax="true" data-result-id="resultado-array-combine">

            <input type="hidden" name="acao" value="array_combine">

            <input type="text" name="keys"
                   placeholder="Chaves: nome,idade">

            <input type="text" name="values"
                   placeholder="Valores: Arthur,16">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-combine"
                    data-result-id="resultado-array-combine">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_FILL -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_FILL
        <p style="font-size: 0.8em;">Preenche um array com um valor</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_fill($inicio, $quantidade, $valor)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Cria um array preenchido com o mesmo valor.</p>

        <div class="code-container">
            <span class="code-keyword">echo</span>
            <span class="code-func">array_fill</span>(0, 3,
            <span class="code-str">"PHP"</span>);
            <span class="code-comment">// Saída: PHP | PHP | PHP</span>
        </div>

        <form method="post" id="form-array-fill"
              data-ajax="true" data-result-id="resultado-array-fill">

            <input type="hidden" name="acao" value="array_fill">

            <input type="number" name="quantidade"
                   placeholder="Quantidade" min="1">

            <input type="text" name="valor"
                   placeholder="Valor">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-fill"
                    data-result-id="resultado-array-fill">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- RANGE -->
<details class="func-item">
    <summary class="func-toggle">
        RANGE
        <p style="font-size: 0.8em;">Cria um array com uma sequência de valores</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">range($inicio, $fim, $passo)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Cria um array contendo uma sequência de números.</p>

        <div class="code-container">
            <span class="code-keyword">echo</span>
            <span class="code-func">range</span>(1, 5, 1);
            <span class="code-comment">// Saída: 1 | 2 | 3 | 4 | 5</span>
        </div>

        <form method="post" id="form-range"
              data-ajax="true" data-result-id="resultado-range">

            <input type="hidden" name="acao" value="range">

            <input type="number" name="inicio"
                   placeholder="Início">

            <input type="number" name="fim"
                   placeholder="Fim">

            <input type="number" name="passo"
                   placeholder="Passo" value="1">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-range"
                    data-result-id="resultado-range">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- EXPLODE -->
<details class="func-item">
    <summary class="func-toggle">
        EXPLODE
        <p style="font-size: 0.8em;">Divide uma string em um array</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">explode($separador, $texto)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">String / Array</span>
            </div>
        </div>

        <p class="func-desc">Divide uma string em partes usando um separador.</p>

        <div class="code-container">
            <span class="code-keyword">$texto</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">explode</span>(
            <span class="code-str">","</span>,
            <span class="code-keyword">$texto</span>);
            <span class="code-comment">// Saída: A | B | C</span>
        </div>

        <form method="post" id="form-explode"
              data-ajax="true" data-result-id="resultado-explode">

            <input type="hidden" name="acao" value="explode">

            <input type="text" name="separador"
                   placeholder="Separador">

            <input type="text" name="texto"
                   placeholder="Texto">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-explode"
                    data-result-id="resultado-explode">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- IMPLODE -->
<details class="func-item">
    <summary class="func-toggle">
        IMPLODE
        <p style="font-size: 0.8em;">Junta elementos de um array em uma string</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">implode($separador, $array)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array / String</span>
            </div>
        </div>

        <p class="func-desc">Junta os elementos de um array usando um separador.</p>

        <div class="code-container">
            <span class="code-keyword">$array</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">implode</span>(
            <span class="code-str">"-"</span>,
            <span class="code-keyword">$array</span>);
            <span class="code-comment">// Saída: A-B-C</span>
        </div>

        <form method="post" id="form-implode"
              data-ajax="true" data-result-id="resultado-implode">

            <input type="hidden" name="acao" value="implode">

            <input type="text" name="separador"
                   placeholder="Separador">

            <input type="text" name="array"
                   placeholder="Ex: A,B,C">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-implode"
                    data-result-id="resultado-implode">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_INTERSECT -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_INTERSECT
        <p style="font-size: 0.8em;">Encontra valores em comum entre arrays</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_intersect($array1, $array2)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Retorna os valores presentes nos dois arrays.</p>

        <div class="code-container">
            <span class="code-keyword">$array1</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">$array2</span> =
            <span class="code-str">"B,C,D"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_intersect</span>(
            <span class="code-keyword">$array1</span>,
            <span class="code-keyword">$array2</span>);
            <span class="code-comment">// Saída: B | C</span>
        </div>

        <form method="post" id="form-array-intersect"
              data-ajax="true" data-result-id="resultado-array-intersect">

            <input type="hidden" name="acao" value="array_intersect">

            <input type="text" name="array1"
                   placeholder="Primeiro array: A,B,C">

            <input type="text" name="array2"
                   placeholder="Segundo array: B,C,D">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-intersect"
                    data-result-id="resultado-array-intersect">
                Reset
            </button>
        </form>
    </div>
</details>


<!-- ARRAY_DIFF -->
<details class="func-item">
    <summary class="func-toggle">
        ARRAY_DIFF
        <p style="font-size: 0.8em;">Compara dois arrays e encontra diferenças</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">array_diff($array1, $array2)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Array</span>
            </div>
        </div>

        <p class="func-desc">Retorna os valores do primeiro array que não estão no segundo.</p>

        <div class="code-container">
            <span class="code-keyword">$array1</span> =
            <span class="code-str">"A,B,C"</span>;<br>
            <span class="code-keyword">$array2</span> =
            <span class="code-str">"B,C,D"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">array_diff</span>(
            <span class="code-keyword">$array1</span>,
            <span class="code-keyword">$array2</span>);
            <span class="code-comment">// Saída: A</span>
        </div>

        <form method="post" id="form-array-diff"
              data-ajax="true" data-result-id="resultado-array-diff">

            <input type="hidden" name="acao" value="array_diff">

            <input type="text" name="array1"
                   placeholder="Primeiro array: A,B,C">

            <input type="text" name="array2"
                   placeholder="Segundo array: B,C,D">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-array-diff"
                    data-result-id="resultado-array-diff">
                Reset
            </button>
        </form>
    </div>
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