<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>User account</h3>
            
            <h4>Hello, <?php echo $user['name'];?>!</h4>
            <a href="/cabinet/edit">Edit account</a>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>