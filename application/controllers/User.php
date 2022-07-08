<?php 

class User extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m',);
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->user_m->get();
        $data ['halaman'] = 'Data Master User';
        $this->template->load('template/template_backend','user/user_data', $data);
    }

    public function add ()
    {
        $data = array(
            'button' => 'Add',
            'action' => site_url('user/add_action'),
	    'user_id' => set_value('user_id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'user_namalengkap' => set_value('user_namalengkap'),
	    'user_foto' => set_value('user_foto'),
	    'user_level' => set_value('user_level'),
	        );
            $data ['halaman'] = 'Tambah Data Master User';

            //validation
                $this->template->load('template/template_backend','user/user_form', $data);
        
    }

    // public function add_action() 
    // {

    //     $config['upload_path']          = './assets/uploads/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size']             = 10000;
    //     $config['max_width']            = 10000;
    //     $config['max_height']           = 10000;

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload('user_foto'))
    //     {
            
    //         echo "Gagal Tambah Gambar";

    //     }
    //     else
    //     {
    //         $user_foto = $this->upload->data();
    //         $user_foto= $user_foto['file_name'];
    //         $username = $this->input->post('username', TRUE);
    //         $password = $this->input->post('password', TRUE);
    //         $user_namalengkap = $this->input->post('user_namalengkap', TRUE);
    //         $user_level = $this->input->post('user_level', TRUE);

    //         $data = array (
    //             'username' => $username,
    //             'password' => $password,
    //             'user_namalengkap' => $user_namalengkap,
    //             'user_level' => $user_level,
    //             'user_foto' => $user_foto,
    //         );
    //         $this->user_m->add($data);
    //         $this->session->set_flashdata('message', 'Tambah Data Berhasil');
    //         redirect('user');

    //     }

    // }

    public function add_action() 
    {
        $this->_rules_add();
   
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
           $config['upload_path']          = './assets/uploads/';
           $config['allowed_types']        = 'gif|jpg|png';
           $config['max_size']             = 10000;
           $config['max_width']            = 10000;
           $config['max_height']           = 10000;
   
           $this->load->library('upload', $config);
   
           if ( ! $this->upload->do_upload('user_foto'))
           {
               
               echo "Gagal Tambah Gambar";
   
           }
           else
           {
               $user_foto = $this->upload->data();
               $user_foto= $user_foto['file_name'];
               $username = $this->input->post('username', TRUE);
               $password = md5($this->input->post('password', TRUE));
               $user_namalengkap = $this->input->post('user_namalengkap', TRUE);
               $user_level = $this->input->post('user_level', TRUE);
   
               $data = array (
                   'username' => $username,
                   'password' => $password,
                   'user_namalengkap' => $user_namalengkap,
                   'user_level' => $user_level,
                   'user_foto' => $user_foto,
               );
               $this->user_m->add($data);
               $this->session->set_flashdata('message', 'Tambah Data Berhasil');
               redirect('user');
   
           }
        }
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check','{field} ini sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function edit($id)
    {
        $row = $this->user_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/edit_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'user_namalengkap' => set_value('user_namalengkap', $row->user_namalengkap),
		'user_foto' => set_value('user_foto', $row->user_foto),
		'user_level' => set_value('user_level', $row->user_level),
	    );
            $data ['halaman'] = 'Edit Data Master User';
            $this->template->load('template/template_backend','user/user_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('user')."';</script>";

        }
    }

    // public function edit_action() 
    // {
    //     $this->_rules_edit();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->edit($this->input->post('user_id', TRUE));
    //     } else {
    //         $data = array(
	// 	'username' => $this->input->post('username',TRUE),
	// 	'password' => md5($this->input->post('password',TRUE)),
	// 	'user_namalengkap' => $this->input->post('user_namalengkap',TRUE),
	// 	'user_foto' => $this->input->post('user_foto',TRUE),
	// 	'user_level' => $this->input->post('user_level',TRUE),
	//     );

    //         $this->user_m->edit($this->input->post('user_id', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('user'));
    //     }
    // }    

    // public function edit_action() 
    // {
    //     $user_id = $this->input->post('user_id');
    //     $config['upload_path']          = './assets/uploads/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size']             = 10000;
    //     $config['max_width']            = 10000;
    //     $config['max_height']           = 10000;

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload('user_foto'))
    //     {
            
    //         $username = $this->input->post('username', TRUE);
    //         $password = $this->input->post('password', TRUE);
    //         $user_namalengkap = $this->input->post('user_namalengkap', TRUE);
    //         $user_level = $this->input->post('user_level', TRUE);

    //         $data = array (
    //             'username' => $username,
    //             'password' => $password,
    //             'user_namalengkap' => $user_namalengkap,
    //             'user_level' => $user_level,
    //         );
    //         $this->user_m->edit($data);
    //         $this->session->set_flashdata('message', 'Tambah Data Berhasil');
    //         redirect('user');

            

    //     }
    //     else
    //     {
    //         $user_foto = $this->upload->data();
    //         $user_foto= $user_foto['file_name'];
    //         $username = $this->input->post('username', TRUE);
    //         $password = $this->input->post('password', TRUE);
    //         $user_namalengkap = $this->input->post('user_namalengkap', TRUE);
    //         $user_level = $this->input->post('user_level', TRUE);

    //         $data = array (
    //             'username' => $username,
    //             'password' => $password,
    //             'user_namalengkap' => $user_namalengkap,
    //             'user_level' => $user_level,
    //             'user_foto' => $user_foto,
    //         );
    //         $this->user_m->edit($this->input->post('user_id', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('user'));

    //     }
    // }
    
    public function edit_action() 
    {
        $this->_rules_edit();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('user_id', TRUE));
        } else {
           $user_id = $this->input->post('user_id');
       $config['upload_path']          = './assets/uploads/';
       $config['allowed_types']        = 'gif|jpg|png';
       $config['max_size']             = 10000;
       $config['max_width']            = 10000;
       $config['max_height']           = 10000;

       $this->load->library('upload', $config);

       if ( ! $this->upload->do_upload('user_foto'))
       {
           
           $username = $this->input->post('username', TRUE);
           $password = md5($this->input->post('password', TRUE));
           $user_namalengkap = $this->input->post('user_namalengkap', TRUE);
           $user_level = $this->input->post('user_level', TRUE);

           $data = array (
               'username' => $username,
               'password' => $password,
               'user_namalengkap' => $user_namalengkap,
               'user_level' => $user_level,
           );
           $this->user_m->edit($this->input->post('user_id', TRUE), $data);
           $this->session->set_flashdata('message', 'Tambah Data Berhasil');
           redirect('user');

           

       }
       else
       {
           $user_foto = $this->upload->data();
           $user_foto= $user_foto['file_name'];
           $username = $this->input->post('username', TRUE);
           $password = $this->input->post('password', TRUE);
           $user_namalengkap = $this->input->post('user_namalengkap', TRUE);
           $user_level = $this->input->post('user_level', TRUE);

           $data = array (
               'username' => $username,
               'password' => $password,
               'user_namalengkap' => $user_namalengkap,
               'user_level' => $user_level,
               'user_foto' => $user_foto,
           );
           $this->user_m->edit($this->input->post('user_id', TRUE), $data);
           $this->session->set_flashdata('message', 'Update Record Success');
           redirect(site_url('user'));

       }
    }
}

     public function delete ($id)
    {
    $this->user_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('user');

    }

    public function _rules_add() 
    {
        $this->form_validation->set_rules('username','Username','required|is_unique[user.username]',
        array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti')
        );
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('user_namalengkap','Nama Lengkap','required');
        $this->form_validation->set_rules('user_level','Level','required');

        $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
        $this->form_validation->set_message('min_length', '%s minimal berisi 5 karakter');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    }

    public function _rules_edit() 
    {
        $this->form_validation->set_rules('username','Username','required|callback_username_check');
        if($this->input->post('password')) {
            $this->form_validation->set_rules('password','Password','min_length[5]'); }

    
        $this->form_validation->set_rules('user_namalengkap','Nama Lengkap','required');
        $this->form_validation->set_rules('user_level','Level','required');

        $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
        $this->form_validation->set_message('min_length', '%s minimal berisi 5 karakter');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    }




}

?>