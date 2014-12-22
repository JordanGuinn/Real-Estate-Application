<div class="minimal-content">
<?php
if (isset($_GET['address_id'])) {
    $address_id = $_GET['address_id'];
}
?>



<div class="container-fluid">

    <div id="box" style="margin-top: 40px; margin-bottom: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <header class="panel-title">

                    <table style="width:100%"> 
                        <tr align="center">
                            <td><font color="#C0C0C0">Create Address</font></td>
                            <td>Create Property</td>
                            <td><font color="#C0C0C0">Create Images</font></td>
                        </tr>
                    </table>
                </header>
            </div>

            <form action="<?php echo URL; ?>listings/createpropertyListing" method="POST">

                <div class="panel-body"> 

                    <div class="progress">
                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>


                    <div class="form-group col-lg-5">
                        <label for="Inputname">Name of Property: </label>
                        <input type="text" class="form-control" name="name" placeholder="Property Name" required="" data-validation="length" data-validation-length="min4">
                    </div>
                    <div class="form-group col-lg-1"></div>

                    <div class="form-group col-lg-5">
                        <label for="Inputprice">Price: </label>
                        <input type="number" min="1" step="1" class="form-control" name="price" placeholder="Price" required="" data-validation="length" data-validation-length="min3">
                    </div>
                    <div class="form-group col-lg-1"></div>

                    <div class="form-group col-lg-5">
                        <label for="Inputsize">Property Size: </label>
                        <input type="number" min="1" step="1" class="form-control"  name="size" placeholder="Property Size (sq. ft)" required="" data-validation="length" data-validation-length="min3">
                    </div>
                    <div class="form-group col-lg-1"></div>

                    <div class="form-group col-lg-5">
                        <label for="Inputnum_room">Number of Bedrooms: </label>
                        <input type="number" min="1" step="1" class="form-control" name="num_room" placeholder="Number of Bedrooms" required="" data-validation="length" data-validation-length="min1">
                    </div>
                    <div class="form-group col-lg-1"></div>

                    <div class="form-group col-lg-5">
                        <label for="Inputunit_type">Unit Type: </label><br>
                        <select class="form-control" name="unit_type">
                            <option value="Apartment"> Apartment</option>
                            <option value="Condo"> Condo</option>
                            <option value="Townhouse">Townhouse</option>
                        </select>
                        <!--<input type="text" class="form-control" name="unit_type" placeholder="apartment, condo or townhouse">-->


                    </div>
                    <div class="form-group col-lg-1" type="hidden">  
                        <label for="Inputschool_district"></label>
                        <input type="hidden" name="school_district" id="1" value="1" > 
                    </div>

                    <div class="form-group col-lg-5">
                        <label for="Inputdate_built">Date Built: </label>
                        <input type="date" class="form-control" name="date_built" placeholder="Date Built" required="">
                    </div>


                    <input type="hidden" name="address_id" value="<?php echo $address_id ?>">



                </div>   

                <div class="panel-footer clearfix">
                    <div class="pull-right">  
                        <button class="btn btn-lg btn-success active" type="submit" name="submit_create_property" >Create Property</button>
                    </div>    
                </div>

            </form>

        </div>

    </div>

</div>

</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> $.validate();</script>

