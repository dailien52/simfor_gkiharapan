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

    public function add($post)
    {
        $params = [
            'username' => $post['username'],
            'password' => md5 ($post['password']),
            'user_namalengkap' => $post['user_namalengkap'],
            'user_foto' => $post['user_foto'],
            'user_level' => $post['user_level']
        ];
        $this->db->insert('user', $params);
    }    

    public function edit($post)
    {
        $params = [
            'username' => $post['username'],
            'password' => md5 ($post['password']),
            'user_namalengkap' => $post['user_namalengkap'],
            'user_level' => $post['user_level'],
        ];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }    

   

    public function delete ($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }


}
?> 