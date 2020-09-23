<?php defined('BASEPATH') or exit('No direct script access allowed');

class Klub extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Klub_model', 'klub_model');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->fungsi->user_login()->level == 1){
            $x['row'] = $this->klub_model->get_all();
            $this->load->view('klub/klub_data', $x);
        }else{
            $x['row'] = $this->klub_model->get_session_id();
            $this->load->view('klub/klub_data', $x);
        }
    }

    public function add()
    {
        $klub = new stdClass();
        $klub->id_klub = null;
        $klub->nama_klub = null;
        $klub->visi = null;
        $klub->misi = null;
        $klub->alamat = null;
        $klub->email = null;
        $klub->kontak = null;
        $klub->logo = null;
        $klub->surat_pernyataan = null;
        $data = array(
            'page' => 'add',
            'row' => $klub
        );
        $this->load->view('klub/klub_form', $data);
    }

    public function edit($id)
    {
        $query = $this->klub_model->get($id);
        if ($query->num_rows() > 0) {
            $klub = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $klub
            );
            $this->load->view('klub/klub_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . base_url('klub') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']   = './uploads/logo_klub/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = 'logo-klub-' . date('d-m-y');
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) { //JIKA METHODE ADD
            if (@$_FILES['logo']['name'] != null) {
                if ($this->upload->do_upload('logo')) {
                    $post['logo'] = $this->upload->data('file_name');
                }
            }
            if (@$_FILES['surat_pernyataan']['name'] != null) {
                $config2['upload_path']   = './uploads/surat_pernyataan/';
                $config2['allowed_types'] = 'pdf';
                $config2['max_size']      = 2048;
                $config2['file_name']     = 'surat-pernyataan-' . date('d-m-y');
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('surat_pernyataan')) {
                    $post['surat_pernyataan'] = $this->upload->data('file_name');
                }
            }
            $this->klub_model->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('klub');
            } 
        } else if (isset($_POST['edit'])) { //JIKA METHODE EDIT
            if (@$_FILES['logo']['name'] != null) {
                if ($this->upload->do_upload('logo')) {
                    $logo = $this->klub_model->get($post['id_klub'])->row();
                    if ($logo->logo != null) {
                        $target_file = './uploads/logo_klub/' . $logo->logo;
                        unlink($target_file);
                    }
                    $post['logo'] = $this->upload->data('file_name');
                    $this->klub_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('update', 'Data berhasil diupdate');
                    }
                    redirect('klub');
                }
            } else {
                $post['logo'] = null;
                $this->klub_model->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('update', 'Data berhasil diupdate');
                }
                redirect('klub');
            }
        }
    }

    public function delete($id)
    {
        $logo = $this->klub_model->get($id)->row();
        if ($logo->logo != null) {
            $target_file = './uploads/logo_klub/' . $logo->logo;
            unlink($target_file);
        }

        $surat_pernyataan = $this->klub_model->get($id)->row();
        if ($surat_pernyataan->surat_pernyataan != null) {
            $target_file = './uploads/surat_pernyataan/' . $surat_pernyataan->surat_pernyataan;
            unlink($target_file);
        }

        $this->klub_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        }
        redirect('klub');
    }
}
