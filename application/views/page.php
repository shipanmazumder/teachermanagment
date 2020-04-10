<?php
    $this->load->module('users');
    $this->load->module('nav'); 
?>
<?php $this->load->view('includes/header_page'); ?>
<div class="main_menu main_menu_hidden">
    <!--load sidebar page -->
    <?php
        $this->load->view('includes/sidebar_page');
    ?>
</div>
<div class="main_wrapper main_wrapper_full">
    <!-- load nav page -->
    <?php
         /*
        |==============
        |   nav load
        |==============
        */ 
        echo modules::run('nav'); 
    ?>
    <!--load content page -->
    <div class="mainMinContent">
    <?php
        /*
        |==============
        |	maincontent load
        |==============
        */
        if(isset($main_content)):
            $this->load->view($main_content);
        endif;
      ?>
    </div>
     <div class="footer">
         <div class="row no-gutters">
             <div class="col-md-6 text-md-left text-sm-center text-center">
                 <p>&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
             </div>
             <div class="col-md-6 text-md-right text-sm-center text-center">
                <p>Powered By:<a class="font-weight-bold" target="_blank" href="http://doelcampus.com/"> <span class="text-danger">Doel</span>Campus</a></p>
             </div>
         </div>
    </div>
</div>
<?php $this->load->view('includes/footer_page'); ?>