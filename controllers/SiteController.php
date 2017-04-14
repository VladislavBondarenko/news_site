<?php

class SiteController
{
    public function actionIndex($page = 1)
    {
        $news = News::getNews($page);
        $total = News::getTotalNews();
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page=');
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionNews($newsId)
	{
		$news = News::getNewsById($newsId);
		$comments = Comment::getComments($newsId);
		require_once(ROOT.'/views/site/news.php');
		return true;
	}
}