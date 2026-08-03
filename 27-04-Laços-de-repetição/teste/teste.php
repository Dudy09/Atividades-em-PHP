<?php

$numero = null;
$resultadosFor = [];
$resultadosWhile = [];
$resultadosDo = [];

if(!empty($_POST) && isset($_POST['numero']))
{
    $numero = intval($_POST['numero']);
    
    if($numero >= 0 && $numero <= 1000)
    {
        // Laço FOR
        for($i = 1; $i <= 10; $i++)
        {
            $resultadosFor[] = $numero * $i;
        }
        
        // Laço WHILE
        $contador = 1;
        while($contador <= 10)
        {
            $resultadosWhile[] = $numero * $contador;
            $contador++;
        }
        
        // Laço DO-WHILE
        $contador = 1;
        do{
            $resultadosDo[] = $numero * $contador;
            $contador++;
        }while($contador <= 10);
    }
}   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laços de Repetição - PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="header">
                <h1>Multiplicação com Laços</h1>
                <p class="subtitle">Teste diferentes tipos de laços de repetição</p>
            </div>

            <form action="#" method="POST" class="form-group">
                <div class="input-group">
                    <label for="valor">Valor do Multiplicador</label>
                    <input 
                        type="number" 
                        id="valor" 
                        name="numero" 
                        placeholder="Digite um valor de 0 até 1000"
                        class="input-field"
                        min="0"
                        max="1000"
                        required
                    >
                    <small class="helper-text">O número será multiplicado de 1 a 10</small>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <span>Ver Resultados</span>
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <span>Limpar</span>
                    </button>
                </div>
            </form>

            <?php if(!empty($_POST) && $numero !== null && count($resultadosFor) > 0): ?>
                <div class="results-container">
                    <div class="results-header">
                        <h2>✓ Resultados da Multiplicação por <?php echo $numero; ?></h2>
                    </div>
                    
                    <div class="results-grid">
                        <!-- Resultado FOR -->
                        <div class="result-card">
                            <div class="result-card-header for-header">
                                <h3>Laço FOR</h3>
                            </div>
                            <div class="result-card-body">
                                <div class="result-list">
                                    <?php foreach($resultadosFor as $index => $valor): ?>
                                        <div class="result-item">
                                            <span class="result-multiplier"><?php echo ($index + 1); ?> ×</span>
                                            <span class="result-number"><?php echo $numero; ?></span>
                                            <span class="result-equals">=</span>
                                            <span class="result-value"><?php echo $valor; ?></span>
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
                            <div class="result-card-body">
                                <div class="result-list">
                                    <?php foreach($resultadosWhile as $index => $valor): ?>
                                        <div class="result-item">
                                            <span class="result-multiplier"><?php echo ($index + 1); ?> ×</span>
                                            <span class="result-number"><?php echo $numero; ?></span>
                                            <span class="result-equals">=</span>
                                            <span class="result-value"><?php echo $valor; ?></span>
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
                            <div class="result-card-body">
                                <div class="result-list">
                                    <?php foreach($resultadosDo as $index => $valor): ?>
                                        <div class="result-item">
                                            <span class="result-multiplier"><?php echo ($index + 1); ?> ×</span>
                                            <span class="result-number"><?php echo $numero; ?></span>
                                            <span class="result-equals">=</span>
                                            <span class="result-value"><?php echo $valor; ?></span>
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