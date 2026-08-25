<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Array em PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <h1 class="bg-primary text-white text-center">Consulta de cliente</h1>
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col">
        
      </div>
      <div class="col"></div>
    </div>
  </div>

  <?php
    $dir = "../Dados/cliente.txt";

    if (file_exists($dir)) {
        $conteudo = file_get_contents($dir);
        
        // Transforma a string de volta em um array usando o " - " como separador
        $dados = explode(" - ", $conteudo);
        
        // Agora você pode acessar cada posição do array original
    echo "<h3>Dados do Cliente:</h3>";
    echo "<strong>Nome:</strong> "        . ($dados[0]  ?? '') . "<br>";
    echo "<strong>CPF:</strong> "         . ($dados[1]  ?? '') . "<br>";
    echo "<strong>RG:</strong> "          . ($dados[2]  ?? '') . "<br>";
    echo "<strong>Data Nasc.:</strong> "  . ($dados[3]  ?? '') . "<br>";
    echo "<strong>CEP:</strong> "          . ($dados[4]  ?? '') . "<br>";
    echo "<strong>Endereço:</strong> "     . ($dados[5]  ?? '') . "<br>";
    echo "<strong>Número:</strong> "       . ($dados[6]  ?? '') . "<br>";
    echo "<strong>Complem.:</strong> "     . ($dados[7]  ?? '') . "<br>";
    echo "<strong>Bairro:</strong> "       . ($dados[8]  ?? '') . "<br>";
    echo "<strong>Cidade:</strong> "       . ($dados[9]  ?? '') . "<br>";
    echo "<strong>Estado:</strong> "       . ($dados[10] ?? '') . "<br>";
    echo "<strong>Telefone:</strong> "     . ($dados[11] ?? '') . "<br>";
    echo "<strong>E-mail:</strong> "       . ($dados[12] ?? '') . "<br>";
        // ... e assim por diante para os outros campos
    }

    else {
        echo "Arquivo não encontrado.";
    }
    ?>
  </div>  
</body>
</html>