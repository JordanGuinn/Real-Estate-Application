
<div class="container-fluid">
    
    <div id="box" style="margin-top: 20px; margin-bottom: 30px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-primary" >

            
            <div class="panel-heading"><header class="panel-title">
                    
                    <table style="width:100%"> 
                    <tr align="center">
                      <td>Delete Property By ID</td>
                      <td><font color="#C0C0C0">Delete Address By ID</font></td>
                    </tr>
                    </table>
                </header></div>

            <form role="form" action="<?php echo URL; ?>listings/deleteproperties" method="POST">

                <div class="panel-body"> 
                    
                  <div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                      <span class="sr-only">45% Complete</span>
                    </div>
                  </div> 


                    <div class="form-group col-lg-3">
                        <label for="property_id">Property ID #: </label>
                        <input type="number" min="1" step="1" class="form-control" name="property_id" placeholder="property id" required="" data-validation="length" data-validation-length="min1">
                    </div>


                </div>   

                <div class="panel-footer clearfix">
                    <div class="pull-right">  
                        <button class="btn btn-lg btn-danger" type="submit" name="submit_delete_property" >Delete Property</button>
                    </div>    
                </div>

            </form>

        </div>

    </div>
    
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
    <br><br>  
    
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> $.validate();</script>
    