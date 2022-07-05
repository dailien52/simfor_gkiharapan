<?php 

class Ksp extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model(['ksp_m', 'wijk_m']);
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->ksp_m->get();
        $data ['halaman'] = 'Data Master KSP';
        $this->template->load('template/template_backend','ksp/ksp_data', $data);
    }

    public function add ()
    {
            $ksp = new stdClass();
            $ksp->ksp_id = null;
            $ksp->ksp_nama = null;
            $wijk_id = $this->wijk_m->get();
            $data = array (
                'page' => 'add',
                'row' => $ksp,
                'wijk_id_edit' => NULL,
                'wijk_id' => $wijk_id,
            );
            $data ['halaman'] = 'Tambah Data Master KSP';

            //validation

         
                $this->template->load('template/template_backend','ksp/ksp_form', $data);
        
    }

    public function ksp_nama_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM ksp WHERE ksp_nama = '$post[ksp_nama]' AND ksp_id != '$post[ksp_id]'");
        if($query->num_rows() > 0 ) {
            $this->form_validation->set_message('ksp_nama_check','{field} ini sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }




    public function edit($id)
    {
        $query = $this->ksp_m->get($id);




        if($query->num_rows() > 0){
            $ksp = $query->row();
            $wijk_id = $this->wijk_m->get();
           $wijk_id_e = $this->wijk_m->get($ksp->wijk_id);
            $data = array (
                'page' => 'edit',
                'row' => $ksp,
                'wijk_id_edit' => $ksp->wijk_id,
                'wijk_id' => $wijk_id,
            );
            $data ['halaman'] = 'Edit Data Master KSP';
            $this->template->load('template/template_backend','ksp/ksp_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('ksp')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $ksp = new stdClass();
            $ksp->ksp_id = null;
            $ksp->ksp_nama = null;
            $wijk_id = $this->wijk_m->get();
            $data = array (
                'page' => 'add',
                'row' => $ksp,
                'wijk_id_edit' => NULL,
                'wijk_id' => $wijk_id,
            );
            $data ['halaman'] = 'Tambah Data Master KSP';
            $this->form_validation->set_rules('ksp_nama','Nama KSP','required|is_unique[ksp.ksp_nama]',
            array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti')
            );

            $this->form_validation->set_rules('wijk_id','WIJK','required',
            array('required', '%s masih kosong, harap isi terlebih dahulu')
            );
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','ksp/ksp_form', $data);
            }
            else
            {
                $this->ksp_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('ksp');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('ksp_nama','Nama KSP','required|callback_ksp_nama_check');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['ksp_id']);
            }
            else
            {
                $this->ksp_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('ksp');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->ksp_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('ksp');

    }

}

?>