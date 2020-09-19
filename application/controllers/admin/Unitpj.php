<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Unitpj extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("unitpj_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["unitpj"] = $this->unitpj_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $this->load->view("admin/unitpj/unitpj", $data);
    }

    public function tambah()
    {
        $unitpj = $this->unitpj_model;
        $idTerakhir = $unitpj->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_pj'] = $kodeTerbaru;
        $validation = $this->form_validation;
        $data['session'] = $this->session->userdata('user_logged');

        $validation->set_rules($unitpj->rules());

        if ($validation->run()) {
            $unitpj->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/unitpj/tambah", $data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('admin/unitpj');

        $unitpj = $this->unitpj_model;
        $validation = $this->form_validation;
        $validation->set_rules($unitpj->rules());
        $data['session'] = $this->session->userdata('user_logged');


        if ($validation->run()) {
            $unitpj->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["unitpj"] = $unitpj->getById($id);
        if (!$data["unitpj"]) show_404();

        $this->load->view("admin/unitpj/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->unitpj_model->delete($id)) {
            redirect(site_url('admin/unitpj'));
        }
    }
}
