<?php
    namespace MVC;
    use MVC\lib\FrontController;
    use MVC\lib\Language;
    use MVC\lib\Template;

    session_start();

    if (!defined('DS')){
        define('DS', DIRECTORY_SEPARATOR);
    }

    require_once '..'.DS.'vendor' . DS . 'autoload.php';
    require_once '..'.DS.'app' . DS . 'config' . DS . 'config.php';
    $template_parts = require '..'.DS.'app' . DS . 'config' . DS . 'templateconfig.php';

    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = DEFAULT_LANG;
    }

    $template = new Template($template_parts);
    $lang = new Language();

    $frontController = new FrontController($template, $lang);
    $frontController->dispatch();
