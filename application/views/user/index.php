<div class="minimal-content">
<div class="container" id="login-logout">
    <?php if (isset($_SESSION['email']) && isset($_SESSION['password'])) { ?>

        <?php if (strpos($_SESSION['email'], 'listed') == true) { {
                ?>
                <div>
                    <a href="<?php echo URL; ?>listings/createaddressListing"><button type="button" class="btn btn-success btn-lg">Create Property</button></a>
                </div>
                <br>    
                <div>
                    <a href="<?php echo URL; ?>listings/editproperties"><button type="button" class="btn btn-warning btn-lg">Edit Property</button></a>
                </div>
                <br>
            <?php } ?>


            <!-- List all users in the database -->

            <?php if (strpos($_SESSION['email'], 'admin') == true) {
                ?>

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
                    <br>
                <?php
                }
            }
        }
        ?>
        </div>
</div>