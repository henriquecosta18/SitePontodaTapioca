<?php
session_start();
//validação se recebeu os dados
//se existir email e senha ddiferente de vazio
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha'])&& !empty($_POST['senha'])) {
    
    //recebe os dados
    require'conexao2.php';
    require'Usuario.class.php';

    $u= new Usuario();

    $email=addslashes($_POST['email']);
    $senha=addslashes($_POST['senha']);

    if ($u->login($email, $senha) ==true){
        if (isset($_SESSION['idUser'])) {
            header("Location: Pagamento.html");
        }else {
            header("Location: login.php");
        }

    }else {
        header("Location: login.php");
    }
    

    # code...
}else{
    header("Location: login.php");

} 

?>