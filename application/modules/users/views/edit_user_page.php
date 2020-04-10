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
                        <?php
                         if($user_info):
                            foreach ($user_info as $value): 
                                echo form_open('users/edit-user-data/'.$value->user_id);
                        ?>
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
                                            'value'         =>$value->name,
                                            'required'      =>'required'
                                        );
                                        echo form_input($fullname);;
                                   ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="user_email">Email :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <?php
                                        $user_email=array(
                                            'name'          =>'user_email',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'user_email',
                                            'placeholder'   =>'Email',
                                            'type'          =>'email',
                                            'value'         =>$value->email,
                                        );
                                        echo form_input($user_email);
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
                                            'value'         =>$value->user_mobile,
                                            'required'      =>'required'
                                        );
                                        echo form_input($user_mobile);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="u_name"> User Name :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <?php
                                        $admin_u_name=array(
                                            'name'          =>'u_name',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'u_name',
                                            'placeholder'   =>'User Name',
                                            'value'         =>$value->user_name,
                                            'required'      =>'required'
                                        );
                                        echo form_input($admin_u_name);;
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="password"> Password :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <?php
                                        $pass=array(
                                            'name'          =>'password',
                                            'class'         =>'input_field form-control',
                                            'id'            =>'password',
                                            'placeholder'   =>'Password',
                                            'type'   =>'password'
                                        );
                                        echo form_input($pass);
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
                                            'value'         =>$value->role,
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
                                            'value'         =>  $value->address,
                                            'cols'          =>  '30',
                                            'rows'          =>  '5',
                                        );
                                        echo form_textarea($attr);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_id">User Status :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <?php
                                        $options = array(
                                                 ''             =>"Select User Status",
                                                'active'         => 'Active',
                                                'closed'       => 'Closed',
                                        );

                                        $custom_class=array(
                                            'required'=>'required',
                                            'class' =>'custom-select'
                                        );
                                        $selected = array($value->status=>$value->status);
                                        echo form_dropdown('status', $options,$selected, $custom_class);
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group justify-content-lg-end justify-content-center mt-4">
                                <div class="col-md-5">
                                    <input class="btn btn-success w-100 form-control" type="submit" name="submit" value="Update">
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>
                        </div>
                        <?php
                                echo form_close();
                            endforeach;
                        endif;
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>