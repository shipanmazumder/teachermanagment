<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table id="students_table" class="table students_table mt-x" style="width: 100%">
                    <thead>
                        <tr class="data_row">
                            <td>#</td>
                            <td>Student ID</td>
                            <td>Batch ID</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Activity</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($allstudent)):
                                foreach ($allstudent as $key => $student_value):
                        ?>
                        <tr class="data_row">
                            <td><?= ++$key; ?></td>
                            <td><?= $student_value->student_id; ?></td>
                            <td><?= $student_value->batch_id; ?></td>
                            <td><a href="<?= base_url(); ?>student/view-single-student/<?= $student_value->studentid;?>" class="text-info"><?= $student_value->student_name; ?></a></td>
                            <td><?= $student_value->student_mobile; ?></td>
                            <td><?= $student_value->activity; ?></td>
                            <td><a href="<?= base_url(); ?>student/edit-student-by-id/<?= $student_value->studentid;?>/student" class="text-info">Edit</a></td>
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