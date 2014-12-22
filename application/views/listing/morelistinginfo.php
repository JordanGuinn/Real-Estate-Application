<div class="container-fluid" id="shift-up">
    <div class="col-md-12">
        <div class="col-md-4">
            <h1 class="page-header">Contact Us</h1>
            <form action="<?php echo URL; ?>users/createMessage" method="POST">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Full Name"required="Please Enter First Name" data-validation="length" data-validation-length="min2"/><br>
                <label for="contact_number">Contact Number:</label>
                <input type="number" class="form-control" name="number" placeholder="Enter Phone Number"required="Please Enter Last Name"data-validation="length" data-validation-length="min2"/><br>
                <label for="email">Email:</label> 
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required="Please Enter Email"/><br>
                <label for="message">Message:</label>
                <textarea class="form-control" rows="5" name="message"
                          required="Please Enter Password"data-validation="length" data-validation-length="min5"/>Hi, I've come across one of your properties on Listed. I would like more information about the listing at <?php echo $listing->street_address ?>, located in <?php echo $listing->city ?>, <?php echo $listing->state_code ?> <?php echo $listing->zipcode ?>. Thank you.</textarea><br>
                <input type="hidden" class="form-control" name="property_id" value="<?php echo $_POST['listing_id']; ?>">
                <button type="submit" name="submit_create_message" class="btn btn-default">Send</button>
            </form>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>