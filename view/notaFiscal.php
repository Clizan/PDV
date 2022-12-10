<!DOCTYPE html>
<html lang="br">

 <head>

  <title>Nota Fiscal</title>
  <meta charset="utf-8"><!--Tag Usada para aceitar acentos -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Tag de redimensionameto -->
  <link rel="stylesheet" href="./css/estilo.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

 </head>

 <body>

  <div class="container-fluid">

   <div class="conteudo">

    <div class="container">   

     <div class="row">
    
      <div class="col-sm-3" id="valorMei">

       <span>Total Mei: </span>
       <h4>R$ 82.000,00</h4>

      </div>
 
      <div class="col-sm-3" id="valorNotas">

       <span>Total Notas R$: </span>
       <h4></h4>

      </div>
 
      <div class="col-sm-3" id="notasLancadas">

       <span>Total Notas Lançadas: </span>
       <h4></h4>

      </div>

      <div class="col-sm-3" id="ultimaCompra">

       <span>Ultima Compra Em: </span>
       <h4></h4>

      </div>

      <div class="col-sm-11">

       <input type="text" id="pesquisar" placeholder="Digite o código da Nota">

      </div>
     
      <div class="col-sm-1">

       <img src="./img/mais.png" id="addNota" class="nova_nota"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Adicionar Nota">

      </div>

      <div class="col-sm-12">

       <div class="tabelaInformacao">

        <table class="table table-bordered table-sm table-striped">
  
         <thead>
   
          <tr>
    
           <th scope="col">ID</th>
           <th scope="col">EMPRESA</th>
           <th scope="col">CNPJ</th>
           <th scope="col">I.E</th>
           <th scope="col">VALOR</th>
           <th scope="col">AÇÃO</th>
        
          </tr>
 
         </thead>
  
         <tbody>
  
          <tr>

           <?php 
           
            #incluindo a classe conexao
            include_once '../model/conexao.php';

            #Realizando a consulta das notas cadastradas
            $sql = $conexao->query("SELECT * FROM loja.ctrl_nota");

            #valida se há retorno ou se há dados cadastrados
            if($sql->num_rows > 0){

             #percorrendo os resultados que estão armazenados na variavel 'sql' 
             foreach($sql as $nota){

           ?>
      
           <td><?php echo $nota['id']?></td>
           <td><?php echo $nota['nome_empresa']?></td>
           <td><?php echo $nota['cnpj']?></td>
           <td><?php echo $nota['ie']?></td>
           <td><?php echo $nota['valor_nota']?></td>
           <td>
            <button class="btn btn-primary editar">Editar</button>
            <button class="btn btn-danger deletar">Excluir</button>
           </td>
        
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

    <!-- The Modal -->
    <div class="modal" id="myModal">
  
     <div class="modal-dialog">
  
      <div class="modal-content">
 
       <!-- Modal Header -->
       <div class="modal-header">
   
        <h4 class="modal-title">Nova Nota</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    
       </div>

       <!-- Modal body -->
       <div class="modal-body">
    
        <span id="view_info"></span>

        <div class="mensagemRetorno"></div>
    
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
    
        <button type="button" class="btn btn-outline-success register">Registrar</button>
    
       </div>

      </div>
 
     </div>

    </div>

   </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./js/script.js"></script>

 </body>

</html>