<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

$autenticado = false;
$tipo = '';
$titulo = '';
$mensagem = '';

if (($email === 'admin@admin.com.br') && ($senha === 'admin')) {
    $autenticado = true;
    $tipo = 'success';
    $titulo = 'Autenticado';
    $mensagem = 'Bem-vindo, ' . ($email) . '! Você entrou no sistema com sucesso.';
}
else
{
    $autenticado = false;
    $tipo = 'danger';
    $titulo = 'Erro de Login';
    $mensagem = 'Login ou senha incorreta. Verifique seus dados e tente novamente.';
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado do Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-body text-center">
              <h1 class="card-title mb-3 text-<?php echo $tipo; ?>"><?php echo $titulo; ?></h1>
              <p class="fs-5"><?php echo $mensagem; ?></p>
              <div class="mt-4">
                <a href="Login.php" class="btn btn-primary me-2">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
