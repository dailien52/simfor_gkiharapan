<?php

class Auth extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        
    }


    public function index()
    {
        check_already_login();
        $this->load->view('login');
    }
        


    public function login_proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'user_id' => $row->user_id,
                    'user_level' => $row->user_level
                );
                $this->session->set_userdata($params);
                echo "<script>
                    window.location ='".site_url('dashboard')."';
                </script>";
            } else {
                echo "<script>
                    alert('Login Gagal');
                    window.location ='".site_url('auth')."';
                </script>";
            }
        }
    }

    public function logout ()
    {
        $params = array ('user_id', 'level');
        $this->session->unset_userdata($params);
        redirect('Auth');
    }


}

?>