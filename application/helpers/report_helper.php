<?php

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('get_student_monthly_attendance')) {

    function get_student_monthly_attendance($atten_student_id, $year, $month, $days,$user_id) {

        $fields = '';

        for ($i = 1; $i <= $days; $i++) {
            if ($i == $days) {
                $fields .= 'SA.day_' . $i;
            } else {
                $fields .= 'SA.day_' . $i . ',';
            }
        }

        $ci = & get_instance();
        $ci->db->select($fields);
        $ci->db->from('attendances AS SA');
        $ci->db->where('SA.atten_student_id', $atten_student_id);
        $ci->db->where('SA.year', $year);
        $ci->db->where('SA.month', $month);
        $ci->db->where('SA.atten_user_id', $user_id);
        return $ci->db->get()->row();
    }

}
