<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika form login disubmit
        if ($this->input->post()) {
            if ($this->login_model->doLogin() == "MASTER") {
                redirect(site_url('master'));
            } elseif ($this->login_model->doLogin() == 'ADMIN') {
                redirect(site_url('admin'));
            } elseif (substr($this->login_model->doLogin(), 0, 3) == 'SPJ') {
                redirect(site_url('kuisioner'));
            }
        }

        // tampilkan halaman login
        $this->load->view("login/login.php");
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
