<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('download','url'));
    }

    public function index()
    {
        check_not_login();
        $this->load->view('v_dashboard');
    }

    public function download()
    {
        force_download('uploads/Surat_Pernyataan_LDL.pdf', NULL);
    }
}
