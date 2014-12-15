      
<div class="container-fluid">
        
    <div id="box" style= "margin-top: 20px; margin-bottom: 30px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-primary" >

            <div class="panel-heading"><header class="panel-title">
                    
                    <table style="width:100%"> 
                    <tr align="center">
                      <td><font color="#C0C0C0">Delete Property By ID</font></td>
                      <td>Delete Address By ID</td>
                    </tr>
                    </table>
                </header></div>

            <form role="form" action="<?php echo URL; ?>listings/deleteaddresses" method="POST">

                <div class="panel-body"> 
                    
                  <div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                      <span class="sr-only">90% Complete</span>
                    </div>
                  </div> 


                    <div class="form-group col-lg-3">
                        <label for="address_id">Address ID #: </label>
                        <input type="number" min="1" step="1" class="form-control" name="address_id" placeholder="address id" required="" data-validation="length" data-validation-length="min1">
                    </div>



                </div>   

                <div class="panel-footer clearfix">
                    <div class="pull-right">  
                        <button class="btn btn-lg btn-danger" type="submit" name="submit_delete_address" >Delete Address</button>
                    </div>    
                </div>

            </form>

        </div>

    </div>


<div class="container">
            <div>
            <h2> View for Admin Only</h2>
            <h3>Current Addresses</h3>
            <table class="table table-striped">
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Address Id</td>
                    <td>Street Address</td>
                    <td>Apartment #</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Zip Code</td>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($address as $address) { ?>
                    <tr>
                        <td><?php if (isset($address->id)) echo $address->id; ?></td>
                        <td><?php if (isset($address->street_address)) echo $address->street_address; ?></td>
                        <td><?php if (isset($address->apt_num)) echo $address->apt_num; ?></td>
                        <td><?php if (isset($address->city)) echo $address->city; ?></td>
                        <td><?php if (isset($address->state_code)) echo $address->state_code; ?></td>
                        <td><?php if (isset($address->zipcode)) echo $address->zipcode; ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> $.validate();</script>
    