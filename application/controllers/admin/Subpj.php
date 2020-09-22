<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subpj extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_overview_model");
        $this->load->model("subpj_model");
        $this->load->model("unitpj_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
        if ($this->session->userdata('user_logged')->role != 'ADMIN') redirect(site_url('kuisioner'));
    }

    public function index()
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $data["subpj"] = $this->subpj_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $this->load->view("admin/subpj/subpj", $data);
    }

    public function tambah()
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $subpj = $this->subpj_model;
        $idTerakhir = $subpj->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_subpj'] = $kodeTerbaru;
        $data["unitpj"] = $this->unitpj_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $validation = $this->form_validation;
        $validation->set_rules($subpj->rules());

        if ($validation->run()) {
            $subpj->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/subpj/tambah", $data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('admin/subpj');
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $subpj = $this->subpj_model;
        $data["unitpj"] = $this->unitpj_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($subpj->rules());
        $data['session'] = $this->session->userdata('user_logged');


        if ($validation->run()) {
            $subpj->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["subpj"] = $subpj->getById($id);
        if (!$data["subpj"]) show_404();

        $this->load->view("admin/subpj/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->subpj_model->delete($id)) {
            redirect(site_url('admin/subpj'));
        }
    }
}
