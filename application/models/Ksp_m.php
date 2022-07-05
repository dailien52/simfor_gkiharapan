<?php

class Ksp_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('ksp');
        $this->db->join('wijk', 'wijk.wijk_id = ksp.wijk_id');
        if ($id != null) {
            $this->db->where('ksp_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'wijk_id' => $post['wijk_id'],
            'ksp_nama' => $post['ksp_nama'],
        ];
        $this->db->insert('ksp', $params);
    }    

    public function edit($post)
    {
        $params = [
            'wijk_id' => $post['wijk_id'],
            'ksp_nama' => $post['ksp_nama'],
        ];
        $this->db->where('ksp_id', $post['ksp_id']);
        $this->db->update('ksp', $params);
    }    

   

    public function delete ($id)
    {
        $this->db->where('ksp_id', $id);
        $this->db->delete('ksp');
    }


}
?> 