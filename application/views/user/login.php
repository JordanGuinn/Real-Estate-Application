<div class="minimal-content">
<div class="container-fluid" id="shift-up">  
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"></div>
    
        <div class="col-md-4">
                        <h1 class="page-header">Log In
                        </h1>
            <form role="form" action="<?php echo URL; ?>users/login" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success col-md-4 col-lg-offset-8" name="login">Log In</button>
            </form>
        </div>
    </div>
    </div>
</div>
</div>