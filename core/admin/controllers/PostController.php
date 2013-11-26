<?php
namespace core\admin\controllers;

require_once __DIR__.'/../models/PostModel.php';
require_once __DIR__.'/../../common/BaseController.php';

use core\common\BaseController;
use \core\admin\models\PostModel;
class PostController extends BaseController
{
    public function actionIndex()
    {
        $model = new PostModel();
        echo $this->render('posts_list_table', array('posts' => $model->getListPosts()));
        //var_dump( $model->getListPosts());
    }

    public function actionAdd()
    {
        
        if (
            isset($_POST['content']) 
            && 
            isset($_POST['title']) 
            && 
            strlen($_POST['content']) > 0 
            && 
            strlen($_POST['title']) > 0
            &&
            strlen($_POST['teaser']) > 0
        ) {
            $model = new PostModel();
  
            if ($model->savePost($_POST['title'], $_POST['content'], $_POST['teaser'])) {
                $params['successMsg'] = 'Статья успешно добавлена';    
            }
            else {
                $params['errorMsg'] = 'При сохранении статьи случилась ошибка';
            }
        }
        //when send form and some fields is empty 
        elseif (isset($_POST['content'])) {
            $params['errorMsg'] = 'Нужно заполнить все обязательные поля';
        }


        if (isset($params)) {
            $res = $this->render('add_post', $params);
        }
        else {
            $res = $this->render('add_post');
        }       
        
        echo $res; 
    }

    public function render($name, array $params = array())
    {
        $body = $this->createTemplate($name, $params);
        return $this->createTemplate('main', array('body' => $body));
    }


    protected function getViewBasePath()
    {
        return BASE_PATH.'/core/admin/views';
    }

    public function getUrl($controller, $action)
    {
        return '/index.php/admin/'.$controller.'/'.$action;
    }
}
