<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
         
            <br/>

            <a href="/admin/create_news" class="btn btn-default back"><i class="fa fa-plus"></i> Add news</a>
            
            <h4>News list</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($news as $newsItem): ?>
                    <tr>
                        <td><?php echo $newsItem['date']; ?></td>
                        <td><a href="news/<?= $newsItem['id'] ?>"><?= $newsItem['title'] ?></a></td>
                        <td><?php echo $newsItem['description']; ?></td>
                        <td><a href="/admin/update_news/<?= $newsItem['id'] ?>" title="edit"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/delete_news/<?= $newsItem['id'] ?>" title="delete"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

