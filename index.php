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
  align-items: center;
  display: flex;
  height: 100vh;
  flex-direction: row;
  justify-content: center;
  width: 100vw;
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
     
    <form action="valida.php" method="POST">
  
     <div class="row">

      <div class="col-sm-6">

       <img id="logo" src="./view/img/login.png">

      </div>

      <div class="col-sm-6"> 

       <label class="lblInfoUsuario">Usuário</label>
       <input type="text" id="txtLogin" name="user">

       <label class="lblInfoUsuario">Senha</label>
       <input type="password" id="txtSenha" name="pass">

       <button class="btn btn-success" id="entrar">Entrar</button>

      </div>
     
     </div>

    </form>
   
   </div>

  </div>
 
 </body>

</html>
