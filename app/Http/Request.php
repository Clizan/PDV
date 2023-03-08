<?php 

 namespace App\Http;

 class Request{
   
  /**
   * Método HTTP da requisição
   * @var string 
   *  
   */  
  private $httpMethod;

   /**
   * URI da página
   * @var string 
   *  
   */  
  private $uri;

   /**
   * Parâmetros da URL ($_GET)
   * @var array
   *  
   */  
  private $queryParams = [];

  /**
   * Variaveis recebidas no POST da página ($_POST)
   * @var string 
   *  
   */  
  private $postVars = [];



 }

?>