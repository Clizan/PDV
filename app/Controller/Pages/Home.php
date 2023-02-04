<?php  

 namespace App\Controller\Pages;

 use \App\Utils\View;

 class Home{

  /**
   * Método responsável por retornar o conteúdo (view) da nossa home
   * @return String;
   */  

  public static function getHome(){

    return View::render('pages/home', [
      'name' => 'Clizan - Canal',
      'description' => 'Canal'
    ]);
  }  

 }

?>