<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komponen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("komponen_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["komponen"] = $this->komponen_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $this->load->view("admin/komponen/komponen", $data);
    }

    public function tambah()
    {
        $komponen = $this->komponen_model;
        $idTerakhir = $komponen->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_komponen'] = $kodeTerbaru;
        $data['session'] = $this->session->userdata('user_logged');

        $validation = $this->form_validation;
        $validation->set_rules($komponen->rules());

        if ($validation->run()) {
            $komponen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/komponen/tambah", $data);
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
        $data['session'] = $this->session->userdata('user_logged');

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
