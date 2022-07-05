<?php 

class Halerror extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        $this->data['halaman']= null;
        $this->data['js']= null;
        
    }

    public function error_403()
    {
        $data['halaman'] = NULL ;
        check_not_login();
        $this->template->load('template/template_backend','error-403',$data);
    }

}

?>