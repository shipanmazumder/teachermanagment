        <!--load sidebar page -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>libs/img/logo.png" alt="DoelCampus">
            </a>
        </div>
        <div id="accordion">

            <div class="main_menu_item">
                <a href="<?php echo base_url(); ?>" class=" active  ">
                    <p class="menu_toggle  active  ">
                        <span class="icofont icofont-home  active  "></span> Dashboard
                        <i class="icofont icofont-check-circled  active  "></i>
                    </p>
                </a>
            </div>
            <div class="main_menu_item">
                <div id="headingOne">
                    <p class="collapsed menu_toggle   " data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="headingOne">
                        <span class="icofont icofont-teacher  "></span> Students
                        <i class="icofont icofont-simple-right  "></i>
                    </p>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="collapseOne" data-parent="#accordion">
                    <ul>
                        <li>
                            <a class=" " href="<?php echo base_url(); ?>student/view-all-running-student">View Student</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main_menu_item">
                <div id="headingFour">
                    <p class="collapsed menu_toggle " data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span class="icofont icofont-users-social "></span> Batches
                        <i class="icofont icofont-simple-right "></i>
                    </p>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <ul>
                        <li>
                            <a class=" " href="<?php echo base_url(); ?>batch/new-batch">Add Batch</a>
                        </li>
                        <li>
                            <a class=" " href="<?php echo base_url(); ?>batch/view-runnig-batch-list">Running Batch</a>
                        </li>
                        <li>
                            <a class=" " href="<?php echo base_url(); ?>batch/view-end-batch-list">End Batch</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main_menu_item">
                <div id="headingFive">
                    <p class="collapsed menu_toggle " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <span class="icofont icofont-contact-add "></span> Attendance
                        <i class="icofont icofont-simple-right "></i>
                    </p>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <ul>
                        <li>
                            <a class=" " href="<?= base_url(); ?>attendance/add-attendance">Add Attendance</a>
                        </li>
                        <li>
                            <a class=" " href="<?= base_url(); ?>attendance/view-attendance">View Attendance</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main_menu_item">
                <div id="headingSix">
                    <p class="collapsed menu_toggle " data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <span class="icofont icofont-pay "></span> Payment
                        <i class="icofont icofont-simple-right "></i>
                    </p>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                    <ul>
                        <li>
                            <a class=" " href="<?= base_url(); ?>payment/new-payment">Add Payment</a>
                        </li>
                        <li>
                            <a class=" " href="<?= base_url(); ?>payment/view-payment-list">View Payment</a>
                        </li>
                        <li>
                            <a class=" " href="<?= base_url(); ?>payment/view-payment-total">Total Payment</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php 
                if($this->users->_is_admin()):
            ?>
            <div class="main_menu_item">
                <div id="headingSeven">
                    <p class="collapsed menu_toggle " data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <span class="icofont icofont-police "></span> User
                        <i class="icofont icofont-simple-right "></i>
                    </p>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                    <ul>
                        <li>
                            <a class=" " href="<?= base_url(); ?>users/new-user">Add User</a>
                        </li>
                        <li>
                            <a class=" " href="<?= base_url(); ?>users/all-user">View User</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
                endif;
            ?>
            <div class="main_menu_item">
                <a href="<?php echo base_url(); ?>users/edit-user-pass/<?php echo $this->session->userdata('ta_current_id'); ?>" class="non_active ">
                    <p class="menu_toggle non_active ">
                        <span class="icofont icofont-settings"></span> Setting 
                    </p>
                </a>
            </div>
            <div class="main_menu_item">
                <a href="<?php echo base_url(); ?>users/security-logout" class="non_active ">
                    <p class="menu_toggle non_active ">
                        <span class="icofont icofont-logout"></span> Logout 
                    </p>
                </a>
            </div>
        </div>