<?php

$loopSelecionado = $_POST['tipo'] ?? 'for';
$mensagens = [];

if (!empty($_POST)) {
    $loopSelecionado = $_POST['tipo'];
    $senha = $_POST['senha'] ?? '';
    $senhaCorreta = false;
    $tentativa = 3;
    $correto = "admin123";

    switch ($loopSelecionado) {
        case 'for':
            for ($i = 0; $i < $tentativa; $i++) {
                if ($senha == $correto) {
                    $senhaCorreta = true;
                    break;
                } else {
                    $mensagens[] = "Senha incorreta, você tem mais " . ($tentativa - $i - 1) . " tentativas!";
                    //sleep(2);
                }
            }
            break;

        case 'while':
            $contador = 0;
            while ($contador < $tentativa) {
                if ($senha == $correto) {
                    $senhaCorreta = true;
                    break;
                } else {
                    $mensagens[] = "Senha incorreta, você tem mais " . ($tentativa - $contador - 1) . " tentativas!";
                    $contador++;
                }
            }
            break;

        case 'dowhile':
            $contador = 0;
            do {
                if ($senha == $correto) {
                    $senhaCorreta = true;
                    break;
                } else {
                    $mensagens[] = "Senha incorreta, você tem mais " . ($tentativa - $contador - 1) . " tentativas!";
                    $contador++;
                }
            } while ($contador < $tentativa);
            break;

        default:
            $mensagens[] = "Tipo de loop inválido.";
    }

    if ($senhaCorreta) {
        $mensagens = ["Senha correta! Você usou o loop {$loopSelecionado}."];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Senha</title>
    <link rel="stylesheet" href="css/style-senha.css">
</head>
<body>
    <div class="container">
        <article>
            <form action="#" method="POST">
                <h1>Verifique a senha</h1>

                <input type="text" name="senha" placeholder="Digite sua senha">

                <select id="tipo" name="tipo">
                    <option value="for" <?= $loopSelecionado === 'for' ? 'selected' : '' ?>>for</option>
                    <option value="while" <?= $loopSelecionado === 'while' ? 'selected' : '' ?>>while</option>
                    <option value="dowhile" <?= $loopSelecionado === 'dowhile' ? 'selected' : '' ?>>do..while</option>
                </select>

                <div class="actions">
                    <button type="reset" class="botao">Limpar</button>
                    <button type="submit" class="botao">Ver Nota</button>
                </div>
            </form>

            <details class="card">
    <summary class="card-header btn-toggle">Ver Resultado</summary>
    <div class="card-body">
        <?php foreach ($mensagens as $mensagem): ?>
            <p><?= htmlspecialchars($mensagem) ?></p>
        <?php endforeach; ?>
    </div>
</details>

<style>
/* Estilo para fazer o summary parecer um botão */
.btn-toggle {
    cursor: pointer;
    list-style: none; /* Esconde a seta padrão */
}
.btn-toggle::-webkit-details-marker {
    display: none; /* Esconde a seta no Safari */
}
</style>
            </article>

</body>
</html>