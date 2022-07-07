<?php

class User_m extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }
    

    public function get ($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('user')->row();
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }    

    public function edit($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
    }
   

   

    public function delete ($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }


}
?> 