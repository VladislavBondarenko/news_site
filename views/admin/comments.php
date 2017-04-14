<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h4>Comments list</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>Date</th>
                    <th>User name</th>
                    <th>Content</th>
                    <th>News</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment['date']; ?></td>
                        <td><?= $comment['userName'] ?></td>
                        <td><?php echo $comment['text']; ?></td>
                        <td><a href="/news/<?= $newsItem['id'] ?>"><?php echo $comment['title']; ?></a></td>
                        <td><a href="/admin/delete_comment/<?= $comment['id'] ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

