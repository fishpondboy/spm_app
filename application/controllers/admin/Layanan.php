<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("layanan_model");
        $this->load->model("subkomponen_model");
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["layanan"] = $this->layanan_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $this->load->view("admin/layanan/layanan", $data);
    }

    public function tambah()
    {
        $layanan = $this->layanan_model;
        $idTerakhir = $layanan->checkId();
        $kodeId = substr($idTerakhir, 3, 3);
        $kodeTerbaru = $kodeId + 1;
        $data['id_layanan'] = $kodeTerbaru;
        $data["subkomponen"] = $this->subkomponen_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $validation = $this->form_validation;
        $validation->set_rules($layanan->rules());

        if ($validation->run()) {
            $layanan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/layanan/tambah", $data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('admin/layanan');

        $layanan = $this->layanan_model;
        $data["subkomponen"] = $this->subkomponen_model->getAll();
        $data['session'] = $this->session->userdata('user_logged');

        $validation = $this->form_validation;
        $validation->set_rules($layanan->rules());

        if ($validation->run()) {
            $layanan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["layanan"] = $layanan->getById($id);
        if (!$data["layanan"]) show_404();

        $this->load->view("admin/layanan/ubah", $data);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->layanan_model->delete($id)) {
            redirect(site_url('admin/layanan'));
        }
    }
}
