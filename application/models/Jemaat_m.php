<?php

class Jemaat_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('jemaat');
        $this->db->join('wijk', 'wijk.wijk_id = jemaat.wijk_id');
        $this->db->join('ksp', 'ksp.ksp_id = jemaat.ksp_id');
        $this->db->join('unsur', 'unsur.unsur_id = jemaat.unsur_id');
        if ($id != null) {
            $this->db->where('jemaat_nik', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['jemaat_nik'] = $post['jemaat_nik'];
        $params['jemaat_nama'] = $post['jemaat_nama'];
        $params['jemaat_jenis_kelamin'] = $post['jemaat_jenis_kelamin'];
        $params['jemaat_alamat'] = $post['jemaat_alamat'];
        $params['jemaat_tempat_lahir'] = $post['jemaat_tempat_lahir'];
        $params['jemaat_tanggal_lahir'] = $post['jemaat_tanggal_lahir'];
        $params['unsur_id'] = $post['unsur_id'];
        $params['wijk_id'] = $post['wijk_id'];
        $params['ksp_id'] = $post['ksp_id'];
        $params['jemaat_baptis'] = $post['jemaat_baptis'];
        $params['jemaat_sidi'] = $post['jemaat_sidi'];
        $params['jemaat_nikah'] = $post['jemaat_nikah'];
        
        $this->db->insert('jemaat', $params);
    }    

    public function edit($post)
    {
        $params['jemaat_nik'] = $post['jemaat_nik'];
        $params['jemaat_nama'] = $post['jemaat_nama'];
        $params['jemaat_jenis_kelamin'] = $post['jemaat_jenis_kelamin'];
        $params['jemaat_alamat'] = $post['jemaat_alamat'];
        $params['jemaat_tempat_lahir'] = $post['jemaat_tempat_lahir'];
        $params['jemaat_tanggal_lahir'] = $post['jemaat_tanggal_lahir'];
        $params['unsur_id'] = $post['unsur_id'];
        $params['wijk_id'] = $post['wijk_id'];
        $params['ksp_id'] = $post['ksp_id'];
        $params['jemaat_baptis'] = $post['jemaat_baptis'];
        $params['jemaat_sidi'] = $post['jemaat_sidi'];
        $params['jemaat_nikah'] = $post['jemaat_nikah'];
        $this->db->where('jemaat_nik', $post['jemaat_nik']);
        $this->db->update('jemaat', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('jemaat_nik', $id);
        $this->db->delete('jemaat');
    }


}
?> 