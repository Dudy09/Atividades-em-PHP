<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
              <h1 class="card-title text-center mb-4">Autenticação</h1>
              <form action="verifica-Login.php" method="POST" class="row g-3">
                <div class="col-12">
                  <label for="email" class="form-label">Digite seu Email:</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="col-12">
                  <label for="senha" class="form-label">Digite sua senha:</label>
                  <input type="password" id="senha" name="senha" class="form-control" required>
                </div>
                <div class="col-12 text-center mt-3">
                  <button type="reset" class="btn btn-secondary me-2">Limpar</button>
                  <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
