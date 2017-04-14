<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>You are registered!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form">
                        <h2>Registration on the site</h2>
                        <form action="#" method="post">
                            <input type="text" class="btn btn-default" name="name" placeholder="name" value="<?php echo $name; ?>"/>
                            <input type="password" class="btn btn-default" name="password" placeholder="password" value="<?php echo $password; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="register" />
                        </form>
                    </div>
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>