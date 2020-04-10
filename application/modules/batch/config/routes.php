<?php
$route['batch/new-batch']                               =   'Batch/add_batch';
$route['batch/add-batch-data']                          =   'Batch/add_new_batch';
$route['batch/view-runnig-batch-list']                  =   'Batch/view_all_running_batch';
$route['batch/view-end-batch-list']                     =   'Batch/view_all_end_batch';
$route['batch/batch-details/(:num)/(:any)']             =   'Batch/batch_details/$1/$2';
$route['batch/batch-data/(:num)']                       =   'Batch/batch_data_by_id/$1';
$route['batch/edit-batch-data/(:num)']                  =   'Batch/edit_batch_data/$1';
$route['batch/delete-batch-data/(:num)']                =   'Batch/delete_batch_data/$1';