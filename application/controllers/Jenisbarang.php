<?php 

class Jenisbarang extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_admin();
        $this->load->model('jenisbarang_m');
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data ['halaman'] = null;
        
    }

    public function index ()
    {
        $data['row'] = $this->jenisbarang_m->get();
        $data ['halaman'] = 'Data Master Jenis Barang';
        $this->template->load('template/template_backend','jenisbarang/jenisbarang_data', $data);
    }

    public function add ()
    {
            $jenisbarang = new stdClass();
            $jenisbarang->jenisbarang_id = null;
            $jenisbarang->jenisbarang_nama = null;
            $data = array (
                'page' => 'add',
                'row' => $jenisbarang,
            );
            $data ['halaman'] = 'Tambah Data Master Jenis Barang';

            //validation

         
                $this->template->load('template/template_backend','jenisbarang/jenisbarang_form', $data);
        
    }


    public function edit($id)
    {
        $query = $this->jenisbarang_m->get($id);




        if($query->num_rows() > 0){
            $jenisbarang = $query->row();
            $data = array (
                'page' => 'edit',
                'row' => $jenisbarang,
            );
            $data ['halaman'] = 'Edit Data Master Jenis Barang';
            $this->template->load('template/template_backend','jenisbarang/jenisbarang_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('jenisbarang')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $jenisbarang = new stdClass();
            $jenisbarang->jenisbarang_id = null;
            $jenisbarang->jenisbarang_nama = null;
            $data = array (
                'page' => 'add',
                'row' => $jenisbarang,
            );
            $data ['halaman'] = 'Tambah Data Master Jenis Barang';
            $this->form_validation->set_rules('jenisbarang_nama','Jenis Barang','required');
          
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','jenisbarang/jenisbarang_form', $data);
            }
            else
            {
                $this->jenisbarang_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('jenisbarang');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('jenisbarang_nama','Jenis Barang','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['jenisbarang_id']);
            }
            else
            {
                $this->jenisbarang_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('jenisbarang');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->jenisbarang_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('jenisbarang');

    }

}

?>