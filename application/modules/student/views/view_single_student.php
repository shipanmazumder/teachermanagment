<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col std_details">
                <?php
                    if(isset($singleview)):
                        foreach ($singleview as $st_value):
                ?>
                <p><span>Name :</span> <?= $st_value->student_name; ?></p>
                <p><span>Student ID :</span> <?= $st_value->student_id; ?></p>
                <p><span>Batch ID :</span> <?= $st_value->batch_id; ?></p>
                <p><span>Mobile :</span> <?= $st_value->student_mobile; ?></p>
                <p><span>Start Date :</span> <?= formatdate($st_value->create_date); ?></p>
                <?php if($st_value->education!=''): ?>
                <p><span>Educational Institute :</span> <?= $st_value->education; ?></p>
                <?php endif; ?>
                <?php if($st_value->department!=''): ?>
                <p><span>Department :</span> <?= $st_value->department; ?></p>
                <?php endif; ?>
                <?php if($st_value->class!=''): ?>
                <p><span>Class/Year :</span> <?= $st_value->class; ?></p>
                <?php endif; ?>
                <?php if($st_value->blood_group!=''): ?>
                <p><span>Blood Group :</span> <?= $st_value->blood_group; ?></p>
                <?php endif; ?>
                <p><span>Activity :</span> <?= $st_value->activity; ?></p>
                <?php if($st_value->address!=''): ?>
                <p><span>Address :</span> <?= $st_value->address; ?></p>
                <?php endif; ?>
                <?php
                        endforeach;
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <table id="students_table" class="table students_table mt-x" style="width: 100%">
                    <thead>
                        <tr class="data_row">
                            <td>#</td>
                            <td>Payment Date</td>
                            <td>Payment Month</td>
                            <td>Taka</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($student_payment)):
                            foreach($student_payment as $key=>$student_payment_value):
                    ?>
                        <tr class="data_row">
                            <td><?= ++$key; ?></td>
                            <td><?= formatdate($student_payment_value->pay_date); ?></td>
                            <td>
                                <?php
                                $temp=substr($student_payment_value->pay_month,2);
                                    echo date("F", mktime(0, 0, 0, $temp));
                                ?>
                            </td>
                            <td><?= $student_payment_value->pay; ?></td>
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