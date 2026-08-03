<?php
if(!empty($_POST))
{
    $A = false; $B = false; $C = false; $D = false;
    $Opção = $_POST['Opção'];// Atribui o caractere único 'B' à variável $valor
    switch($Opção) // Avalia a variável $valor
    {
        case 'a':
        case 'A': // Caso o caractere seja 'A'...
            $A = true;
            $OpcaoA = "Opção A (Motocicleta). Valor a ser pago R$: 5,00.";
        break; // Sai do switch

        case 'b':
        case 'B': // Caso o caractere seja 'B' (este será o executado)
            $B = true;
            $OpcaoB = "Opção B (Carro de passeio). Valor a ser pago R$: 10,00.";   
        break; // Sai do switch

        case 'c':
        case 'C': // Caso o caractere seja 'C'...
            $C = true;
            $OpcaoC =  "Opção C (Caminhão/Ônibus). Valor a ser pago R$: 25,00. ";
        break; // Sai do switch

        case 'd':
        case 'D': // Caso o caractere seja 'C'...
            $D = true;
            $OpcaoD = "Opção D (Veículo de carga pesada). Valor a ser pago R$: R$ 50,00. ";
        break; // Sai do switch

        default: // Caso não seja A, B ou C
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
    <title>Taxa do veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="tema-veiculo">

    <div class="container">
        <div class="cracha">
            <aside class="informacoesL">
                <h1>Resultado:</h1>
                <?php
                    if(!empty($_POST))
                    {
                        if($A == true)
                        {
                            echo $OpcaoA;
                        }
                        else if($B == true)
                        {
                            echo $OpcaoB;
                        }
                        else if($C == true)
                        {
                            echo $OpcaoC;
                        }
                        else if($D == true)
                        {
                            echo $OpcaoD;
                        }
                        else
                        {
                            echo $Erro;
                        }
                    }
                ?>
            </aside>

            <aside class="info-opcoes">
                <h3>Opções</h3>
                <ul>
                    <li><strong>A:</strong> Motocicleta</li>
                    <li><strong>B:</strong> Carro de passeio</li>
                    <li><strong>C:</strong> Caminhão/Ônibus</li>
                    <li><strong>D:</strong> Veículo de carga pesada</li>
                </ul>
            </aside>

            <article>
                <form action="#" method="POST">
                <h1>Taxa do veiculo</h1>
                    <label class="nome_exibição"><strong>Opção do veiculo</strong></label>
                    <input type="text" id="Opção" name="Opção" placeholder="Digite A, B, C ou D">
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