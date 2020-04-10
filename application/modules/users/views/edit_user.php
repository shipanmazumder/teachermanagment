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
                      echo '<div class="alert alert-danger" role="alert">'.$errorlogin.'</div>';elseif (isset($success)) 
                      echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
                    ?>
                        <?php
                         if($user_info):
                            foreach ($user_info as $value): 
                                echo form_open('users/edit-user-pass-check/'.$value->user_id);
                        ?>
                        <div class="container">
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