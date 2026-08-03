<?php

//TEMA: adventure capitalist

if(!empty($_POST))
{
    $A = false; $B = false; $C = false; $D = false;
    $valor = $_POST['valor'];
    switch(true) // Avalia a variável $valor
    {
        case ($valor >= 0 && $valor <= 300):
            $A = true;
            $RAlto = "Risco Alto - Crédito Negado.";
        break; // Sai do switch

        case ($valor >= 301 && $valor <= 700):
            $B = true;
            $RMedio = "Risco Médio - Taxa de 15% a.a.";
        break;

        case ($valor >= 701 && $valor <= 1000):
            $C = true;
            $RBaixo = "Risco Baixo - Taxa de 5% a.a.";
        break;

        default:
            $Erro = "Opção inválida";
        break;
    }
}
?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Análise de investimento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="tema-investimento">

    <div class="container">
        <div class="cracha">
            <aside class="informacoesL">
            <h1>Resultado:</h1>
            <?php
                    if(!empty($_POST))
                    {
                        if($A == true)
                        {
                            echo $RAlto;
                        }
                        else if($B == true)
                        {
                            echo $RMedio;
                        }
                        else if($C == true)
                        {
                            echo $RBaixo;
                        }
                        else
                        {
                            echo $Erro;
                        }
                    }
                ?>
            </aside>

            <aside class="info-opcoes">
                <h3>Possíveis resultados</h3>
                <ul style="margin-top: 50px">
                    <li><strong>Risco Alto</strong></li>
                    <li><strong>Risco Médio</strong></li>
                    <li><strong>Risco Baixo</strong></li>
                </ul>
            </aside>

            <article>
                <form action="#" method="POST">
                <h1>Seu investimento</h1>
                    <label>Valor do investimento</label>
                    <input type="text" id="valor" name="valor" placeholder="Digite de 0 até 1000">
                    <div style="margin-top: 50px;">
                    <input type="reset" value="limpar" id="bt-limpar" class="botão">
                    <input type="submit" value="Ver Nota" class="botão">
                    </div> 
                </form>
            </article>
        </div>
    </div>
</body>
</html>

<!--Feito por: Arthur de Gois Carramão Almeida-->
<!--RM: 250533; Turma: 2IFEM2-->