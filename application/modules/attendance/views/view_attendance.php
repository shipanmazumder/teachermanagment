<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id='student_attendance_search'>
                    <div class="row form-group">
                        <div class="col-lg-4 col-md-12 mb-md-16">
                         <select class="custom-select" name="batch_id" required="" id="batch_id">
                            <option value="" selected="selected">Select Batch Id</option>
                            <?php
                                if(isset($all_batch)):
                                    foreach($all_batch as $b_value):
                                        ?>
                                        <option value="<?= $b_value->batchid ?>"><?= $b_value->batch_id; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                            ?>
                        </select>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-16">
                            <select class="custom-select" name="atten_month" id="atten_month">
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

                        <div class="col-lg-4 col-md-12 mb-md-16">
                           <div class="col-md-5">
                                <button id='attendance__search' class="btn btn-success w-100 form-control" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div id="search_data" class="col-md-12">
            </div>
        </div>
    </div>
</div>