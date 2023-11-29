<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>envia_dados</title>
</head>
<body>

<?php

$conexao = mysqli_connect("localhost", "root", "", "test");

if(!$conexao){
echo"Não conectado";    
}
echo"Conectado ao banco";

$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($conexao, $cpf);
$sql = "SELECT cpf FROM test.dados WHERE CPF='$cpf";
$retorno = mysqli_query($conexao, $sql);

if(mysqli_num_rows($retorno)>0){
echo"CPF já cadastrado!";
}
else{
$cpf = $_POST['cpf'];
$idade = $_POST['idade'];
$nome = $_POST['nome'];

$sql = "INSERT INTO test.dados(cpf, idade, nome) values('$cpf', '$idade', '$nome')";
$resultado = mysqli_query($conexao, $sql);
echo"Usuário cadastrado com sucesso!<br>";
}

?> 

</body>
</html>