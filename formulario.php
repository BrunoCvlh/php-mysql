
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="functions.js"></script>
    <title>Cadastro Usuário</title>
  </head>
  <body>
    <div>
      <h3>Área de Cadastro</h3>
    </div>
    <div>
      <form action="formulario.php" method="POST">
        <div class="campos-tabela">
          <label>Nome</label>
          <input type="text" name="nome"  required="" maxlength="45">
          <label>Sobrenome</label>
          <input type="text" name="sobrenome" 
            required="" maxlength="45">
        </div>
        <br>
        <div class="campos-tabela">
          <label>Email</label>
          <input type="text" name="email"  required="" maxlength="130">
          <label>Celular</label>
          <input type="text" maxlength="11" name="celular" onkeyup="handlePhone(event)"/>
        </div>
        <br>
        <div class="campos-tabela">
          <label>CEP</label>
          <input onchange="buscarCEP()" name="cep" type="text" id="cep" size="10" maxlength="9"
               onblur="pesquisacep(this.value);"class="form-control" onkeyup="handleZipCode(event)"/>
          <label>Rua</label>
          <input type="text" name="rua" id="rua" required="" maxlength="60">
        </div>
        <br>
        <div class="campos-tabela">
          <label>Bairro</label>
          <input type="text" name="bairro" required="" maxlength="60">
          <label>Complemento</label>
          <input type="text" name="complemento" required="" maxlength="100">
        </div>
        <br>
        <div class="campos-tabela">
          <label>Cidade</label>
          <input type="text" name="cidade" id="cidade" required="" maxlength="45">
          <label>Estado</label>
          <input type="text" maxlength="2" name="estado" id="uf" required="">
        </div>
        <br>
        <button type="submit" name="submit">Enviar</button>
      </form>
    </div>
  </body>
</html>




<!--Código PHP que verifica o envio dos dados para o banco.-->
/*
<?php

if (isset($_POST['submit'])) {

  include_once('config.php');

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];
  $cep = $_POST['cep'];
  $rua = $_POST['rua'];
  $bairro = $_POST['bairro'];
  $complemento = $_POST['complemento'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];

  // Prepare a statement
  $stmt = mysqli_prepare($conexao, "INSERT INTO users2(nome, sobrenome, email, celular, cep, rua, bairro, complemento, cidade, estado) 
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // Bind parameters with values
  mysqli_stmt_bind_param($stmt, "ssssssssss", $nome, $sobrenome, $email, $celular, $cep, $rua, $bairro, $complemento, $cidade, $estado);

  // Execute the statement
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo "Dados inseridos com sucesso.";
  } else {
    echo "Erro ao inserir os dados.";
  }

  // Close the statement
  mysqli_stmt_close($stmt);
}



?>