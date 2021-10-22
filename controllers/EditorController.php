<?php

class EditorController extends Controller
{
    public function process($params)
    {
        $this->head['title'] = 'Article Editor';
        $articleManager = new ArticleManager();
        $article = array(
            'id' => '',
            'title' => '',
            'content' => '',
            'url' => '',
            'description' => '',
        );

        if($_POST)
        {
            $keys = array('title', 'content', 'url', 'description');
            $article = array_intersect_key($_POST, array_flip($keys));
            $articleManager->saveArticle($_POST['id'], $article);
            $this->addMessage('The article was successfully saved');
            $this->redirect('article/' . $article['url']);
        }
        elseif(!empty($params[0]))
        {
            $loadedArticle = $articleManager->getArticle($params[0]);
            if($loadedArticle)
            {
                $article = $loadedArticle;
            }
            else
            {
                $this->addMessage('The article was not found.');
            }
        }
        $this->data['article'] = $article;
        $this->view = 'editor';
    }
}