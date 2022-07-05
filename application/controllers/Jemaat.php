<?php 

class Jemaat extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_jemaat();
        $this->load->model(['jemaat_m','unsur_m','ksp_m','wijk_m']);
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['js']= 'jemaat/vjs';
        $data['halaman']= 'Data Jemaat';
        $data['row'] = $this->jemaat_m->get();
        $this->template->load('template/template_backend','jemaat/jemaat_data', $data);
    }

    public function add ()
    {
            $jemaat = new stdClass();
            $jemaat->jemaat_nik = null;
            $jemaat->jemaat_nama = null;
            $jemaat->jemaat_jenis_kelamin = null;
            $jemaat->jemaat_alamat = null;
            $jemaat->jemaat_tempat_lahir = null;
            $jemaat->jemaat_tanggal_lahir = null;
            $jemaat->jemaat_baptis = null;
            $jemaat->jemaat_sidi = null;
            $jemaat->jemaat_nikah = null;
            $unsur_id = $this->unsur_m->get();
            $ksp_id = $this->ksp_m->get();
            $wijk_id = $this->wijk_m->get();
            $data = array (
                'page' => 'add',
                'row' => $jemaat,
                'unsur_id_edit' => NULL,
                'unsur_id' => $unsur_id,
                'ksp_id_edit' => NULL,
                'ksp_id' => $ksp_id,
                'wijk_id_edit' => NULL,
                'wijk_id' => $wijk_id,
            );
            $data['halaman']= 'Tambah Data Jemaat';

            //validation

         
                $this->template->load('template/template_backend','jemaat/jemaat_form', $data);
        
    }

    public function jemaat_nik_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM jemaat WHERE jemaat_nik = '$post[jemaat_nik]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('jemaat_nik_check','{field} ini sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }




    public function edit($id)
    {
        $query = $this->jemaat_m->get($id);




        if($query->num_rows() > 0){
            $jemaat = $query->row();
            $unsur_id = $this->unsur_m->get();
            $unsur_id_e = $this->unsur_m->get($jemaat->unsur_id);
            $ksp_id = $this->ksp_m->get();
            $ksp_id_e = $this->ksp_m->get($jemaat->ksp_id);
            $wijk_id = $this->wijk_m->get();
            $wijk_id_e = $this->wijk_m->get($jemaat->wijk_id);
            $data = array (
                'page' => 'edit',
                'row' => $jemaat,
                'unsur_id_edit' => $jemaat->unsur_id,
                'unsur_id' => $unsur_id,
                'ksp_id_edit' => $jemaat->ksp_id,
                'ksp_id' => $ksp_id,
                'wijk_id_edit' => $jemaat->wijk_id,
                'wijk_id' => $wijk_id,
            );
            $data['halaman']= 'Edit Data Jemaat';  
            $this->template->load('template/template_backend','jemaat/jemaat_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('jemaat')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $jemaat = new stdClass();
            $jemaat->jemaat_nik = null;
            $jemaat->jemaat_nama = null;
            $jemaat->jemaat_jenis_kelamin = null;
            $jemaat->jemaat_alamat = null;
            $jemaat->jemaat_tempat_lahir = null;
            $jemaat->jemaat_tanggal_lahir = null;
            $jemaat->jemaat_baptis = null;
            $jemaat->jemaat_sidi = null;
            $jemaat->jemaat_nikah = null;
            $unsur_id = $this->unsur_m->get();
            $ksp_id = $this->ksp_m->get();
            $wijk_id = $this->wijk_m->get();
            $data = array (
                'page' => 'add',
                'row' => $jemaat,
                'unsur_id_edit' => NULL,
                'unsur_id' => $unsur_id,
                'ksp_id_edit' => NULL,
                'ksp_id' => $ksp_id,
                'wijk_id_edit' => NULL,
                'wijk_id' => $wijk_id,
            );
            $data ['halaman'] = 'Tambah Data Jemaat';
            $this->form_validation->set_rules('jemaat_nik','NIK','required|is_unique[jemaat.jemaat_nik]',
            array('is_unique' => '%s yang dimasukan sudah digunakan, silahkan ganti')
            );
            $this->form_validation->set_rules('jemaat_nama','Nama Jemaat','required');
            // $this->form_validation->set_rules('jemaat_jenis_kelamin','Jenis Kelamin','required');
            $this->form_validation->set_rules('jemaat_alamat','Alamat','required');
            $this->form_validation->set_rules('jemaat_tempat_lahir','Tempat Lahir','required');
            $this->form_validation->set_rules('jemaat_tanggal_lahir','Tanggal Lahir','required');
            $this->form_validation->set_rules('unsur_id','Unsur','required');
            $this->form_validation->set_rules('ksp_id','KSP','required');
            $this->form_validation->set_rules('wijk_id','Wijk','required');
            // $this->form_validation->set_rules('jemaat_baptis','Status baptis','required');
            // $this->form_validation->set_rules('jemaat_sidi','Status sidi','required');
            // $this->form_validation->set_rules('jemaat_nikah','Status Nikah','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','jemaat/jemaat_form', $data);
            }
            else
            {
                $this->jemaat_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('jemaat');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('jemaat_nik','NIK','required|callback_jemaat_nik_check');
            $this->form_validation->set_rules('jemaat_nama','Nama Jemaat','required');
            // $this->form_validation->set_rules('jemaat_jenis_kelamin','Nama Lengkap','required');
            $this->form_validation->set_rules('jemaat_alamat','Alamat','required');
            $this->form_validation->set_rules('jemaat_tempat_lahir','Tempat Lahir','required');
            $this->form_validation->set_rules('jemaat_tanggal_lahir','Tanggal Lahir','required');
            $this->form_validation->set_rules('unsur_id','Unsur','required');
            $this->form_validation->set_rules('ksp_id','KSP','required');
            $this->form_validation->set_rules('wijk_id','Wijk','required');
            // $this->form_validation->set_rules('jemaat_baptis','Status baptis','required');
            // $this->form_validation->set_rules('jemaat_sidi','Status sidi','required');
            // $this->form_validation->set_rules('jemaat_nikah','Status Nikah','required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['jemaat_nik']);
            }
            else
            {
                $this->jemaat_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('jemaat');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->jemaat_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('jemaat');

    }

    public function print() {
        $data['row'] = $this->jemaat_m->get();
        $this->load->view('jemaat/jemaat_data_print',$data);
        // $html = $this->template->load('template/template_backend','jemaat/jemaat_data_print', $data, true);
        $this->fungsi->PdfGenerator('jemaat/jemaat_data_print',$data, 'Data Jemaat','A4','Landscape');
    }

}

?>