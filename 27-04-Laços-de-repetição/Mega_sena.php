<?php

$loopSelecionado = $_POST['tipo'] ?? 'for';

if (!empty($_POST))
{

$sorteiro = false;
$numeroSorteados = [];
$numeros_repetidos = 0;

    switch ($loopSelecionado)
    {
        case 'for':
            for ($i = 0; $i < 6; $i++)
            {
                $numeroSorteado[$i] = mt_rand(1, 60);

                if ($i == 5)
                {
                    for ($j = 0; $j < $i; $j++)
                    {
                        if ($numeroSorteado[$i] == $numeroSorteado[$j])
                        {
                            $sorteiro = false;
                            $numeros_repetidos=+1;
                            $numeroSorteados = [];
                            $i = 0;
                            break;
                        }
                        else
                        {
                            $sorteiro = true;                
                        }
                    }
                }

                if ($sorteiro == true)
                {
                    break 2;
                }
            } break;

        case 'while':
            $i = 0;
            while ($i < 6)
            {
                $numeroSorteado[$i] = mt_rand(1, 60);

                if ($i == 5)
                {
                    $j = 0;
                    while ($j < $i)
                    {
                        if ($numeroSorteado[$i] == $numeroSorteado[$j])
                        {
                            $sorteiro = false;
                            $numeros_repetidos=+1;
                            $numeroSorteados = [];
                            $i = 0;
                            break;
                        }
                        else
                        {
                            $sorteiro = true;
                        }
                        $j++;
                    }
                }

                if ($sorteiro == true)
                {
                    break 2;
                }
                $i++;
            } break;

        case 'dowhile':
            $i = 0;
            do
            {
                $numeroSorteado[$i] = mt_rand(1, 60);

                if ($i == 5)
                {
                    $j = 0;
                    do
                    {
                        if ($numeroSorteado[$i] == $numeroSorteado[$j])
                        {
                            $sorteiro = false;
                            $numeros_repetidos=+1;
                            $numeroSorteados = [];
                            $i = 0;
                            break;
                        }
                        else
                        {
                            $sorteiro = true;
                        }
                        $j++;
                    } while ($j < $i);
                }

                if ($sorteiro == true)
                {
                    break 2;
                }
                $i++;
            }while ($i < 6); break;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador da Mega-Sena</title>
    <link rel="stylesheet" href="css/style-Mega-sena.css">
</head>
<body>

    <div class="container">
        <h1>Gerador da Mega-Sena</h1>
        
        
    <article>
        <form action="#" method="POST">

            <select id="tipo" name="tipo">
                <option value="for" <?= $loopSelecionado === 'for' ? 'selected' : '' ?>>for</option>
                <option value="while" <?= $loopSelecionado === 'while' ? 'selected' : '' ?>>while</option>
                <option value="dowhile" <?= $loopSelecionado === 'dowhile' ? 'selected' : '' ?>>do..while</option>
            </select>

            <div style="margin-top: 50px;">
                <input type="submit" value="Sortear Números" class="sortearNumeros">
            </div>
        </form>
    </article>

        <div class="numeros-container" id="resultado">
            <?php
                if (!empty($_POST))
                {
                    switch($_POST['tipo'])
                    {
                        case 'for':
                            for ($j = 0; $j < 6; $j++)
                            {
                                echo"<div class='espaço'>";
                                    echo "<div class='bola'>" . $numeroSorteado[$j] . "</div>";
                                echo "</div>";
                            }
                            break;
                        case 'while':
                            $j = 0;
                            while ($j < 6)
                            {
                                echo"<div class='espaço'>";
                                    echo "<div class='bola'>" . $numeroSorteado[$j] . "</div>";
                                echo "</div>";
                                $j++;
                            }
                            break;
                        case 'dowhile':
                            $j = 0;
                            do
                            {
                                echo"<div class='espaço'>";
                                    echo "<div class='bola'>" . $numeroSorteado[$j] . "</div>";
                                echo "</div>";
                                $j++;
                            } while ($j < 6);
                            break;
                    }
                }
            ?>

        </div>
    </div>

</body>
</html>