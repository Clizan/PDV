<!DOCTYPE html>
<html lang="pt-br">
 <head>
 
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="./css/estilo.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 </head>
 
 <body class="bodyMenu">

  <div class="container-fluid">

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

   </div> 

   <div class="container">

    <div class="row">

     <div class="col-sm-4 totalNotas">
    
      <h5 class="legendaCards">Notas Cadastradas</h5> 
      
     </div>

     <div class="col-sm-4 totalProdutos">
    
      <h5 class="legendaCards">Quantidade de Produtos</h5>
        
     </div>
    
     <div class="col-sm-4 totalVendas">
     
      <h5 class="legendaCards">Vendas</h5>
    
     </div>

     <div class="col-sm-4 tabelaVencimento">

      <table class="table table-bordered table-sm table-striped detalhesVencimento">
  
       <thead class="table-dark">

        <tr>

         <th scope="col" class="tituloFixoCodigo">CODIGO_BARRAS</th>
         <th scope="col" class="tituloFixoProduto">PRODUTO</th>
         <th scope="col" class="tituloFixoQtd">QTDE</th>
         <th scope="col" class="tituloFixoValidade">VALIDADE</th>

        </tr>

       </thead>

       <tbody>

        <tr>

         <?php 
            
          #Acá estamos haciendo lo include para la classe de conexión
          include_once '../model/conexao.php';

          #Acá estamos haciendo lo include para la classe datas
          include_once '../controller/datas.php';

          #Realizando a consulta das notas cadastradas
          $sql = $conexao->query("SELECT 
                                   cod_barras, 
                                   desc_produto, 
                                   qtde, 
                                   validade 
                                  FROM 
                                   loja.ctrl_produto 
                                  WHERE 
                                   validade <='$actualMonth'
                                  AND
                                   validade <> '0000-00-00'");

          #valida se há retorno ou se há dados cadastrados
          if($sql->num_rows > 0){

           #percorrendo os resultados que estão armazenados na variavel 'sql' 
           foreach($sql as $nota){

         ?>

         <td class="larguraCodBarras"><?php echo $nota['cod_barras']?></td>
         <td class="larguraProduto"><?php echo $nota['desc_produto']?></td>
         <td class="larguraQtdVencimento"><?php echo $nota['qtde']?></td>
         <td><?php echo $nota['validade']?></td>
  
        </tr>

        <?php 
          }
         }
        ?>
        
       </tbody>

      </table>

     </div>

    </div> 

   </div>

  </div> 

 </body>

</html>
