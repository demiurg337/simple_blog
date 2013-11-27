<?php
require_once __DIR__.'/../../common/BaseController.php';
require_once __DIR__.'/../models/PostModel.php';
use \core\common\BaseController;
use \core\site\models\PostModel;

class PostController extends BaseController
{
    public function actionIndex()
    {
        $model = new PostModel();
        $posts = $model->getListOfPosts();
        $this->render('list_of_posts', array('posts' => $posts));
        //echo $this->createTemplate('main', array('body' => 'zzzzzzzzzzzzzqqqq'));
    }

    public function getUrl($controller, $action)
    {
    }

    public function getViewBasePath()
    {
        return BASE_PATH.'/core/site/views/';
    }
}
