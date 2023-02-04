<?php 

 #incluindo a classe conexao
 include_once 'conexao.php';

 class DAOUsuario{

   private $conexao;   

   function __construct($conexao){
    $this->conexao = $conexao;
   }

   public function getUser($login, $senha){
    $sql = "SELECT usuario, senha FROM loja.ctrl_usuarios WHERE usuario = '$login' AND senha = '$senha'";
    $banco = $this->conexao->GetBanco();
    $banco->query($sql);
   }

 }

?>