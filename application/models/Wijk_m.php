<?php

class Wijk_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('wijk');
        if ($id != null) {
            $this->db->where('wijk_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['wijk_nama'] = $post['wijk_nama'];
        $params['wijk_jumlah_ksp'] = $post['wijk_jumlah_ksp'];
        $this->db->insert('wijk', $params);
    }    

    public function edit($post)
    {
        $params['wijk_nama'] = $post['wijk_nama'];
        $params['wijk_jumlah_ksp'] = $post['wijk_jumlah_ksp'];
        $this->db->where('wijk_id', $post['wijk_id']);
        $this->db->update('wijk', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('wijk_id', $id);
        $this->db->delete('wijk');
    }


}
?> 