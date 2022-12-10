<?php 
 #Acá estoy inclyendo una clase que hace la conexión con el banco de datos
 include_once '../model/conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Cadastro Produto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/estilo.css">

 </head>
 <body>

  <div class="container" style="margin-top: 50px; border-radius: 5px; height: 89vh">
  
   <label class="titulo">Código</label>
    
   <div class="row mb-3">
       
    <div class="col-sm-4">
   
     <input type="text" class="form-control" id="codigo">
    
    </div>
  
   </div>
  
   <label class="titulo">Descrição do Produto</label>
    
   <div class="row mb-3">
     
    <div class="col-sm-12">
 
     <input type="text" class="form-control" id="produto">
  
    </div>

   </div>
  
   <div class="row mb-3">

    <div class="col-sm-3">

     <label class="titulo">Quantidade</label>
   
    </div> 

    <div class="col-sm-3">
   
     <label class="titulo">Data Validade</label>

    </div>  
    
    <div class="col-sm-3">
   
     <label class="titulo">Preço Unitário</label>

    </div>  

    <div class="col-sm-3">

     <label class="titulo">Preço Total</label>

    </div>  

   </div>

   <div class="row mb-3">
   
    <div class="col-sm-3">
 
     <input type="text" class="form-control" id="qtd">
  
    </div>
   
    <div class="col-sm-3">
 
     <input type="text" class="form-control" id="validade">
  
    </div>

    <div class="col-sm-3">

     <input type="text" class="form-control" id="unit">

    </div>

    <div class="col-sm-3">

     <input type="text" class="form-control" id="total">

    </div>

   </div> 
  
   <button type="button" class="btn btn-success" id="cadastrar">Cadastrar</button>
   <button type="button" class="btn btn-primary" id="pesquisar">Consulta</button>
   <button type="button" class="btn btn-secondary" id="atualizar">Atualizar</button>
   <button type="button" class="btn btn-danger" id="deletar">Deletar</button>

   <div style="margin-top: 5px; height: 50vh; overflow: auto; font-size: 12px">
   
    <div class="retorno"></div>

   </div>
    
  </div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><!--Bibliotecas Ajax -->
  <script src="./js/script.js"></script><!--Script for page timeout-->

 </body>

</html>
