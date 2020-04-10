<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="info_form mt-x">
                    <?php 
                    if(validation_errors())
                    {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    elseif (isset($errorlogin)) 
                      echo '<div class="alert alert-danger" role="alert">'.$errorlogin.'</div>';
                    ?>
                    <?php
                        if(isset($singleview)):
                            foreach ($singleview as $st_value):
                    ?>
                    <?php echo form_open('student/edit-student-data/'.$st_value->studentid.'/'.$st_value->batchid.'/'.@$indicator); ?>
                        <div class="container">
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="student_id">Student ID :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="text" name="student_id" value="<?= $st_value->student_id; ?>" class="input_field form-control curser_disable" readonly id="student_id"  placeholder="Student ID"
                                        required="required" />
                                    <input type="hidden" name="batch_id" value="<?= $st_value->batchid; ?>" class="input_field form-control" id="std_id"  placeholder="Student ID" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="student_name">Name :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="text" name="student_name" value="<?= $st_value->student_name; ?>" class="input_field form-control" id="student_name"  placeholder="Student Name(Required)"
                                        required="required" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="student_mobile">Student Mobile :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input min="11" max="15" name="student_mobile" value="<?= $st_value->student_mobile; ?>" class="input_field form-control" id="student_mobile" placeholder="Student Mobile Number(Required)" required="required" type="tel">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="education">Educational Institute:</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="text" name="education" value="<?= $st_value->education; ?>" class="input_field form-control" id="education"  placeholder="Education(Optional)" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="department">Department :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="text" name="department" value="<?= $st_value->department; ?>" class="input_field form-control" id="department"  placeholder="Department(Optional)" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="class">Class/Year :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input type="text" name="class" value="<?= $st_value->class; ?>" class="input_field form-control" id="class"  placeholder="Class/Year(Optional)" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="address">Address :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                <textarea name="address" class="input_field form-control"  placeholder="Address(Optional)" id="address" cols="30" rows="3"><?= $st_value->address; ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="blood_group">Blood Group :</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <select class="custom-select"  name="blood_group" id="blood_group">
                                        <option value="">Select a Blood Group</option>
                                        <option <?php if($st_value->blood_group=='A+') echo 'selected'; ?> value="A+">A+</option>
                                        <option <?php if($st_value->blood_group=='A-') echo 'selected'; ?> value="A-">A-</option>
                                        <option <?php if($st_value->blood_group=='B+') echo 'selected'; ?> value="B+">B+</option>
                                        <option <?php if($st_value->blood_group=='B-') echo 'selected'; ?> value="B-">B-</option>
                                        <option <?php if($st_value->blood_group=='AB+') echo 'selected'; ?> value="AB+">AB+</option>
                                        <option <?php if($st_value->blood_group=='AB-') echo 'selected'; ?> value="AB-">AB-</option>
                                        <option <?php if($st_value->blood_group=='O+') echo 'selected'; ?> value="O+">O+</option>
                                        <option <?php if($st_value->blood_group=='O-') echo 'selected'; ?> value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2 col-md-12">
                                    <label for="activity">Activity:</label>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <select class="custom-select"  name="activity" id="activity">
                                        <option <?php if($st_value->activity=='Active') echo 'selected'; ?> value="Active">Active</option>
                                        <option <?php if($st_value->activity=='Closed') echo 'selected'; ?> value="Closed">Closed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group justify-content-lg-end justify-content-center mt-4">
                                <div class="col-md-5">
                                    <input class="btn btn-success w-100 form-control" type="submit" name="submit" value="Submit">
                                </div>
                                <div class="col-md-5">
                                   <a onclick='return confirm("Are you sure to delete this?");' href="<?= base_url();?>student/delete-student-data/<?= $st_value->studentid;?>/<?=$st_value->batchid;?>/<?= @$indicator;?>" class="btn btn-danger w-100">Delete</a>
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