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
    <!--    <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                 Brand and toggle get grouped for better mobile display 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL . "home/" ?>"> Listed </a>
                </div>
    
                 Collect the nav links, forms, and other content for toggling 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-">
                    <ul class="nav navbar-nav">
                        <li class="active">
                        
                        <li><a href="<?php echo URL . "listings/" ?>">Listings</a><br></li>
                        <li><a href="<?php echo URL . "users/" ?>">Users</a><br></li>
                        <li><a href="<?php echo URL . "realtors/" ?>">Realtors</a><br></li>
                        <li><a href="#">Sell House</a><br></li>
                        <li><a href="<?php echo URL . "about/" ?>">About us</a><br></li>
                        <li><a href="<?php echo URL . "contact/" ?>">Contact us</a><br></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left ">
                        <form action="<?php echo URL; ?>listings/search" method="POST">
                            <div class="col-lg-4 col" >
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_city_zip" placeholder=" Enter City or Zipcode" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" name="submit_search">
                                            <strong> Search </strong>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form> 
                        <li><a href="#model" data-toggle="modal" data-target="#loginModal"><i class="glyphicon glyphicon-user"></i> Login</a></li>
                        <li><a href="#model" data-toggle="modal" data-target="#registerModal"><i class="glyphicon glyphicon-pencil"></i> Sign Up</a></li>
                    </ul>
                </div> 
                 /.navbar-collapse 
            </div> 
            /.container-fluid bla
        </nav>-->
    <nav class="navbar navbar-inverse panel-header" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL . "home/" ?>">Listed</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav list-inline">
                    <li><!--class="active"--><a href="<?php echo URL . "listings/" ?>">Listings</a><br></li>
                    <!-- <li><a href="<?php echo URL . "users/" ?>">Users</a><br></li> -->
                    <li><a href="<?php echo URL . "sell/" ?>">Sell</a><br></li>
                    <li><a href="<?php echo URL . "realtors/" ?>">Realtors</a><br></li>
                    <li><a href="<?php echo URL . "about/" ?>">About Us</a><br></li>
                    <li><a href="<?php echo URL . "contact/" ?>">Contact Us</a><br></li>
                    <!--        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                              </ul>
                            </li>-->

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#model" data-toggle="modal" data-target="#loginModal"><i class="glyphicon glyphicon-user"></i> Login</a></li>
                    <li><a href="#model" data-toggle="modal" data-target="#registerModal"><i class="glyphicon glyphicon-pencil"></i> Sign Up</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search" action="<?php echo URL; ?>listings/search" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search_listings" placeholder="Enter City or Zipcode" required
                               <?php if (isset($_GET["search_listings"])) { ?> value="<?php echo $search_string; ?>"<?php } ?>>
                    </div>
                    <button type="submit" class="btn btn-default" name="submit_search">Submit</button>
                </form>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--Log In Modal--> 
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-default">Log In</button>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_create_user" class="btn btn-default">Sign Up</button>
                </div>
            </form>

            <!--            <label>First Name</label>
                        <input type="text" name="first_name" value="" required />
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="" required />
                        <label>Email</label>
                        <input type="text" name="email" value="" required />
                        <label>Password</label>
                        <input type="password" name="password" value="" />
                        <input type="submit" name="submit_create_user" value="Submit" />-->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
            <script> $.validate();</script>
        </div>
    </div>
</div>

