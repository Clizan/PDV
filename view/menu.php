<!DOCTYPE html>
<html lang="pt-br">
 <head>
 
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"  href="./css/estilo.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 </head>
 <body class="bodyMenu">

  <div class="containe-fluid">

   <div class="row">

    <div class="col-sm-12 headerMenu">

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

    <div class="container">

     <div class="col-sm-4 totalNotas">
    
      <h5 class="legendaCards">Notas Cadastradas</h5> 
      
     </div>

     <div class="col-sm-4 totalProdutos">
    
      <h5 class="legendaCards">Quantidade de Produtos</h5>
        
     </div>
    
     <div class="col-sm-4 totalVendas">
     
      <h5 class="legendaCards">Vendas</h5>
    
     </div>

     <div class="col-sm-4 viewNotas">

      <table class="table table-bordered table-sm table-striped">
  
       <thead class="viewThead">

        <tr>

         <th scope="col">CODIGO_BARRAS</th>
         <th scope="col">PRODUTO</th>
         <th scope="col">QUANTIDADE</th>
         <th scope="col">VALIDADE</th>
        
        </tr>

        </thead>

        <tbody>

         <tr>

          <?php 
            
           #incluindo a classe conexao
           include_once '../model/conexao.php';

           #Realizando a consulta das notas cadastradas
           $sql = $conexao->query("SELECT 
                                    cod_barras, 
                                    desc_produto, 
                                    qtde, 
                                    validade 
                                   FROM 
                                    loja.ctrl_produto 
                                   WHERE 
                                    validade <= DATE(NOW()) + INTERVAL 92 DAY");

           #valida se há retorno ou se há dados cadastrados
           if($sql->num_rows > 0){

            #percorrendo os resultados que estão armazenados na variavel 'sql' 
            foreach($sql as $nota){

          ?>

          <td><?php echo $nota['cod_barras']?></td>
          <td><?php echo $nota['desc_produto']?></td>
          <td><?php echo $nota['qtde']?></td>
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
