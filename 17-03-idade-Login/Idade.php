<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
              <h1 class="card-title text-center mb-4">Verificar Idade</h1>
              <form action="vericidade.php" method="POST" class="row g-3">
                <div class="col-12">
                  <label for="nome" class="form-label">Nome completo:</label>
                  <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                <div class="col-12">
                  <label for="Idade" class="form-label">Idade:</label>
                  <input type="number" id="Idade" name="Idade" class="form-control" required>
                </div>
                <div class="col-12 text-center mt-3">
                  <button type="reset" class="btn btn-secondary me-2">Limpar</button>
                  <button type="submit" class="btn btn-primary">Verificar</button>
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