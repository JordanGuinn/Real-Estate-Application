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
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="page-header">
            <h1><?php echo $listing->street_address ?><br> 
                <?php echo $listing->city ?>, <?php echo $listing->state_code ?> <?php echo $listing->zipcode ?><br>
                <small>  $<?php
                    $price = str_split($listing->price);
                    $comma = 3 - (sizeof($price) % 3);
                    foreach ($price as $digit) {
                        $comma++;
                        echo $digit;
                        if ($comma % 3 == 0 && $comma <= sizeof($price)){
                            echo ",";
                        }
                    }
                    ?></small></h1>
        </div>
        <div class="col-md-7">
            <div class="col-md-12">
                <div class="largeborder">
                    <a href="#">
                        <?php
                        echo var_dump($listing->images);
                        if (!empty($listing->images)) {
                            echo "<img height=\"600\" width=\"600\" src=\"data:image/jpeg;base64," .
                            base64_encode($listing->images[0][3]) .
                            "\" alt=\"...\" >";
                            echo '</a>';
                        }
                        ?>              </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php for ($i = 0; $i < count($listing->images); ++$i) { ?>
                        <div class ="col-md-4">
                            <a href="#" class="thumbnail" onclick="">
                                <?php
                                if (!empty($listing->images)) {
                                    echo "<img height=\"100\" width=\"100\" src=\"data:image/jpeg;base64," .
                                    base64_encode($listing->images[$i][3]) .
                                    "\" alt=\"...\" >";
                                    echo '</a>';
                                    $i++;
                                }
                                ?></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="col-md-12">
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
                        <div id="map-canvas" style="width: 320px; height: 320px;">
                        </div>
                        <div>
                            <input class="hide" id="address">
                        </div>
                    </body>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="listingheader">
            <button type="submit" class="btn btn-primary">I'm Interested!</button>
        </div>
    </div>
</div>
<br>

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