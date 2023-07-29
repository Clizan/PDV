<div class="resultado">

 <?php 

  #Acá la inclusíon da clase conexíon
  include_once '../model/conexao.php';

  #Acá yo estoy definindo la timezona del país para que el horário y data estenjan corectas
  date_default_timezone_set('America/Sao_Paulo');

  #Acá la funcíon para hacer la insercíon en database
  function insertProduct($conexao, $getCode, $getProduct, $getQtd, $getValidity, $getUnitary, $getTotal){
   #Acá yo hago la insercíon dos datos ya adquiridos en variables por isset y empty  
   $insertProduct = mysqli_query($conexao, "INSERT INTO loja.ctrl_produto (cod_barras, desc_produto, qtde, validade, preco_unitario, preco_final) 
                                            VALUES ('$getCode', '$getProduct', '$getQtd', '$getValidity', '$getUnitary', '$getTotal')");
 
   echo "Dados inseridos com sucesso!";

  }

  #Acá la funcion para hacer la consulta en database
  function searchingProduct($conexao, $getSendCodebar, $getSendProduct){
   #Acá yo hago la consulta de datos ya adquiridos en variables por isset y empty
   $searchingProduct = mysqli_query($conexao, "SELECT * FROM loja.ctrl_produto 
                                                WHERE cod_barras LIKE '%$getSendCodebar%' OR desc_produto LIKE '%$getSendProduct%'"); 

   echo '<table class="table table-sm table-bordered table-striped">
          <thead>
           <tr>
            <td>CODIGO_BARRAS</td>
            <td>PRODUTO</td>
            <td>QUANTIDADE</td>
            <td>VALIDADE</td>
            <td>PREÇO_TOTAL</td>
           </tr> 
          </thead>
          <tbody>
           <tr>';

           foreach($searchingProduct as $row){

           echo '<td>' .$row['cod_barras']. '</td>
                 <td>' .$row['desc_produto']. '</td>
                 <td>' .$row['qtde']. '</td>
                 <td>' .$row['validade']. '</td>
                 <td> R$ ' .$row['preco_final']. '</td>
           </tr>';

           } 

          echo ' 
          </tbody>
         </table>';

         echo "Estou aqui";

  }

  #Acá la función propriamiente dicha para hacer el update en database
  function upProduct($conexao, $getUpCodeBar, $getUpProduct, $getUpQuantaty, $getUpValidity, $getUpUnitaryValue, $getUpTotal){
   
   #Acá el update
   $upProduct = mysqli_query($conexao, "UPDATE loja.ctrl_produto 
                                         SET
                                          cod_barras      = '$getUpCodeBar', 
                                          desc_produto    = '$getUpProduct', 
                                          qtde            = '$getUpQuantaty', 
                                          validade        = '$getUpValidity', 
                                          preco_unitario  = '$getUpUnitaryValue', 
                                          preco_final     = '$getUpTotal'
                                         WHERE
                                          cod_barras      = '$getUpCodeBar'");  
         
   if($upProduct === true){

     echo "Dados atualizados com sucesso!!!";
   }      
  }

  #Acá la funcion que hara el delete de informations relacionado al producto en database
  function delProduct($conexao, $getDelCodeBar){

   #Acé la ación responsable por hacer el delete
   $deProduct = mysqli_query($conexao, "DELETE FROM loja.ctrl_produto WHERE cod_barras = '$getDelCodeBar'");
   
   if($deProduct ===  true){
    echo "Dados excluídos com sucesso";
   }else{
    echo "Dados não encontrado para a exclusão";
   }
  }

  #Acá donde ocorerá el delete del product en la tabela temporaria
  function deleteSell($conexao, $getProduct){

   #Acá la instrución para realizar el delete del producto vendido 
   $deleteProduct = mysqli_query($conexao, "DELETE FROM loja.ctrl_venda_temp WHERE id_venda = '$getProduct'"); 

  }

  #Acá estamos checkando se la variable existe, cuando nosotros pasamos por Javascript
  if(isset($_POST['passCodebar']) && (!empty($_POST['passCodebar']))){

   #Variable de javascript
   $getCode     = $_POST['passCodebar'];
   $getProduct  = $_POST['passProduct'];
   $getQtd      = $_POST['passQuantaty'];
   $getValidity = $_POST['passDateValid'];
   $getUnitary  = $_POST['passUnitaryValue'];
   $getTotal    = $_POST['passTotal'];
  
   #llamajando la function responsable por hacer la insercíon de informacíon en banco de datos 
   insertProduct($conexao, $getCode, $getProduct, $getQtd, $getValidity, $getUnitary, $getTotal);
  }

  #Acá estamos checkando se la variable existe, cuando nosotros pasamos por Javascript
  if(isset($_POST['sendCodeBar']) && !empty($_POST['sendCodeBar']) || isset($_POST['sendProduct']) && !empty($_POST['sendProduct'])){
   
   #variable javascript
   $getSendCodebar = $_POST['sendCodeBar'];
   $getSendProduct = $_POST['sendProduct'];

   #llamanjando la function responsable por hacer la insercíon de informacíon en banco de datos
   searchingProduct($conexao, $getSendCodebar, $getSendProduct);
  }

  #Acá estamos checkando se la variable pa' el update existe, cuando pasamos por Javascript
  if(isset($_POST['updCodeBar']) && (!empty($_POST['updCodeBar']))){
 
   #Variable con su valor pasado por Javascript
   $getUpCodeBar      = $_POST['updCodeBar'];
   $getUpProduct      = $_POST['updProduct'];
   $getUpQuantaty     = $_POST['updQuantaty'];
   $getUpValidity     = $_POST['updValidity'];
   $getUpUnitaryValue = $_POST['updUnitaryValue'];
   $getUpTotal        = $_POST['updTotal'];

   #llamando la funcion responsable por hacer el update en database
   upProduct($conexao, $getUpCodeBar, $getUpProduct, $getUpQuantaty, $getUpValidity, $getUpUnitaryValue, $getUpTotal);
  }

  #Acá estamos checkando se la variable pa' el delete existe, cuando pasada por javascript
  if(isset($_POST['delCodeBar']) && (!empty($_POST['delCodeBar']))){
   
   #Varible con su valor pasado por Javascript
   $getDelCodeBar = $_POST['delCodeBar'];
   
   #llamando la funcion responsable por hacer el delete en database
   delProduct($conexao, $getDelCodeBar);

  }

  if(isset($_POST['subtotal']) && !empty($_POST['subtotal'])){

   $resultado = null;

   $resultado .= '<dl class="row">';
   $resultado .= '<dt class="col-sm-3"> Subtotal</dt>';
   $resultado .= '<dd class="col-sm-9"><label style="border: 1px solid lightgray; border-radius: 5px; color: red; height: 25px; padding-left: 10px; width: 20%">' .$_POST['subtotal']. '</label></dd>';
   $resultado .= '<br />';
   $resultado .= '<dt class="col-sm-3"> Desconto</dt>';
   $resultado .= '<dd class="col-sm-9"><input type="text" id="discont" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; padding-left: 10px"></dd>';
   $resultado .= '<br /><br />';
   $resultado .= '<dt class="col-sm-3"> Total</dt>';
   $resultado .= '<dd class="col-sm-9"><input type="text" id="total" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; padding-left: 10px"></dd>';
   $resultado .= '<br /><br />';
   $resultado .= '<dt class="col-sm-12"> Formas de Pagamento</dt>';
   $resultado .= '<dd class="col-sm-12"><hr style="margin-top: 5px"></dd>';
   $resultado .= '<dd class="3"><input type="radio" id="credito" name="pagamento" value="credito" style="margin-left: 15px"> Crédito';
   $resultado .= '<input type="radio" id="debito" name="pagamento" value="debito" style="margin-left: 15px"> Débito';
   $resultado .= '<input type="radio" id="dinheiro" name="pagamento" value="dinheiro" style="margin-left: 15px"> Dinheiro </dd>';
   $resultado .= '<input type="radio" id="dinheiro" name="pagamento" value="pix" style="margin-left: 15px"> Pix </dd>';
   $resultado .= '</dl>'; 

   echo $resultado;
   
  }

  #Acá estoy cerrando la compra hecha por una persona
  if(isset($_POST['passPurchase']) && !empty('passPurchase')){

   $getPayment = $_POST['passPagamento'];

   #Haciendo el select en la tabela temporaria para colocar los datos en la tabela principal 
   $selectTempSell = mysqli_query($conexao, "SELECT * FROM loja.ctrl_venda_temp"); 

   #Acá estoy pegando el horario correcto para inserir en la tabela principal
   $dataVenda = date('Y-m-d H:i:s');

   #una variable vazia que tendrá a ser usada para hacer el concate de informaciones
   $tranferSell = null;

   #Acé estiy haciendo una validación que tendrá el objectivo de decir se existe o no datos
   if($selectTempSell->num_rows > 0){
    
    #Acá estoy percorriendo los datos encuentrados en la database
    foreach($selectTempSell as $sell){

     #Haciendo la concatenación del datos 
     $tranferSell .= "('" .$sell['codigo_barras']. "', '" .$sell['qtde']. "', '" .$sell['preco_final']. "', '" .$getPayment. "', '" .$dataVenda. "'),";   

    }
    
    #acá estoy sacando la ultima variable de la variable '$transferSell'
    $new = substr($tranferSell, 0, -1);

    #Acá voy hacer el insert en la database principale
    $insertCtrlVenda = mysqli_query($conexao, "INSERT INTO loja.ctrl_venda(codigo, quantidade, total, tipo_pagamento, data_venda) VALUES " . $new);

    #Acá estoy haciendo el delete de las informaciones en la tabela temporaria
    $deletaTempVenda = mysqli_query($conexao, "DELETE FROM loja.ctrl_venda_temp");

   }

  }

  #Acá yo estoy haciendo la validación del valor pasado por AJAX
  if(isset($_POST['delete']) && !empty($_POST['delete'])){
   
   #Variable con valor del AJAX 
   $getProduct = $_POST['delete'];
   
   #La Funcíon que hará el descarte del registro en database
   deleteSell($conexao, $getProduct);

  }

  if(isset($_POST['sem_cadastro']) && !empty($_POST['sem_cadastro'])){

    $valor = $_POST['sem_cadastro'];

    $insert = $conexao->query("INSERT INTO loja.ctrl_venda_temp (preco_final) VALUES ('$valor')");

  }

 ?>

</div> 
