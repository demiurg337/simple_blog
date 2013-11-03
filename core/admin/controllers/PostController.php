<?php
require_once __DIR__.'/../models/PostModel.php';
class PostController 
{
    public function index()
    {
        $model = new PostModel();
        var_dump($model->getListPosts());
    }

    public function add()
    {
        $res = $this->render('add_post');
        
        if (isset($_POST['content']) && isset($_POST['caption'])) {
            $model = new PostModel();
            $model->savePost($_POST['title'], $_POST['content']);
        }
       
       echo $res; 
    }

    public function render($name, array $params = array())
    {
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
