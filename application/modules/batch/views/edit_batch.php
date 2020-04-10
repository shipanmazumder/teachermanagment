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
                    <?php
                      if ($batchtdata):
                          foreach ($batchtdata as $batch_value):
                            $batch_day=explode(',',$batch_value->batch_day);
                            
                     ?>
                    <?php echo form_open('batch/edit-batch-data/'.$batch_value->batchid); ?>
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_id">Batch ID :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="text" name="batch_id" disabled value="<?= $batch_value->batch_id; ?>" class="input_field form-control" id="batch_id"  placeholder="Batch Id(Unique)"
                                        required="required" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_start_date">Start Date :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="date" name="start_date" value="<?= $batch_value->start_date; ?>" class="input_field form-control" id="datefield" required="required"
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
                                            <label><input 
                                            <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Sat') echo 'checked' ;
                                                endforeach;
                                            ?> 
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Sat" > Saturday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input 
                                             <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Sun') echo 'checked' ;
                                                endforeach;
                                            ?>  
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Sun" > Sunday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input 
                                             <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Mon') echo 'checked' ;
                                                endforeach;
                                            ?> 
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Mon" > Monday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input 
                                             <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Tue') echo 'checked' ;
                                                endforeach;
                                            ?> 
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Tue" > Tuesday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input 
                                             <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Wed') echo 'checked' ;
                                                endforeach;
                                            ?> 
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Wed" > Wednesday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input 
                                             <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Thu') echo 'checked' ;
                                                endforeach;
                                            ?> 
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Thu" > Thursday</label>
                                        </div>
                                        <div class="col-6 col-md-2 checkbox">
                                            <label><input 
                                             <?php 
                                                foreach($batch_day as $key=>$value):
                                                if($value=='Fri') echo 'checked' ;
                                                endforeach;
                                            ?>  
                                            type="checkbox" name="batch_day[]" id="batch_day[]" class="batch_day" value="Fri" > Friday</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_start_date">Time:</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="time" name="batch_time"  value="<?= $batch_value->batch_time; ?>"  class="input_field form-control " id="batch_time" required="required" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="batch_start_date">Status:</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <select class="custom-select" name="batch_status" id="batch_status">
                                        <option <?php if($batch_value->batch_status=='Running') echo 'selected'; ?> value="Running">Running</option>
                                        <option <?php if($batch_value->batch_status=='End') echo 'selected'; ?> value="End">End</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group justify-content-lg-end justify-content-center mt-4">
                                <div class="col-md-5">
                                    <input class="btn btn-success w-100 form-control" type="submit" name="submit" value="Submit">
                                </div>
                                <div class="col-md-5">
                                   
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <?php
                          endforeach;
                        endif;
                     ?>
                </div>
            </div>
        </div>
    </div>
</div>
