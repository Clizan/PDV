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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">   
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body{
            height: 100vh;

        }

        nav.menu-lateral{
            width: 300px;
            height: 100%;
            background-color: #202020;
            padding: 40px 0 40px 1%;
        }

        .btn-expandir{
            width: 100%;
            padding-left: 10px;
        }

        .btn-expandir > i{
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        ul{
            height: 100%;
            list-style-type: none;
        }

        ul li.item-menu:hover{
            background: #FF0077;
        }

        ul li.item-menu a{
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            padding: 20px 4%;
            display: flex;
            margin-bottom: 20px;
            line-height: 15px;
        }

        ul li.item-menu a .txt-link{
            margin: 10px;
        }

        ul li.item-menu a .icon > i{
            font-size: 30px;
        }

    </style>

</head>

<body>

    <nav class="menu-lateral">

        <div class="btn-expandir">

            <i class="bi bi-list"></i>

        </div><!-- btn-expandir-->

        <ul>

            <li class="item-menu">

                <a href="#">

                    <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                    <span class="txt-link">Home</span>

                </a>

            </li>

        </ul>

    </nav><!-- Menu laterak -->

</body>

</html>
