<?php
namespace core\common;
abstract class BaseController 
{
    
    /**
    * Insert to view value of variables.
    * @param String $name View name.
    * @param Array $params View params.
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
    * Render some subview on main view and output all page to browser
    * @param String $name Name of view that was be render.
    * @param Array $params Array of params that was be added to subview
    */
    public function render($name, array $params = array())
    {
        $body = $this->createTemplate($name, $params);
        return $this->createTemplate('main', array('body' => $body));
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
