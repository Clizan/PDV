<?php 	

 $servidor = "localhost"; /*maquina a qual o banco de dados está*/
 $usuario = "root"; /*usuario do banco de dados MySql*/
 $senha = ""; /*senha do banco de dados MySql*/
 $banco = "loja"; /*seleciona o banco a ser usado*/

 try {
  $conexao = mysqli_connect($servidor,$usuario,$senha, $banco);  /*Conecta no bando de dados MySql*/
 } catch (Throwable $th) {
  echo 'Erro ao tentar conectar no banco de dados';
 }	
?>