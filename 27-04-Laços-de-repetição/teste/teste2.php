<?php

$resultados = [];

if(!empty($_POST))
{
    $numeros_for = [];
    for($i = 0; $i < 6; $i++)
    {
        $numero = rand(1, 60);
        while(in_array($numero, $numeros_for))
        {
            $numero = rand(1, 60);
        }
        $numeros_for[$i] = $numero;
    }
    
    $numeros_while = [];
    $i = 0;
    while($i < 6)
    {
        $numero = rand(1, 60);
        if(!in_array($numero, $numeros_while))
        {
            $numeros_while[$i] = $numero;
            $i++;
        }
    }
    
    $numeros_dowhile = [];
    $i = 0;
    do
    {
        $numero = rand(1, 60);
        if(!in_array($numero, $numeros_dowhile))
        {
            $numeros_dowhile[$i] = $numero;
            $i++;
        }
    } while($i < 6);
    
    $resultados = [
        'for' => sort_numeros($numeros_for),
        'while' => sort_numeros($numeros_while),
        'dowhile' => sort_numeros($numeros_dowhile)
    ];
}

// Função auxiliar para ordenar os números
function sort_numeros($numeros) {
    sort($numeros);
    return $numeros;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio Mega Sena com Laços - PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="header">
                <h1>🎰 Sorteio Mega Sena</h1>
                <p class="subtitle">Teste diferentes tipos de laços de repetição</p>
            </div>

            <form action="" method="POST" class="form-group">
                <div class="input-group">
                    <label for="sorteio">Clique para gerar números aleatórios</label>
                    <p class="helper-text">O sorteio usa diferentes laços para gerar 6 números entre 1 e 60</p>
                </div>

                <div class="button-group">
                    <button type="submit" name="sorteio" class="btn btn-primary">
                        <span>🎲 Fazer Sorteio</span>
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <span>Limpar</span>
                    </button>
                </div>
            </form>

            <?php if(!empty($resultados)): ?>
                <div class="results-container">
                    <div class="results-header">
                        <h2>✓ Números Sorteados</h2>
                    </div>
                    
                    <div class="results-grid">
                        <!-- Resultado FOR -->
                        <div class="result-card">
                            <div class="result-card-header for-header">
                                <h3>Laço FOR</h3>
                            </div>
                            <div class="result-card-body lottery">
                                <div class="lottery-numbers">
                                    <?php foreach($resultados['for'] as $numero): ?>
                                        <div class="lottery-ball">
                                            <?php echo str_pad($numero, 2, '0', STR_PAD_LEFT); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Resultado WHILE -->
                        <div class="result-card">
                            <div class="result-card-header while-header">
                                <h3>Laço WHILE</h3>
                            </div>
                            <div class="result-card-body lottery">
                                <div class="lottery-numbers">
                                    <?php foreach($resultados['while'] as $numero): ?>
                                        <div class="lottery-ball">
                                            <?php echo str_pad($numero, 2, '0', STR_PAD_LEFT); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Resultado DO-WHILE -->
                        <div class="result-card">
                            <div class="result-card-header do-header">
                                <h3>Laço DO-WHILE</h3>
                            </div>
                            <div class="result-card-body lottery">
                                <div class="lottery-numbers">
                                    <?php foreach($resultados['dowhile'] as $numero): ?>
                                        <div class="lottery-ball">
                                            <?php echo str_pad($numero, 2, '0', STR_PAD_LEFT); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>