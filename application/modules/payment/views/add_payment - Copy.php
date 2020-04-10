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
                    <?php echo form_open('payment/add-payment-data'); ?>
                                <div class="container">
                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-12">
                                            <label for="batch_start_date">Batch ID:</label>
                                        </div>
                                        <div class="col-lg-10 col-md-12">
                                            <select class="custom-select" name="batch_id" id="add_pay_batch_id">
                                                <option value="" selected>Select Batch ID</option>
                                                <?php
                                                    if(isset($allbatch)):
                                                        foreach($allbatch as $batch_value):
                                                ?>
                                                <option value="<?= $batch_value->batchid; ?>"><?= $batch_value->batch_id; ?></option>
                                                <?php
                                                        endforeach;
                                                    endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-12">
                                            <label for="payment_st_id">Student ID:</label>
                                        </div>
                                        <div class="col-lg-10 col-md-12">
                                            <select class="custom-select curser_disable" disabled name="payment_st_id" id="payment_st_id">
                                                <option value="" selected>Select Batch Id First</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-12">
                                            <label for="st_name">Student Name :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-12">
                                            <input type="text" name="st_name" value="" class="input_field form-control curser_disable" id="st_name"  placeholder="Student Name"
                                                required="required" readonly="readonly"/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-12">
                                            <label for="pay_date">Date :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-12">
                                            <input type="text" name="pay_date" value="<?= date('d-m-Y'); ?>" class="input_field form-control curser_disable" id="pay_date"  placeholder="current date auto" readonly="readonly"/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-12">
                                            <label>Select Month:</label>
                                        </div>
                                        <div class="col-lg-10 col-md-12">
                                            <select class="custom-select" name="pay_month" id="pay_month">
                                                <option value="" selected>Select Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-2 col-md-12">
                                            <label for="pay">Taka :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-12">
                                            <input type="number" name="pay" value="" class="input_field form-control" id="pay"  placeholder="Taka"
                                                required="required" />
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