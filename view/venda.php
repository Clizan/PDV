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
 <body class="bodyMenu">

  <div class="container" style="margin-top: 50px; border-radius: 5px; height: 89vh">

   <form id="venda"  method="POST" action="#">

    <div class="row layoutCadastrar">
            
     <div class="col-sm-4">
     
      <label class="titulo">Código</label>
    
      <input type="text" class="form-control" name="codigo">
     
     </div>
   
    </div>

   <button type="submit" class="btn btn-success" id="registrar">Registrar</button>

   </form>
  
   <?php 
    
    #Acá estoy inclyendo una clase que hace la conexión con el banco de datos
    include_once '../model/conexao.php';

    #Acá yo hago la validación se existe datos para la variable
    if(isset($_POST['codigo']) && (!empty($_POST['codigo']))){

     #Variable que recebe el valor con refencia el POST PHP   
     $code = $_POST['codigo']; 
     
     #Acá estamos selecionando el producto con el código pasado en la variable
     $selectProdutct = mysqli_query($conexao, "SELECT * FROM loja.ctrl_produto WHERE cod_barras = '$code'");

     #La variable sen valor, mas que tendrá un papel importante que és armazenar los resultados del foreach
     $newPurchase = null;

     foreach($selectProdutct AS $infoProduct){

      $newPurchase .= "('" .$code. "', '".$infoProduct['desc_produto'] ."', '" .$infoProduct['qtde']. "', '" .$infoProduct['preco_final']. "'),";   

     }

     #Acá estamos sacando la ultima letra de la variable $newPurchase ','
     $new = substr($newPurchase, 0, -1);

     #Acá vamos inserir en una database sola para dicermos que estamos registrando los produtos vendidos para los clientes
     $insertTemp = mysqli_query($conexao, "INSERT INTO loja.ctrl_venda_temp (codigo_barras, produto, qtde, preco_final) VALUES " .$new);

    }
  
   ?>
   
  </div>
   
 </body>

</html>



