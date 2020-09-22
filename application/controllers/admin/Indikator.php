<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Indikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_overview_model");
        $this->load->model("indikator_model");
        $this->load->model("layanan_model");
        $this->load->model("subpj_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
        if ($this->session->userdata('user_logged')->role != 'ADMIN') redirect(site_url('kuisioner'));
    }

    public function index()
    {
        $data["indikator"] = $this->indikator_model->getAll();
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $data['session'] = $this->session->userdata('user_logged');
        $this->load->view("admin/indikator/indikator", $data);
    }

    public function tambah()
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $indikator = $this->indikator_model;
        $idTerakhir = $indikator->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_indikator'] = $kodeTerbaru;
        $data["layanan"] = $this->layanan_model->getAll();
        $data["subpj"] = $this->subpj_model->getAll();

        $data['session'] = $this->session->userdata('user_logged');
        $validation = $this->form_validation;
        $validation->set_rules($indikator->rules());

        if ($validation->run()) {
            $indikator->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/indikator/tambah", $data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('admin/indikator');
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $indikator = $this->indikator_model;
        $data["layanan"] = $this->layanan_model->getAll();
        $data["subpj"] = $this->subpj_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($indikator->rules());

        $data['session'] = $this->session->userdata('user_logged');

        if ($validation->run()) {
            $indikator->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["indikator"] = $indikator->getById($id);
        if (!$data["indikator"]) show_404();

        $this->load->view("admin/indikator/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->indikator_model->delete($id)) {
            redirect(site_url('admin/indikator'));
        }
    }
}
