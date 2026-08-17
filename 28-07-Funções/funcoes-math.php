<?php
function executarFuncaoArray(string $acao, array $dados): string
{
    $acao = strtolower($acao);

    $mapaFuncoes = [

    'abs' => [
        'funcao' => fn($dados) =>
            (string) abs((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o valor absoluto de um número.'
    ],

    'acos' => [
        'funcao' => fn($dados) =>
            (string) acos((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o arco cosseno de um número.'
    ],

    'acosh' => [
        'funcao' => fn($dados) =>
            (string) acosh((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o cosseno hiperbólico inverso.'
    ],

    'asin' => [
        'funcao' => fn($dados) =>
            (string) asin((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o arco seno de um número.'
    ],

    'asinh' => [
        'funcao' => fn($dados) =>
            (string) asinh((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o seno hiperbólico inverso.'
    ],

    'atan' => [
        'funcao' => fn($dados) =>
            (string) atan((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o arco tangente de um número.'
    ],

    'atan2' => [
        'funcao' => fn($dados) =>
            (string) atan2(
                (float)($dados['y'] ?? 0),
                (float)($dados['x'] ?? 0)
            ),
        'campos' => ['y', 'x'],
        'descricao' => 'Calcula o arco tangente de dois valores.'
    ],

    'atanh' => [
        'funcao' => fn($dados) =>
            (string) atanh((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna a tangente hiperbólica inversa.'
    ],

    'base_convert' => [
        'funcao' => fn($dados) =>
            base_convert(
                $dados['numero'] ?? '0',
                (int)($dados['base_origem'] ?? 10),
                (int)($dados['base_destino'] ?? 10)
            ),
        'campos' => ['numero', 'base_origem', 'base_destino'],
        'descricao' => 'Converte um número de uma base para outra.'
    ],

    'bindec' => [
        'funcao' => fn($dados) =>
            (string) bindec($dados['numero'] ?? '0'),
        'campos' => ['numero'],
        'descricao' => 'Converte um número binário para decimal.'
    ],

    'ceil' => [
        'funcao' => fn($dados) =>
            (string) ceil((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Arredonda um número para cima.'
    ],

    'cos' => [
        'funcao' => fn($dados) =>
            (string) cos((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o cosseno de um número.'
    ],

    'cosh' => [
        'funcao' => fn($dados) =>
            (string) cosh((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o cosseno hiperbólico.'
    ],

    'decbin' => [
        'funcao' => fn($dados) =>
            decbin((int)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Converte decimal para binário.'
    ],

    'dechex' => [
        'funcao' => fn($dados) =>
            dechex((int)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Converte decimal para hexadecimal.'
    ],

    'decoct' => [
        'funcao' => fn($dados) =>
            decoct((int)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Converte decimal para octal.'
    ],

    'deg2rad' => [
        'funcao' => fn($dados) =>
            (string) deg2rad((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Converte graus para radianos.'
    ],

    'exp' => [
        'funcao' => fn($dados) =>
            (string) exp((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Calcula o valor exponencial.'
    ],

    'expm1' => [
        'funcao' => fn($dados) =>
            (string) expm1((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Calcula exp(x) - 1.'
    ],

    'fdiv' => [
        'funcao' => fn($dados) =>
            (string) fdiv(
                (float)($dados['numero1'] ?? 0),
                (float)($dados['numero2'] ?? 1)
            ),
        'campos' => ['numero1', 'numero2'],
        'descricao' => 'Realiza uma divisão de ponto flutuante.'
    ],

    'floor' => [
        'funcao' => fn($dados) =>
            (string) floor((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Arredonda um número para baixo.'
    ],

    'fmod' => [
        'funcao' => fn($dados) =>
            (string) fmod(
                (float)($dados['numero1'] ?? 0),
                (float)($dados['numero2'] ?? 1)
            ),
        'campos' => ['numero1', 'numero2'],
        'descricao' => 'Retorna o resto da divisão.'
    ],

    'fpow' => [
        'funcao' => fn($dados) =>
            (string) pow(
                (float)($dados['numero1'] ?? 0),
                (float)($dados['numero2'] ?? 0)
            ),
        'campos' => ['numero1', 'numero2'],
        'descricao' => 'Calcula uma potência.'
    ],

    'hexdec' => [
        'funcao' => fn($dados) =>
            (string) hexdec($dados['numero'] ?? '0'),
        'campos' => ['numero'],
        'descricao' => 'Converte hexadecimal para decimal.'
    ],

    'hypot' => [
        'funcao' => fn($dados) =>
            (string) hypot(
                (float)($dados['numero1'] ?? 0),
                (float)($dados['numero2'] ?? 0)
            ),
        'campos' => ['numero1', 'numero2'],
        'descricao' => 'Calcula a hipotenusa.'
    ],

    'intdiv' => [
        'funcao' => fn($dados) =>
            (string) intdiv(
                (int)($dados['numero1'] ?? 0),
                (int)($dados['numero2'] ?? 1)
            ),
        'campos' => ['numero1', 'numero2'],
        'descricao' => 'Realiza uma divisão inteira.'
    ],

    'is_finite' => [
        'funcao' => fn($dados) =>
            is_finite((float)($dados['numero'] ?? 0))
                ? 'true'
                : 'false',
        'campos' => ['numero'],
        'descricao' => 'Verifica se o número é finito.'
    ],

    'is_infinite' => [
        'funcao' => fn($dados) =>
            is_infinite((float)($dados['numero'] ?? 0))
                ? 'true'
                : 'false',
        'campos' => ['numero'],
        'descricao' => 'Verifica se o número é infinito.'
    ],

    'is_nan' => [
        'funcao' => fn($dados) =>
            is_nan((float)($dados['numero'] ?? 0))
                ? 'true'
                : 'false',
        'campos' => ['numero'],
        'descricao' => 'Verifica se o valor é NaN.'
    ],

    'log' => [
        'funcao' => fn($dados) =>
            (string) log(
                (float)($dados['numero'] ?? 0),
                (float)($dados['base'] ?? M_E)
            ),
        'campos' => ['numero', 'base'],
        'descricao' => 'Calcula o logaritmo de um número.'
    ],

    'log10' => [
        'funcao' => fn($dados) =>
            (string) log10((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Calcula o logaritmo na base 10.'
    ],

    'log1p' => [
        'funcao' => fn($dados) =>
            (string) log1p((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Calcula o logaritmo natural de 1 + x.'
    ],

    'max' => [
        'funcao' => fn($dados) =>
            (string) max(
                array_map(
                    'floatval',
                    explode(',', $dados['valores'] ?? '')
                )
            ),
        'campos' => ['valores'],
        'descricao' => 'Retorna o maior valor.'
    ],

    'min' => [
        'funcao' => fn($dados) =>
            (string) min(
                array_map(
                    'floatval',
                    explode(',', $dados['valores'] ?? '')
                )
            ),
        'campos' => ['valores'],
        'descricao' => 'Retorna o menor valor.'
    ],

    'octdec' => [
        'funcao' => fn($dados) =>
            (string) octdec($dados['numero'] ?? '0'),
        'campos' => ['numero'],
        'descricao' => 'Converte octal para decimal.'
    ],

    'pi' => [
        'funcao' => fn($dados) =>
            (string) pi(),
        'campos' => [],
        'descricao' => 'Retorna o valor de PI.'
    ],

    'pow' => [
        'funcao' => fn($dados) =>
            (string) pow(
                (float)($dados['numero1'] ?? 0),
                (float)($dados['numero2'] ?? 0)
            ),
        'campos' => ['numero1', 'numero2'],
        'descricao' => 'Calcula uma potência.'
    ],

    'rad2deg' => [
        'funcao' => fn($dados) =>
            (string) rad2deg((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Converte radianos para graus.'
    ],

    'round' => [
        'funcao' => fn($dados) =>
            (string) round(
                (float)($dados['numero'] ?? 0),
                (int)($dados['casas'] ?? 0)
            ),
        'campos' => ['numero', 'casas'],
        'descricao' => 'Arredonda um número.'
    ],

    'sin' => [
        'funcao' => fn($dados) =>
            (string) sin((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o seno de um número.'
    ],

    'sinh' => [
        'funcao' => fn($dados) =>
            (string) sinh((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna o seno hiperbólico.'
    ],

    'sqrt' => [
        'funcao' => fn($dados) =>
            (string) sqrt((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna a raiz quadrada.'
    ],

    'tan' => [
        'funcao' => fn($dados) =>
            (string) tan((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna a tangente.'
    ],

    'tanh' => [
        'funcao' => fn($dados) =>
            (string) tanh((float)($dados['numero'] ?? 0)),
        'campos' => ['numero'],
        'descricao' => 'Retorna a tangente hiperbólica.'
    ],
];

    if (!isset($mapaFuncoes[$acao])) {
        return 'Função não encontrada.';
    }

    return (string) $mapaFuncoes[$acao]();
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

                            <ul>
                                <li>abs — Absolute value</li>
                                <li>acos — Arc cosine</li>
                                <li>acosh — Inverse hyperbolic cosine</li>
                                <li>asin — Arc sine</li>
                                <li>asinh — Inverse hyperbolic sine</li>
                                <li>atan — Arc tangent</li>
                                <li>atan2 — Arc tangent of two variables</li>
                                <li>atanh — Inverse hyperbolic tangent</li>
                                <li>base_convert — Convert a number between arbitrary bases</li>
                                <li>bindec — Binary to decimal</li>
                                <li>ceil — Round fractions up</li>
                                <li>cos — Cosine</li>
                                <li>cosh — Hyperbolic cosine</li>
                                <li>decbin — Decimal to binary</li>
                                <li>dechex — Decimal to hexadecimal</li>
                                <li>decoct — Decimal to octal</li>
                                <li>deg2rad — Converts the number in degrees to the radian equivalent</li>
                                <li>exp — Calculates the exponent of e</li>
                                <li>expm1 — Returns exp($num) - 1, computed in a way that is accurate even when the value of number is close to zero</li>
                                <li>fdiv — Divides two numbers, according to IEEE 754</li>
                                <li>floor — Round fractions down</li>
                                <li>fmod — Returns the floating point remainder (modulo) of the division of the arguments</li>
                                <li>fpow — Raise one number to the power of another, according to IEEE 754</li>
                                <li>hexdec — Hexadecimal to decimal</li>
                                <li>hypot — Calculate the length of the hypotenuse of a right-angle triangle</li>
                                <li>intdiv — Integer division</li>
                                <li>is_finite — Checks whether a float is finite</li>
                                <li>is_infinite — Checks whether a float is infinite</li>
                                <li>is_nan — Checks whether a float is NAN</li>
                                <li>log — Natural logarithm</li>
                                <li>log10 — Base-10 logarithm</li>
                                <li>log1p — Returns log(1 + number), computed in a way that is accurate even when the value of number is close to zero</li>
                                <li>max — Find highest value</li>
                                <li>min — Find lowest value</li>
                                <li>octdec — Octal to decimal</li>
                                <li>pi — Get value of pi</li>
                                <li>pow — Exponential expression</li>
                                <li>rad2deg — Converts the radian number to the equivalent number in degrees</li>
                                <li>round — Rounds a float</li>
                                <li>sin — Sine</li>
                                <li>sinh — Hyperbolic sine</li>
                                <li>sqrt — Square root</li>
                                <li>tan — Tangent</li>
                                <li>tanh — Hyperbolic tangent</li>
                            </ul>

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
                                    <li><a href="funcoes-data.php"><strong>Funções de data</strong></a></li>
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