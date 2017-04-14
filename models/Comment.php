<?php

class Comment
{    
    /**
     * @param int $newsId
     * @param int $userId
     * @param string $text
     * @return bool
     */
	public static function addComment($newsId, $userId, $text) {
		$newsId = intval($newsId);
		$db = Db::getConnection();
        $sql = 'INSERT INTO `comments` (`newsId`, `userId`, `text`) '
                . 'VALUES (:newsId, :userId, :text)';
        $result = $db->prepare($sql);
        $result->bindParam(':newsId', $newsId, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        return $result->execute();
	}

    /**
     * @param int $newsId
     * @return Array()
     */
	public static function getComments($newsId) {
		$newsId = intval($newsId);
		$db = Db::getConnection();
		$comments = array();
		$sql = 'SELECT c.`id` AS `id`,`name`,`text`,`date` '
			. 'FROM `comments` AS c JOIN `users` AS u ON c.`userId`=u.`id` '
			. 'WHERE `newsId` = ' . $newsId
			. ' ORDER BY c.`id` DESC';
        $result = $db->query($sql);

        $i = 0;

        while ($row = $result->fetch()) {
        	$comments[$i]['id'] = $row['id'];
            $comments[$i]['userName'] = $row['name'];
            $comments[$i]['text'] = $row['text'];
            $comments[$i]['date'] = $row['date'];
            $i++;
        }
        return $comments;
	}

    /**
     * @return Array
     */
	public static function getAll() {
		$db = Db::getConnection();
		$comments = array();
		$sql = 'SELECT c.`id` AS `id`,`name`,`text`,c.`date` AS `date`,`title` '
			. 'FROM `comments` AS c '
			. 'JOIN `users` AS u ON c.`userId`=u.`id` '
			. 'JOIN `news` AS n ON c.`newsId`=n.`id` '
			. 'ORDER BY c.`id` DESC';
        $result = $db->query($sql);

        $i = 0;

        while ($row = $result->fetch()) {
        	$comments[$i]['id'] = $row['id'];
            $comments[$i]['userName'] = $row['name'];
            $comments[$i]['text'] = $row['text'];
            $comments[$i]['date'] = $row['date'];
            $comments[$i]['title'] = $row['title'];
            $i++;
        }
        return $comments;
	}

    /**
     * @param int $id
     * @return bool
     */
	public static function deleteCommentById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM `comments` WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}