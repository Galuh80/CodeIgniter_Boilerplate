<?php

class Fungsi{

    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function user_login()
    {
        $this->ci->load->model('user_model');
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->user_model->get($id_user)->row();
        return $user_data;
    }
}