<?php
// TEMA: Rhythm Doctor
if(!empty($_POST))
{
    $diagnostico = strtoupper(trim($_POST['diagnostico']));

    $A = false; $B = false; $C = false; $D = false;
    switch($diagnostico)
    {
        case (($diagnostico == "EMERGÊNCIA") || ($diagnostico == "EMERGENCIA") || ($diagnostico == "VERMELHA") || ($diagnostico == "VERMELHO")):
            $A = true;
            $Emergencia = "Atendimento imediato";
        break;

        case (($diagnostico == "LARANJA") || ($diagnostico == "MUITA URGENTE")):
            $B = true;
            $MUrgente = "Espera de 10 min.";
        break;

        case (($diagnostico == "AMARELO") || ($diagnostico == "URGENTE")):
            $C = true;
            $Urgente = "Espera de 60 min.";
        break;

        case (($diagnostico == "VERDE") || ($diagnostico == "POUCO URGENTE")):
            $D = true;
            $PUrgente = "Espera de 120 min.";
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
    <title>Triagem hospitalar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="tema-hospital">

    <div class="container">
        <div class="cracha">
            <aside class="informacoesL">
            <h1>Resultado:</h1>
            <?php
                    if(!empty($_POST))
                    {
                        if($A == true)
                        {
                            echo $Emergencia;
                        }
                        else if($B == true)
                        {
                            echo $MUrgente;
                        }
                        else if($C == true)
                        {
                            echo $Urgente;
                        }
                        else if($D == true)
                        {
                            echo $PUrgente;
                        }
                        else
                        {
                            echo $Erro;
                        }
                    }
                ?>
            </aside>

            <aside class="info-opcoes">
                <h3>Cores da pulseira/Sintomas</h3>
                <ul>
                    <li><strong>Vermelha</strong>/<strong>Emergência</strong></li>
                    <li><strong>Laranja</strong>/<strong>Muito Urgente</strong></li>
                    <li><strong>Amarelo</strong>/<strong>Urgente</strong></li>
                    <li><strong>Verde</strong>/<strong>Pouca Urgente</strong></li>
                </ul>
            </aside>

            <article>
                <form action="#" method="POST">
                <h1>Selecione sintomas</h1>
                    <label>Sintomas/Cor da puleseira:</label>
                    <input type="diagnostico" id="diagnostico" name="diagnostico">
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