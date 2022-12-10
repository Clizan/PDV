<div class="resultado">

 <?php 

  #Acá la inclusíon da clase conexíon
  include_once '../model/conexao.php';

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

 #Populando o modal da tabela principal 
 if(isset($_POST['passCadastroNota']) && (!empty($_POST['passCadastroNota']))){

  #Criando a variavle de resultado
  $resultado = '';

  #fazendo a consulta no banco de dados
  $sqlNota = mysqli_query($conexao , "SELECT LPAD(MAX(id) + 1, 10, '0') as nota FROM loja.ctrl_nota");

  #variavel global
  $codNota      = null;

  foreach($sqlNota as $row){
   $codNota .= $row['nota'];

  }

  if($codNota === ""){
   $codNota  = '00000000001'; 
  }

  $resultado .= '<div class="row">';
  $resultado .= '<div class="col-sm-12">';
  $resultado .= '<label> Nota Nº </label>';
  $resultado .= '<input type="text" value="'  .$codNota. '" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 10px; width: 20.4%; padding-left: 5px"; disabled>';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-4">';
  $resultado .= '<label style="margin-top: 10px;"> CNPJ </label>';
  $resultado .= '<input type="text" id="cnpj" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 25px; width: 65% !important; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-8">';
  $resultado .= '<label style="margin-top: 10px;"> RAZÃO SOCIAL </label>';
  $resultado .= '<input type="text" id="razao_social" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 10px; width: 70% !important; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-12">';
  $resultado .= '<label style="margin-top: 10px;"> I.E </label>';
  $resultado .= '<input type="text" id="ie" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 37px; width: 87% !important; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-6">';
  $resultado .= '<label style="margin-top: 10px;"> Endereço </label>';
  $resultado .= '<input type="text" id="endereco" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 7px; width: 75%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-6">';
  $resultado .= '<label style="margin-top: 10px;"> Bairro </label>';
  $resultado .= '<input type="text" id="bairro" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 6px; width: 79%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-4">';
  $resultado .= '<label style="margin-top: 10px;"> CEP </label>';
  $resultado .= '<input type="text" id="cep" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 32px; width: 65%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-5">';
  $resultado .= '<label style="margin-top: 10px;"> Municipio </label>';
  $resultado .= '<input type="text" id="cidade" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 5px; width: 70%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-3">';
  $resultado .= '<label style="margin-top: 10px;"> UF </label>';
  $resultado .= '<input type="text" id="uf" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 5px; width: 70%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-4">';
  $resultado .= '<label style="margin-top: 10px;"> Telefone</label>';
  $resultado .= '<input type="text" id="tel" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 10px; width: 65%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-4">';
  $resultado .= '<label style="margin-top: 10px;"> Valor R$</label>';
  $resultado .= '<input type="number" id="valor" min="1" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 15px; width: 60%; padding-left: 5px">';
  $resultado .= '</div>';
  $resultado .= '<div class="col-sm-4">';
  $resultado .= '<label style="margin-top: 10px;"> Emissão </label>';
  $resultado .= '<input type="text" id="emissao" value="' . date('Y-m-d H:i:s'). '" style="border: 1px solid lightgray; border-radius: 5px; height: 25px; outline: 0; margin-left: 3px; width: 63%; padding-left: 1px">';
  $resultado .= '</div>';

  echo $resultado;  

 }

 ?>

</div>