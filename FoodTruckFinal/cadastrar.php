<?php
session_start();
include_once ("conexao1.php");
$nome= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$logradouro=filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$cep=filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$numero=filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento=filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$senha=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha'])&& !empty($_POST['senha'])){
    $result_usuario="INSERT INTO usuarios (nome, email, telefone, logradouro, cep, numero, complemento, senha) VALUES('$nome', '$email','$telefone', '$logradouro', '$cep', '$numero', '$complemento', MD5('$senha'))";
    $result_usuario=mysqli_query($conexao, $result_usuario);

}else {
    header("Location: cadastro.php");
}if (mysqli_insert_id($conexao)) {
    header("Location: Pagamento.html");
    # code...

}


?>