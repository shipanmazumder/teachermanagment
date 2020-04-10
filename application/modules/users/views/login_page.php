<!-- <!doctype html> -->
<?php echo doctype('html5');?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Teacher Assistant - Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <link href="<?php echo base_url() ?>libs/favicon.png" type="image/png" rel="icon">
        <link rel="stylesheet" href="<?php echo base_url() ?>libs/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>libs/css/main.css">
        <style>
            .login_wrapper {
                position: absolute;
                width: 300px;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
            }
        </style>
    </head>
    <body>
        <!--[if lte IE 9]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
            <![endif]-->

    <!--  page loader start  -->
    <!-- <div class="loader">
		<div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <span>LOADING</span>
        </div>
	</div> -->
    <!--  page loader end  -->
        <div class="login_wrapper">
            <div class="card rounded-0">
                <div class="card-header">
                    <h3 class="mb-0 text-center">LOGIN</h3>
                </div>
                <div class="card-body">
                    <?php 
                    /*
                    |==================
                    |   error check
                    |==================
                    */
                    if(validation_errors())
                    {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    elseif (isset($errorlogin)) 
                    echo '<div class="alert alert-danger" role="alert">'.$errorlogin.'</div>';
                    ?>
                    <?php echo form_open('users/security-login?=login_dashboard'); ?>
                    <div class="form-group mt-3">
                        <?php
                            $name = array(
                            'placeholder'=>"Username",
                            'name'        =>'uname',
                            'class'       =>'form-control rounded-0',
                            'id'          =>'uname',
                            'required'    =>'required',
                            );
                            echo form_input($name);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            $password = array(
                            'placeholder'=>"Password",
                            'name'        =>'pass',
                            'class'       =>'form-control rounded-0',
                            'id'          =>'pass',
                            'required'    =>'required',
                            );
                            echo form_password($password);
                        ?>
                    </div>
                        <button type="submit" id="login" class="btn btn-success rounded-0 login_btn text-white text-center w-100 my-3">Login</button>
                    <?php echo form_close();?>
                    <div class="mt-2">
                    <!-- <button type="button" id="admin" class="btn btn-info rounded-0 login_btn text-white text-center mr-1 mt-1">Admin</button>
                    <button type="button" id="user" class="btn btn-info rounded-0 login_btn text-white text-center mr-1 mt-1">User</button>
                    </div> -->
                </div>
            </div>
        </div>

        <script src="<?php echo base_url() ?>libs/js/vendor/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>libs/js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>libs/js/bootstrap.min.js"></script>
        <script type='text/javascript'>
            // $(window).on('load', function () {
            //     $(".loader").fadeOut();
            // });

            // $(document).ready(function(){
            //     $('#admin').click(function(){
            //         $('#uname').val('admin');
            //         $('#pass').val('admin');
            //     });
            //     $('#user').click(function(){
            //         $('#uname').val('user');
            //         $('#pass').val('user');
            //     });
            // });
        </script>
    </body>
</html>