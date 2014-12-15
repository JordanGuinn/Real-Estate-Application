

<link href="<?php echo URL . "public/css/carousel.css"?>" rel="stylesheet">
<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo URL . "public/img/IMG_4594.JPG" ?>">
        <div class="container">
          <div class="carousel-caption">
          </div>
        </div>
      </div>
      <div class="item">
        <img src="<?php echo URL . "public/img/IMG_4591.JPG" ?>">
        <div class="container">
          <div class="carousel-caption">

          </div>
        </div>
      </div>
      <div class="item">
        <img src="<?php echo URL . "public/img/IMG_4610.JPG" ?>">
        <div class="container">
          <div class="carousel-caption">

          </div>
        </div>
      </div>
    </div>

    <form class="col-lg-12" id="searchForm" role="search" action="<?php echo URL; ?>listings/search" method="GET">
      <div class="input-group col-lg-4 col-lg-offset-4">
          <input type="text" class="form-control" placeholder="City or Zipcode" name="search_listings" required>
        <span class="input-group-btn">
            <button class="btn btn-success" type="submit" name="submit_search">Search</button>
        </span>
      </div><!-- /input-group -->
    </form>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <i class="glyphicon glyphicon-chevron-left"></i>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <i class="glyphicon glyphicon-chevron-right"></i>
    </a>  
</div>
<!-- /.carousel -->
<div class="row">
  
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo URL . "public/img/home/resamp_IMG_4610.JPG" ?>" alt="...">
      <div class="caption center">
        <h3>Just added</h3>
        <p>in Los Gatos</p>
        <p><a href="#" class="btn btn-primary" role="button">See Info</a> <a href="#" class="btn btn-warning" role="button">Make appointments !</a></p>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo URL . "public/img/home/resamp_IMG_4594.JPG" ?>" alt="...">
      <div class="caption">
        <h3>Recently Sold</h3>
        <p>in San Francisco</p>
        <p><a href="#" class="btn btn-danger" role="button">Sold</a> <a href="#" class="btn btn-success" role="button">Sell your's Now!</a></p>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo URL . "public/img/home/resamp_IMG_4591.JPG" ?>" alt="..." >
      <div class="caption">
        <h3>Open House</h3>
        <p>in San Jose</p>
        <p><a href="#" class="btn btn-primary" role="button">See info</a> <a href="#" class="btn btn-warning" role="button">Make appointments !</a></p>
      </div>
    </div>
  </div>
</div>
