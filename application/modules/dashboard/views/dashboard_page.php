            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 mt-md-30">
                            <div class="dashboard_widget">
                                <div class="over_view">
                                    <span class="icofont icofont-users-social"></span>
                                    <h3>
                                    <?=
                                    @count($total_batch);
                                    ?>
                                    </h3>
                                    <p>Total Batches</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-sm-30">
                            <div class="dashboard_widget">
                                <div class="over_view">
                                    <span class="icofont icofont-group-students"></span>
                                    <h3>
                                    <?=
                                    @count($total_student);
                                    ?>
                                    </h3>
                                    <p>Total Students</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30">
                            <div class="dashboard_widget">
                                <div class="over_view">
                                    <span class="icofont icofont-read-book"></span>
                                    <h3>
                                    <?php
                                    if(@$total_payment[0]->total_pay<=0)
                                    {
                                        echo '0';
                                    }
                                    else {
                                        echo @$total_payment[0]->total_pay;
                                    }
                                    ?>
                                    </h3>
                                    <p>Monthly Payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>