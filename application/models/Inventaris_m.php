<?php

class Inventaris_m extends CI_Model {

    public function get ($id = null)
    {
        $this->db->from('inventaris');
        $this->db->join('bahan', 'bahan.bahan_id = inventaris.bahan_id');
        $this->db->join('jenisbarang', 'jenisbarang.jenisbarang_id = inventaris.jenisbarang_id');
        $this->db->join('ruangan', 'ruangan.ruangan_id = inventaris.ruangan_id');
        if ($id != null) {
            $this->db->where('inventaris_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['inventaris_id'] = $post['inventaris_id'];
        $params['inventaris_nama'] = $post['inventaris_nama'];
        $params['jenisbarang_id'] = $post['jenisbarang_id'];
        $params['bahan_id'] = $post['bahan_id'];
        $params['inventaris_ukuran'] = $post['inventaris_ukuran'];
        $params['inventaris_tahunbeli'] = $post['inventaris_tahunbeli'];
        $params['inventaris_harga'] = $post['inventaris_harga'];
        $params['inventaris_jumlah'] = $post['inventaris_jumlah'];
        $params['inventaris_keadaan'] = $post['inventaris_keadaan'];
        $params['ruangan_id'] = $post['ruangan_id'];

        $this->db->insert('inventaris', $params);
    }    

    public function edit($post)
    {
        $params['inventaris_id'] = $post['inventaris_id'];
        $params['inventaris_nama'] = $post['inventaris_nama'];
        $params['jenisbarang_id'] = $post['jenisbarang_id'];
        $params['bahan_id'] = $post['bahan_id'];
        $params['inventaris_ukuran'] = $post['inventaris_ukuran'];
        $params['inventaris_tahunbeli'] = $post['inventaris_tahunbeli'];
        $params['inventaris_harga'] = $post['inventaris_harga'];
        $params['inventaris_jumlah'] = $post['inventaris_jumlah'];
        $params['inventaris_keadaan'] = $post['inventaris_keadaan'];
        $params['ruangan_id'] = $post['ruangan_id'];
        $this->db->where('inventaris_id', $post['inventaris_id']);
        $this->db->update('inventaris', $params);
    }    

    public function delete ($id)
    {
        $this->db->where('inventaris_id', $id);
        $this->db->delete('inventaris');
    }


}
?> 