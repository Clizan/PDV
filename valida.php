<?php

 # Acá voy a incluir la clase conexíon
 include_once './model/conexao.php';

 #Acá estamos checkando se la variable tuve un POST 
 if(isset($_POST['usuario']) && !empty($_POST['senha'])){

  #Variable con su valor pasado por Javascript
  $getUser = $_POST["usuario"];
  $getPass = $_POST["senha"];

  #Variable responsable por tener el valor de retorno para la pantalla index.php
  $retorno = null;
  
  #Variable que hace la consulta en banco de datos para identificar se existe un registro con esas informaciones para hacer el acceso a lá aplicacíon
  $select = $conexao->query("SELECT usuario, senha FROM loja.ctrl_usuarios WHERE usuario = '$getUser' AND senha = '$getPass'");
    
  #cuantidad de datos encontrados en banco de datos co eses valores
  if($select->num_rows > 0){

   $retorno .= 1; 
   
  }else{
     
   $retorno .= 0; 
  
  }

  #aca estoy haciendo el retorno de valor para la pantalla index
  $resultado = $retorno;
  echo json_encode($resultado);
    
 }

?>
