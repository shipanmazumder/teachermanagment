<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    public function index()
    {
        $dd = cal_days_in_month(CAL_GREGORIAN, abs(2), 2016);
        echo $dd;

    }

}

/* End of file Test.php */
