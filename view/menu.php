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
    <style>
        .menu-container {
            display: flex;
            justify-content: center;
        }

        .menu {
            display: flex;
            list-style: none;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .menu li {
            margin: 0 10px;
            position: relative;
            width: 100px;
        }

        .menu li a {
            color: #000;
            text-decoration: none;
        }

        .sub-menu {
            display: none;
            margin-left: -40px;
            position: absolute;
            top: 100%;
            width: 100px;
        }

        .menu li:hover .sub-menu {
            display: block;
        }

        .sub-menu li {
            margin: 5px 0;
            list-style-type: none;
            z-index: 9999;
        }

        .sub-menu li a {
            color: #000;
        }
    </style>

</head>

<body>

    <div class="menu-container">
        <ul class="menu">
            <li><a href="#"><img src="./img/home.png" id="home">Home</a></li>
            <li>
                <a href="#"><img src="./img/price.png">Produtos</a>
                <ul class="sub-menu">
                    <li><a href="#"><img src="./img/cadastrar.png">Cadastro</a></li>
                    <li><a href="#"><img src="./img/estoque.png">Estoque</a></li>
                    <li><a href="#"><img src="./img/venda.png">Venda</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Notas</a>
                <ul class="sub-menu">
                    <li><a href="#"><img src="./img/cadastrar.png">Cadastrar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Relatórios</a>
                <ul class="sub-menu">
                    <li><a href="#"><img src="./img/money.png">Contabilidade</a></li>
                </ul>
            </li>
        </ul>
    </div>

</body>

</html>
