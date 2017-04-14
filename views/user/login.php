<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form">
                    <h2>Sign in</h2>
                    <form action="" method="post">
                        <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $name; ?>"/>
                        <input type="password" class="form-control" name="password" placeholder="password" value="<?php echo $password; ?>"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Log in" />
                        <a href="/user/register" class="col-sm-offset-2">Register</a>
                    </form>
                    
                </div>

                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>