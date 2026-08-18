<?php
function executarFuncaoArray(string $acao, array $dados): string
{
    $acao = strtolower($acao);

    $mapaFuncoes = [
        'abs' => [ 'funcao' => fn($dados) => (string) abs((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o valor absoluto de um número.' ],
        'acos' => [ 'funcao' => fn($dados) => (string) acos((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o arco cosseno de um número.' ],
        'acosh' => [ 'funcao' => fn($dados) => (string) acosh((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o cosseno hiperbólico inverso.' ],
        'asin' => [ 'funcao' => fn($dados) => (string) asin((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o arco seno de um número.' ],
        'asinh' => [ 'funcao' => fn($dados) => (string) asinh((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o seno hiperbólico inverso.' ],
        'atan' => [ 'funcao' => fn($dados) => (string) atan((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o arco tangente de um número.' ],
        'atan2' => [ 'funcao' => fn($dados) => (string) atan2((float)($dados['y'] ?? 0), (float)($dados['x'] ?? 0)), 'campos' => ['y', 'x'], 'descricao' => 'Calcula o arco tangente de dois valores.' ],
        'atanh' => [ 'funcao' => fn($dados) => (string) atanh((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna a tangente hiperbólica inversa.' ],
        'base_convert' => [ 'funcao' => fn($dados) => base_convert($dados['numero'] ?? '0', (int)($dados['base_origem'] ?? 10), (int)($dados['base_destino'] ?? 10)), 'campos' => ['numero', 'base_origem', 'base_destino'], 'descricao' => 'Converte um número de uma base para outra.' ],
        'bindec' => [ 'funcao' => fn($dados) => (string) bindec($dados['numero'] ?? '0'), 'campos' => ['numero'], 'descricao' => 'Converte um número binário para decimal.' ],
        'ceil' => [ 'funcao' => fn($dados) => (string) ceil((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Arredonda um número para cima.' ],
        'cos' => [ 'funcao' => fn($dados) => (string) cos((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o cosseno de um número.' ],
        'cosh' => [ 'funcao' => fn($dados) => (string) cosh((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o cosseno hiperbólico.' ],
        'decbin' => [ 'funcao' => fn($dados) => decbin((int)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Converte decimal para binário.' ],
        'dechex' => [ 'funcao' => fn($dados) => dechex((int)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Converte decimal para hexadecimal.' ],
        'decoct' => [ 'funcao' => fn($dados) => decoct((int)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Converte decimal para octal.' ],
        'deg2rad' => [ 'funcao' => fn($dados) => (string) deg2rad((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Converte graus para radianos.' ],
        'exp' => [ 'funcao' => fn($dados) => (string) exp((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Calcula o valor exponencial.' ],
        'expm1' => [ 'funcao' => fn($dados) => (string) expm1((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Calcula exp(x) - 1.' ],
        'fdiv' => [ 'funcao' => fn($dados) => (string) fdiv((float)($dados['numero1'] ?? 0), (float)($dados['numero2'] ?? 1)), 'campos' => ['numero1', 'numero2'], 'descricao' => 'Realiza uma divisão de ponto flutuante.' ],
        'floor' => [ 'funcao' => fn($dados) => (string) floor((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Arredonda um número para baixo.' ],
        'fmod' => [ 'funcao' => fn($dados) => (string) fmod((float)($dados['numero1'] ?? 0), (float)($dados['numero2'] ?? 1)), 'campos' => ['numero1', 'numero2'], 'descricao' => 'Retorna o resto da divisão.' ],
        'fpow' => [ 'funcao' => fn($dados) => (string) pow((float)($dados['numero1'] ?? 0), (float)($dados['numero2'] ?? 0)), 'campos' => ['numero1', 'numero2'], 'descricao' => 'Calcula uma potência.' ],
        'hexdec' => [ 'funcao' => fn($dados) => (string) hexdec($dados['numero'] ?? '0'), 'campos' => ['numero'], 'descricao' => 'Converte hexadecimal para decimal.' ],
        'hypot' => [ 'funcao' => fn($dados) => (string) hypot((float)($dados['numero1'] ?? 0), (float)($dados['numero2'] ?? 0)), 'campos' => ['numero1', 'numero2'], 'descricao' => 'Calcula a hipotenusa.' ],
        'intdiv' => [ 'funcao' => fn($dados) => (string) intdiv((int)($dados['numero1'] ?? 0), (int)($dados['numero2'] ?? 1)), 'campos' => ['numero1', 'numero2'], 'descricao' => 'Realiza uma divisão inteira.' ],
        'is_finite' => [ 'funcao' => fn($dados) => is_finite((float)($dados['numero'] ?? 0)) ? 'true' : 'false', 'campos' => ['numero'], 'descricao' => 'Verifica se o número é finito.' ],
        'is_infinite' => [ 'funcao' => fn($dados) => is_infinite((float)($dados['numero'] ?? 0)) ? 'true' : 'false', 'campos' => ['numero'], 'descricao' => 'Verifica se o número é infinito.' ],
        'is_nan' => [ 'funcao' => fn($dados) => is_nan((float)($dados['numero'] ?? 0)) ? 'true' : 'false', 'campos' => ['numero'], 'descricao' => 'Verifica se o valor é NaN.' ],
        'log' => [ 'funcao' => fn($dados) => (string) log((float)($dados['numero'] ?? 0), (float)($dados['base'] ?? M_E)), 'campos' => ['numero', 'base'], 'descricao' => 'Calcula o logaritmo de um número.' ],
        'log10' => [ 'funcao' => fn($dados) => (string) log10((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Calcula o logaritmo na base 10.' ],
        'log1p' => [ 'funcao' => fn($dados) => (string) log1p((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Calcula o logaritmo natural de 1 + x.' ],
        'max' => [ 'funcao' => fn($dados) => (string) max(array_map('floatval', explode(',', $dados['valores'] ?? ''))), 'campos' => ['valores'], 'descricao' => 'Retorna o maior valor.' ],
        'min' => [ 'funcao' => fn($dados) => (string) min(array_map('floatval', explode(',', $dados['valores'] ?? ''))), 'campos' => ['valores'], 'descricao' => 'Retorna o menor valor.' ],
        'octdec' => [ 'funcao' => fn($dados) => (string) octdec($dados['numero'] ?? '0'), 'campos' => ['numero'], 'descricao' => 'Converte octal para decimal.' ],
        'pi' => [ 'funcao' => fn($dados) => (string) pi(), 'campos' => [], 'descricao' => 'Retorna o valor de PI.' ],
        'pow' => [ 'funcao' => fn($dados) => (string) pow((float)($dados['numero1'] ?? 0), (float)($dados['numero2'] ?? 0)), 'campos' => ['numero1', 'numero2'], 'descricao' => 'Calcula uma potência.' ],
        'rad2deg' => [ 'funcao' => fn($dados) => (string) rad2deg((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Converte radianos para graus.' ],
        'round' => [ 'funcao' => fn($dados) => (string) round((float)($dados['numero'] ?? 0), (int)($dados['casas'] ?? 0)), 'campos' => ['numero', 'casas'], 'descricao' => 'Arredonda um número.' ],
        'sin' => [ 'funcao' => fn($dados) => (string) sin((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o seno de um número.' ],
        'sinh' => [ 'funcao' => fn($dados) => (string) sinh((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna o seno hiperbólico.' ],
        'sqrt' => [ 'funcao' => fn($dados) => (string) sqrt((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna a raiz quadrada.' ],
        'tan' => [ 'funcao' => fn($dados) => (string) tan((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna a tangente.' ],
        'tanh' => [ 'funcao' => fn($dados) => (string) tanh((float)($dados['numero'] ?? 0)), 'campos' => ['numero'], 'descricao' => 'Retorna a tangente hiperbólica.' ],
    ];

    if (!isset($mapaFuncoes[$acao])) {
        return 'Função não encontrada.';
    }

    return (string) $mapaFuncoes[$acao]['funcao']($dados);
}


if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest'
) {
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
                                <li><a href="funcoes-math.php">Funções de matematica</a></li>
                            </ul>
                        </div>
                        
                        <hr>

                        <div class="box-card">
                            <div class="tape-strip"></div>
                            <div class="box-header">
                                <h2 class="box-title">Funções de Array</h2>
                                <p class="box-subtitle">Ferramentas para organizar, filtrar e transformar dados em arrays.</p>
                            </div>
                
                            <details class="func-item">
    <summary class="func-toggle">
        ABS
        <p style="font-size: 0.8em;">Retorna o valor absoluto de um número</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">abs($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o valor absoluto de um número.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">-10</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">abs</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 10</span>
        </div>

        <form method="post" id="form-abs"
              data-ajax="true" data-result-id="resultado-abs">

            <input type="hidden" name="acao" value="abs">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: -10">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-abs"
                    data-result-id="resultado-abs">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ACOS
        <p style="font-size: 0.8em;">Retorna o arco cosseno de um número</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">acos($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o arco cosseno de um número em radianos.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">0.5</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">acos</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 1.047...</span>
        </div>

        <form method="post" id="form-acos"
              data-ajax="true" data-result-id="resultado-acos">

            <input type="hidden" name="acao" value="acos">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 0.5">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-acos"
                    data-result-id="resultado-acos">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ACOSH
        <p style="font-size: 0.8em;">Retorna o cosseno hiperbólico inverso</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">acosh($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o cosseno hiperbólico inverso de um número.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">2</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">acosh</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 1.316...</span>
        </div>

        <form method="post" id="form-acosh"
              data-ajax="true" data-result-id="resultado-acosh">

            <input type="hidden" name="acao" value="acosh">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 2">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-acosh"
                    data-result-id="resultado-acosh">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ASIN
        <p style="font-size: 0.8em;">Retorna o arco seno de um número</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">asin($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o arco seno de um número em radianos.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">0.5</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">asin</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 0.523...</span>
        </div>

        <form method="post" id="form-asin"
              data-ajax="true" data-result-id="resultado-asin">

            <input type="hidden" name="acao" value="asin">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 0.5">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-asin"
                    data-result-id="resultado-asin">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ASINH
        <p style="font-size: 0.8em;">Retorna o seno hiperbólico inverso</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">asinh($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o seno hiperbólico inverso de um número.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">2</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">asinh</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 1.443...</span>
        </div>

        <form method="post" id="form-asinh"
              data-ajax="true" data-result-id="resultado-asinh">

            <input type="hidden" name="acao" value="asinh">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 2">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-asinh"
                    data-result-id="resultado-asinh">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ATAN
        <p style="font-size: 0.8em;">Retorna o arco tangente de um número</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">atan($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o arco tangente de um número em radianos.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">1</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">atan</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 0.785...</span>
        </div>

        <form method="post" id="form-atan"
              data-ajax="true" data-result-id="resultado-atan">

            <input type="hidden" name="acao" value="atan">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 1">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-atan"
                    data-result-id="resultado-atan">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ATAN2
        <p style="font-size: 0.8em;">Calcula o arco tangente de dois valores</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">atan2($y, $x)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Calcula o arco tangente considerando as coordenadas x e y.</p>

        <div class="code-container">
            <span class="code-keyword">$y</span> =
            <span class="code-str">1</span>;
            <span class="code-keyword">$x</span> =
            <span class="code-str">1</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">atan2</span>(
            <span class="code-keyword">$y</span>,
            <span class="code-keyword">$x</span>);
            <span class="code-comment">// Saída: 0.785...</span>
        </div>

        <form method="post" id="form-atan2"
              data-ajax="true" data-result-id="resultado-atan2">

            <input type="hidden" name="acao" value="atan2">

            <input type="number" step="any" name="y"
                   placeholder="Ex: 1">

            <input type="number" step="any" name="x"
                   placeholder="Ex: 1">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-atan2"
                    data-result-id="resultado-atan2">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        ATANH
        <p style="font-size: 0.8em;">Retorna a tangente hiperbólica inversa</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">atanh($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna a tangente hiperbólica inversa de um número.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">0.5</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">atanh</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 0.549...</span>
        </div>

        <form method="post" id="form-atanh"
              data-ajax="true" data-result-id="resultado-atanh">

            <input type="hidden" name="acao" value="atanh">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 0.5">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-atanh"
                    data-result-id="resultado-atanh">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        BINDEC
        <p style="font-size: 0.8em;">Converte binário para decimal</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">bindec($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Converte um número binário para decimal.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">"1010"</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">bindec</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 10</span>
        </div>

        <form method="post" id="form-bindec"
              data-ajax="true" data-result-id="resultado-bindec">

            <input type="hidden" name="acao" value="bindec">

            <input type="text" name="numero"
                   placeholder="Ex: 1010">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-bindec"
                    data-result-id="resultado-bindec">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        CEIL
        <p style="font-size: 0.8em;">Arredonda um número para cima</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">ceil($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Arredonda um número para o próximo inteiro maior ou igual.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">4.2</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">ceil</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 5</span>
        </div>

        <form method="post" id="form-ceil"
              data-ajax="true" data-result-id="resultado-ceil">

            <input type="hidden" name="acao" value="ceil">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 4.2">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-ceil"
                    data-result-id="resultado-ceil">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        COS
        <p style="font-size: 0.8em;">Retorna o cosseno de um número</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">cos($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o cosseno de um ângulo em radianos.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">0</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">cos</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 1</span>
        </div>

        <form method="post" id="form-cos"
              data-ajax="true" data-result-id="resultado-cos">

            <input type="hidden" name="acao" value="cos">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 0">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-cos"
                    data-result-id="resultado-cos">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        COSH
        <p style="font-size: 0.8em;">Retorna o cosseno hiperbólico</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">cosh($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o cosseno hiperbólico de um número.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">2</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">cosh</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 3.762...</span>
        </div>

        <form method="post" id="form-cosh"
              data-ajax="true" data-result-id="resultado-cosh">

            <input type="hidden" name="acao" value="cosh">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 2">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-cosh"
                    data-result-id="resultado-cosh">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        DECBIN
        <p style="font-size: 0.8em;">Converte decimal para binário</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">decbin($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Converte um número decimal para binário.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">10</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">decbin</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 1010</span>
        </div>

        <form method="post" id="form-decbin"
              data-ajax="true" data-result-id="resultado-decbin">

            <input type="hidden" name="acao" value="decbin">

            <input type="number" name="numero"
                   placeholder="Ex: 10">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-decbin"
                    data-result-id="resultado-decbin">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        DECHEX
        <p style="font-size: 0.8em;">Converte decimal para hexadecimal</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">dechex($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Converte um número decimal para hexadecimal.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">255</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">dechex</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: ff</span>
        </div>

        <form method="post" id="form-dechex"
              data-ajax="true" data-result-id="resultado-dechex">

            <input type="hidden" name="acao" value="dechex">

            <input type="number" name="numero"
                   placeholder="Ex: 255">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-dechex"
                    data-result-id="resultado-dechex">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        DECOCT
        <p style="font-size: 0.8em;">Converte decimal para octal</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">decoct($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Converte um número decimal para octal.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">10</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">decoct</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 12</span>
        </div>

        <form method="post" id="form-decoct"
              data-ajax="true" data-result-id="resultado-decoct">

            <input type="hidden" name="acao" value="decoct">

            <input type="number" name="numero"
                   placeholder="Ex: 10">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-decoct"
                    data-result-id="resultado-decoct">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        DEG2RAD
        <p style="font-size: 0.8em;">Converte graus para radianos</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">deg2rad($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Converte um valor em graus para radianos.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">180</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">deg2rad</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 3.14159...</span>
        </div>

        <form method="post" id="form-deg2rad"
              data-ajax="true" data-result-id="resultado-deg2rad">

            <input type="hidden" name="acao" value="deg2rad">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 180">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-deg2rad"
                    data-result-id="resultado-deg2rad">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        EXP
        <p style="font-size: 0.8em;">Calcula o valor exponencial</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">exp($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna e elevado ao número informado.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">1</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">exp</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 2.718...</span>
        </div>

        <form method="post" id="form-exp"
              data-ajax="true" data-result-id="resultado-exp">

            <input type="hidden" name="acao" value="exp">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 1">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-exp"
                    data-result-id="resultado-exp">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        EXPM1
        <p style="font-size: 0.8em;">Calcula exp(x) - 1</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">expm1($numero)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Retorna o valor de e elevado a x, menos 1.</p>

        <div class="code-container">
            <span class="code-keyword">$numero</span> =
            <span class="code-str">1</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">expm1</span>(<span class="code-keyword">$numero</span>);
            <span class="code-comment">// Saída: 1.718...</span>
        </div>

        <form method="post" id="form-expm1"
              data-ajax="true" data-result-id="resultado-expm1">

            <input type="hidden" name="acao" value="expm1">

            <input type="number" step="any" name="numero"
                   placeholder="Ex: 1">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-expm1"
                    data-result-id="resultado-expm1">
                Reset
            </button>
        </form>
    </div>
</details>

<details class="func-item">
    <summary class="func-toggle">
        FDIV
        <p style="font-size: 0.8em;">Realiza uma divisão de ponto flutuante</p>
    </summary>

    <div class="func-content">
        <div class="func-table">
            <div class="func-cell-left">
                <span class="func-name">fdiv($numero1, $numero2)</span>
            </div>
            <div class="func-cell-right">
                <span class="badge-string">Math</span>
            </div>
        </div>

        <p class="func-desc">Divide dois números e retorna o resultado em ponto flutuante.</p>

        <div class="code-container">
            <span class="code-keyword">$numero1</span> =
            <span class="code-str">10</span>;
            <span class="code-keyword">$numero2</span> =
            <span class="code-str">3</span>;<br>
            <span class="code-keyword">echo</span>
            <span class="code-func">fdiv</span>(
            <span class="code-keyword">$numero1</span>,
            <span class="code-keyword">$numero2</span>);
            <span class="code-comment">// Saída: 3.333...</span>
        </div>

        <form method="post" id="form-fdiv"
              data-ajax="true" data-result-id="resultado-fdiv">

            <input type="hidden" name="acao" value="fdiv">

            <input type="number" step="any" name="numero1"
                   placeholder="Ex: 10">

            <input type="number" step="any" name="numero2"
                   placeholder="Ex: 3">

            <button type="submit">Run Code</button>

            <button type="button"
                    data-reset-form="form-fdiv"
                    data-result-id="resultado-fdiv">
                Reset
            </button>
        </form>
    </div>
</details>

                        </div>
                    </section>
                </article>
            </div>
        </main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form[data-ajax="true"]');

    forms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const resultId = form.dataset.resultId || 'resultado-ajax';
            let result = document.getElementById(resultId);

            if (!result) {
                result = document.createElement('div');
                result.id = resultId;
                result.style.marginTop = '12px';
                result.style.fontWeight = '600';
                form.insertAdjacentElement('afterend', result);
            }

            result.textContent = 'Processando...';
            result.style.opacity = '0.7';

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action || window.location.href, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error('Erro ao processar a requisição');
                }

                const payload = await response.json();
                const mensagem = payload.resultado ?? 'Sem resposta';

                result.textContent = 'Resultado: ' + mensagem;
                result.style.opacity = '1';
            } catch (error) {
                result.textContent = 'Erro no processamento do AJAX.';
                result.style.opacity = '1';
                console.error(error);
            }
        });
    });
});
</script>

</body>
</html>