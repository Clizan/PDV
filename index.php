<!DOCTYPE html>
<html lang="pt-br">
<head>
 
 <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

.container {
width: 100vw;
height: 100vh;
display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
}
.box {
width: 300px;
height: 300px;
background: #fff;
}
body {
margin: 0px;
}

.lblInfoUsuario{
  margin-top: 20px;
}

#logo{
  height: 140px;
  margin-top: 25px;
}

#txtLogin, #txtSenha{
  border: 1px solid lightgray;
  border-radius: 5px;
  padding: 5px;
  outline: 0;
}

#entrar{
  margin-top: 20px;
  width: 135%;
}

.retornoLogin{
  font-size: 12px;
  margin-top: 10px;
  width: 116%;
}

  </style>

 </head>
 <body>

  <div class="container">

   <div class="box">

    <div class="row">

     <div class="col-sm-6">

      <img id="logo" src="./view/img/login.png">

     </div>

     <div class="col-sm-6">

      <label class="lblInfoUsuario">Usuário</label>
      <input type="text" id="txtLogin">

      <label class="lblInfoUsuario">Senha</label>
      <input type="password" id="txtSenha">

      <button class="btn btn-success" id="entrar">Entrar</button>

     </div>

     <div class="col-sm-12">
     
      <div class="retornoLogin"></div>

     </div>
      
    </div>
   
   </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><!--Bibliotecas Ajax -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>     
  <script src="./view/js/script.js"></script><!--Script for page timeout-->
 
 </body>

</html>
