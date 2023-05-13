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

   <div class="container">

    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

   </div>

  </div> 

   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Total'],

          <?php 
           include_once '../model/conexao.php';

           $sql = $conexao->query("SELECT DAY(data_venda) as dia, SUM(total) AS pagamento FROM loja.ctrl_venda WHERE MONTH(data_venda) = MONTH(NOW()) GROUP BY DATE(data_venda) ORDER BY DATE(data_venda)");

           foreach($sql as $rows => $values){

            $dia      = $values['dia'];
            $payment  = $values['pagamento'];

          ?>  

          ['<?php echo $dia?>', '<?php echo $payment?>'],

      <?php

        }
          
          ?>
        ]);

        var options = {
          chart: {
            title: 'Relatórios de Venda',
            subtitle: 'Mensal',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 </body>

</html>