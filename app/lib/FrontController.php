<?php

namespace MVC\lib;

use MVC\lib\traits\Helper;

class FrontController
{
    use Helper;

    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER = 'MVC\controllers\NotFoundController';

    private $_controller = 'DefaultController';
    private $_action = 'index';
    public $_params = array();

    public static $controller;

    private $_template;
    private $_lang;
    private $language='en';
    private $type='public';

    public function __construct(Template $template , Language $lang)
    {
        $this->_lang = $lang;
        $this->_template = $template;
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);

        if (isset($url[0]) && $url[0] !== '' && !in_array(strtolower($url[0]),SPECIALS)){

            $this->_controller = $url[0];

            if (isset($url[1]) && $url[1] !== ''){
                $this->_action = $url[1];
            }

            if (isset($url[2]) && $url[2] !== ''){
                $this->_params = explode('/',$url[2]);
            }

        }elseif(isset($url[0]) && $url[0] !== ''){

            $url = strtolower($url[0]);
            $this->type = ((VIEWS_PATH[$url]!== NULL)? $url: 'public');

            switch ($url)
            {
                case 'dashboard':

                    $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);

                    $this->_controller = 'dashboard\\'.$this->_controller;
                    if (isset($url[1]) && $url[1] !== ''){

                        $this->_controller = 'dashboard\\'.$url[1];

                        if (isset($url[2]) && $url[2] !== ''){
                            $this->_action = $url[2];
                        }

                        if (isset($url[3]) && $url[3] !== ''){
                            $this->_params = explode('/',$url[3]);
                        }

                    }

                    break;
            }

        }
    }

    public function dispatch()
    {
        $controllerClassName = 'MVC\controllers\\'.ucfirst($this->_controller);
        $actionName = $this->_action;

        if (!class_exists($controllerClassName)){
            if (str_word_count($this->_controller,1)[0] !== 'api')
            {
                $controllerClassName = self::NOT_FOUND_CONTROLLER;
            }else{
                header("HTTP/1.1 404 Not Found");
                $this->jsonRender('The Wanted Section Doesn\'t Exist',$this->language);
            }
        }

        $controller = new $controllerClassName;

        if (!method_exists($controller, $actionName)){
            if (str_word_count($this->_controller,1)[0] !== 'api')
            {
                $this->_action = $actionName = self::NOT_FOUND_ACTION;
            }else{
                header("HTTP/1.1 404 Not Found");
                $this->jsonRender('The Wanted Action Doesn\'t Exist',$this->language);
            }
        }

        $controller->setController($this->_controller);
        self::$controller = $this->_controller;
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setLang($this->_lang);
        $controller->setLanguage($this->language);
        $controller->setType($this->type);
        $this->_template->setType($this->type);

        $controller->$actionName();
    }
}
