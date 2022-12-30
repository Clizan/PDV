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

  <div class="row">

   <div class="col-sm-12">
 
    <nav>

     <ul class="menu">

      <li><a href="menu.php"><img src="./img/home.png" id="home"> Home </a></li>
      <li><a href="#"><img src="./img/price.png"> Produtos </a>

       <ul>

        <li><a href="cadastro.php"><img src="./img/cadastrar.png"> Cadastro </a></li>
        <li><a href="estoque.php"><img src="./img/estoque.png"> Estoque </a></li>
        <li><a href="venda.php"><img src="./img/venda.png"> Venda </a></li>

       </ul>

      </li>

      <li><a href="#"> Notas </a>
 
       <ul>
  
        <li><a href="notaFiscal.php"><img src="./img/cadastrar.png"> Cadastrar</a></li>

       </ul>

      </li>

      <li><a href="#">Relatórios</a>

       <ul>

        <li><a href="relatorio.php"><img src="./img/money.png"> Contabilidade </a></li>

       </ul>

      </li>

     </ul>

    </nav>

   </div>

   <div class="container" style="margin-top: 60px">

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

      header("Refresh: 0; url=venda.php");
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
        <th scope="col">AÇÃO</th>
        
       </tr>

      </thead>

      <tbody>

       <tr>

        <?php 
           
         #Acá estamos selecionando los productos que el cliente está comprando
         $selectTempSell = mysqli_query($conexao, "SELECT id_venda, codigo_barras, produto, qtde, preco_final FROM loja.ctrl_venda_temp");

         #Acá estamos checkando se existe algun producto en la database
         if($selectTempSell->num_rows > 0){
      
          foreach($selectTempSell as $products){
        ?>

          <td><?php echo $products['codigo_barras']?></td>
          <td><?php echo $products['produto']?></td>
          <td><?php echo $products['qtde']?></td>
          <td><?php echo $products['preco_final']?></td>
          <td>
            <button class="btn btn-danger deleteProducts" id="<?php echo $products['id_venda']?>"> Excluir </button>
          </td>
  
        </tr>

        <?php 
          }
         }
        ?>
        
       </tbody>

      </table>

     </div>

     <div class="row rowSell">

      <div class="col-sm-8"></div>
     
      <div class="col-sm-2">
        
       <label id="lblCompra"> Subtotal </label>
      
      </div>

      <div class="col-sm-2">
     
       <?php 
        #Acá estamos selecionando el total de la compra hecha
        $totPurcharse = mysqli_query($conexao, "SELECT SUM(preco_final) AS total FROM loja.ctrl_venda_temp"); 
      
        if($totPurcharse->num_rows > 0){

         #Acá no necesita percorrer el foreach, porque és un unico registro que tendré con el valor final
         $tot = mysqli_fetch_array($totPurcharse);

       ?>
      
        <input type="text" class="totalSell" value=" R$ <?php echo $tot['total']?>">

      </div>

      <div class="col-sm-12">

       <button class="btn btn-success checkout"  id="<?php echo $tot['total']?>">Pagamento</button>

      </div>

      <?php
        }
       ?>

     </div>
   
    </div>

   </div>

   <!--Modal -->
   <div id="view_total" class="modal fade" role="dialog">
  
    <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
     
      <div class="modal-header">
      
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title">Pagamento</h4>
      
      </div>
      
      <div class="modal-body">
      
       <span id="view_close"></span>
      
      </div>
      
      <div class="modal-footer">
      
       <button type="button" class="btn btn-primary" data-dismiss="modal">Finalizar Compra</button>
      
      </div>
    
     </div>

    </div>

   </div>

  <script>
   $(document).ready(function(){
    
    $(document).on('click', '.checkout', function(){

      var subtotal = $(this).attr("id");

      //Acá estamos checando se existe valor
      if(subtotal !== ''){
        
       var dados = {
                    subtotal : subtotal
                   }; 

       //Acá estamos llamando la pagina que irá hacer la consulta y finalización del total, registrando la fuerma del pago
       $.post('../controller/registro.php', dados, function(retorna){

        //Acá yo estoy ponendo el valores en span, esos están en la página registro.php
        $("#view_close").html(retorna);

        //Acá yo estoy haciendo el caregamiento de los dados de encerramiento
        $("#view_total").modal('show');

       }); 

      }

    });
    
   }); 

   $('.deleteProducts').click(function(){

    var deleteProduct = $(this).attr("id");

    //Acá yo solo hago la validación, pues siempre tendrá un valor
    if(deleteProduct !== ''){

     $.ajax({
          type: 'POST',
          url: '../controller/registro.php',
          data:{
                 delete  : deleteProduct
               },
                success: function (resultado) {
                 $(".retorno").html(resultado);

                setTimeout(function() {
                   window.location.reload(1);
                 }, 180); // 3 minutos
               }, 
     });

    }

   });

  </script>
   
 </body>

</html>



