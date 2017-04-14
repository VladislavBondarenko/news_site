<?php
class News
{
    const SHOW_BY_DEFAULT = 4;

    /**
     * @param int? $page
     * @return Array
     */
    public static function getNews($page = null) {

        $newsList = array();
        $db = Db::getConnection();

        if ($page != null) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $query = 'SELECT * FROM `news` '
            . 'ORDER BY `date` DESC'
            . ' LIMIT ' . self::SHOW_BY_DEFAULT
            . ' OFFSET ' . $offset;
        } else {
            $query = 'SELECT * FROM `news` '
            . 'ORDER BY `date` DESC';
        }

        $result = $db->query($query);

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['date'] = $row['date'];
            $i++;
        }
        return $newsList;
    }

    /**
     * @return int
     */
    public static function getTotalNews()
    {
            $db = Db::getConnection();
            $result = $db->query('SELECT count(`id`) AS count FROM `news`');
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();

            return $row['count'];
    }

    /**
     * @param int $newsId
     * @return Array
     */
    public static function getNewsById($newsId)
    {
        $newsId = intval($newsId);
        if ($newsId) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM `news` WHERE `id` = ' . $newsId);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }

    /**
     * @param int $newsId
     * @return bool
     */
    public static function deleteNewsById($newsId)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM `news` WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $newsId, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param integer $newsId
     * @param array $options
     * @return bool
     */
    public static function updateNewsById($newsId, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE `news`
            SET 
                `title` = :title, 
                `description` = :description, 
                `content` = :content 
            WHERE `id` = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $newsId, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * @param array $options
     * @return int
     */
    public static function createNews($options) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO `news` '
            . '(`title`, `description`, `content`)'
            . 'VALUES '
            . '(:title, :description, :content)';

        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    /**
     * @param integer $newsId
     * @return bool/string
     */
    public static function getImage($newsId)
    {
        $path = '/upload/images/news/';
        $pathToNewsImage = $path . $newsId . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToNewsImage)) {
            return $pathToNewsImage;
        } else {
        	$pathToNewsImage = $path . $newsId . '.png';
        	if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToNewsImage)) {
        		return $pathToNewsImage;
        	}
        }

        return false;
    }

}