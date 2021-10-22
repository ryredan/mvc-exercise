<?php

class ArticleManager
{
    public function getArticle($url)
    {
        return Db::queryOne('
            SELECT `id` , `title`, `content`, `url`, `description`
            FROM `articles`
            WHERE `url` = ?
        ', array($url));
    }

    public function getArticles()
    {
        return Db::queryAll('
            SELECT `id`, `title`, `url`, `description`
            FROM `articles`
            ORDER BY `id` DESC
        ');
    }
    
    public function saveArticle($id, $article)
    {
        if(!$id)
        {
            Db::insert('articles', $article);
        }
        else
        {
            Db::update('articles', $article, 'WHERE id = ?', array($id));
        }
    }

    public function removeArticle($url)
    {
        Db::query('
            DELETE FROM articles
            WHERE url = ?
        ', array($url));
    }
}