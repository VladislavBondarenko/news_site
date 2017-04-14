<?php
class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $news = News::getNews();
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionComments() {
        self::checkAdmin();
        $comments = Comment::getAll();
        require_once(ROOT . '/views/admin/comments.php');
        return true;
    }

    public function actionCreateNews()
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['description'] = $_POST['description'];
            $options['content'] = $_POST['content'];

            $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                $id = News::createNews($options);

                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                    }
                };

                header("Location: /admin");
            }
        }

        require_once(ROOT . '/views/admin/create_news.php');
        return true;
    }

    public function actionUpdateNews($id)
    {
        self::checkAdmin();
        $news = News::getNewsById($id);

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['description'] = $_POST['description'];
            $options['content'] = $_POST['content'];

            if (News::updateNewsById($id, $options)) {

                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                }
            }

            header("Location: /admin");
        }

        require_once(ROOT . '/views/admin/update_news.php');
        return true;
    }

    public function actionDeleteNews($id)
    {
        self::checkAdmin();
        News::deleteNewsById($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }

    public function actionDeleteComment($id)
    {
        self::checkAdmin();
        Comment::deleteCommentById($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }
}
