<?php 

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        $this->data['halaman']= null;
        $this->data['js']= null;
        
    }

    public function index ()
    {
        check_not_login();
        $data['halaman']= 'Dashboard';
        $this->template->load('template/template_backend','dashboard', $data);
    }

}

?>