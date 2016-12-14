<!-- HEADER STARTS -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHPrinciples</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/index.css" rel="stylesheet">

    <!-- Bungee Font for Logo -->
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-cog"></span>PHPrinciples</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="posts.php">Posts</a>
                    </li>
                    <li>
                        <a href="login.php">Sign in</a> <!-- Show only if not logged in -->
                    </li>
                    //<?php 
//                    if($session->is_logged_in()){                //Do not open until database works
//                        $user = User::find_by_id($session->user_id);
//                        $greeting = "<a href=\"logout.php\">Logout</a>";
//                    }else{
//                        $greeting = "<a href=\"register.php\">Login</a>";
//                    }
//                    ?>
                    <li>
                    <a href="profile.php">Profile</a> <!-- Show only if logged in -->
                    </li>
                    <li>
                        <a href="logout.php">Sign off</a> <!-- Show only if logged in -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- HEADER END -->