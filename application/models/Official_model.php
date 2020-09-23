<?php defined('BASEPATH') or exit('No direct script access allowed');

class Official_model extends CI_Model
{
    public function get_session_id()
    {
        $id = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT * FROM tbl_official WHERE created_by='$id'");
        return $query;
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_official');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('tbl_official');
        if ($id != null) {
            $this->db->where('id_official', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post, $id = null)
    {
        $params = [
            'nama' => $post['nama'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'kota_lahir' => $post['kota_lahir'],
            'kewarganegaraan' => $post['kewarganegaraan'],
            'alamat' => $post['alamat'],
            'posisi' => $post['posisi'],
            'klub' => $post['klub'],
            'photo' => $post['photo'],
            'ktp' => $post['ktp'],
            'created_by' => $this->session->userdata('id_user'),
        ];
        if ($id != null) {
            $this->db->insert('tbl_official', $params, $id);
        }
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'kota_lahir' => $post['kota_lahir'],
            'kewarganegaraan' => $post['kewarganegaraan'],
            'alamat' => $post['alamat'],
            'posisi' => $post['posisi'],
            'klub' => $post['klub'],
        ];
        if ($post['photo'] != null) {
            $params['photo'] = $post['photo'];
        } elseif ($post['ktp'] != null) {
            $params['ktp'] = $post['ktp'];
        }

        $this->db->where('id_official', $post['id_official']);
        $this->db->update('tbl_official', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_official', $id);
        $this->db->delete('tbl_official');
    }
}
