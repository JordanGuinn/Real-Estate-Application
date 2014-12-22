<?php
// This file shows a particular listing by id.
// the view corresponding to this file is:
// http://sfsuswe.com/~f14g04/Listed/listings/l/<listing_id>
// the corresponding method being called is the 'l' method of the listings.php controller
// if you rename this file you must rename the 'l' method, as well associated links
// that use the 'l' method. 
?>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDUHJnDiKIJYmpZNgaGhsW0uy54UWu61hc&sensor=false">
</script>
<?php
/*
  echo "<td>$listing->id</td>";
  echo "<td>$listing->dateCreated</td>";
  echo wrap('td', $listing->realtor_id);
  echo wrap('td', $listing->seller_id);
  echo wrap('td', $listing->property_id);
  echo wrap('td', $listing->validity);
  echo wrap('td', $listing->special_offer);
  echo wrap('td', $listing->name);
  echo wrap('td', $listing->price);
  echo wrap('td', $listing->school_district);
  echo wrap('td', $listing->size);
  echo wrap('td', $listing->num_room);
  echo wrap('td', $listing->unit_type);
  echo wrap('td', $listing->date_built);
  echo wrap('td', $listing->address_id);
  echo wrap('td', $listing->latitude);
  echo wrap('td', $listing->longitude);
  echo wrap('td', $listing->street_address);
  echo wrap('td', $listing->apt_num);
  echo wrap('td', $listing->city);
  echo wrap('td', $listing->state_code);
  echo wrap('td', $listing->zipcode);

  // Wrap data into html tagged form
  // If this is useful elsewhere, then tell me so I can make it global
  function wrap($tag, $data) {
  return "<$tag>" . $data . "</$tag>";
  }
 */
?>
<div class="container-fluid" id='wait'>
    <div class="col-md-12">
        <div class="page-header">
            <h1><?php echo $listing->street_address ?><br> 
                <?php echo $listing->city ?>, <?php echo $listing->state_code ?> <?php echo $listing->zipcode ?><br>
                <small>  $<?php
                    $price = str_split($listing->price);
                    $comma = 3 - (sizeof($price) % 3);
                    foreach ($price as $digit) {
                        $comma++;
                        echo $digit;
                        if ($comma % 3 == 0 && $comma <= sizeof($price)) {
                            echo ",";
                        }
                    }
                    ?></small><br>
               
            </h1>
        </div>
        <div class="col-md-7">
            <div class="col-md-12">
                <div class="largeborder">
                    <div id="myCarousel" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="#">
                                    <?php
                                    if (!empty($listing->images)) {
                                        echo "<img height=\"1000\" width=\"1000\" src=\"data:image/jpeg;base64," .
                                        base64_encode($listing->images[0][3]) .
                                        "\" alt=\"...\" >";
                                        echo '</a>';
                                    }
                                    ?>              </a>
                            </div>
                            <?php for ($i = 1; $i < count($listing->images); ++$i) { ?>
                                <div class="item">
                                    <a href="#">
                                        <?php
                                        if (!empty($listing->images)) {
                                            echo "<img height=\"1000\" width=\"1000\" src=\"data:image/jpeg;base64," .
                                            base64_encode($listing->images[$i][3]) .
                                            "\" alt=\"...\" >";
                                            echo '</a>';
                                        }
                                        ?>              </a>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </a>  
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="col-md-12">
                 <form method="POST" action ="<?php echo URL; ?>listings/morelistinginfo">
                    <?php $property_id = explode("/listings/l/", $_SERVER['REQUEST_URI']); ?>
                    <button type="submit" name="listing_id" value="<?php echo $property_id[1] ?>" class="btn btn-success btn-lg col-lg-offset-4">Contact Realtor</button></a>
                </form>
                <div class ="panel panel-default">
                    <li><h4 id="listingheader"><?php echo ucfirst(strtolower($listing->unit_type)) ?></h4>
                    </li><li><h4 id="listingheader"><?php echo $listing->num_room ?> bedroom<?php if ($listing->num_room > 1) echo "s" ?> </h4>
                    </li><li><h4 id="listingheader"><?php echo $listing->size ?> square feet</h4>
                    </li><li> <h4 id="listingheader">Built in <?php
                            $pieces = explode("-", $listing->date_built);
                            echo $pieces[0]
                            ?></h4></li>
                </div>
            </div>

            <div class ="col-md-12">
                <div class="largeborder">
                    <body onload="initialize()">
                        <div class="carousel-inner">
                            <div id="map-canvas" style="width: 475px; height: 320px;">
                            </div>
                            <div>
                                <input class="hide" id="address">
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="modal fade" id="contact-realtor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h1 class="modal-title" id="myModalLabel">Contact Us!</h1>
            </div>
            <form action="<?php echo URL; ?>users/createuser" method="POST">
                <div class="modal-body ">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Full Name"required="Please Enter First Name" data-validation="length" data-validation-length="min2"/><br>
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" class="form-control" name="contact_number" placeholder="Enter Phone Number"required="Please Enter Last Name"data-validation="length" data-validation-length="min2"/><br>
                    <label for="email">Email:</label> 
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required="Please Enter Email"/><br>

                    <label for="message">Message:</label>
                    <textarea class="form-control" rows="3" name="message" value="Hi, I found your listing on Trulia. 
                              Please send me more information about the listing at <?php echo $listing->address ?>, <?php echo $listing->city ?>, <?php echo $listing->state_code ?> <?php echo $listing->zipcode ?>. Thank you." 
                              required="Please Enter Password"data-validation="length" data-validation-length="min5"/>Hi, I've come across one of your properties on Listed. I would like more information about the listing at <?php echo $listing->street_address ?>, located in <?php echo $listing->city ?>, <?php echo $listing->state_code ?> <?php echo $listing->zipcode ?>. Thank you.</textarea><br>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_message" class="btn btn-default">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var geocoder;
    var map;
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(37.774929, -122.419416);
        var mapOptions = {
            zoom: 14,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        codeAddress();
    }

    function codeAddress() {
        var address = document.getElementById("address").value;
        geocoder.geocode({'address': "<?php echo $listing->street_address ?>, <?php echo $listing->city ?> <?php echo $listing->state_code ?>"}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
</script>
