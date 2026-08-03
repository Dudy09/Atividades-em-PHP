<?php
$nome = $_POST['nome'];
$idade = $_POST['Idade'];
$maior = ($idade >= 18);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificação de Idade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-body text-center">
              <?php if ($maior): ?>
                <h1 class="card-title text-success">Maior de Idade</h1>
                <p class="fs-5"><?php echo ($nome); ?> é maior de idade.</p>
              <?php else: ?>
                <h1 class="card-title text-danger">Menor de Idade</h1>
                <p class="fs-5"><?php echo ($nome); ?> é menor de idade.</p>
              <?php endif; ?>
              <p class="text-muted">Idade informada: <?php echo ($idade); ?></p>
              <div class="mt-4">
                <a href="Idade.php" class="btn btn-primary">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
