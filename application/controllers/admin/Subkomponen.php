<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subkomponen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("subkomponen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["subkomponen"] = $this->subkomponen_model->getAll();
        $this->load->view("admin/subkomponen/subkomponen", $data);
    }

    public function tambah()
    {
        $subkomponen = $this->subkomponen_model;
        $idTerakhir = $subkomponen->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_subkom'] = $kodeTerbaru;
        $validation = $this->form_validation;
        $validation->set_rules($subkomponen->rules());

        if ($validation->run()) {
            $subkomponen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/subkomponen/tambah", $data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('admin/komponen');

        $komponen = $this->komponen_model;
        $validation = $this->form_validation;
        $validation->set_rules($komponen->rules());

        if ($validation->run()) {
            $komponen->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["komponen"] = $komponen->getById($id);
        if (!$data["komponen"]) show_404();

        $this->load->view("admin/komponen/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->komponen_model->delete($id)) {
            redirect(site_url('admin/komponen'));
        }
    }
}
