
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table id="students_table" class="table students_table mt-x" style="width: 100%">
                    <thead>
                        <tr class="data_row">
                            <td>#</td>
                            <td>Name</td>
                            <td>User Name</td>
                            <td>Mobile</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Activity</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($alluserlist)):
                                foreach ($alluserlist as $key =>$user_data):
                        ?>
                        <tr class="data_row">
                            <td><?= ++$key; ?></td>
                            <td><?= $user_data->name; ?></td>
                            <td><?= $user_data->user_name; ?></td>
                            <td><?= $user_data->user_mobile ?></td>
                            <td><?= $user_data->email; ?></td>
                            <td><?= $user_data->address; ?></td>
                            <td><?= ucfirst($user_data->status); ?></td>
                            <td><a class="edit_profile_btn" href="<?php echo base_url();?>users/edit-user/<?= $user_data->user_id ?>"><span class="icofont icofont-pen-alt-4"></span></a></td>
                        </tr>
                        <?php
                                endforeach;
                            endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>