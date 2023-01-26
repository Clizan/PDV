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

html {
  height: 100%;
  overflow: hidden;
}

body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#9d5f7e, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}



  </style>

 </head>
 <body>

  <div class="container">

   <div class="box">     
  
    <div class="login-box">
  
     <h2>Login</h2>
  
     <form>
   
      <div class="user-box">
    
       <input type="text" name="" required="">    
       <label>Usuário</label>
    
      </div>
    
      <div class="user-box">
    
       <input type="password" name="" required="">
       <label>Senha</label>
    
      </div>
    
      <button class="btn btn-success">Acessar</button>
    
     </form>

    </div>
   
   </div>

  </div>
 
 </body>

</html>
