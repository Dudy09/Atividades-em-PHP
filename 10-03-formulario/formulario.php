<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
    <style>

    </style>

  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center mb-4">FORMULÁRIO DE CADASTRO</h1>
      <form action="recebeDados.php" method="POST" class="row g-3">
        <div class="col-md-6">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="sobrenome" class="form-label">Sobrenome:</label>
          <input type="text" id="sobrenome" name="sobrenome" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="Data_N" class="form-label">Data de Nascimento:</label>
          <input type="date" id="Data_N" name="Data_N" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="CPF" class="form-label">CPF:</label>
          <input type="text" id="CPF" name="CPF" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="RG" class="form-label">RG:</label>
          <input type="text" id="RG" name="RG" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="CEP" class="form-label">CEP:</label>
          <input type="text" id="CEP" name="CEP" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="Rua" class="form-label">Rua:</label>
          <input type="text" id="Rua" name="Rua" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="Número" class="form-label">Número:</label>
          <input type="number" id="Número" name="Número" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="Bairro" class="form-label">Bairro:</label>
          <input type="text" id="Bairro" name="Bairro" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="Cidade" class="form-label">Cidade:</label>
          <input type="text" id="Cidade" name="Cidade" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="UF" class="form-label">UF:</label>
          <input type="text" id="UF" name="UF" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="Celular" class="form-label">Celular:</label>
          <input type="text" id="Celular" name="Celular" class="form-control" required>
        </div>
        <div class="col-md-12">
          <label for="Email" class="form-label">Email:</label>
          <input type="email" id="Email" name="Email" class="form-control" required>
        </div>
        <div class="col-12 text-center">
          <input type="reset" value="Limpar" class="btn btn-secondary me-2">
          <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>