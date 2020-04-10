<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id='student_attendance_search_form'>
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
                           <div class="col-md-5">
                                <button id='batch_id_search' class="btn btn-success w-100 form-control" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <span id='search_data_success' class="text-center">Attendance Successfully!</span>
            <div id="search_data" class="col-md-12">
            </div>
        </div>
    </div>
</div>