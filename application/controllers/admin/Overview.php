<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_overview_model");
        $this->load->model("overview_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
        if ($this->session->userdata('user_logged')->role != 'ADMIN') redirect(site_url('kuisioner'));
    }

    public function index()
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $data["indikator2016"] = $this->overview_model->getAll(2016);
        $data["indikator2017"] = $this->overview_model->getAll(2017);
        $data["indikator2018"] = $this->overview_model->getAll(2018);
        $data["indikator2019"] = $this->overview_model->getAll(2019);
        $data["indikator2020"] = $this->overview_model->getAll(2020);
        $data['session'] = $this->session->userdata('user_logged');
        $data["tahun"] = $this->overview_model->getTahun();
        $this->load->view("admin/overview", $data);
    }
}
