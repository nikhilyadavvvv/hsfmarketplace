<?php if(isset($_SESSION['error_message'] ) && $_SESSION['error_message']!='') { ?>

    <div class="row">
        <div class="alert alert-danger col-md-offset-2 col-sm-8">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $_SESSION['error_message'];?>
        </div>
    </div>

    <?php 
                                //session_unset('error_message');
    unset($_SESSION['error_message']);
} ?>

<?php if(isset($_SESSION['success_message'] ) && $_SESSION['success_message']!='') { ?>

    <div class="row">
        <div class="alert alert-success col-md-offset-2 col-sm-8">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $_SESSION['success_message'];?>
        </div>
    </div>

    <?php 
    unset($_SESSION['success_message']);
} ?>