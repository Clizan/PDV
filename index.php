<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-AU-Copatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./view/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="container-fluid" id="acessoLogin">

        <div class="caixa">

            <img src="./view/img/logotipo.png" id="logotipo"/>

            <h1>LOGIN</h1>

            <div class="usuario">
                <input id="login" type="login" placeholder="Usuario">
            </div>

            <div class="senha">
                <input id="senha" type="senha" placeholder="Senha">
            </div>

            <div class="entrar">
                <button class="btn btn-success" id="entrar">Entrar</button>
            </div>

            <label id="mensagem"></label>

        </div>

    </div>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="./js/script.js"></script><!--Script for page timeout-->
<script>
    /*Here click in button for to action the oter page*/
    $('#entrar').click(function() {

        /*The variables of the page for to log-in*/
        var user = document.getElementById('#login');
        var pass = document.getElementById('#senha');

        /*The validation if contains information in the variable*/
        if (user !== "" || pass !== "") {

            /*Navegation of the page, case the fields is complete and correct*/
            $.ajax({
                type: 'POST',
                url: '',
                data: {},
                success: function() {

                }
            })

        } else {

            $("#mensagem").html("<div class='alert alert-danger' role='alert'>Preencha os campos para continuar! </div>");

        }

    });
</script>

</html>