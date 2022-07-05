<?php

    Class Fungsi {
        protected $ci;


    function __construct(){
        $this->ci =& get_instance();
    }
    
    function user_login() {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data; 
    }

    function PdfGenerator ($view, $data = array(), $filename='Laporan', $paper = 'A4', $orientation='portrait') {
        $dompdf = new Dompdf\Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper,$orientation);
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream($filename. ".pdf",array('Attachment' => FALSE));
    }

    public function count_user()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

    public function count_jemaat()
    {
        $this->ci->load->model('jemaat_m');
        return $this->ci->jemaat_m->get()->num_rows();
    }

    public function count_inventaris()
    {
        $this->ci->load->model('inventaris_m');
        return $this->ci->inventaris_m->get()->num_rows();
    }

    }

?>