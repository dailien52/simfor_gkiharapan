<?php 

class Ruangan extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model('ruangan_m');
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->ruangan_m->get();
        $data ['halaman'] = 'Data Master Ruangan';
        $this->template->load('template/template_backend','ruangan/ruangan_data', $data);
    }

    public function add ()
    {
            $ruangan = new stdClass();
            $ruangan->ruangan_id = null;
            $ruangan->ruangan_nama = null;
            $data = array (
                'page' => 'add',
                'row' => $ruangan,
            );
            $data ['halaman'] = 'Tambah Data Master Ruangan';

            //validation

         
                $this->template->load('template/template_backend','ruangan/ruangan_form', $data);
        
    }



    public function edit($id)
    {
        $query = $this->ruangan_m->get($id);




        if($query->num_rows() > 0){
            $ruangan = $query->row();
            $data = array (
                'page' => 'edit',
                'row' => $ruangan,
            );
            $data ['halaman'] = 'Edit Data Master Ruangan';
            $this->template->load('template/template_backend','ruangan/ruangan_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('ruangan')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $ruangan = new stdClass();
            $ruangan->ruangan_id = null;
            $ruangan->ruangan_nama = null;
            $data = array (
                'page' => 'add',
                'row' => $ruangan,
            );
            $data ['halaman'] = 'Tambah Data Master Ruangan';
            $this->form_validation->set_rules('ruangan_nama','Ruangan','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','ruangan/ruangan_form', $data);
            }
            else
            {
                $this->ruangan_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('ruangan');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('ruangan_nama','Ruangan','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['ruangan_id']);
            }
            else
            {
                $this->ruangan_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('ruangan');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->ruangan_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('ruangan');

    }

}

?>