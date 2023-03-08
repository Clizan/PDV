<?php  

 namespace App\Controller\Pages;

 use \App\Utils\View;

 class Home extends Page{

  /**
   * Método responsável por retornar o conteúdo (view) da nossa home
   * @return String;
   */  

  public static function getHome(){

    $content = View::render('pages/home', [
      'name' => 'Clizan - Canal',
      'description' => 'Canal'
    ]);

    #Retorna a view da página
    return parent::getPage('Index', $content);
  }  

 }

?>