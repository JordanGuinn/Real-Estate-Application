<div class="container-fluid">
    
    
    
    <div class="container">
            <div>
            <h2> View for Admin Only</h2>
            <h3>Current Properties</h3>
            <table class="table table-striped">
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Property Id</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>School District</td>
                    <td>Size</td>
                    <td>Number of Room</td>
                    <td>Unit Type</td>
                    <td>Date of Build</td>
                    <td>Address Id</td>
   
                </tr>
                </thead>
                <tbody>
                <?php foreach ($property as $property) { ?>
                    <tr>
                        <td><?php if (isset($property->id)) echo $property->id; ?></td>
                        <td><?php if (isset($property->name)) echo $property->name; ?></td>
                        <td><?php if (isset($property->price)) echo $property->price; ?></td>
                        <td><?php if (isset($property->school_district)) echo $property->school_district; ?></td>
                        <td><?php if (isset($property->size)) echo $property->size; ?></td>
                        <td><?php if (isset($property->num_room)) echo $property->num_room; ?></td>
                        <td><?php if (isset($property->unit_type)) echo $property->unit_type; ?></td>
                        <td><?php if (isset($property->date_built)) echo $property->date_built; ?></td>
                        <td><?php if (isset($property->address_id)) echo $property->address_id; ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="box" style="margin-top: 20px; margin-bottom: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-primary" >

            <div class="panel-heading"><header class="panel-title">Edit Property</header></div>

            <form action="<?php echo URL; ?>listings/editproperties" method="POST">

                <div class="panel-body">
                    
                    <div class="form-group col-lg-3">
                        <label for="property_id">Property ID #: </label>
                        <input type="number" min="1" step="1" class="form-control" name="id" placeholder="id" required="" data-validation="length" data-validation-length="min1">
                    </div>

                    <div class="form-group col-lg-5">
                        <label for="Inputname">Name of Property: </label>
                        <input type="text" class="form-control" name="name" placeholder="property name" required="" data-validation="length" data-validation-length="min4">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="Inputprice">Price: </label>
                        <input type="number" min="1" step="1" class="form-control" name="price" placeholder="price" required="" data-validation="length" data-validation-length="min3">
                    </div>

                    <div class="form-group col-lg-5">
                        <label for="Inputsize">Property Size: </label>
                        <input type="number" min="1" step="1" class="form-control"  name="size" placeholder="property size(sq.ft)" required="" data-validation="length" data-validation-length="min3">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="Inputnum_room">Num. Rooms: </label>
                        <input type="number" min="1" step="1" class="form-control" name="num_room" placeholder="number of room" required="" data-validation="length" data-validation-length="min1">
                    </div>

                    <div class="form-group col-lg-3">  
                        <label for="Inputschooldistrict">School District: </label> <br> 

                        <label class="radio-inline">    
                            <input type="radio" name="school_district" id="1" value="1" >Yes 
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="school_district" id="0" value="0" checked="checked">No
                        </label>
                    </div>

                    <div class="form-group col-lg-5">
                        <label for="Inputunit_type">Unit Type: </label><br>
                        <select class="form-control" name="unit_type">
                            <option value="Apartment"> Apartment</option>
                            <option value="Condo"> Condo</option>
                            <option value="Townhouse">Townhouse</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="Inputdate_built">Built Date: </label>
                        <input type="date" class="form-control" name="date_built" placeholder="build date" required="">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="property_id">Address ID #: </label>
                        <input type="number" min="1" step="1" class="form-control" name="address_id" placeholder="address id" required="" data-validation="length" data-validation-length="min1">
                    </div>                                     


                </div>   

                <div class="panel-footer clearfix">
                    <div class="pull-right">  
                        <button class="btn btn-lg btn-warning active" type="submit" name="submit_edit_properties" >Edit Property</button>
                    </div>    
                </div>

            </form>

        </div>

    </div>

</div>




<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> $.validate();</script>

