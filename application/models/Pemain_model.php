<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pemain_model extends CI_Model
{

    public function get_session_id()
    {
        $id = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT * FROM tbl_pemain WHERE created_by='$id'");
        return $query;
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_pemain');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('tbl_pemain');
        if ($id != null) {
            $this->db->where('id_pemain', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'kelas_usia' => $post['kelas_usia'],
            'nama_pemain' => $post['nama_pemain'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'nomor_identitas' => $post['nomor_identitas'],
            'jenis_identitas' => $post['jenis_identitas'],
            'photo_identitas' => $post['photo_identitas'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'kota_lahir' => $post['kota_lahir'],
            'kewarganegaraan' => $post['kewarganegaraan'],
            'tinggi_badan' => $post['tinggi_badan'],
            'berat_badan' => $post['berat_badan'],
            'nomor_punggung' => $post['nomor_punggung'],
            'nama_punggung' => $post['nama_punggung'],
            'posisi' => $post['posisi'],
            'alamat' => $post['alamat'],
            'nomor_handphone' => $post['nomor_handphone'],
            'email' => $post['email'],
            'kartu_keluarga' => $post['kartu_keluarga'],
            'photo' => $post['photo'],
            'created_by' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('tbl_pemain', $params);
    }

    public function edit($post)
    {
        $params = [
            'kelas_usia' => $post['kelas_usia'],
            'nama_pemain' => $post['nama_pemain'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'nomor_identitas' => $post['nomor_identitas'],
            'jenis_identitas' => $post['jenis_identitas'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'kota_lahir' => $post['kota_lahir'],
            'kewarganegaraan' => $post['kewarganegaraan'],
            'tinggi_badan' => $post['tinggi_badan'],
            'berat_badan' => $post['berat_badan'],
            'nomor_punggung' => $post['nomor_punggung'],
            'nama_punggung' => $post['nama_punggung'],
            'posisi' => $post['posisi'],
            'alamat' => $post['alamat'],
            'nomor_handphone' => $post['nomor_handphone'],
            'email' => $post['email'],
        ];
        if ($post['photo_identitas'] != null) {
            $params['photo_identitas'] = $post['photo_identitas'];
        } elseif ($post['kartu_keluarga'] != null) {
            $params['kartu_keluarga'] = $post['kartu_keluarga'];
        } elseif ($post['photo'] != null) {
            $params['photo'] = $post['photo'];
        }
        $this->db->where('id_pemain', $post['id_pemain']);
        $this->db->update('tbl_pemain', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_pemain', $id);
        $this->db->delete('tbl_pemain');
    }
}
