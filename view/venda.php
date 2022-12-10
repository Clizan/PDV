<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Venda Produto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/estilo.css">

 </head>
 <body>

  <div class="container" style="margin-top: 50px; border-radius: 5px; height: 89vh">

   <form id="venda"  method="POST" action="#">

    <label class="titulo">Código</label>
    
    <div class="row mb-3">
        
     <div class="col-sm-4">
    
      <input type="text" class="form-control" name="codigo">
     
     </div>
   
    </div>

   <button type="submit" class="btn btn-success" id="registrar">Registrar</button>

   </form>
  
   <?php 
    
    #Acá estoy inclyendo una clase que hace la conexión con el banco de datos
    include_once '../model/conexao.php';
   
    if(isset($_POST['codigo']) && (!empty($_POST['codigo']))){

     $code = $_POST['codigo']; 
     
     $selectProdutct = mysqli_query($conexao, "SELECT * FROM loja.ctrl_produto WHERE cod_barras = '$code'");

     foreach($selectProdutct AS $infoProduct){

      echo $infoProduct['desc_produto'];  
      echo $infoProduct['qtde']; 
      echo $infoProduct['preco_final'];  

     }

    }
  
   ?>
   
  </div>
   
 </body>

</html>



