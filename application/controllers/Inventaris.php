<?php 

class Inventaris extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
        check_not_login();
        check_inventaris();
        $this->load->model(['inventaris_m','jenisbarang_m','bahan_m','ruangan_m']);
        $this->load->library('form_validation');
        $this->data['js']= null;
        $this->data['halaman']= null;
        
    }

    public function index ()
    {
        $data['row'] = $this->inventaris_m->get();
        $data['js']= 'inventaris/vjs';
        $data ['halaman'] = 'Data Inventaris';
        $this->template->load('template/template_backend','inventaris/inventaris_data', $data);
    }

    public function add ()
    {
            $inventaris = new stdClass();
            $inventaris->inventaris_id = null;
            $inventaris->inventaris_nama = null;
            $inventaris->inventaris_ukuran = null;
            $inventaris->inventaris_tahunbeli = null;
            $inventaris->inventaris_harga = null;
            $inventaris->inventaris_jumlah = null;
            $inventaris->inventaris_keadaan = null;

            $jenisbarang_id = $this->jenisbarang_m->get();
            $bahan_id = $this->bahan_m->get();
            $ruangan_id = $this->ruangan_m->get();
            $data = array (
                'page' => 'add',
                'row' => $inventaris,
                'jenisbarang_id_edit' => NULL,
                'jenisbarang_id' => $jenisbarang_id,
                'bahan_id_edit' => NULL,
                'bahan_id' => $bahan_id,
                'ruangan_id_edit' => NULL,
                'ruangan_id' => $ruangan_id,
            );
            $data ['halaman'] = 'Tambah Data Inventaris';

            //validation

         
                $this->template->load('template/template_backend','inventaris/inventaris_form', $data);
        
    }


    public function edit($id)
    {
        $query = $this->inventaris_m->get($id);




        if($query->num_rows() > 0){
            $inventaris = $query->row();
            $jenisbarang_id = $this->jenisbarang_m->get();
            $jenisbarang_id_e = $this->jenisbarang_m->get($inventaris->jenisbarang_id);
            $bahan_id = $this->bahan_m->get();
            $bahan_id_e = $this->bahan_m->get($inventaris->bahan_id);
            $ruangan_id = $this->ruangan_m->get();
            $ruangan_id_e = $this->ruangan_m->get($inventaris->ruangan_id);
            $data = array (
                'page' => 'edit',
                'row' => $inventaris,
                'jenisbarang_id_edit' => $inventaris->jenisbarang_id,
                'jenisbarang_id' => $jenisbarang_id,
                'bahan_id_edit' => $inventaris->bahan_id,
                'bahan_id' => $bahan_id,
                'ruangan_id_edit' => $inventaris->ruangan_id,
                'ruangan_id' => $ruangan_id,
            );
            $data ['halaman'] = 'Edit Data Inventaris';
            $this->template->load('template/template_backend','inventaris/inventaris_form', $data);

        } else {
            echo "<script>alert ('Data tidak ditemukan'); ";
            echo "window.location='".site_url('inventaris')."';</script>";

        }
    }

    public function proses()
    {

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {;
            $inventaris = new stdClass();
            $inventaris->inventaris_id = null;
            $inventaris->inventaris_nama = null;
            $inventaris->inventaris_ukuran = null;
            $inventaris->inventaris_tahunbeli = null;
            $inventaris->inventaris_harga = null;
            $inventaris->inventaris_jumlah = null;
            $inventaris->inventaris_keadaan = null;
            $jenisbarang_id = $this->jenisbarang_m->get();
            $bahan_id = $this->bahan_m->get();
            $ruangan_id = $this->ruangan_m->get();
            $data = array (
                'page' => 'add',
                'row' => $inventaris,
                'jenisbarang_id_edit' => NULL,
                'jenisbarang_id' => $jenisbarang_id,
                'bahan_id_edit' => NULL,
                'bahan_id' => $bahan_id,
                'ruangan_id_edit' => NULL,
                'ruangan_id' => $ruangan_id,
            );
            $data ['halaman'] = 'Tambah Data Inventaris';
            $this->form_validation->set_rules('inventaris_nama','Nama Barang','required');
            // $this->form_validation->set_rules('inventaris_baptis','Status baptis','required');
            // $this->form_validation->set_rules('inventaris_sidi','Status sidi','required');
            // $this->form_validation->set_rules('inventaris_nikah','Status Nikah','required');
    
            $this->form_validation->set_message('required', '%s masih kosong, harap isi terlebih dahulu');
    
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template/template_backend','inventaris/inventaris_form', $data);
            }
            else
            {
                $this->inventaris_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('inventaris');
                
            }

        } else if(isset($_POST['edit'])) {

            $this->form_validation->set_rules('inventaris_nama','Nama Barang','required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->edit($post['inventaris_id']);
            }
            else
            {
                $this->inventaris_m->edit($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('inventaris');
            }
            
           
        }

        
       

    }

    
    public function delete ($id)
    {
    $this->inventaris_m->delete($id);
    if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger form-control"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Dihapus</div>');
        }
        redirect('inventaris');

    }

    public function print() {
        $data['row'] = $this->inventaris_m->get();
        $this->load->view('inventaris/inventaris_data_print',$data);
        // $html = $this->template->load('template/template_backend','inventaris/inventaris_data_print', $data, true);
        $this->fungsi->PdfGenerator('inventaris/inventaris_data_print',$data, 'Data Inventaris','A4','Potrait');
    }

}

?>