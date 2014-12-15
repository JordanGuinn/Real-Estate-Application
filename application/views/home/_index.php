<?php
require_once("./application/models/prototypemodel.php");
?>
<div class="main">
    <h1>This is the main</h1>
    <h2>Main content will be presented here.</h2>
    <br>    
    <div class="test_db">
        <h1>Testing Database:</h1>
        <h3>Add a user</h3>
        <form action="" method="POST">
            <label>First Name</label>
            <input type="text" name="first" value="" required /><br>
            <label>Last name</label>
            <input type="text" name="last" value="" required /><br>
            <label>Address 1</label>
            <input type="text" name="address1" value="" required /><br>
            <label>Address 2</label>
            <input type="text" name="address2" value="" /><br>
            <label>User Type</label>
            <input type="text" name="link" value="User" readonly=""/><br>
            <input type="submit" name="submit_add_user" value="Submit" />
        </form>
        
        <br>
        <br>
        <h3>Lookup User</h3>
        <form action="./application/models/prototypemodel.php" method="POST">
            <label>Enter User's First Name:</label>
            <input type="text" name="first" value="" required /><br>
            <input type="submit" name="submit_lookup_user" value="Submit" />
        <?php
        echo "<br>";
        ?>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>First</td>
                <td>Last</td>
                <td>Address1</td>
                <td>Address2</td>
                <td>User Type</td>
                <td>Signup Date</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php if (isset($user->id)) echo $user->id; ?></td>
                    <td><?php if (isset($user->first)) echo $user->first; ?></td>
                    <td><?php if (isset($user->last)) echo $user->last; ?></td>
                    <td><?php if (isset($user->address1)) echo $user->address1; ?></td>
                    <td><?php if (isset($user->address2)) echo $user->address2; ?></td>
                    <td><?php if (isset($user->user_type)) echo $user->user_type; ?></td>
                    <td><?php if (isset($user->signup_date)) echo $user->signup_date; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>
