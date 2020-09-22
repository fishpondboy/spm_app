<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Target extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_overview_model");
        $this->load->model("target_model");
        $this->load->model("indikator_model");
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
        $data["tahun"] = $this->overview_model->getTahun();
        $data["target"] = $this->target_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $this->load->view("admin/target/target", $data);
    }

    public function tambah()
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $target = $this->target_model;
        $data["indikator"] = $this->indikator_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $validation = $this->form_validation;
        $validation->set_rules($target->rules());

        if ($validation->run()) {
            $target->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/target/tambah", $data);
    }

    public function ubah($id = null)
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        if (!isset($id)) redirect('admin/target');

        $target = $this->target_model;
        $data["indikator"] = $this->indikator_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($target->rules());
        $data['session'] = $this->session->userdata('user_logged');


        if ($validation->run()) {
            $target->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["target"] = $target->getById($id);
        if (!$data["target"]) show_404();

        $this->load->view("admin/target/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->target_model->delete($id)) {
            redirect(site_url('admin/target'));
        }
    }
}
