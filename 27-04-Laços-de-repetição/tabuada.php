<?php

if (!empty($_POST)) {

    $tabuada[] = '';

    $num = $_POST['numero'] ?? 0;
    for ($i = 1; $i <= 10; $i++) {
        $tabuada[$i] = $num * $i;
    }

    $j = 1;
    while ($j <= 10) {
        $tabuada[$j] = $num * $j;
        $j++;
    }

    $x = 1;
    do {
        $tabuada[$x] = $num * $x;
        $x++;
    } while ($x <= 10);
    
    /*else
    {
        $soma = 1;
        for ($soma = 1; $soma <= 10; $soma++) {
            for ($i = 1; $i <= 10; $i++) {
                $tabuada[$i] = $num * $i;
            }
        }

        $multi = 1;

        $j = 1;
        while ($soma <= 10) {
            while ($j <= 10) {
                $tabuada[$j] = $num * $j;
                $j++;
            }
            $soma++;
            $j = 1;
        }

        echo "<br>";
        $soma = 1;
        $x = 1;

        do {
            do {
                $tabuada[$x] = $num * $x;
                $x++;
            } while ($x <= 10);
            $soma++;
            $x = 1;
        } while ($soma <=  10);
    }*/
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-tabuada.css">
    <title>Tabuada</title>
</head>
<body>

    <div class="container">
        <h1>Tabuada</h1>
        
        
    <article>
        <form action="#" method="POST">

            <input type="text" name="numero" placeholder="Digite um número para a tabuada" required>

            <div style="margin-top: 50px;">
                <input type="submit" value="Mostrar resultado" class="sortearNumeros">
            </div>
        </form>
    </article>


        <div class="numeros-container" id="resultado">
            <?php if (!empty($_POST)): ?>
            <hr>
            
            <div>
                <header>
                    <h2>Tabuada do <?php echo $num; ?></h2>
                </header>
            </div>

            <div>
                <div class='card' style='margin-top: 100px;'>
                    <div class='titulo'>
                        <p style='margin-left: 20px'>mostra a tabuada do for</p>
                    </div>
                    <div class='lista'>
                        <?php
                            for ($i = 1; $i <= 10; $i++) {
                                echo "<div class='musica'>";
                                echo "<span class='numero'>" . $i . "</span>";
                                echo "<div>";
                                echo "<p class='nome'>" . $i . " x " . $num . "</p>";
                                echo "<span class='artista'>" . $tabuada[$i] . "</span>";
                                echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div>
                <div class='card' style='margin-top: 100px;'>
                    <div class='titulo'>
                        <p style='margin-left: 20px'>mostra a tabuada do while</p>
                    </div>
                    <div class='lista'>
                        <?php
                            for ($i = 1; $i <= 10; $i++) {
                                echo "<div class='musica'>";
                                echo "<span class='numero'>" . $i . "</span>";
                                echo "<div>";
                                echo "<p class='nome'>" . $i . " x " . $num . "</p>";
                                echo "<span class='artista'>" . $tabuada[$i] . "</span>";
                                echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div>
                <div class='card' style='margin-top: 100px;'>
                    <div class='titulo'>
                        <p style='margin-left: 20px'>mostra a tabuada do do..while</p>
                    </div>
                    <div class='lista'>
                        <?php
                            for ($i = 1; $i <= 10; $i++) {
                                echo "<div class='musica'>";
                                echo "<span class='numero'>" . $i . "</span>";
                                echo "<div>";
                                echo "<p class='nome'>" . $i . " x " . $num . "</p>";
                                echo "<span class='artista'>" . $tabuada[$i] . "</span>";
                                echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

</body>
</html>