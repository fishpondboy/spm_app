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
        $data['unit'] = $unit;
        $data["indikator2016"] = $this->user_overview_model->getAll(2016, $unit);
        $data["indikator2017"] = $this->user_overview_model->getAll(2017, $unit);
        $data["indikator2018"] = $this->user_overview_model->getAll(2018, $unit);
        $data["indikator2019"] = $this->user_overview_model->getAll(2019, $unit);
        $data["indikator2020"] = $this->user_overview_model->getAll(2020, $unit);
        $data['session'] = $this->session->userdata('user_logged');
        $data["tahun"] = $this->user_overview_model->getTahun();
        $this->load->view("user/overview", $data);
    }

    public function tambah($tahun, $id_indikator)
    {
        $model = $this->user_overview_model;
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $data['session'] = $this->session->userdata('user_logged');
        $data['indikator'] = $model->getIndikator($id_indikator);
        $data['target'] = $model->getTarget($id_indikator, $tahun);
        $validation = $this->form_validation;
        $validation->set_rules($model->rules());

        if ($validation->run()) {
            $model->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
        }

        $this->load->view("user/tambah", $data);
    }

    public function ubah($id_data)
    {
        $model = $this->user_overview_model;
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $data['session'] = $this->session->userdata('user_logged');
        $data['data'] = $model->getData($id_data);
        $validation = $this->form_validation;
        $validation->set_rules($model->rules());

        if ($validation->run()) {
            $model->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
        }

        $this->load->view("user/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->user_overview_model->delete($id)) {
            redirect(site_url('user/overview'));
        }
    }
}
