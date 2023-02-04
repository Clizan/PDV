<?php 

 require __DIR__.'/vendor/autoload.php';

 use \App\Controller\Pages\Home;

 echo Home::getHome();

?>


<?php 
/*

include_once './dao/conexao.php'; 
 $cx = new Conexao($servidor = "localhost", $usuario = "root", $senha = "", $nomeBanco = "loja");
 
 
 #Verificando se houve o submit do botão
 if (isset($_POST['usuario']) && !empty($_POST['senha'])){
  
  #incluindo a classe que fará a rota com o banco de dados
  include_once './controller/rota.php';  

  #variaveis que armazena o valor do post
  $login = $_POST['usuario'];
  $senha = $_POST['senha'];

  #passando os parâmetros para a classe de rota
  $rota = new Rota();
  $rota->getLogin($login, $senha);

 }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 
 <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="./view/css/estilo.css" />

 </head>
 <body>

  <div class="container">

   <div class="box">     
  
    <div class="login-box">

     <div class="images">

      <img src="./view/img/logotipo.png" width="128" height="128">

     </div> 

     <br />
  
     <h2>Login</h2>
  
     <form id="login" method="POST">
   
      <div class="user-box">
    
       <input type="text" name="usuario" required="">    
       <label>Usuário</label>
    
      </div>
    
      <div class="user-box">
    
       <input type="password" name="senha" required="">
       <label>Senha</label>
    
      </div>
    
      <button class="btn btn-success">Acessar</button>
    
     </form>

    </div>
   
   </div>

  </div>
 
 </body>

</html>

*/

?>
