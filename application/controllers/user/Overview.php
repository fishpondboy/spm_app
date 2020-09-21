<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_overview_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $unit = $this->user_overview_model->getUnit();
        $data["indikator2016"] = $this->user_overview_model->getAll(2016, $unit);
        $data["indikator2017"] = $this->user_overview_model->getAll(2017, $unit);
        $data["indikator2018"] = $this->user_overview_model->getAll(2018, $unit);
        $data["indikator2019"] = $this->user_overview_model->getAll(2019, $unit);
        $data["indikator2020"] = $this->user_overview_model->getAll(2020, $unit);
        $data['session'] = $this->session->userdata('user_logged');
        $data["tahun"] = $this->user_overview_model->getTahun();
        $data['unit'] = $unit;
        $this->load->view("user/overview", $data);
    }
}
