<?php defined('BASEPATH') or exit('No direct script access allowed');

class Official extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Official_model', 'official_model');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->fungsi->user_login()->level == 1){
            $x['row'] = $this->official_model->get_all();
            $this->load->view('official/official_data', $x);
        }else{
            $x['row'] = $this->official_model->get_session_id();
            $this->load->view('official/official_data', $x);
        }
        
    }

    public function add()
    {
        $official = new stdClass();
        $official->id_official = null;
        $official->nama = null;
        $official->jenis_kelamin = null;
        $official->tanggal_lahir = null;
        $official->kota_lahir = null;
        $official->kewarganegaraan = null;
        $official->alamat = null;
        $official->posisi = null;
        $official->klub = null;
        $official->photo = null;
        $official->ktp = null;
        $data = array(
            'page' => 'add',
            'row' => $official
        );
        $this->load->view('official/official_form', $data);
    }

    public function edit($id)
    {
        $query = $this->official_model->get($id);
        if ($query->num_rows() > 0) {
            $official = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $official
            );
            $this->load->view('official/official_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . base_url('official') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']   = './uploads/photo_official/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = 'photo-official-' . date('d-m-y');
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) { //JIKA METHODE ADD
            if (@$_FILES['photo']['name'] != null) {
                if ($this->upload->do_upload('photo')) {
                    $post['photo'] = $this->upload->data('file_name');
                }
            }
            if (@$_FILES['ktp']['name'] != null) {
                $config2['upload_path']   = './uploads/ktp/';
                $config2['allowed_types'] = 'jpg|jpeg|png';
                $config2['max_size']      = 2048;
                $config2['file_name']     = 'ktp-' . date('d-m-y');
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('ktp')) {
                    $post['ktp'] = $this->upload->data('file_name');
                }
            }
            $this->official_model->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('official/add');
            } else {
                $this->session->set_flashdata('warning', 'Ukuran gambar terlalu besar');
                redirect('official/add');
            }
        } else if (isset($_POST['edit'])) { //JIKA METHODE EDIT
            if (@$_FILES['photo']['name'] != null) {
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->official_model->get($post['id_official'])->row();
                    if ($photo->photo != null) {
                        $target_file = './uploads/photo_official/' . $photo->photo;
                        unlink($target_file);
                    }
                    $post['photo'] = $this->upload->data('file_name');
                    $this->official_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('update', 'Data berhasil diupdate');
                    }
                    redirect('official');
                } else {
                    $this->session->set_flashdata('warning', 'Ukuran gambar terlalu besar');
                    redirect('official/edit');
                }
            } else {
                $post['photo'] = null;
                $this->official_model->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('update', 'Data berhasil diupdate');
                }
                redirect('official');
            }
        }
    }

    public function delete($id)
    {
        $photo = $this->official_model->get($id)->row();
        if ($photo->photo != null) {
            $target_file = './uploads/photo_official/' . $photo->photo;
            unlink($target_file);
        }

        $ktp = $this->official_model->get($id)->row();
        if ($ktp->ktp != null) {
            $target_file = './uploads/ktp/' . $ktp->ktp;
            unlink($target_file);
        }

        $this->official_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        }
        redirect('official');
    }
}
