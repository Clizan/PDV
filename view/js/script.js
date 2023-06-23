   //Click no butão de acessar
   $('#acessar').click(function(){
      
    //variavel coletada através do id HTML
    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;

    $.ajax({
        url: "pagina.php",
        method: "POST",
        data: { usuario: usuario, senha: senha },
        success: function(response) {

         //script responsable por hacer la validación en la pantalla del login
         $(document).ready(function(){
         
          document.getElementById('resultado').style.display = 'none';
          document.getElementById("resultado").textContent = response;

          var resultado = document.getElementById("resultado").innerHTML;

          if(resultado === `"1"`){
           
           let barra = document.getElementById("progressBar");
           let carga = 0;
           let intBarra = setInterval(()=>{
            barra.style.width = carga + "%";
            carga++;
   
            if(carga <= 30){
   
             document.querySelector("#carregandoInformacao").textContent  = "Carregando módulos.";
                     
            }else if(carga <=60){
   
             document.querySelector("#carregandoInformacao").textContent  = "Carregando tabelas.";
   
            }else if(carga == 100){
             document.querySelector("#carregandoInformacao").textContent  = "Carregando o sistema.";
             //window.location.href = "../view/menu.php";
            }
   
           }, 80);
          
          }else{
          
            //site que sweetalert (https://sweetalert2.github.io/#download)
            Swal.fire({
             title: 'Error!',
             text: 'Usuário ou senha invalida!',
             icon: 'error',
             showConfirmButton: false,
             timer: 2500
            })

          }
        
         });
       
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    
       });

     });

//Script necesario para hacer las aciones posibles para insercíon
$('#cadastrar').click(function(){

 //Variables javascript que reciebem las informaciones das variables do PHP   
 var codebar      = document.getElementById('codigo').value;
 var product      = document.getElementById('produto').value;
 var quantaty     = document.getElementById('qtd').value;
 var validity     = document.getElementById('validade').value;
 var unitaryValue = document.getElementById('unit').value;
 var total        = document.getElementById('total').value; 

 $.ajax({
          type: 'POST',
          url: '../controller/registro.php',
          data:{
                 passCodebar      : codebar,
                 passProduct      : product,
                 passQuantaty     : quantaty,
                 passDateValid    : validity,
                 passUnitaryValue : unitaryValue,
                 passTotal        : total 
               },
                success: function (resultado) {
                 $(".retorno").html(resultado);

                setTimeout(function() {
                   window.location.reload(1);
                 }, 1800); // 3 minutos
               },
                error: function () {
               }

        });

});

//Acá cuando yo clicar en botón pesquisar
$('#pesquisar').click(function(){

  //Variables javascript que reciebem las informaciones das variables do PHP   
  var reCodebar      = document.getElementById('codigo').value;
  var reProduct      = document.getElementById('produto').value;
  var reQuantaty     = document.querySelector('#qtd');
  var reValidity     = document.querySelector('#validade');
  var reUnitaryValue = document.querySelector('#unit');
  var reTotal        = document.querySelector('#total'); 

  //Disable inputs for to searching
  reQuantaty.disabled = true;
  reValidity.disabled = true;
  reUnitaryValue.disabled = true;
  reTotal.disabled = true;

  if(reCodebar !== "" || reProduct !== ""){
   $.ajax({
           type: 'POST',
           url: '../controller/registro.php',
           data:{
                 sendCodeBar      : reCodebar,
                 sendProduct      : reProduct
                },
                success: function (resultado) {
                 $(".retorno").html(resultado);

                 setTimeout(function() {
                  window.location.reload(1);
                 }, 180000); // 3 minutos
                },
                 error: function () {
                }

         });
  }else{
    $(".retorno").html("Não há parâmetros para consulta!");
    
    setTimeout(function() {
      window.location.reload(1);
    }, 1800); // 3 minutos
  }       

});

//Acá la function responsable por hacer el update in database
$('#atualizar').click(function(){

 //Variables javascript que reciebem las informaciones das variables do PHP   
 var upCodebar      = document.getElementById('codigo').value;
 var upProduct      = document.getElementById('produto').value;
 var upQuantaty     = document.getElementById('qtd').value;
 var upValidity     = document.getElementById('validade').value;
 var upUnitaryValue = document.getElementById('unit').value;
 var upTotal        = document.getElementById('total').value; 

 if(upCodebar !== ""){

  $.ajax({
    type: 'POST',
    url: '../controller/registro.php',
    data:{
          updCodeBar      : upCodebar,
          updProduct      : upProduct,
          updQuantaty     : upQuantaty,
          updValidity     : upValidity,
          updUnitaryValue : upUnitaryValue,
          updTotal        : upTotal
         },
         success: function (resultado) {
          $(".retorno").html(resultado);

          setTimeout(function() {
           window.location.reload(1);
          }, 180000); // 3 minutos
         },
          error: function () {
         }

  });

 }else{
  $(".retorno").html("Código do produto não preenchido, preencher para que à alteração seja concluída!");

  setTimeout(function() {
    window.location.reload(1);
   }, 1800); // 3 minutos
 }  

});

//Acá la funcíon que hará el post para deletar las informaciones en database
$('#deletar').click(function(){

  //Las variables necesaria para hacer lo delete do registro
  var deCodeBar =  document.getElementById('codigo').value;

  if(deCodeBar !== ''){
    $.ajax({
            type: 'POST',
            url: '../controller/registro.php',
            data:{
                  delCodeBar      : deCodeBar
                 },
                 success: function (resultado) {
                  $(".retorno").html(resultado);
  
                  setTimeout(function() {
                   window.location.reload(1);
                  }, 180000); // 3 minutos
                 }
    });

  }else{
    $(".retorno").html("Código do produto não preenchido, preencher para que à exclusão do produto seja concluída!");
  
    setTimeout(function() {
      window.location.reload(1);
     }, 1800); // 3 minutos
  }  
 
});

$(document).ready(function(){

 $(document).on('click', '.nova_nota', function(){

  var nota = 1;

  var dados = {
  
   passCadastroNota : nota

  };

  $.post('./../controller/registro.php', dados, function(retorno){

   console.log(dados);

   $('#myModal').modal('show');

  });

 });
 
});

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

      $('.finish').click(function(){
        
       //Acá tendremos las informaciones que están se pasando en span del modal
       var mitigation = document.getElementById('discont').value;
       var pagamento = document.querySelector('input[name="pagamento"]:checked').value;  
       var finalizarVenda = true;

       $.ajax({
        type: 'POST',
        url: '../controller/registro.php',
        data:{
               passPurchase  : finalizarVenda,
               passPagamento : pagamento
             },
              success: function (resultado) {
               $(".retorno").html(resultado);

              setTimeout(function() {
                 window.location.reload(1);
               }, 180); // 3 minutos
             }, 
       });       

      });

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
               $(".mensagemRetorno").html("");

              setTimeout(function() {
                 window.location.reload(1);
               }, 240); // 3 minutos
             }, 
   });

  }

 });
