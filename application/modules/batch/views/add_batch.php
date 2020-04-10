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
                    elseif (isset($success)) 
                      echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
                    ?>
                    <?php echo form_open('batch/add-batch-data'); ?>
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_id">Batch ID :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input readonly type="text" name="batch_id" value="<?= @$batch_id; ?>" class="input_field form-control curser_disable" id="batch_id"  placeholder="Batch Id(Unique)"
                                        required="required" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_start_date">Start Date :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="date" name="start_date" value="<?= date('Y-m-y'); ?>" class="input_field form-control" id="datefield" required="required"
                                    />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                   Day :
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <div class="row">
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Sat" > Saturday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Sun" > Sunday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Mon" > Monday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Tue" > Tuesday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Wed" > Wednesday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Thu" > Thursday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input type="checkbox" name="batch_day[]" id="batch_day" required class="batch_day"  value="Fri" > Friday</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_start_date">Time:</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="time"  name="batch_time"  class="input_field form-control "  value="<?php date_default_timezone_set('Asia/Dhaka'); echo date('g:i'); ?>" id="batch_time"  required="required" />
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
                    <?php echo form_close();; ?>
                </div>
            </div>
        </div>
    </div>
</div>