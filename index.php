<?php 
 #incluindo a classe de conexão
 include_once './model/conexao.php'; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 
 <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css"  href="./view/css/estilo.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

 </head>
 <body>

  <div class="container">

   <div class="box">     
  
    <div class="login-box">

     <div class="images">

      <img src="./view/img/logotipo.png" width="164" height="164">

     </div> 

     <br />  
   
     <div class="user-box">
    
      <input type="text" id="user" required="">    
      <label>Usuário</label>
    
     </div>
    
     <div class="user-box">
    
      <input type="password" id="pass" required="">
      <label>Senha</label>
    
     </div>

     <div class="info_progress">
     
      <label id="carregando"></label>
     
     </div>

     <div class="progress">
        
      <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
     
     </div>

     <br />
    
     <button class="btn btn-success" id="acessar">Acessar</button>
    
    </div>
   
   </div>

  </div>

  <!--Aca estan las bibliotecas que hacen los efectos visuales en la pagina -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><!--Bibliotecas Ajax -->
  <script src="./view/js/script.js"></script><!--Script for page timeout-->

 </body>

</html>


