<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subkomponen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_overview_model");
        $this->load->model("subkomponen_model");
        $this->load->model("komponen_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
        if ($this->session->userdata('user_logged')->role != 'ADMIN') redirect(site_url('kuisioner'));
    }

    public function index()
    {
        $data['session'] = $this->session->userdata('user_logged');
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $data["subkomponen"] = $this->subkomponen_model->getAll();
        $this->load->view("admin/subkomponen/subkomponen", $data);
    }

    public function tambah()
    {
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $subkomponen = $this->subkomponen_model;
        $idTerakhir = $subkomponen->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_subkom'] = $kodeTerbaru;
        $data["komponen"] = $this->komponen_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($subkomponen->rules());
        $data['session'] = $this->session->userdata('user_logged');


        if ($validation->run()) {
            $subkomponen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/subkomponen/tambah", $data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('admin/subkomponen');
        $unit = $this->user_overview_model->getUnit();
        $data['unit'] = $unit;
        $subkomponen = $this->subkomponen_model;
        $data["komponen"] = $this->komponen_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($subkomponen->rules());
        $data['session'] = $this->session->userdata('user_logged');


        if ($validation->run()) {
            $subkomponen->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["subkomponen"] = $subkomponen->getById($id);
        if (!$data["subkomponen"]) show_404();

        $this->load->view("admin/subkomponen/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->subkomponen_model->delete($id)) {
            redirect(site_url('admin/subkomponen'));
        }
    }
}
