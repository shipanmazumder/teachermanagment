<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Page Not Found">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  Page Title  -->
    <title>Page Not Found</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>libs/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>libs/favicon.png">
    <!-- ===========================
    ======================   All CSS Here   ====================== -->
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
    <!-- style css -->
    <?php echo link_tag('libs/css/main.css'); ?>
</head>

<body>
    
    <div class="container error_page">
        <div class="row">
            <div class="col-md-12 fof_text text-center">
                <span>4<span class="mlr10">0</span><span class="roted">4</span></span>
                <h2>opps!</h2>
                <h1>It looks like you're lost</h1>
                <p>or The page you’re looking for isn't here :(</p>
                <a class="error_page_btn" href="<?php echo base_url(); ?>">Back to Home</a>
            </div>
        </div>
    </div>
</body>

</html>
