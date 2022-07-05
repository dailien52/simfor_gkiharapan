<?php

class Unsur_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('unsur');
        if ($id != null) {
            $this->db->where('unsur_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['unsur_nama'] = $post['unsur_nama'];
        $params['unsur_kode'] = $post['unsur_kode'];
        $this->db->insert('unsur', $params);
    }    

    public function edit($post)
    {
        $params['unsur_nama'] = $post['unsur_nama'];
        $params['unsur_kode'] = $post['unsur_kode'];
        $this->db->where('unsur_id', $post['unsur_id']);
        $this->db->update('unsur', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('unsur_id', $id);
        $this->db->delete('unsur');
    }


}
?> 