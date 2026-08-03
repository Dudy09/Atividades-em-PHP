<?php
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_N = $_POST['Data_N'];
$CPF = $_POST['CPF'];
$RG = $_POST['RG'];
$CEP = $_POST['CEP'];
$Rua = $_POST['Rua'];
$Numero = $_POST['Número'];
$Bairro = $_POST['Bairro'];
$Cidade = $_POST['Cidade'];
$UF = $_POST['UF'];
$Celular = $_POST['Celular'];
$Email = $_POST['Email'];

$nomeCompleto = $nome . " " . $sobrenome;
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dados Recebidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card shadow-sm">
        <div class="card-body">

          <h1 class="text-center mb-4">Dados Cadastrados</h1>

          <p><strong>Nome:</strong> <?php echo $nomeCompleto; ?></p>
          <p><strong>Data de nascimento:</strong> <?php echo $data_N; ?></p>
          <p><strong>CPF:</strong> <?php echo $CPF; ?> | <strong>RG:</strong> <?php echo $RG; ?></p>

          <hr>

          <p><strong>Endereço:</strong></p>
          <p>
            <?php echo $Rua; ?>, 
            <?php echo $Numero; ?> - 
            <?php echo $Bairro; ?>
          </p>
          <p>
            <?php echo $Cidade; ?> - 
            <?php echo $UF; ?>
          </p>
          <p><strong>CEP:</strong> <?php echo $CEP; ?></p>

          <hr>

          <p><strong>Contato:</strong></p>
          <p><strong>Celular:</strong> <?php echo $Celular; ?></p>
          <p><strong>Email:</strong> <?php echo $Email; ?></p>

          <div class="text-center mt-4">
            <a href="formulario.php" class="btn btn-primary">Voltar</a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>