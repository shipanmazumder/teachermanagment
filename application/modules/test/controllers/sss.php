        <nav class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-9 col-sm-9 col-9">
                        <!-- LOGO -->
                        <?php
                            if(isset($footer_content)): 
                        ?>
                        <a class="logo" href="<?php echo base_url(); ?>"><img class="img-fluid" src="<?= $footer_content[0]->picture_url; ?>" alt="DoelCampus"></a>
                        <?php
                            endif;
                        ?>
                    </div>
                    <div class="col-lg-10 col-md-3 col-sm-3 col-3">
                        <!-- MENU TOGGLE -->
                        <div class="menu_btn d-sm-block d-md-block d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- MENU TOGGLE END -->
                        <!-- MENU -->
                        <div class="header_menu">
                            <ul>
                                <li class="menu_close d-sm-block d-md-block d-lg-none"><i class="icofont icofont-close"></i></li>
                                <li><a href="<?php echo base_url(); ?>" class="animsition-link <?php if(isset($maincontent)) echo 'active'; ?> ">Home</a></li>
                                <li><a href="<?php echo base_url()?>aboutUs" class="animsition-link <?php if(isset($about_content)) echo 'active'; ?>">About</a></li>
                                <li><a class="<?php if(isset($digital_service_content)||isset($tranning_service_facilites) ) echo 'active'; ?>">Services<i class="icofont icofont-simple-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="http://client.doelcampus.com/" target="_blank">Domain &amp; Hosting</a></li>
                                        <li><a class="<?php if(isset($digital_service_content)) echo 'active'; ?>" href="<?php echo base_url()?>digitalServices">Digital Services</a></li>
                                        <li><a  class="<?php if(isset($tranning_service_facilites)) echo 'active'; ?>" href="<?php echo base_url()?>tranningFacilities">Training Facilities</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url()?>works" class="animsition-link <?php if(isset($work_content)) echo 'active'; ?>">Works</a></li>
                                <li><a href="<?php echo base_url(); ?>privacyPolicy" class="animsition-link <?php if(isset($p_policy)) echo 'active'; ?> ">Privacy &amp; Policy</a></li>
                                <li><a href="<?php echo base_url(); ?>termsOfService" class="animsition-link <?php if(isset($t_condition)) echo 'active'; ?> ">Terms of Service</a></li>
                                <li><a href="<?php echo base_url(); ?>contactUs" class="animsition-link <?php if(isset($contact_page)) echo 'active'; ?> ">Say Hi</a></li>
                                <li><a href="http://tms.doelcampus.com/studentlogin" target="_blank" class="animsition-link">Login</a></li>
                                <!-- <li><a class="up_popup_btn"> User Panel</a></li> -->
                            </ul>
                        </div>
                        <!-- MENU END -->
                    </div>
                </div>
            </div>
        </nav>
        <!-- USER_PANEL WRAPPER START -->
        <!-- <div class="wrapper user_panel">
            <div class="container">
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-4">
                        <h2 class="text-center mb-4 text-uppercase">Login</h2>
                        <form action="">
                            <input class="au_name" type="text" name="au_name" placeholder="Admin User Name">
                            <input class="su_name translateX150" type="text" name="su_name" placeholder="Student User Name">
                            <input type="password" name="password" placeholder="Password">
                            <button>Click Here to Access User Panel</button>
                        </form>
                    </div>
                    <p class="up_popup_close_btn">
                        <i class="icofont icofont-close"></i>
                    </p>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-8">
                        <div class="user_buttons">
                            <p class="active au_name_btn">Admin</p>
                            <p class="su_name_btn">Student</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- USER_PANEL WRAPPER END -->