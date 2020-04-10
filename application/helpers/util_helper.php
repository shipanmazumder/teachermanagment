<?php

/*
|=============
|	set header Cache control
|=============
*/

$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
$this->output->set_header('Pragma: no-cache');
$this->output->set_header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
if (!function_exists('get_student_attendance')) {

    function get_student_attendance($studentid,$batch_id,$uid, $year, $month, $day) {
        $ci = & get_instance();
        $field = 'day_' . abs($day);
        $ci->db->select('SA.' . $field);
        $ci->db->from('attendances AS SA');
        $ci->db->where('SA.atten_student_id', $studentid);
        $ci->db->where('SA.atten_batch_id', $batch_id);
        $ci->db->where('SA.atten_user_id', $uid);
        $ci->db->where('SA.year', $year);
        $ci->db->where('SA.month', $month);
        return @$ci->db->get()->row()->$field;
    }

}