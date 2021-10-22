<?php

class ArticleController extends Controller
{
    public function process($params)
    {
        $articleManager = new ArticleManager();
        if(!empty($params[0]))
        {
            $article = $articleManager->getArticle($params[0]);
    
            if(!$article)
            {
                $this->redirect('error');
            }
        
            $this->head = array(
                'title' => $article['title'],
                'description' => $article['description']
            );
        
            $this->data['title'] = $article['title'];
            $this->data['content'] = $article['content'];
        
            $this->view = 'article';
        }
        else
        {
            $articles = $articleManager->getArticles();
            $this->data['articles'] = $articles;
            $this->view = 'articles';
        }
    }
}