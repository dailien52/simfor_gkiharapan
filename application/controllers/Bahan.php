<?php 

class Bahan extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model('bahan_m');
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->bahan_m->get();
        $data ['halaman'] = 'Data Master Bahan';
        $this->template->load('template/template_backend','bahan/bahan_data', $data);
    }

    public function add ()
    {
            $bahan = new stdClass();
            $bahan->bahan_id = null;
            $bahan->bahan_nama = null;
            $data = array (
                'row' => $bahan,
                'page' => 'add'
            );
            $data ['halaman'] = 'Tambah Data Master Bahan';

            //validation

         
                $this->template->load('template/template_backend','bahan/bahan_form', $data);
        
    }



    public function edit($id)
    {
        $query = $this->bahan_m->get($id);
        
        
        
        
        if($query->num_rows() > 0){
            $bahan = $query->row();
            
            $data = array (
                'row' => $bahan,
                'page' => 'edit',
            );
            $data ['halaman'] = 'Edit Data Master Bahan';
            $this->template->load('template/template_backend','bahan/bahan_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('bahan')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $bahan = new stdClass();
            $bahan->bahan_id = null;
            $bahan->bahan_nama = null;
            $data = array (
                'page' => 'add',
                'row' => $bahan,
            );
            $data ['halaman'] = 'Tambah Data Master Bahan';
            $this->form_validation->set_rules('bahan_nama','Bahan','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
           $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
            

            
            

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','bahan/bahan_form', $data);
            }
            else
            {
                $this->bahan_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('bahan');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('bahan_nama','Bahan','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['bahan_id']);
            }
            else
            {
                $this->bahan_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('bahan');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->bahan_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('bahan');

    }

}

?>