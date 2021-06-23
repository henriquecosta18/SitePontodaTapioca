<?php
//start na sessão
session_start();

$localhost="localhost";//none do host
$user="root";//usuario
$passw="";//senha
$banco="pdtapioca";//nome do banco de dados

//variavel global para usar em todo sisstema
global $pdo;
//conexao orientada a objetos PDO
try{
    $pdo= new PDO("mysql:dbname=".$banco."; host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );

}catch(PDOException $e){
    echo "ERRO: ".$e->getMesssage();
    exit;
}
//$sql= $pdo-> query("SELECT * FROM usuarios");
//$sql->execute();
//
//echo $sql->rowCount();
?>

