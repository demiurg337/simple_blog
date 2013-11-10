<?php
require_once __DIR__.'/../models/PostModel.php';
class PostController 
{
    public function index()
    {
        $model = new PostModel();
        echo $this->render('posts_list_table', array('posts' => $model->getListPosts()));
        //var_dump( $model->getListPosts());
    }

    public function add()
    {
        $res = $this->render('add_post');
        
        print_r($_POST);
        if (isset($_POST['content']) && isset($_POST['title'])) {
            $model = new PostModel();
            var_dump($model->savePost($_POST['title'], $_POST['content']));
        }
       
       echo $res; 
    }

    public function render($name, array $params = array())
    {
        $body = $this->createTemplate($name, $params);
        return $this->createTemplate('main', array('body' => $body));
    }

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

    protected function getViewBasePath()
    {
        return BASE_PATH.'/core/admin/views';
    }

    public function getUrl($route)
    {
        return '/index.php/posts/add';
    }

}
