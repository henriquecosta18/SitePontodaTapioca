<?php
session_start();
include_once ("conexao1.php");

$num_pedido=filter_input(INPUT_POST, 'num_pedido', FILTER_SANITIZE_STRING);
$quantidade=filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);


include_once ("conexao1.php");
$result_usuario="DELETE FROM `compra` WHERE `compra`.`NUM_PEDIDO` = $num_pedido";
$result_usuario=mysqli_query($conexao, $result_usuario);
header("Location: carrinho.php");




?>