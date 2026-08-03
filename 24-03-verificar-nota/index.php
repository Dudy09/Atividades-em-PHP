<?php
if (!empty($_POST)) {
    $nome = $_POST['nome'];
    $nota = $_POST['nota'];

    $aprovado = false;
    $recuperacao = false;
    $reprovado = false;

    if ($nota <= 10 && $nota >= 0) {
        if ($nota <= 4.9) {
            $reprovado = true;
            $resultado = "O aluno $nome foi Reprovado, precisa melhorar";
        } else if ($nota <= 6.9) {
            $recuperacao = true;
            $resultado = "O aluno $nome está de Recuperação, estude um pouco mais";
        } else {
            $aprovado = true;
            $resultado = "O aluno $nome foi Aprovado, parabéns";
        }
    } else {
        $resultado = "Nota inválida, digite uma nota válida";
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Verifique nota</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="tema-investimento">

    <div class="container">
        <div class="cracha">

            <article>
                <form action="#" method="POST">
                    <h1>Verifique a nota</h1>

                    <label><strong>Nome:</strong></label>
                    <input type="text" name="nome">

                    <div style="margin-top: 20px;">
                        <label><strong>Nota:</strong></label>
                        <input type="text" name="nota">
                    </div>

                    <div style="margin-top: 50px;">
                        <input type="reset" value="Limpar" class="botão">
                        <input type="submit" value="Ver Nota" class="botão">
                    </div>
                </form>
            </article>

            <aside class="informacoesL">
                <h1>Resultado:</h1>

                <?php
                if (!empty($_POST)) {
                    echo $resultado;
                }
                ?>
            </aside>

        </div>
    </div>

</body>

</html>