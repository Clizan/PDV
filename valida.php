<?php

 #Acá yo estoy hacendo un include da clase conexión
 include_once './model/conexao.php';

 #Acá estamos checkando se la variable tuve un POST 
 if(isset($_POST['user']) && !empty($_POST['user'])){

  #Variable con su valor pasado por Javascript
  $getUser = $_POST['user'];
  $getPass = $_POST['pass'];

  #Variable que hace la consulta en banco de datos para identificar se existe un registro con esas informaciones para hacer el acceso a lá aplicacíon
  $select = $conexao->query("SELECT usuario, senha FROM loja.ctrl_usuarios WHERE usuario = '$getUser' AND senha = '$getPass'");
  
  if($select->num_rows > 0){

   echo $retorna = 1; 

   /*sleep(3);  
   header("Location: ./view/menu.php");
 */
  }else{
   
   sleep(3); 
   header("Location: index.php");

  }
  
 }
 
?>