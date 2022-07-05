<?php

class Bahan_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('bahan');
        if ($id != null) {
            $this->db->where('bahan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['bahan_nama'] = $post['bahan_nama'];
        $this->db->insert('bahan', $params);
    }    

    public function edit($post)
    {
        $params['bahan_nama'] = $post['bahan_nama'];
        $this->db->where('bahan_id', $post['bahan_id']);
        $this->db->update('bahan', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('bahan_id', $id);
        $this->db->delete('bahan');
    }


}
?> 