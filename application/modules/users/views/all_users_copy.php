<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <?php
                if(isset($alluserlist)):
                    foreach ($alluserlist as $user_data):
            ?>
            <div class="col-lg-4 col-md-6">
                    <div class="course_single_item dashboard_widget">
                        <a class="edit_profile_btn" href="<?php echo base_url();?>users/edit-user/<?= $user_data->user_id ?>"><span class="icofont icofont-pen-alt-4"></span></a>
                        <h5><?= $user_data->name; ?></h5>
                        <p>User Name: <span><?= $user_data->user_name; ?></span></p>
                        <p>Mobile : <span><?= $user_data->user_mobile ?></span></p>
                        <?php
                            if($user_data->email!=''):
                        ?>
                        <p>Email : <span><?= $user_data->email; ?></span></p>
                        <?php
                            endif;
                        ?>
                        <?php
                            if($user_data->address!=''):
                        ?>
                        <p>Address : <span><?= $user_data->address; ?></span></p>
                        <?php
                            endif;
                        ?>
                        <hr>
                        <p>Status : <span><?= ucfirst($user_data->status); ?></span></p>
                    </div>
            </div>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>
</div>