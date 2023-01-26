<!DOCTYPE html>
<html lang="pt-br">
 <head>
 
  <title>Relatório</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"  href="./css/estilo.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 </head>
 <body>

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

   <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

  </div> 

   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Crédito', 'Débito', 'Dinheiro', 'Pix'],

          <?php 
           include_once '../model/conexao.php';

           $sql = $conexao->query("SELECT tipo_pagamento, SUM(total) AS pagamento FROM loja.ctrl_venda GROUP BY tipo_pagamento");

           foreach($sql as $rows => $values){

            $tPayment = $values['tipo_pagamento'];
            $payment  = $values['pagamento'];

          ?>  

          ['2014', '<?php echo $tPayment?>', <?php echo $payment?>, 200, ],
<?php

        }
          
          ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 </body>

</html>