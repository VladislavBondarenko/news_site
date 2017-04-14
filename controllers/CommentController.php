<?php

class CommentController
{

	public function actionAddAjax() {
		$newsId = $_POST['newsId'];
		$text = $_POST['text'];
		$userId = $_SESSION['user'];

		$result = Comment::addComment($newsId, $userId, $text);

		if ($result) {
			$comments = Comment::getComments($newsId);
			echo include(ROOT.'/views/site/comments.php');
		}

		return true;
	}

	public function actionDeleteAjax() {
		$newsId = $_POST['newsId'];
		$commentId = $_POST['commentId'];

		$result = Comment::deleteCommentById($commentId);

		if ($result) {
			$comments = Comment::getComments($newsId);
			echo include(ROOT.'/views/site/comments.php');
		}

		return true;
	}
}