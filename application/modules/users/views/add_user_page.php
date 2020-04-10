<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="info_form mt-5">
                   <?php 
                    if(validation_errors())
                    {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    elseif (isset($errorlogin)) 
                      echo '<div class="alert alert-danger" role="alert">'.$errorlogin.'</div>';
                    ?>
                    <?php echo form_open_multipart('users/new-user-data');?>
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="full_name">Full Name :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                   <?php
                                        $fullname=array(
                                            'name'          =>'full_name',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'full_name',
                                            'placeholder'   =>'Full Name',
                                            'required'      =>'required'
                                        );
                                        echo form_input($fullname);;
                                   ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="user_email">Mobile :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <!-- <input class="input_field form-control" type="email" name="admin_email" id="admin_email" placeholder="Email"> -->
                                    <?php
                                        $user_mobile=array(
                                            'name'          =>'user_mobile',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'user_mobile',
                                            'placeholder'   =>'Mobile Number',
                                            'type'          =>'tel',
                                            'required'      =>'required'
                                        );
                                        echo form_input($user_mobile);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="user_email">Email :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <!-- <input class="input_field form-control" type="email" name="admin_email" id="admin_email" placeholder="Email"> -->
                                    <?php
                                        $admin_email=array(
                                            'name'          =>'user_email',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'user_email',
                                            'placeholder'   =>'Email',
                                            'type'          =>'email',
                                        );
                                        echo form_input($admin_email);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="admin_u_name"> User Name :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <?php
                                        $admin_u_name=array(
                                            'name'          =>'u_name',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'u_name',
                                            'placeholder'   =>'User Name',
                                            'required'      =>'required'
                                        );
                                        echo form_input($admin_u_name);;
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="password">Password :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                     <?php
                                        $admin_password=array(
                                            'name'          =>'password',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'password',
                                            'placeholder'   =>'Password',
                                            'required'      =>'required'
                                        );
                                        echo form_password($admin_password);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_id">User Role :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <?php
                                        $admin_role=array(
                                            'name'          =>'role',
                                            'class'         =>'input_field form-control curser_disable',
                                            'value'         =>'user',
                                            'readonly'      =>'readonly',
                                            'required'      =>'required'
                                        );
                                        echo form_input($admin_role);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="address"> Address :</label>
                                </div>
                                <div class="col-md-10">
                                    <?php
                                        $attr=array(
                                            'class'         =>  'input_field form-control',
                                            'name'          =>  'address',
                                            'id'            =>  'address',
                                            'required'      =>  'required',
                                            'placeholder'   =>  'Address',
                                            'cols'          =>  '30',
                                            'rows'          =>  '5',
                                        );
                                        echo form_textarea($attr);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group justify-content-lg-end justify-content-center mt-4">
                                <div class="col-md-5">
                                    <input class="btn btn-success w-100 form-control" type="submit" name="submit" value="Submit">
                                </div>
                                <div class="col-md-5">
                                    <input class="btn btn-danger w-100 form-control" type="reset" name="reset" value="Reset">
                                </div>
                            </div>
                        </div>
                    <?php
                        echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>