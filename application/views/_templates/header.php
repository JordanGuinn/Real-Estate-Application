<!DOCTYPE html>
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo URL . "public/img/favicon.ico" ?> ">

    <title>Listed Real Estate Service</title>
    <!--Latest compiled and minified CSS-->  
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> 
    <!--Latest compiled and minified JavaScript-->  
    <script src="<?php echo URL . "public/css/bootstrap.min.css" ?> "></script> 
    <!--Bootstrap core CSS--> 
    <link href="<?php echo URL . "public/css/bootstrap.css" ?>" rel="stylesheet">
    <!--Custom styles for this template--> 
    <link href="<?php echo URL . "public/css/jumbotron-narrow.css" ?>" rel="stylesheet">
    <!--HTML5 shim avvvvvvvvvnd Respond.js IE8 support of HTML5 elements and media queries--> 
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!--Script for pop up-->
    <script type="text/javascript" src="<?php echo URL . "public/js/jquery-1.11.0.min.js" ?>" ></script>
    <script type="text/javascript" src="<?php echo URL . "public/js/jquery.leanModal.min.js" ?>" ></script>
    <script type="text/javascript" src="<?php echo URL . "public/js/index_pop_up.js" ?>" ></script>
    <script type="text/javascript" src="<?php echo URL . "public/js/bootstrap.js" ?>" ></script>

    <!--Link for pop up-->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo URL . "public/css/style_1.css" ?>"/>
</head>
<body>
    <?php
    session_start();
    if (isset($_POST['login'])) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        }
    }
    if (isset($_POST['logout'])) {
        session_destroy();
    }
    ?>
    <nav class="nav navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" id="header-brand">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-items">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a src="" class="navbar-brand" href="<?php echo URL . "home/" ?>">
                    <img alt="Brand" src="<?php echo URL . "public/img/6.jpg" ?>">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="header-items">
                <ul class="nav navbar-nav list-inline">
                    <li><!--class="active"--><a href="<?php echo URL . "listings/" ?>">Homes</a><br></li>
                    <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                        if (strpos($_SESSION['email'], 'listed') == false) {
                            ?>                        <li><a href="<?php echo URL . "sell/" ?>">Sell</a><br></li>
                            <li><a href="<?php echo URL . "realtors/" ?>">Realtors</a><br></li>
                            <li><a href="<?php echo URL . "contact/" ?>">Contact Us</a><br></li>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION['email'])) {
                        ?>                        <li><a href="<?php echo URL . "sell/" ?>">Sell</a><br></li>
                        <li><a href="<?php echo URL . "realtors/" ?>">Realtors</a><br></li>
                        <li><a href="<?php echo URL . "contact/" ?>">Contact Us</a><br></li>
                    <?php }
                    ?>
                    <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                        if (strpos($_SESSION['email'], 'listed') !== false) {
                            ?>
                            <li><a href="<?php echo URL . "users/viewMessage" ?>">My Messages</a><br></li>
                            <li><a href="<?php echo URL . "users/" ?>">My Properties</a><br></li>
                            <?php
                        }
                    }
                    ?>

                </ul>
                <?php if (isset($_SESSION['email']) && isset($_SESSION['password'])) { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL . "users/logout" ?>" type="submit" method="POST" name="logout"><i class="glyphicon glyphicon-user"></i> Logout</a></li>
                    </ul>                 <?php } else { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL . "users/login" ?>" ><i class="glyphicon glyphicon-user"></i> Login</a></li>
                        <li><a href="#model" data-toggle="modal" data-target="#registerModal"><i class="glyphicon glyphicon-pencil"></i> Sign Up</a></li>
                    </ul> <?php } ?>
                <?php
                $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $home_check = explode("Listed/", $url);
                if ($home_check[1] != '' && $home_check[1] != 'home/') {
                    ?>
                    <form class="navbar-form navbar-right" role="search" action="<?php echo URL; ?>listings/search" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search_listings" placeholder="Enter City or Zipcode" required
                                   <?php if (isset($_GET["search_listings"])) { ?> value="<?php echo $search_string; ?>"<?php } ?>>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit_search">Find Home</button>
                    </form>
                <?php } ?>
            </div>
        </div><!-- /.navbar-collapse -->
    </nav>
    <!--Log In Modal--> 
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Log In</h4>
                </div>
                <form action="<?php echo URL; ?>users/user_login" method="POST">
                    <div class="modal-body">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required="Please Enter Email"/><br>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required="Please Enter Password"/> 
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="submit" href="#" class="btn btn-default">Log In</button>
                </div>
            </div>
        </div>
    </div>
    <!--Register Modal--> 
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                </div>
                <form action="<?php echo URL; ?>users/createuser" method="POST">
                    <div class="modal-body ">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter First name"required="Please Enter First Name" data-validation="length" data-validation-length="min2"/><br>
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last name"required="Please Enter Last Name"data-validation="length" data-validation-length="min2"/><br>
                        <label for="email">Email:</label> 
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"required="Please Enter Email"/><br>

                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password"required="Please Enter Password"data-validation="length" data-validation-length="min5"/><br>
                        <h5>By Signing up with us you are accepting our <a href="<?php echo URL . "privacy/" ?>"> Privacy Policy.</a></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit_create_user" class="btn btn-default">Sign Up</button>
                    </div>
                </form>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
                <script> $.validate();</script>
            </div>
        </div>
    </div>