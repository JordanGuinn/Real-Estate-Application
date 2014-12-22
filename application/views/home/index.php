<link href="<?php echo URL . "public/css/carousel.css" ?>" rel="stylesheet">
<!-- Carousel
================================================== -->
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Image purchased at iStockPhoto.com, standard license used -->
                <img src="<?php echo URL . "public/img/iStock_000028751712Medium.jpg" ?>">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><span>                            Listed.  The hunt stops here.</span></h1>
                        <form class="navbar-form" role="search" action="<?php echo URL; ?>listings/search" method="GET">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search_listings" placeholder="Enter City or Zipcode" required
                                       <?php if (isset($_GET["search_listings"])) { ?> value="<?php echo $search_string; ?>"<?php } ?>>
                            </div>
                            <button type="submit" class="btn btn-success" name="submit_search">Find Home</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- /.carousel -->
    <div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 class="page-header">Featured Listings</h2>
            <div class="col-sm-4 text-center">
                <a href="<?php echo URL . "listings/l/23" ?>">
                    <img class="img-circle img-responsive img-center" src="<?php echo URL . "public/img/home/resamp_IMG_4610.JPG" ?>" alt="">
                </a>
                <h4>5980 Hollis Street<br>
                    Emeryville, CA 94608
                </h4>
            </div>
            <div class="col-sm-4 text-center">
                <a href="<?php echo URL . "listings/l/24" ?>">
                    <img class="img-circle img-responsive img-center" src="<?php echo URL . "public/img/home/resamp_IMG_4594.JPG" ?>" alt="">
                </a>
                <h4>768 Eucalyptus Avenue<br>
                    Hillsborough, CA 94010
                </h4>
            </div>
            <div class="col-sm-4 text-center">
                <a href="<?php echo URL . "listings/l/26" ?>">
                    <img class="img-circle img-responsive img-center" src="<?php echo URL . "public/img/home/resamp_IMG_4591.JPG" ?>" alt="">
                </a>
                <h4>50 Phelan Avenue<br>
                    San Francisco, CA 94112
                </h4>
            </div>
        </div>
        <br><br>
    </div>