<?php
$route['student/new-student/(:num)/(:any)']         =   'Student/add_student/$1/$2';
$route['student/add-student-data/(:num)/(:any)']    =   'Student/add_student_data_check/$1/$2';
$route['student/view-all-student-by-batch/(:num)']  =   'Student/view_all_student_by_batch/$1';
$route['student/view-all-running-student']          =   'Student/view_all_running_student';
$route['student/view-single-student/(:num)']        =   'Student/view_single_student/$1';
$route['student/edit-student-by-id/(:num)/(:any)']  =   'Student/edit_student_by_id/$1/$2';
$route["student/edit-student-data/(:any)/(:any)"]   =   'Student/edit_student_data_check/$1/$2';
$route["student/delete-student-data/(:num)/(:num)/(:any)"]        =   'Student/delete_student_by_id/$1/$2/$3';
