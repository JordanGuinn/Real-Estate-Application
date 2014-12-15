
<div class="container-fluid">

    <div id="box" style="margin-top: 40px; margin-bottom: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-primary" >

            <div class="panel-heading"><header class="panel-title">
                    
                    <table style="width:100%"> 
                    <tr align="center">
                      <td>Create Address</td>
                      <td><font color="#C0C0C0">Create Property</font></td>
                      <td><font color="#C0C0C0">Create Images</font></td>
                    </tr>
                    </table>
                </header></div>

            <form role="form" action="<?php echo URL; ?>listings/createaddressListing" method="POST">

                <div class="panel-body"> 
                    
                  <div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                      <span class="sr-only">30% Complete</span>
                    </div>
                  </div>
                    
                    <div class="form-group col-lg-9">
                        <label for="street_address">Street Address: </label>
                        <input type="text" class="form-control" name="street_address" placeholder="street address" required="" data-validation="length" data-validation-length="min4" >
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="apt_num">Apartment #: </label>
                        <input type="text" class="form-control" name="apt_num" placeholder="apartment #" required="" data-validation="length" data-validation-length="min1">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="city">City: </label>
                        <input type="text" class="form-control"  name="city" placeholder="city" required="" data-validation="length" data-validation-length="min2">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="state_code">State: </label>
                        <input type="text" class="form-control" name="state_code" placeholder="state" required="" data-validation="length" data-validation-length="min2">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="zipcode">Zip Code: </label>
                        <input type="number" min="1" step="1" class="form-control" name="zipcode" placeholder="zip code" required="" data-validation="length" data-validation-length="min5">
                    </div>


                </div>   

                <div class="panel-footer clearfix">
                    <div class="pull-right">  
                        <button class="btn btn-lg btn-success" type="submit" name="submit_create_address" >Create Address</button>
                    </div>    
                </div>

            </form>

        </div>

    </div>
   
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> $.validate();</script>

