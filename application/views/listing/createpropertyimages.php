<div class="container-fluid">
    <div id="box" style="margin-top: 40px; margin-bottom: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <header class="panel-title">

                    <table style="width:100%"> 
                        <tr align="center">
                            <td><font color="#C0C0C0">Create Address</font></td>
                            <td><font color="#C0C0C0">Create Property</font></td>
                            <td>Create Images</td>
                        </tr>
                    </table>
                </header>
            </div>

            <form action="<?php echo URL; ?>listings/createpropertyimages" method="POST" enctype="multipart/form-data">

                <div class="panel-body"> 

                    <div class="progress">
                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                            <span class="sr-only">90% Complete</span>
                        </div>
                    </div>

                    <?php $pid = (explode('property_id=', $_SERVER['REQUEST_URI'])); ?>
                    <input type="hidden" name="property_id" value="<?php echo $pid[1]; ?>">


                    <div class="form-group col-lg-6">
                        <label for="image_name">Property Image Name: </label>
                        <input type="text" class="form-control" name="image_name" placeholder="image name" required="" data-validation="length" data-validation-length="min2">
                    </div>

                    <div class="form-group col-lg-5">
                        <label for="image_type">Image Type: </label>
                        <select class="form-control" name="image_type">
                            <option value="REGULAR"> Regular</option>
                            <option value="THUMBNAIL"> Thumbnail</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Please Upload Your Image: </label>

                        <input id="input-21" type="file" name="image_blob" accept="image/*" required="">

                    </div>

                </div>   

                <div class="panel-footer clearfix">
                    <div class="pull-right">  
                        <button class="btn btn-lg btn-warning active" type="submit" name="submit_create_image" >Add More Images </button>
                        <button class="btn btn-lg btn-success active" type="submit" name="submit_done" >Done </button>
                    </div>    
                </div>

            </form>

        </div>

    </div>



</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script> $.validate();</script>

