<?php

namespace MVC\controllers;

use MVC\lib\FrontController;

class AbstractController
{
    private $_controller = 'index';
    private $_action = 'default';
    protected $_params = array();
    protected $_template;
    protected $_lang;
    protected $language='en';
    protected $type;

    protected $_data = [];

    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    public function setAction($action)
    {
        $this->_action = $action;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
    }

    public function setLang($lang)
    {
        $this->_lang = $lang;
    }

    public function notFoundAction()
    {
        $this->_view();
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    protected function _view($block=[],$allow=[]){
        if ($this->_action == FrontController::NOT_FOUND_ACTION){

            require_once TEMPLATE_PATH['dashboard'] . 'templateheaderstart.php';
            echo "<link rel='stylesheet' href='".CSS."dashboard/style.css' />";
            echo "<link rel='stylesheet' href='".CSS."dashboard/loader.css' />";
            require_once TEMPLATE_PATH['dashboard'] . 'templateheaderend.php';
            require_once VIEWS_PATH['public'] . 'notfound' . DS . 'notfound.view.php';
            echo "<script src='".JS."dashboard/vendor.js'></script>";
            echo "<script src='".JS."dashboard/bundle.js'></script>";
            require_once TEMPLATE_PATH['dashboard'] . 'templatefooter.php';

        }else{

            $view = VIEWS_PATH[$this->type] . str_replace('dashboard\\','',$this->_controller) . DS . $this->_action. '.view.php';
            if (file_exists($view)){
                $this->_data = array_merge($this->_data, $this->_lang->get());

                $this->_template->setActionViewFile($view);
                $this->_template->setAppData($this->_data);

                $this->_template->renderApp($block,$allow);

            }else{

                require_once TEMPLATE_PATH['dashboard'] . 'templateheaderstart.php';
                echo "<link rel='stylesheet' href='".CSS."dashboard/style.css' />";
                echo "<link rel='stylesheet' href='".CSS."dashboard/loader.css' />";
                require_once TEMPLATE_PATH['dashboard'] . 'templateheaderend.php';
                require_once VIEWS_PATH['public'] . 'notfound' . DS . 'noview.view.php';
                echo "<script src='".JS."dashboard/vendor.js'></script>";
                echo "<script src='".JS."dashboard/bundle.js'></script>";
                require_once TEMPLATE_PATH['dashboard'] . 'templatefooter.php';

            }
        }

    }
}
