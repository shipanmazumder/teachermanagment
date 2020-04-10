        <!-- load nav page -->
        <nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7 col-9">
                        <div class="res_menu_toggle">
                            <i class="icofont icofont-navigation-menu"></i>
                        </div>
                        <div class="menu_off_area"></div>
                        <h4 class="d-inline page_title">
                        <?php
                            switch (@$main_content) {
                                case 'dashboard_page':
                                    echo 'Dashboard';
                                    break;
                                case 'add_user_page':
                                    echo "New User";
                                    break;
                                case 'all_users_page':
                                    echo "All User";
                                    break;
                                case 'edit_user_page':
                                    echo "Edit User";
                                    break;
                                case 'add_student':
                                    echo "New Student";
                                    break;
                                case 'view_student':
                                    echo "All Students";
                                    break;
                                case 'view_single_student':
                                    echo "Student Details";
                                    break;
                                case 'edit_student':
                                    echo "Edit Student";
                                    break;
                                case 'add_payment':
                                    echo "New Payment";
                                    break;
                                case 'view_payment':
                                    echo "View Payment";
                                    break;
                                case 'add_batch':
                                    echo "New Batch";
                                    break;
                                case 'edit_batch':
                                    echo "Edit Batch";
                                    break;
                                case 'view_course_batch':
                                    echo "View Batch";
                                    break;
                                case 'view_running_batch':
                                    echo "Running Batch";
                                    break;
                                case 'view_end_batch':
                                    echo "End Batch";
                                    break;
                                case 'batch_details':
                                    echo "Batch Details";
                                    break;
                                case 'add_attendance':
                                    echo "New Attendence";
                                    break;
                                case 'view_attendance':
                                    echo "View Attendence";
                                    break;
                                
                                default:
                                    echo 'Dashboard';
                                    break;
                            }
                        ?>
                        </h4>
                    </div>
                </div>
            </div>
        </nav>