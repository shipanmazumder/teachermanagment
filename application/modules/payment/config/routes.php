<?php
$route['payment/new-payment']                               =   'Payment/add_payment';
$route['payment/add-payment-data']                          =   'Payment/add_new_payment';
$route['payment/view-payment-list']                         =   'Payment/view_all_payment';
$route['payment/view-payment-total']                        =   'Payment/view_total_payment';
$route['payment/payment-data/(:num)']                       =   'Payment/payment_data_by_id/$1';
$route['payment/edit-payment-data/(:num)']                  =   'Payment/edit_payment_data/$1';
$route['payment/delete-payment-data/(:num)']                =   'Payment/delete_payment_data/$1';