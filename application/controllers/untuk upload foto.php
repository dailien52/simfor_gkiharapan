$config['allowed_types'] = 'gif|jpg|png';
$config['max_size']     = '5048';
$config['upload_path'] = './user-file/img/';
$config['file_name'] = 'user-'.date('ymd').'-'.substr(md5(rand()),0,0);

$this->load->library('upload', $config);

if(@$_FILES['user_foto']['name'] !=null) {
    if($this->upload->do_upload('userfoto')) {
        $post['user_foto'] = $this->upload->data('file_name');
        $this->user_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('user');

    }else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('user');
    } else {

        $post['user_foto'] = null;
        $this->user_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil Disimpan</div>');
                }
                redirect('user');

    }


}