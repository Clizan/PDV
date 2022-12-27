<?php 
  
  #Acá estoy inclyendo una clase que hace la conexión con el banco de datos
  include_once '../model/conexao.php';

?>

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

   </form>
  
   <?php 

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

    <div class="tableSell">
    
     <table class="table table-sm table-striped">
  
      <thead class="viewThead">

       <tr>

        <th scope="col">CODIGO_BARRAS</th>
        <th scope="col">PRODUTO</th>
        <th scope="col">QUANTIDADE</th>
        <th scope="col">VALOR</th>
        
       </tr>

      </thead>

      <tbody>

       <tr>

        <?php 
           
         #Acá estamos selecionando los productos que el cliente está comprando
         $selectTempSell = mysqli_query($conexao, "SELECT codigo_barras, produto, qtde, preco_final FROM loja.ctrl_venda_temp");

         #Acá estamos checkando se existe algun producto en la database
         if($selectTempSell->num_rows > 0){
      
          foreach($selectTempSell as $products){
        ?>

          <td><?php echo $products['codigo_barras']?></td>
          <td><?php echo $products['produto']?></td>
          <td><?php echo $products['qtde']?></td>
          <td><?php echo $products['preco_final']?></td>
  
       </tr>

        <?php 
          }
         }
        ?>
        
       </tbody>

      </table>

    </div>

    <div class="row rowSell">

     <div class="col-sm-6"></div>
     
     <div class="col-sm-2"></div>
     
     <div class="col-sm-2">
        
      <label id="lblCompra"> Total Compra </label>
      
     </div>

     <div class="col-sm-2">
     
      <?php 
       #Acá estamos selecionando el total de la compra hecha
       $totPurcharse = mysqli_query($conexao, "SELECT SUM(preco_final) AS total FROM loja.ctrl_venda_temp"); 
      
       if($totPurcharse->num_rows > 0){

        #Acá no necesita percorrer el foreach, porque és un unico registro que tendré con el valor final
        $tot = mysqli_fetch_array($totPurcharse);

      ?>
      
       <input type="text" id="totalSell" value=" R$ <?php echo $tot['total']?>">
     
      <?php
       }
      ?>
     
     </div>

     <div class="col-sm-12">

      <button class="btn btn-success finallySell">Finalizar Compra</button>

     </div>

    </div>
   
  </div>

  <script>
   $('.finallySell').click(function(){
    alert('Envio');
   }); 

  </script>
   
 </body>

</html>



