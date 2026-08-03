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
          <form action="#" method="POST">
            <label class="form-label">Nome: </label>
              <input class="form-control" type="text" id="nome" name="nome">
            <label class="form-label">Idade: </label>
              <input class="form-control" type="text" id="idade" name="idade">
            <label class="form-label">CPF: </label>
              <input class="form-control" type="text" id="cpf" name="cpf">
            <label class="form-label">RG: </label>
              <input class="form-control" type="text" id="rg" name="rg">
            <label class="form-label">Data Nascimento: </label>
              <input class="form-control" type="text" id="dt" name="dt">
            <label class="form-label">CEP: </label>
              <input class="form-control" type="text" id="cep" name="cep">
            <label class="form-label">Telefone: </label>
              <input class="form-control" type="text" id="tel" name="tel">
            <label class="form-label">Email: </label>
              <input class="form-control" type="text" id="email" name="email">
            
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
          $cliente = array($_POST['nome'],$_POST['idade'],$_POST['cpf'],$_POST['rg'],$_POST['dt'],$_POST['cep'],$_POST['tel'],$_POST['email']);

          echo "<p class='fw-bold'>Dados do Cliente</p>";
          for($i = 0; $i < count($cliente); $i++ )
          {
            echo "<br>".$cliente[$i];
          }
        }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>