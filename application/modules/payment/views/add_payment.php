<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id='student_payment_form'>
                    <div class="row form-group">
                        <div class="col-lg-4 col-md-12 mb-md-16">
                         <select class="custom-select" name="pay_batch_id" required="" id="pay_batch_id">
                            <option value="" selected="selected">Select Batch Id</option>
                            <?php
                                if(isset($allbatch)):
                                    foreach($allbatch as $b_value):
                                        ?>
                                        <option value="<?= $b_value->batchid ?>"><?= $b_value->batch_id; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                            ?>
                        </select>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-16">
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
                        <div class="col-lg-4 col-md-12 mb-md-16">
                           <div class="col-md-5">
                                <button id='payment_batch_id_search' class="btn btn-success w-100 form-control" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <span id='search_data_success' class="text-center">Payment Successfully!</span>
            <span id='search_data_error' class="text-center">Required Field!</span>
            <div id="search_data" class="col-md-12">
            </div>
        </div>
    </div>
</div>