<div class="container-fluid">

    <?php
    /*
      echo "<h3>All Listings in the DB: </h3><br>";

      if (!empty($listings)) {
      echo "<div>";
      echo "<table class=\"table table-striped\">";
      echo "<thead style=\"background-color: #ddd; font-weight: bold;\">";
      echo "<tr>\n";
      // add the table headers
      foreach ($listings[0] as $key => $useless) {
      echo "<td>" . $key . "</td>\n";
      }
      echo "</tr>\n";


      // Display actual data
      echo "<tbody>\n";
      foreach ($listings as $row) {
      echo "<tr>\n";
      echo "<td>$row->id</td>";
      echo "<td>$row->dateCreated</td>";
      echo wrap('td', $row->realtor_id);
      echo wrap('td', $row->seller_id);
      echo wrap('td', $row->property_id);
      echo wrap('td', $row->validity);
      echo wrap('td', $row->special_offer);
      echo wrap('td', $row->name);
      echo wrap('td', $row->price);
      echo wrap('td', $row->school_district);
      echo wrap('td', $row->size);
      echo wrap('td', $row->num_room);
      echo wrap('td', $row->unit_type);
      echo wrap('td', $row->date_built);
      echo wrap('td', $row->address_id);
      echo wrap('td', $row->latitude);
      echo wrap('td', $row->longitude);
      echo wrap('td', $row->street_address);
      echo wrap('td', $row->apt_num);
      echo wrap('td', $row->city);
      echo wrap('td', $row->state_code);
      echo wrap('td', $row->zipcode);
      echo "</tr>";
      }

      echo "</table>";
      echo "</div>";
      }


      // Wrap data into html tagged form
      // If this is useful elsewhere, then tell me so I can make it global
      function wrap($tag, $data) {
      return "<$tag>" . $data . "</$tag>";
      }
     */
    $i = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($listings_search_results as $row) {
            if ($row->price < $_POST["min_price"] && $_POST["min_price"] > 0) {
                unset($listings_search_results[$i]);
                unset($listing_ids[$i + 1]);
            } elseif ($row->price > $_POST["max_price"] && $_POST["max_price"] > 0) {
                unset($listings_search_results[$i]);
                unset($listing_ids[$i + 1]);
            } elseif ($row->num_room < $_POST["min_bedrooms"] && $_POST["min_bedrooms"] > -1) {
                unset($listings_search_results[$i]);
                unset($listing_ids[$i + 1]);
            } elseif ($row->num_room > $_POST["max_bedrooms"] && $_POST["max_bedrooms"] > -1) {
                unset($listings_search_results[$i]);
                unset($listing_ids[$i + 1]);
            } elseif (($row->size < $_POST["square_feet"]) && $_POST["square_feet"] == 5000) {
                unset($listings_search_results[$i]);
                unset($listing_ids[$i + 1]);
            } elseif (($row->size > $_POST["square_feet"] || $row->size < $_POST["square_feet"] - 500)
                    && ($_POST["square_feet"] > -1 && $_POST["square_feet"] < 5000)) {
                unset($listings_search_results[$i]);
                unset($listing_ids[$i + 1]);
            }
            $i++;
        }
    }
    ?>    
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <h3 id="listingheader">Search results for "<?php echo htmlentities($search_string) ?>"</h3>
        <p id="listingheader">Displaying <?php
            if (!empty($listings_search_results)) {
                echo 1;
            } else {
                echo 0;
            }
            ?>-<?php echo count($listings_search_results) ?> of 

            <?php echo count($listings_search_results) ?> results.</p>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel body">
                <div id="listingheader">
                    <h4>Refine Search</h4>
                    <?php $string = explode('&', next(explode('search_listings=', $_SERVER['REQUEST_URI']))); ?>
                    <form method="POST" action="#">
                        <h6>Min Price</h6>
                        <select class="form-control" type="number" name="min_price">
                            <option value="0">Select One</option>
                            <option value="100000">$100,000</option>
                            <option value="200000">$200,000</option>
                            <option value="300000">$300,000</option>
                            <option value="400000">$400,000</option>
                            <option value="500000">$500,000</option>
                            <option value="600000">$600,000</option>
                            <option value="700000">$700,000</option>
                            <option value="800000">$800,000</option>
                            <option value="900000">$900,000</option>
                            <option value="1000000">$1M</option>
                        </select>
                        <h6>Max Price</h6>
                        <select class="form-control" type="number" name="max_price">
                            <option value="0">Select One</option>
                            <option value="100000">$100,000</option>
                            <option value="200000">$200,000</option>
                            <option value="300000">$300,000</option>
                            <option value="400000">$400,000</option>
                            <option value="500000">$500,000</option>
                            <option value="600000">$600,000</option>
                            <option value="700000">$700,000</option>
                            <option value="800000">$800,000</option>
                            <option value="900000">$900,000</option>
                            <option value="1000000">$1M</option>
                            <option value="1500000">$1.5M</option>
                            <option value="2000000">$2M</option>
                            <option value="2500000">$2.5M</option>
                            <option value="3000000">$3M</option>
                            <option value="4000000">$4M</option>
                            <option value="5000000">$5M</option>
                            <option value="10000000">$10M</option>
                        </select>
                        <h6>Min Bedrooms</h6>
                        <select class="form-control" type="number" name="min_bedrooms">
                            <option value="-1">Select One</option>
                            <option value="0">Studio</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <h6>Max Bedrooms</h6>
                        <select class="form-control" type="number" name="max_bedrooms">
                            <option value="-1">Select One</option>
                            <option value="0">Studio</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <h6>Square Feet</h6>
                        <select class="form-control" type="number" name="square_feet">
                            <option value="-1">Select One</option>
                            <option value="499">0-499</option>
                            <option value="999">500-999</option>
                            <option value="1499">1,000-1,499</option>
                            <option value="1999">1,500-1,999</option>
                            <option value="2499">2,000-2,499</option>
                            <option value="2999">2,500-2,999</option>
                            <option value="3499">3,000-3,499</option>
                            <option value="3999">3,500-3,999</option>
                            <option value="4499">4,000-4,499</option>
                            <option value="4999">4,500-4,999</option>
                            <option value="5000">5,000+</option>
                        </select>
                        <br>                        
                        <input name="search_listings" value="<?php echo $string ?>" type="hidden">
                        <input type="submit" class="btn btn-default" name="filter" href="#">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <?php foreach ($listings_search_results as $row) { ?>
            <div class ="panel panel-default">
                <div class ="panel body">
                    <div class="col-md-3">
                        <a class="media-left" href="<?php echo URL . "listings/" ?>">
                            <?php
                            echo '<a href="' . URL . 'listings/l/' . next($listing_ids) . '">';
                            echo "<img height=\"100\" width=\"100\" src=\"data:image/jpeg;base64," .
                            base64_encode($row->images[0][3]) .
                            "\" alt=\"...\" >";
                            echo '</a>';
                            ?>                        </a>
                    </div>
                    <table class ="table">
                        <h4 id ="listingheader"><?php echo $row->street_address ?> <br>
                            <?php echo $row->city ?>,
                            <?php echo $row->state_code ?>
                            <?php echo $row->zipcode ?></h4>
                        <div class="col-md-3">
                            <?php echo ucfirst(strtolower($row->unit_type)) ?> <br>
                            Built in <?php
                            $pieces = explode("-", $row->date_built);
                            echo $pieces[0]
                            ?>
                        </div>
                        <div class="col-md-3">
                            <?php echo $row->num_room ?> bedroom<?php if ($row->num_room > 1) echo "s" ?><br>
                            <?php echo $row->size ?> sq ft
                        </div>
                        <div class="col-md-3">
                            <h4><b>  $<?php
                                    $price = str_split($row->price);
                                    $comma = 3 - (sizeof($price) % 3);
                                    foreach ($price as $digit) {
                                        $comma++;
                                        echo $digit;
                                        if ($comma % 3 == 0 && $comma <= sizeof($price))
                                            echo ",";
                                    }
                                    ?></b></h4>
                        </div>
                    </table>
                </div>
            </div>
        <?php } ?>
        <button type="button" class="btn btn-default" disabled="disabled">Previous</button>
        <button type="button" class="btn btn-default" disabled="disabled">Next</button>
    </div>
    <div class="col-md-1">
    </div>
    <br>
</div>
<br>

