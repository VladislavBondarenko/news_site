<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Edit news #<?php echo $id; ?></h4>

            <br/>


            <div class="col-lg-8">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?= $news['title'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"><?= $news['description'] ?></textarea>
                        </div>                        

                            <p>Image</p>
                            <input type="file" name="image" class="form-control" value="">

                            <br>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="8"><?= $news['content'] ?></textarea>
                        </div>

                        <input type="submit" name="submit" class="btn btn-default" value="Save">

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

