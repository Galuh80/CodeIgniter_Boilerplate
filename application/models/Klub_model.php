<?php defined('BASEPATH') or exit('No direct script access allowed');

class Klub_model extends CI_Model
{

    public function get_session_id()
    {
        $id = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT * FROM tbl_klub WHERE created_by='$id'");
        return $query;
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_klub');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('tbl_klub');
        if ($id != null) {
            $this->db->where('id_klub', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_klub' => $post['nama_klub'],
            'visi' => $post['visi'],
            'misi' => $post['misi'],
            'alamat' => $post['alamat'],
            'email' => $post['email'],
            'kontak' => $post['kontak'],
            'logo' => $post['logo'],
            'surat_pernyataan' => $post['surat_pernyataan'],
            'created_by' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('tbl_klub', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_klub' => $post['nama_klub'],
            'visi' => $post['visi'],
            'misi' => $post['misi'],
            'alamat' => $post['alamat'],
            'email' => $post['email'],
            'kontak' => $post['kontak'],
        ];
        if ($post['logo'] != null) {
            $params['logo'] = $post['logo'];
        }
        if ($post['surat_pernyataan'] != null) {
            $params['surat_pernyataan'] = $post['surat_pernyataan'];
        }
        $this->db->where('id_klub', $post['id_klub']);
        $this->db->update('tbl_klub', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_klub', $id);
        $this->db->delete('tbl_klub');
    }
}
