<?php

namespace frontend\controllers;

use common\models\PostCategories;
use common\models\Post;
use yii\web\HttpException;

class PostController extends \frontend\components\BaseController
{
    public function actionCategory($category_alias)
    {
        $category = PostCategories::find()->joinWith('info')->byAlias($category_alias)->one();
        if ($category) {
            $postsQ = Post::find()->joinWith('info')->byParentId($category->id)->active()->orderBy('sort DESC');
            $pages = $postsQ->pagination('id',10);	
            $posts = $postsQ->offset($pages->offset)->limit($pages->limit)->all();        
            return $this->render('category',[
                'category' => $category,
                'posts' => $posts,
                'pages' => $pages
            ]); 
        } else {
            throw new HttpException(404);
        }
        
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($category_alias,$post_alias)
    {
        $category = PostCategories::find()->joinWith('info')->byAlias($category_alias)->one();
        if (!$category) {
            throw new HttpException(404);
        }
        $post = Post::find()->joinWith('info')->byAlias($post_alias)->byParentId($category->id)->one();
        if ($post) {
            return $this->render('view',[
                'category' => $category,
                'post' => $post    
            ]);
        } else {
            throw new HttpException(404);
        }
        
    }

}
