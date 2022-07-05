<?php

    function check_already_login() {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('user_id');
        if($user_session) {
            redirect('dashboard');
        }
    }

    function check_not_login() {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('user_id');
        if(!$user_session) {
            redirect('Auth');
        }
    }

    function check_admin () {
        $ci =& get_instance();  
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->user_level != 1){
            redirect('halerror/error_403');
        }
    }

    function check_jemaat () {
        $ci =& get_instance();  
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->user_level == 3){
            redirect('halerror/error_403');
        }
    }

    function check_inventaris () {
        $ci =& get_instance();  
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->user_level == 2){
            redirect('halerror/error_403');
        }
    }

?>