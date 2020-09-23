<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pemain extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemain_model', 'pemain_model');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->fungsi->user_login()->level == 1){
            $x['row'] = $this->pemain_model->get_all();
            $this->load->view('pemain/pemain_data', $x);
        }else{
            $x['row'] = $this->pemain_model->get_session_id();
            $this->load->view('pemain/pemain_data', $x);
        }
    }

    public function add()
    {
        $pemain = new stdClass();
        $pemain->id_pemain = null;
        $pemain->kelas_usia = null;
        $pemain->nama_pemain = null;
        $pemain->tanggal_lahir = null;
        $pemain->nomor_identitas = null;
        $pemain->jenis_identitas = null;
        $pemain->photo_identitas = null;
        $pemain->jenis_kelamin = null;
        $pemain->kota_lahir = null;
        $pemain->kewarganegaraan = null;
        $pemain->tinggi_badan = null;
        $pemain->berat_badan = null;
        $pemain->nomor_punggung = null;
        $pemain->nama_punggung = null;
        $pemain->posisi = null;
        $pemain->alamat = null;
        $pemain->nomor_handphone = null;
        $pemain->email = null;
        $pemain->kartu_keluarga = null;
        $pemain->photo = null;
        $data = array(
            'page' => 'add',
            'row' => $pemain
        );
        $this->load->view('pemain/pemain_form', $data);
    }

    public function edit($id)
    {
        $query = $this->pemain_model->get($id);
        if ($query->num_rows() > 0) {
            $pemain = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pemain
            );
            $this->load->view('pemain/pemain_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . base_url('pemain') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']   = './uploads/photo_identitas/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = 'photo-identitas-' . date('d-m-y');
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) { //JIKA METHODE ADD
            if (@$_FILES['photo_identitas']['name'] != null) {
                if ($this->upload->do_upload('photo_identitas')) {
                    $post['photo_identitas'] = $this->upload->data('file_name');
                }
            }
            if (@$_FILES['kartu_keluarga']['name'] != null) {
                $config2['upload_path']   = './uploads/kartu_keluarga/';
                $config2['allowed_types'] = 'pdf';
                $config2['max_size']      = 2048;
                $config2['file_name']     = 'kartu-keluarga-' . date('d-m-y');
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('kartu_keluarga')) {
                    $post['kartu_keluarga'] = $this->upload->data('file_name');
                }
            }
            if (@$_FILES['photo']['name'] != null) {
                $config3['upload_path']   = './uploads/photo/';
                $config3['allowed_types'] = 'gif|jpg|jpeg|png';
                $config3['max_size']      = 2048;
                $config3['file_name']     = 'photo-' . date('d-m-y');
                $this->upload->initialize($config3);
                if ($this->upload->do_upload('photo')) {
                    $post['photo'] = $this->upload->data('file_name');
                }
            }
            $this->pemain_model->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('pemain/add');
            } else {
                $this->session->set_flashdata('warning', 'Ukuran gambar terlalu besar');
                redirect('pemain/add');
            }
        } else if (isset($_POST['edit'])) { //JIKA METHODE EDIT
            if (@$_FILES['photo']['name'] != null) {
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->pemain_model->get($post['id_pemain'])->row();
                    if ($photo->photo != null) {
                        $target_file = './uploads/photo/' . $photo->photo;
                        unlink($target_file);
                    }
                    $post['photo'] = $this->upload->data('file_name');
                    $this->pemain_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('update', 'Data berhasil diupdate');
                    }
                    redirect('pemain');
                } else {
                    $this->session->set_flashdata('warning', 'Ukuran gambar terlalu besar');
                    redirect('pemain/edit');
                }
            } else {
                $post['photo'] = null;
                $this->pemain_model->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('update', 'Data berhasil diupdate');
                }
                redirect('pemain');
            }
        }
    }

    public function delete($id)
    {
        $photo_identitas = $this->pemain_model->get($id)->row();
        if ($photo_identitas->photo_identitas != null) {
            $target_file = './uploads/photo_identitas/' . $photo_identitas->photo_identitas;
            unlink($target_file);
        }

        $kartu_keluarga = $this->pemain_model->get($id)->row();
        if ($kartu_keluarga->kartu_keluarga != null) {
            $target_file = './uploads/kartu_keluarga/' . $kartu_keluarga->kartu_keluarga;
            unlink($target_file);
        }

        $photo = $this->pemain_model->get($id)->row();
        if ($photo->photo != null) {
            $target_file = './uploads/photo/' . $photo->photo;
            unlink($target_file);
        }

        $this->pemain_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        }
        redirect('pemain');
    }
}
