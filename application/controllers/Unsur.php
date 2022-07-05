<?php 

class Unsur extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model('unsur_m');
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->unsur_m->get();
        $data ['halaman'] = 'Data Master Unsur';
        $this->template->load('template/template_backend','unsur/unsur_data', $data);
    }

    public function add ()
    {
            $unsur = new stdClass();
            $unsur->unsur_id = null;
            $unsur->unsur_nama = null;
            $unsur->unsur_kode = null;
            $data = array (
                'page' => 'add',
                'row' => $unsur,
            );
            $data ['halaman'] = 'Tambah Data Master Unsur';

            //validation

         
                $this->template->load('template/template_backend','unsur/unsur_form', $data);
        
    }

    public function unsur_nama_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM unsur WHERE unsur_nama = '$post[unsur_nama]' AND unsur_id != '$post[unsur_id]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('unsur_nama_check','{field} ini sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function unsur_kode_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM unsur WHERE unsur_kode = '$post[unsur_kode]' AND unsur_id != '$post[unsur_id]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('unsur_kode_check','{field} ini sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }




    public function edit($id)
    {
        $query = $this->unsur_m->get($id);




        if($query->num_rows() > 0){
            $unsur = $query->row();
            $data = array (
                'page' => 'edit',
                'row' => $unsur,
            );
            $data ['halaman'] = 'Edit Data Master Unsur';
            $this->template->load('template/template_backend','unsur/unsur_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('unsur')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $unsur = new stdClass();
            $unsur->unsur_id = null;
            $unsur->unsur_nama = null;
            $unsur->unsur_kode = null;
            $data = array (
                'page' => 'add',
                'row' => $unsur,
            );
            $data ['halaman'] = 'Tambah Data Master Unsur';
            $this->form_validation->set_rules('unsur_nama','Nama Unsur','required|is_unique[unsur.unsur_nama]',
            array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti')
            );
            $this->form_validation->set_rules('unsur_kode','Kode Unsur','required|is_unique[unsur.unsur_kode]',
            array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti'));
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','unsur/unsur_form', $data);
            }
            else
            {
                $this->unsur_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('unsur');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('unsur_nama','Nama Unsur','required|callback_unsur_nama_check');
            $this->form_validation->set_rules('unsur_kode','Kode','required|callback_unsur_kode_check');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['unsur_id']);
            }
            else
            {
                $this->unsur_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('unsur');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->unsur_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('unsur');

    }

}

?>