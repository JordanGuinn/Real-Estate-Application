<div class="minimal-content">
    <?php if (isset($_SESSION['email']) && isset($_SESSION['password'])) { ?>
        <div class="container-fluid" id="header-items">
            <div class="col-md-12">
                <div class="col-md-6">
                    <h3>Current Messages</h3>
                    <table class="table table-striped">
                        <thead style="background-color: #ddd; font-weight: bold;">
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Phone Number</td>
                                <td>Email</td>
                                <td>Message</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $message) { ?>
                                <tr>
                                    <td><?php if (isset($message->id)) echo $message->id; ?></td>
                                    <td><?php if (isset($message->name)) echo $message->name; ?></td>
                                    <td><?php if (isset($message->number)) echo $message->number; ?></td>
                                    <td><?php if (isset($message->email)) echo $message->email; ?></td>
                                    <td><p><?php if (isset($message->message)) echo $message->message; ?></p></td>                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
<div class="container-fluid">
    <div class="col-md-12" id="shift-left">
                <div class="col-md-6>"
                     <div class="input-group">
                        <h3>Delete a Message</h3>
                        <form action="<?php echo URL; ?>users/deleteMessage" method="POST">
                            <label>Message ID</label>
                            <input type="number" name="message_id" value="" required /><br>
                            <input type="submit" name="submit_delete_message" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
</div>