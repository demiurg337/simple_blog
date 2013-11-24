<?php

abstract class BaseController 
{
    
    /**
    * Insert to view value of variables.
    * @param $name String View name.
    * @param $params View params.
    * @return String Return created view code.
    */
    public function createTemplate($name, array $params = array())
    {
        if (sizeof($params) > 0) {
            extract($params, EXTR_OVERWRITE);
        }
         
        ob_start();
        ob_implicit_flush(false);
        require  ($this->getViewBasePath().'/'.$name.'.php');
        return ob_get_clean();
    }

    /**
    * For generate url to somw controller
    * @param String $route String that represent route.
    * @return String Return Url.
    */
    abstract public function getUrl($controller, $action);

    /**
    * @return String Path where situated views.
    */
    abstract protected function getViewBasePath();
}
