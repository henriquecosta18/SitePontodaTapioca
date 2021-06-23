<?php
session_start();
include_once ("conexao1.php");

$USUARIO=1;
//$consulta= "SELECT * FROM produto";
//$con= mysqli->query($consulta);
$result_usuario="SELECT `compra`.`NUM_PEDIDO`,`produto`.`SABOR`,`produto`.`PRECO`,`compra`.`QUANTIDADE`,`compra`.`TOTAL`
 FROM `produto`
 INNER JOIN `compra` ON `compra`.`PRODUTO` = `produto`.`NUM_PRODUTO`
 INNER JOIN `usuarios` ON `compra`.`USUARIO` = `usuarios`.`idusuario`
 WHERE `USUARIO` = $USUARIO
 ";


$result_usuario=mysqli_query($conexao, $result_usuario);

$sql = "SELECT SUM(total) as Subtotal FROM `compra` WHERE `USUARIO` = $USUARIO";
$sql=mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html>
	<head>		
		<title> Carrinho </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="grid.css">
		<link rel="stylesheet" href="grid.css">
		<link rel="stylesheet" href="grid.css">	
		<style type="text/css">
				body {
				font-family:Arial, sans-serif;
			}

			img {
				-moz-transform: all 0.4s;
				-webkit-transform: all 0.4s;
				transition: all 0.4s;
			}

			img:hover {
				-moz-transform: scale(0.1);
				-webkit-transform: scale(0.1);
				transform: scale(0.9);
			}

			/* Cabeçalho */
			.cabeçalho {
				width: 100%;
				padding: 10px;
				background: #ECECEC;
				box-shadow: 0 0 8px rgba(0,0,0,0.2);
				top: 0;				
				z-index: 99;
				position: fixed;
			    display: table-cell;
			    text-align: center;
			}

			.icones {
				float: right;
				margin-top: 20px;
				margin-right: 20px;
			}

			li {
				display: inline-flex;
				float: left;
			}			

			input.botao { /* Botão do cardapio */
				background-color: #C56B34;
	       		border: 1px solid transparent;
        		color: #fff;
          		border-radius: 20px;
          		height: 30px;
          		width: 70px;	      
			}

			.botao:hover {
			    transition: 0.5s all;
			    box-shadow: 1px 1px 10px 1px black;				
			}					
			
			/* Rodapé */
			.rodape {
				width: 100%;
				padding: 10px;
				background: #ECECEC;
				box-shadow: 0 0 8px rgba(0,0,0,0.2);
				display: flex;
				justify-content: space-around;				
			}			

			img.whatsapp {
			    display: flex;
			}

			table.tel { 
				border: 2px solid transparent;
			    display: flex;			
			}

			/* Direitos */
			.direitos {
				text-align: center;
				background: #ECECEC;
				width: 100%;
				padding: 10px;				
			}

			.corpo {
				width: 100%;
				margin-top: 160px;;
				margin-bottom: 30px;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.tabela{				
				padding: 0 20px;
			}

			.tabela2{
				border: solid 1px black;
				border-radius: 15px;
				padding: 0 20px;
			}

			.corpo td,	th {
				padding: 15px 40px;
				display: table-cell;
				text-align: left;
				vertical-align: middle;				
			}

			.texto1 {
				text-align: right;
			}

			fieldset{
				width: 100%;
				border: none;
				display: inline-flex;
				flex-wrap: wrap;
				margin-top: 10px;
				padding: 0 0;	
			}

			.alterar{
				display: inline-flex;
				width: 82%;
			}

			.alt1{
				margin-right: 20px;	
				border: 1px solid;
				padding: 0 15px;
				border-radius: 15px;
			}

			.botao_confirmar {
				margin-top: auto;
				float: right;				
			}

			.bt_confirmar {
				padding: 10px 30px;
				background: #C56B34;
	       		border: 2px solid transparent;
	       		border-radius: 20px;
        		color: #fff;
        		transition: all 0.4s;	
			}

			.bt_confirmar:hover {
				transform: scale(0.9);
			}

			.botao_login {
				text-align: center;
				margin-bottom: 15px;
			}

			.alinhar {
				padding: 0 0;
				margin-top: 50px;
			}

			.botao_login2 {
				margin-top: 80px;
				text-align: center;
			}			

			.campos {
				
				height: 46px;
				margin-top: 25px;
				background: transparent;
				border: none;
				outline: none;
				border-bottom: 1px solid;
				transition: .25s ease-in-out;
			}

			.input-field {
				position: relative;
				margin-bottom: 20px;
			}

			label {
				position: absolute;
				top: 0;
				left: 0;
				transform: translateY(40px);
				transition: .25s ease-in-out;
			}

			.campo:focus{
				border-bottom: 2px solid;
				box-shadow: 0 1px 0 0;
			}			

			.campos:focus + label {
				transform: translateY(14px);
				font-weight: bold;
			}

			.campos:not(:placeholder-shown) + label {
				transform: translateY(14px);
				font-weight: bold;
			}

			.campos:not(:placeholder-shown) {
				border-bottom: 1px solid;
				box-shadow: 0 1px 0 0;
			}

			.campos::placeholder{
				color: transparent;
			}

		</style>
	</head>
	
	<body>
		<header class="cabeçalho"> <!--cabeçalho-->
			<a href="Pagina_inicial.html"> <img class="Logo" src="Rodapé_Cabeçalho/Logo.png" height="110" width="230"> </a>

			<div class="icones">
				<ul>
					<li>
						<form action="Cardapio.html">
							<input class="botao" type="submit" value="Cardápio">
						</form>
					</li>

					<li class="carrinho">
						<a href="carrinho.php"> <img src="Rodapé_Cabeçalho/carrinho.png" height="28" width="28"> </a>
					</li>
				</ul>
			</div>
		</header>

		<div class="corpo">
			<div class="tabela">
				<div class="tabela2">
					<table>
						<div>
							<tr>
								<th></th>
								<th scope="col">Nº</th>
								<th scope="col">Prato</th>
								<th scope="col">Preço</th>
								<th scope="col">QTD</th>
								<th scope="col">Total</th>
								
							</tr>
						</div>

						<div>
							<?php while($dado = $result_usuario->fetch_array()){ ?>
								
								<tr>
									<td><img src="tap1.png" height="75" width="75"></td>
									<td><?php echo $dado['NUM_PEDIDO'] ?></td>
									<td><?php echo $dado['SABOR'] ?></td>
									<td><?php echo $dado['PRECO'] ?></td>
									<td><?php echo $dado['QUANTIDADE'] ?></td>
									<td><?php echo $dado['TOTAL'] ?></td>  
								</tr>
				
								<?php } ?>
						</div>
					</table>
								<h2 class="texto1"><b>
									<?php 
									$sub = $sql->fetch_array();
									echo "Subtotal: R$". $sub['Subtotal'];
									?>
									</b></h2>
				</div>

				<fieldset>
					<div class="alterar">
						<form class="alt1" action="update_quantidade.php" method="POST">
							<h2 class ="alterar_pedido">
								Alterar pedido
							</h2>
							<div class="input-field">
								<input class="campos" type="text" name="num_pedido" placeholder="Número do pedido" >
								<label for="num_pedido"> Número do pedido </label>					
							</div>

							<div class="input-field">
								<input class="campos" type="text" name="quantidade" placeholder="Quantidade">
								<label for="quantidade"> Quantidade </label>							
							</div>

							<div class="botao_login">
								<input  class="bt_confirmar" type="submit" value="Alterar">
							</div>
							
						</form>

						<form class="alt1" action="excluir.php" method="POST">
							<h2 class ="alterar_pedido">
								Excluir pedido
							</h2>

							<dir class="alinhar">
								<div class="input-field">
									<input class="campos" type="text" name="num_pedido" placeholder="Número do pedido" >
									<label for="num_pedido"> Número do pedido </label>					
								</div>

								<div class="botao_login2">
									<input  class="bt_confirmar" type="submit" value="Alterar">
								</div>
							</dir>
						</form>
					</div>

					<form action="login.php" class="botao_confirmar">
						<div>
							<input class="bt_confirmar" type="submit" value="Continuar">
						</div>														
					</form>	
				</fieldset>	

				

				
			</div>			
		</div>

		<footer class="rodape"> <!-- rodapé -->
			<article>
				<b> Localização: </b>
				<br>
				Ponto Pinheiros - Próximo ao metrô Pinheiros
				<br>
				R. Cunha Gago, 590
				<br><br>
				<b> Horários de Funcionamento: </b>
				<br>
				Horário de Almoço:
				<br>
				Terça à Sexta das 12h às 14h30.
				<br>
				Sábados e Domingos das 13h às 16h.
				<br><br>
				Horário de Janta:
				<br>
				Terça à Sexta das 18h30 às 21h30
				<br>
				Sábados e Domingos das 18h30 às 21h30										
			</article>

			<article>
				<img class="whatsapp" src="Rodapé_Cabeçalho/whatsapp.png" height="36" width="38" align="left">
				<table class="tel">
					<tr>  </tr>
					<td> (11) 96528-9741 </td>
				</table>
				<br>
				Tem alguma sugestão? Quer mandar seu
				currículo?<br>
				Envie para: ponto@pontodatapioca.com
				<br><br>
				Quer o Ponto da Tapioca no seu evento?
				<br>
				Escreve pra nós, em<br>
				eventos@pontodatapioca.com
			</article>	
		</footer>

		<article class="direitos">
			<p> © copyright Ponto da Tapioca - all rights reserved - since 2021 </p>	
		</article>
	</body>
</html>