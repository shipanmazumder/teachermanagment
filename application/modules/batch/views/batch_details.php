            <div class="wrapper">
                <div class="container-fluid bg-dark pt-3 mb-4 text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-light mb-3">Batch ID : <?= @$batchtdata[0]->batch_id; ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-light mb-3">Start Date : <?= formatdate(@$batchtdata[0]->start_date); ?></p>
                        </div>
                        <div class="col-md-4">
                        <?php if(@$indicator=='running'): ?>
                            <p><a href="<?= base_url(); ?>batch/batch-data/<?= $batchtdata[0]->batchid; ?>" class="text-warning mb-3 d-inline-block"><i class="icofont icofont-edit"></i> Edit Batch Info</a></p>
                        <?php elseif(@$indicator=='end'): ?>
                            <p><a onclick='return confirm("Are you sure to delete this?");' href="<?= base_url(); ?>batch/delete-batch-data/<?= $batchtdata[0]->batchid; ?>" class="text-warning mb-3 d-inline-block"><i class="icofont icofont-ui_delete"></i> Delete Batch</a></p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    if(@$indicator=='running'):
                ?>
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <a href="<?php echo base_url(); ?>student/new-student/<?= @$batchtdata[0]->batchid; ?>/<?= @$batchtdata[0]->batch_id; ?>" class="btn btn-success"><i class="icofont icofont-plus"></i> Add New Student</a>
                        </div>
                    </div>
                </div>
                <?php
                    endif;
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="students_table" class="table students_table mt-x" style="width: 100%">
                                <thead>
                                    <tr class="data_row">
                                        <td>#</td>
                                        <td>Student ID</td>
                                        <td>Name</td>
                                        <td>Phone</td>
                                        <td>Activity</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($all_student_by_batch)):
                                            foreach($all_student_by_batch as $key=>$student_value):
                                    ?>
                                    <tr class="data_row">
                                        <td><?= ++$key; ?></td>
                                        <td><?= $student_value->student_id; ?></td>
                                        <td><a href="<?= base_url(); ?>student/view-single-student/<?= $student_value->studentid;?>" class="text-info"><?= $student_value->student_name; ?></a></td>
                                        <td><?= $student_value->student_mobile; ?></td>
                                        <td><?= $student_value->activity; ?></td>
                                        <?php if(@$indicator=='running'): ?>
                                        <td><a href="<?= base_url(); ?>student/edit-student-by-id/<?= $student_value->studentid;?>/batch" class="text-info">Edit</a></td>
                                        <?php endif; ?>
                                        <?php if(@$indicator!='running'): ?>
                                        <td><a onclick='return confirm("Are you sure to delete this?");' href="<?= base_url(); ?>student/delete-student-data/<?= $student_value->studentid;?>/<?= $student_value->st_batch_id;?>/end-batch" class="text-danger">Delete</a></td>
                                        <?php endif; ?>
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