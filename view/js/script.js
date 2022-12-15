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

 //Açá estamos pegano el evento click do botón que és responsable por hacer lá ación de hacer el login na aplicación
 $('#entrar').click(function(){

  //Acá estamos armazenando los valores registrados en campo text
  var user = document.getElementById('txtLogin').value;
  var pass = document.getElementById('txtSenha').value;

  if(user !== '' && pass !== ''){
   
    $.ajax({
     type: "POST",
     url: './valida.php',
     data:{
           passUser : user, 
           passPass : pass
          },
          success: function(resultado) {

            $(".retornoLogin").html(resultado);
          }
      });

    return false;

  }else{

   document.querySelector('.retornoLogin').innerHTML= '<div class="alert alert-danger" role="alert"> ' + 
                                                        'Preencha os campos corretamente para continuar !!' + 
                                                       '</div>';      

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