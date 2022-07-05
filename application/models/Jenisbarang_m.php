<?php

class Jenisbarang_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('jenisbarang');
        if ($id != null) {
            $this->db->where('jenisbarang_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['jenisbarang_nama'] = $post['jenisbarang_nama'];
         $this->db->insert('jenisbarang', $params);
    }    

    public function edit($post)
    {
        $params['jenisbarang_nama'] = $post['jenisbarang_nama'];
        $this->db->where('jenisbarang_id', $post['jenisbarang_id']);
        $this->db->update('jenisbarang', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('jenisbarang_id', $id);
        $this->db->delete('jenisbarang');
    }


}
?> 