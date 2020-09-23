<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user_model');
        $this->load->library('form_validation');
        check_admin();
    }

    public function index()
    {
        check_not_login();
        $data['row'] = $this->user_model->get();
        $this->load->view('user/user_data', $data);
    }

    public function get_ajax()
    {
        $list = $this->user_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $user->username;
            $row[] = $user->password;
            $row[] = $user->email;
            $row[] = '<img src="' . site_url('uploads/foto_user/' . $user->foto) . '" width="40" height="40" class="img-circle"/>';
            $row[] = $user->level == 1 ? "Admin" : "Member";
            // add html for action
            $row[] = '<a href="' . site_url('user/edit/' . $user->id_user) . '" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="' . site_url('user/delete/' . $user->id_user) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->user_model->count_all(),
            "recordsFiltered" => $this->user_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $user = new stdClass();
        $user->id_user = null;
        $user->username = null;
        $user->password = null;
        $user->email = null;
        $user->foto = null;
        $user->level = null;
        $data = array(
            'page' => 'add',
            'row' => $user
        );
        $this->load->view('user/user_form', $data);
    }

    public function edit($id)
    {
        $query = $this->user_model->get($id);
        if ($query->num_rows() > 0) {
            $user = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $user
            );
            $this->load->view('user/user_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . base_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']   = './uploads/foto_user/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = 'foto-user-' . date('d-m-y');
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) { //JIKA METHODE ADD
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');
                    $this->user_model->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('user');
                } else {
                    $this->session->set_flashdata('warning', 'Ukuran gambar terlalu besar');
                    redirect('user/add');
                }
            }
        } else if (isset($_POST['edit'])) { //JIKA METHODE EDIT
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->user_model->get($post['id_user'])->row();
                    if ($foto->foto != null) {
                        $target_file = './uploads/foto_user/' . $foto->foto;
                        unlink($target_file);
                    }
                    $post['foto'] = $this->upload->data('file_name');
                    $this->user_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('update', 'Data berhasil diupdate');
                    }
                    redirect('user');
                } else {
                    $this->session->set_flashdata('warning', 'Ukuran gambar terlalu besar');
                    redirect('user/edit');
                }
            } else {
                $post['foto'] = null;
                $this->user_model->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('update', 'Data berhasil diupdate');
                }
                redirect('user');
            }
        }
    }

    public function delete($id)
    {
        $foto = $this->user_model->get($id)->row();
        if ($foto->foto != null) {
            $target_file = './uploads/foto_user/' . $foto->foto;
            unlink($target_file);
        }

        $this->user_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        }
        redirect('user');
    }
}
