<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array em PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="bg-primary text-white text-center">Como utilizar o Array em PHP</h1>
    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <form action="#" method="POST" class="needs-validation" novalidate>
            <label class="form-label">Nome: </label>
              <input class="form-control" type="text" id="nome" name="nome" required>
            <label class="form-label">Idade: </label>
              <input class="form-control" type="date" id="idade" name="idade" required>
            <label class="form-label">CPF: </label>
              <input class="form-control" type="number" id="cpf" name="cpf" maxlength="11" placeholder="000000000/00" required>
            <label class="form-label">RG: </label>
              <input class="form-control" type="number" id="rg" name="rg" maxlength="9" placeholder="00.000.000-0" required>
            <label class="form-label">Data Nascimento: </label>
              <input class="form-control" type="date" id="dt" name="dt" required>
            <label class="form-label">CEP: </label>
              <input class="form-control" type="text" id="cep" name="cep" maxlength="8" placeholder="00000000" required>
            <label class="form-label">Endereço: </label>
              <input class="form-control" type="text" id="endereco" name="endereco" readonly required>
            <label class="form-label">Número: </label>
              <input class="form-control" type="number" id="numero" name="numero" maxlength="6" placeholder="000000" required>
            <label class="form-label">Complemento: </label>
              <input class="form-control" type="text" id="complemento" name="complemento">
            <label class="form-label">Bairro: </label>
              <input class="form-control" type="text" id="bairro" name="bairro" readonly required>
            <label class="form-label">Cidade: </label>
              <input class="form-control" type="text" id="cidade" name="cidade" readonly required>
            <label class="form-label">Estado: </label>
              <input class="form-control" type="text" id="estado" name="estado" readonly required>
            <label class="form-label">Telefone: </label>
              <input class="form-control" type="number" id="tel" name="tel" required>
            <label class="form-label">Email: </label>
              <input class="form-control" type="email" id="email" name="email" required>
            
            <input type="submit" value="Cadastrar" class="btn btn-primary">
            <input type="reset" value="Limpar" class="btn btn-warning">
          </form>
        </div>
        <div class="col"></div>
      </div>
    </div>

    <?php
/*
        $cliente = array("Jaqueline Luzia",27,"371.211.740-06","38.408.479-5","25/03/1969", "11722-120","(13) 2878-2075","jaqlu@gmail.com");

        var_dump($cliente);

        echo "<hr>";
        echo "<p class='text-center fw-bold'>Cliente no Array cliente</p>";
        echo "<br>Nome: ".$cliente[0];
        echo "<br>Idade: ".$cliente[1];
        echo "<br>CPF: ".$cliente[2];
        echo "<br>RG: ".$cliente[3];
        echo "<br>Data Nascimento: ".$cliente[4];
        echo "<br>CEP: ".$cliente[5];
        echo "<br>Telefone: ".$cliente[6];
        echo "<br>Email: ".$cliente[7];
*/
        if(!empty($_POST))
        { 
          $cliente = array($_POST['nome'],$_POST['idade'],$_POST['cpf'],$_POST['rg'],$_POST['dt'],$_POST['cep'],$_POST['endereco'],$_POST['numero'],$_POST['complemento'],$_POST['bairro'],$_POST['cidade'],$_POST['estado'],$_POST['tel'],$_POST['email']);
        }
        ?>
    </div>

    <?php if(!empty($_POST)): ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-success text-white">
              <h5 class="mb-0">✓ Dados do Cliente Cadastrado</h5>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6">
                  <p><strong>Nome:</strong> <?= $_POST['nome'] ?></p>
                  <p><strong>Idade:</strong> <?= $_POST['idade'] ?></p>
                  <p><strong>CPF:</strong> <?= $_POST['cpf'] ?></p>
                  <p><strong>RG:</strong> <?= $_POST['rg'] ?></p>
                  <p><strong>Data Nascimento:</strong> <?= $_POST['dt'] ?></p>
                </div>
                <div class="col-md-6">
                  <p><strong>Telefone:</strong> <?= $_POST['tel'] ?></p>
                  <p><strong>Email:</strong> <?= $_POST['email'] ?></p>
                </div>
              </div>
              <hr>
              <h6 class="fw-bold mb-3">Endereço</h6>
              <div class="row">
                <div class="col-md-8">
                  <p><strong>Rua:</strong> <?= $_POST['endereco'] ?></p>
                  <p><strong>Bairro:</strong> <?= $_POST['bairro'] ?></p>
                </div>
                <div class="col-md-4">
                  <p><strong>Nº:</strong> <?= $_POST['numero'] ?></p>
                  <p><strong>CEP:</strong> <?= $_POST['cep'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Complemento:</strong> <?= $_POST['complemento'] ?></p>
                </div>
                <div class="col-md-3">
                  <p><strong>Cidade:</strong> <?= $_POST['cidade'] ?></p>
                </div>
                <div class="col-md-3">
                  <p><strong>Estado:</strong> <?= $_POST['estado'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
      const form = document.querySelector('form');
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add('was-validated');
          alert('Preencha todos os campos obrigatórios antes de enviar.');
        }
      });

      const clearAddressFields = () => {
        document.getElementById('endereco').value = '';
        document.getElementById('bairro').value = '';
        document.getElementById('cidade').value = '';
        document.getElementById('estado').value = '';
      };

      document.getElementById('cep').addEventListener('input', function() {
        const cep = this.value.replace(/\D/g, '');
        
        if (cep.length === 8) {
          fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
              if (!data.erro) {
                document.getElementById('endereco').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;
              } else {
                clearAddressFields();
                alert('CEP não encontrado!');
              }
            })
            .catch(error => {
              console.error('Erro ao buscar CEP:', error);
              clearAddressFields();
              alert('Erro ao buscar CEP. Verifique sua conexão!');
            });
        } else {
          clearAddressFields();
        }
      });
    </script>
  </body>
</html>