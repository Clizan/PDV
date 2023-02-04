<?php 

 #incluindo a classe de conexao
 include_once './dao/conexao.php';

 #incluindo a classe de consulta de usuário no banco de dados
 include_once './dao/DAOUsuario.php';

 class Rota{
  
  #função responsável por passar as informações ao banco de dados e averiguar se existe esse usuário e senha para o valor digitado pelo usuário 
  public function getLogin($login, $senha){
   
   $cx   = new Conexao();
   $user = new DAOUsuario($cx); 
   $teste = $user->getUser($login, $senha);

   var_dump($teste);

  } 


 }

?>