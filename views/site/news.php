<?php

include ROOT.'/views/layouts/header.php'; ?>

<div class="container">

	<div class="panel panel-default">
        <div class="panel-heading">
            <span><i class="glyphicon glyphicon-calendar"></i> <?= $news['date'] ?></span>
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <img class="media-object" style="max-width: 60%" src="<?= News::getImage($news['id']) ?>">
                </div>
                <div class="media-body">
                	<h2 class="media-heading"><?= $news['title'] ?></h2>
                	<?= $news['content'] ?>               
               </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-sm-10" id="commentsWrapper">
    	<?php echo include ROOT . '/views/site/comments.php'; ?>
    </div>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>