<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MY_Controller {

    function __construct()
	{
		parent::__construct();
	}
    public function index()
    {
        redirect('dashboard','refresh');
        
    }

    public function truncate($table_name) {
        if($table_name=='all')
        {
            $this->db->truncate('batch');
            $this->db->truncate('payment');
            $this->db->truncate('student');
            $this->db->truncate('attendance');
        }
        else {
            $this->db->truncate($table_name);
        }
    }
    /*
    |===============
    |   backup create
    |===============
    */
    public function create_backup($type) {
        $this->load->dbutil();

        $options = array(
            'format' => 'txt', // gzip, zip, txt
            'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
            'add_insert' => TRUE, // Whether to add INSERT data to backup file
            'newline' => "\n"               // Newline character used in backup file
        );
        if ($type == 'all') {
            $tables = array('');
            $file_name = 'system_backup';
        } else {
            $tables = array('tables' => array($type));
            $file_name = 'backup_' . $type;
        }
        if($type=='all' || $this->db->table_exists($type))
        {
            $backup = & $this->dbutil->backup(array_merge($options, $tables));
            write_file('uploads/backup/'.$file_name . '.sql', $backup);

            $this->load->helper('download');
            force_download($file_name . '.sql', $backup);
            redirect('dashboard','refresh');
        }
        else 
        {
            redirect('errors/not-found','refresh');
        }
    }
     /*
    |===============
    |   backup restore
    |===============
    */
    public function restore_backup($file_name) {
        $filePath = './uploads/backup/'.$file_name.'.sql';
        if(file_exists($filePath))
        {
            if($this->restoreDatabaseTables($filePath))
            {
                return true;
            }
        }
        else 
        {
                
            redirect('errors/not-found','refresh');
        }
    }

    public function restoreDatabaseTables($filePath){
        // Temporary variable, used to store current query
        $templine = '';
        
        // Read in entire file
        $lines = file($filePath);
        
        $error = '';
        
        // Loop through each line
        foreach ($lines as $line){
            // Skip it if it's a comment
            if(substr($line, 0, 2) == '--' || $line == ''){
                continue;
            }
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';'){
                // Perform the query
                if(!$this->db->query($templine)){
                    $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $error . '<br /><br />';
                }
                // Reset temp variable to empty
                $templine = '';
            }
        }
        return !empty($error)?$error:true;
    }

}

/* Location: ./application/modules/install/controllers/Install.php */
