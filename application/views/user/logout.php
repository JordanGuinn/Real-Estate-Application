<div class="minimal-content">
<div class="container-fluid" id="login-logout">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <form role="form" action="<?php echo URL; ?>users/logout" method="POST">
                <div class="form-group" type="hidden">
                    <label for="logout">Are you sure you want to leave?</label>
                    <input type="hidden" class="form-control" value="yes" name="logout" placeholder="Enter email">
                </div>
                <div class="col-md-3"></div>
                <button type="submit" class="btn btn-success" name="logout">Yes</button>
            </form>
        </div>
    </div>
</div>
</div>