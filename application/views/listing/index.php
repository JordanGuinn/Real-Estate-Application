<div class="minimal-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1 class="page-header">Popular Searches</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="<?php echo URL . "public/img/home/resamp_IMG_4610.JPG" ?>" alt="...">
                <div class="caption">
                    <h3>San Francisco</h3>
                    <form action="<?php echo URL; ?>listings/search" method="get">
                        <input type="hidden" name="search_listings" value="San Francisco"><br>
                        <button class="btn btn-default right" type="submit" name="submit_search">Search</button>
                    </form>
                    <?php next($listing_ids); ?>
                </div>
            </div>
        </div>
        <div class=" col-md-3">
            <div class="thumbnail">
                <img src="<?php echo URL . 'public/img/home/resamp_IMG_4594.JPG' ?>" alt="...">
                <div class="caption">
                    <h3>Emeryville</h3>
                    <form action="<?php echo URL; ?>listings/search" method="get">
                        <input type="hidden" name="search_listings" value="Emeryville"><br>
                        <button class="btn btn-default" type="submit" name="submit_search">Search</button>
                    </form>                    <?php next($listing_ids); ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="<?php echo URL . "public/img/home/resamp_IMG_4591.JPG" ?>" alt="..." >
                <div class="caption">
                    <h3>Hillsborough</h3>                  
                    <form action="<?php echo URL; ?>listings/search" method="get">
                        <input type="hidden" name="search_listings" value="Hillsborough"><br>
                        <button class="btn btn-default" type="submit" name="submit_search">Search</button>
                    </form>                </div>
            </div>
        </div>
    </div>

</div>
</div>