<!DOCTYPE html>
    <head>
        <title>News</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>

    	<div class="jumbotron jumbotron-fluid">
			<div class="container">
		    	<a href="/"><h1 class="col-sm-8">News site</h1></a>
                <ul class="nav navbar-nav col-sm-4">
                    <?php if (User::isGuest()): ?>
                        <li><a href="/user/login/"><i class="fa fa-lock"></i> Log in</a></li>
                    <?php else: ?>
                        <li><a href="/cabinet/"><i class="fa fa-user"></i> Account</a></li>
                        <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Log out</a></li>
                    <?php endif; ?>
                </ul>
		 	</div>
		</div>