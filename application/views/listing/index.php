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
      foreach($listings[0] as $key => $useless) {
      echo "<td>" . $key . "</td>\n";
      }
      echo "</tr>\n";

      // Display actual data
      echo "<tbody>\n";
      foreach ($listings as $row) {
      echo "<tr>\n";

      // testing image display
      foreach ($row->image as $key => $value) {
      echo "key: $key<br>";
      //echo "value: " . print_r($value) . "<br>";
      echo "class of value: " . get_class($value) . "<br>";


      //echo '<img src="data:image/jpeg;base64,' . base64_encode($value)  . '" />';
      //echo "<img src='" . $id . ".png'> <br/>";
      //echo "class of value: ". get_class($value) . "<br>";
      }

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
?>    
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <h3 id="listingheader">Listings</h3>
        <p id="listingheader">Displaying 1-<?php echo count($listings) ?> of <?php echo count($listings) ?> results.</p>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel body">
                <div id="listingheader">
                    <h4>Refine Search</h4>
                    <h6>Min Price</h6>
                    <select class="form-control">
                        <option>Select One</option>
                        <option>$0</option>
                        <option>$100,000</option>
                        <option>$200,000</option>
                        <option>$300,000</option>
                        <option>$400,000</option>
                        <option>$500,000</option>
                        <option>$600,000</option>
                        <option>$700,000</option>
                        <option>$800,000</option>
                        <option>$900,000</option>
                        <option>$1M</option>
                    </select>
                    <h6>Max Price</h6>
                    <select class="form-control">
                        <option>Select One</option>
                        <option>$100,000</option>
                        <option>$200,000</option>
                        <option>$300,000</option>
                        <option>$400,000</option>
                        <option>$500,000</option>
                        <option>$600,000</option>
                        <option>$700,000</option>
                        <option>$800,000</option>
                        <option>$900,000</option>
                        <option>$1M</option>
                        <option>$1.5M</option>
                        <option>$2M</option>
                        <option>$2.5M</option>
                        <option>$3M</option>
                        <option>$4M</option>
                        <option>$5M</option>
                        <option>$10M</option>
                    </select>
                    <h6>Bedrooms</h6>
                    <select class="form-control">
                        <option>Select One</option>
                        <option>Studio</option>
                        <option>1-2</option>
                        <option>2-3</option>
                        <option>3-4</option>
                        <option>4-5</option>
                        <option>5+</option>
                    </select>
                    <h6>Square Feet</h6>
                    <select class="form-control" type="number" action="#" method="POST">
                        <option>Select One</option>
                        <option>0-499</option>
                        <option>500-999</option>
                        <option>1,000-1,499</option>
                        <option>1,500-1,999</option>
                        <option>2,000-2,499</option>
                        <option>2,500-2,999</option>
                        <option>3,000-3,499</option>
                        <option>3,500-3,999</option>
                        <option>4,000-4,499</option>
                        <option>4,500-4,999</option>
                        <option>5,000+</option>
                    </select>
                    <br>
                    <button type="button" class="btn btn-default">>Enter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <?php foreach ($listings as $row) { ?>
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
                        <a class="btn btn-primary" href="<?php echo URL . 'listings/l/' . current($listing_ids) . '' ?>">More Info</a>
                        <h4 id ="listingheader">
                            <?php echo $row->street_address ?> <br>
                            <?php echo $row->city ?>,
                            <?php echo $row->state_code ?>
                            <?php echo $row->zipcode ?>
                        </h4>
                        <div class = "col-md-3">
                            <?php echo ucfirst(strtolower($row->unit_type))
                            ?> <br>
                            Built in <?php
                            $pieces = explode("-", $row->date_built);
                            echo $pieces[0]
                            ?>
                        </div>
                        <div class="col-md-3">
                            <?php echo $row->num_room ?> bedroom<?php if ($row->num_room > 1) echo "s" ?> <br>
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
