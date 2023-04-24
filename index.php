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

     <div>
     <label id="carregando" style="margin-top: -10px"></label>
     </div>

     <div class="progress" style="height: 10px; margin-top: 0px">
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

  <script>

   $(document).ready(function(){
    
    $(document).on('click', '#acessar', function(){

     var usuario = document.getElementById("user").value; 
     var senha   = document.getElementById("pass").value;  

     var dados = {
        user : usuario,
        pass : senha
     }   

     $.post('valida.php', dados, function(retorna){

        var retorno = $("#retorno").html(retorna);

        if(retorno !== null){

            let barra = document.getElementById("progressBar");
            let carga = 0;
            let intBarra = setInterval(()=>{
                barra.style.width = carga + "%";
                carga++;

                if(carga <= 30){

                    document.querySelector("#carregando").textContent  = "Carregando módulos.";

                    
                }else if(carga > 99){
                    //window.location.href = "./view/menu.php";
                }

            }, 0);

        }
   
     });

    });

  });

  </script>

 </body>

</html>


