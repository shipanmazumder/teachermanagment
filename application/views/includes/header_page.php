<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Teacher Assistant -
        <?php
            switch (@$main_content) {
                case 'dashboard_page':
                    echo 'Dashboard';
                    break;
                case 'add_user_page':
                    echo "New User";
                    break;
                case 'all_users_page':
                    echo "All User";
                    break;
                case 'edit_user_page':
                    echo "Edit User";
                    break;
                case 'add_student':
                    echo "New Student";
                    break;
                case 'view_student':
                    echo "All Students";
                    break;
                case 'view_single_student':
                    echo "Student Details";
                    break;
                case 'edit_student':
                    echo "Edit Student";
                    break;
                case 'add_payment':
                    echo "New Payment";
                    break;
                case 'view_payment':
                    echo "View Payment";
                    break;
                case 'add_batch':
                    echo "New Batch";
                    break;
                case 'edit_batch':
                    echo "Edit Batch";
                    break;
                case 'view_course_batch':
                    echo "View Batch";
                    break;
                case 'view_running_batch':
                    echo "Running Batch";
                    break;
                case 'view_end_batch':
                    echo "End Batch";
                    break;
                case 'batch_details':
                    echo "Batch Details";
                    break;
                case 'add_attendance':
                    echo "New Attendence";
                    break;
                case 'view_attendance':
                    echo "View Attendence";
                    break;
                
                default:
                    echo 'Dashboard';
                    break;
            }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Teacher Assistant" />
    <meta name="author" content="DoelCampus" />
    <meta name="keywords" content="Teacher Assistant DoelCampus, Teacher Assistant " />
    <link href="<?php echo base_url(); ?>libs/favicon.png" type="image/png" rel="icon">
    <link href="<?php echo base_url(); ?>libs/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
<span class="base_url" id="<?php echo base_url(); ?>"></span>

    <!--  page loader start  -->
   <!--  <div class="loader">
		<div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <span>LOADING</span>
        </div>
	</div> -->
    <!--  page loader end  -->