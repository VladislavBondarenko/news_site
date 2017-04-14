<?php
return array(
	'admin/create_news' => 'admin/createNews',
	'admin/delete_news/([0-9]+)' => 'admin/deleteNews/$1',
	'admin/update_news/([0-9]+)' => 'admin/updateNews/$1', 
    'admin/delete_comment/([0-9]+)' => 'admin/deleteComment/$1',
	'admin/comments' => 'admin/comments',
	'admin' => 'admin/index',

	'news/([0-9]+)' => 'site/news/$1',

	'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'comment/add_ajax' => 'comment/addAjax',
    'comment/delete_ajax' => 'comment/deleteAjax',
	
	'page=([0-9]+)' => 'site/index/$1',

	'index.php/page=([0-9]+)' => 'site/index/$1',
    'index.php' => 'site/index',
    '' => 'site/index'
);