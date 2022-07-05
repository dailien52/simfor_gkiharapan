<?php 

class Wijk extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model('wijk_m');
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->wijk_m->get();
        $data ['halaman'] = 'Data Master Wijk';
        $this->template->load('template/template_backend','wijk/wijk_data', $data);
    }

    public function add ()
    {
            $wijk = new stdClass();
            $wijk->wijk_id = null;
            $wijk->wijk_nama = null;
            $wijk->wijk_jumlah_ksp = null;
            $data = array (
                'page' => 'add',
                'row' => $wijk,
            );
            $data ['halaman'] = 'Data Master Wijk';

            //validation

         
                $this->template->load('template/template_backend','wijk/wijk_form', $data);
        
    }

    public function wijk_nama_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM wijk WHERE wijk_nama = '$post[wijk_nama]' AND wijk_id != '$post[wijk_id]'");
        if($query->num_rows() > 0 ) {
            $this->form_validation->set_message('wijk_nama_check','{field} ini sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }




    public function edit($id)
    {
        $query = $this->wijk_m->get($id);




        if($query->num_rows() > 0){
            $wijk = $query->row();
            $data = array (
                'page' => 'edit',
                'row' => $wijk,
            );
            $data ['halaman'] = 'Edit Data Master Wijk';
            $this->template->load('template/template_backend','wijk/wijk_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('wijk')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $wijk = new stdClass();
            $wijk->wijk_id = null;
            $wijk->wijk_nama = null;
            $wijk->wijk_jumlah_ksp = null;
            $data = array (
                'page' => 'add',
                'row' => $wijk,
            );
            $data ['halaman'] = 'Tambah Data Master Wijk';
            $this->form_validation->set_rules('wijk_nama','Nama Wijk','required|is_unique[wijk.wijk_nama]',
            array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti')
            );
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','wijk/wijk_form', $data);
            }
            else
            {
                $this->wijk_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('wijk');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('wijk_nama','Nama Wijk','required|callback_wijk_nama_check');

            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['wijk_id']);
            }
            else
            {
                $this->wijk_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('wijk');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->wijk_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('wijk');

    }

}

?>