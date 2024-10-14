<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_m extends CI_Model
{
    public function get($post)
    {
        $iduser        = $this->input->post('id');

        $data = [
            'id_user'     => $iduser,

        ];
        if ($post['foto'] != null) {
            $data['foto'] = $post['foto'];
            // var_dump($data);
            // die;
        }
        // var_dump($data['foto']);
        // die;
        $this->db->where('id_user', $iduser);
        $this->db->update('user', $data);
    }
}
