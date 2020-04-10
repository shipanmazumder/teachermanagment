<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table id="students_table" class="table students_table mt-x" style="width: 100%">
                    <thead>
                        <tr class="data_row">
                            <td>#</td>
                            <td>Batch ID</td>
                            <td>Day</td>
                            <td>Time</td>
                            <td>Student</td>
                            <td>Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($view_all_running_batch)):
                                $i=1;
                                foreach($view_all_running_batch as $key=>$batch_value):
                        ?>
                        <tr class="data_row">
                            <td><?= $i++; ?></td>
                            <td><?= $batch_value->batch_id; ?></td>
                            <td><?= $batch_value->batch_day; ?></td>
                            <td><?= formattime($batch_value->batch_time); ?></td>
                            <td><span class="total_b_count"><?= $student_count_by_batch[$key]; ?></span></td>
                            <td><a href="<?= base_url(); ?>batch/batch-details/<?= $batch_value->batchid; ?>/running">Details</a></td>
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