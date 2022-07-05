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
            $user = new stdClass();
            $user->user_id = null;
            $user->username = null;
            $user->password = null;
            $user->user_namalengkap = null;
            $user->user_level = null;
            $data = array (
                'page' => 'add',
                'row' => $user,
            );
            $data ['halaman'] = 'Tambah Data Master User';

            //validation

         
                $this->template->load('template/template_backend','user/user_form', $data);
        
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
        $query = $this->user_m->get($id);




        if($query->num_rows() > 0){
            $user = $query->row();
            $data = array (
                'page' => 'edit',
                'row' => $user,
            );
            $data ['halaman'] = 'Edit Data Master User';
            $this->template->load('template/template_backend','user/user_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('user')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $user = new stdClass();
            $user->user_id = null;
            $user->username = null;
            $user->password = null;
            $user->user_namalengkap = null;
            $user->user_level = null;
            $data = array (
                'page' => 'add',
                'row' => $user,
            );
            $data ['halaman'] = 'Tambah Data Master User';
            $this->form_validation->set_rules('username','Username','required|is_unique[user.username]',
            array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti')
            );
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_rules('user_namalengkap','Nama Lengkap','required');
            $this->form_validation->set_rules('user_level','Level','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_message('min_length', '%s minimal berisi 5 karakter');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','user/user_form', $data);
            }
            else
            {
                $this->user_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('user');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('username','Username','required|callback_username_check');
            if($this->input->post('password')) {
            $this->form_validation->set_rules('password','Password','min_length[5]'); }
            $this->form_validation->set_rules('user_namalengkap','Nama Lengkap','required');
            $this->form_validation->set_rules('user_level','Level','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_message('min_length', '%s minimal berisi 5 karakter');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['user_id']);
            }
            else
            {
                $this->user_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('user');
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

}

?>