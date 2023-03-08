<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page
{

    /**
     * Método responsável por renderizar o topo da página
     * @return [type]
     */
    private static function getHearder()
    {
        return View::render('pages/header');
    }

    /**
     * Método responsável por renderizar o rodapé da página
     * @return [type]
     */
    private static function getFooter()
    {
        return View::render('pages/footer');
    }

    /**
     *  Método responsável por retornar o conteudo (view) da nossa página genérica
     * @return string
     */

    public static function getPage($title, $content)
    {

        return View::render('pages/page', [
            'title'   => $title,
            'header'  => self::getHearder(),
            'content' => $content,
            'footer'  => self::getFooter()
        ]);
    }
}
