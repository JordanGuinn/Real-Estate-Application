<div class="container">
     <div>
       <a href="<?php echo URL; ?>listings/createaddressListing"><button type="button" class="btn btn-success btn-lg">Create Property</button></a>
    </div>
    <br>    
    <div>
       <a href="<?php echo URL; ?>listings/editproperties"><button type="button" class="btn btn-warning btn-lg">Edit Property</button></a>
    </div>
    <br> 
    <div>
       <a href="<?php echo URL; ?>listings/deleteproperties"><button type="button" class="btn btn-danger btn-lg">Delete Property</button></a>
    </div>
    <br>
    <div>
       <a href=""><button type="button" class="btn btn-success btn-lg">Manage Account</button></a>
    </div>
    <!-- List all users in the database -->
    <div>
        <h2> View for Admin Only</h2>
        <h3>Current Users</h3>
        <table class="table table-striped">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Type</td>
                <td>First</td>
                <td>Last</td>
                <td>Email</td>
                <td>Image Id</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php if (isset($user->id)) echo $user->id; ?></td>
                    <td><?php if (isset($user->type)) echo $user->type; ?></td>
                    <td><?php if (isset($user->first_name)) echo $user->first_name; ?></td>
                    <td><?php if (isset($user->last_name)) echo $user->last_name; ?></td>
                    <td><?php if (isset($user->email)) echo $user->email; ?></td>
                    <td><?php if (isset($user->image_id)) echo $user->image_id; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <br>
    
    
   
    
    <!-- add user form -->
    <div class="input-group">
        <h3>Create a User</h3>
        
        <form action="<?php echo URL; ?>users/createuser" method="POST">
            <label>First Name</label>
            <input type="text" name="first_name" value="" required /><br>
            <label>Last Name</label>
            <input type="text" name="last_name" value="" required /><br>
            <label>Email</label>
            <input type="text" name="email" value="" required /><br>
            <label>Password</label>
            <input type="password" name="password" value="" /><br>
            <input type="submit" name="submit_create_user" value="Submit" />
        </form>
    </div>
    <br>
    
    
    <div class="input-group">
        <h3>Delete a User</h3>
        <form action="<?php echo URL; ?>users/deleteuser" method="POST">
            <label>Email of User</label>
            <input type="text" name="email" value="" required /><br>
            <input type="submit" name="submit_delete_user" value="Submit" />
        </form>
    </div>
    <br>
    <!--
    <div>
        <h3>Update a User</h3>
        <form action="<?php echo URL; ?>users/updateuser" method="POST">
            <label>Email of User</label>
            <input type="text" name="email" value="" required />
            <input type="submit" name="submit_delete_user" value="Submit" />
        </form>
    </div>
    -->
</div>
