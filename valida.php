<div class="resultado">

<?php

 #Acá yo estoy hacendo un include da clase conexión
 include_once './model/conexao.php';

 #Acá estamos checkando se la variable tuve un POST 
 if(isset($_POST['passUser']) && !empty($_POST['passUser'])){

  #Variable con su valor pasado por Javascript
  $getUser = $_POST['passUser'];
  $getPass = $_POST['passPass'];

  #Variable que hace la consulta en banco de datos para identificar se existe un registro con esas informaciones para hacer el acceso a lá aplicacíon
  $select = $conexao->query("SELECT usuario, senha FROM loja.ctrl_usuarios WHERE usuario = '$getUser' AND senha = '$getPass'");
  
  if($select->num_rows > 0){

   header("location: ./view/venda.php");
 
  }else{

    echo "Erro";


  }
  
 } 

?>

</div>