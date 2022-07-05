<?php

class Ruangan_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('ruangan');
        if ($id != null) {
            $this->db->where('ruangan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['ruangan_nama'] = $post['ruangan_nama'];
        $this->db->insert('ruangan', $params);
    }    

    public function edit($post)
    {
        $params['ruangan_nama'] = $post['ruangan_nama'];
        $this->db->where('ruangan_id', $post['ruangan_id']);
        $this->db->update('ruangan', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('ruangan_id', $id);
        $this->db->delete('ruangan');
    }


}
?> 