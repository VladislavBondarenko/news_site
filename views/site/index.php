<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="container">

<?php if(count($news)) { ?>

  <?php foreach($news as $newsItem) { ?>

    <div class="span8">
      <div>
        <div class="span8">
          <h4><strong><a href="/news/<?= $newsItem['id'] ?>"><?= $newsItem['title'] ?></a></strong></h4>
        </div>
      </div>
      <div>
        <div class="span2">
              <?php if(News::getImage($newsItem['id'])) { ?>
              <img class="img-thumbnail" style="max-height:300px" src="<?= News::getImage($newsItem['id']) ?>">
              <?php } ?>
        </div>
        <div class="span6">      
          <p>
            <?= $newsItem['description'] ?>
          </p>
          <p><a class="btn btn-info" href="/news/<?= $newsItem['id'] ?>">Read more</a></p>
        </div>
      </div>
      <div>
        <div class="span8">
          <p></p>
          <p>
            <i class="glyphicon glyphicon-calendar"></i> <?= $newsItem['date'] ?>
          </p>
        </div>
      </div>
    </div>
  <hr>

  <?php } ?>

<?php } else { ?>

  <h3>No news yet</h3>

<?php } ?>

<?php echo $pagination->get(); ?>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>