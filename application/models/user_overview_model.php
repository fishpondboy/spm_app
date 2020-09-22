<?php defined('BASEPATH') or exit('No direct script access allowed');

class user_overview_model extends CI_Model
{
    private $_indikator = "tbl_indikator";
    private $_target = "tbl_target";
    private $_layanan = 'tbl_layanan';
    private $_subkomponen = 'tbl_subkomponen';
    private $_komponen = 'tbl_komponen';
    private $_subpj = 'tbl_subpj';
    private $_utama = 'tbl_utama';

    public $id_target;
    public $angka_real;
    public $capaian;

    public function rules()
    {
        return [
            [
                'field' => 'angka_real',
                'label' => 'angka_real',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll($tahun, $unit)
    {
        $this->db->select('tbl_subpj.nama_subpj, tbl_komponen.nama_komponen, tbl_subkomponen.nama_subkom, tbl_layanan.nama_layanan, tbl_indikator.nama_indikator, tbl_indikator.id_indikator, tbl_target.tahun, tbl_indikator.ket_satuan, tbl_target.target, tbl_utama.angka_real,tbl_utama.capaian, tbl_utama.id_data');
        $this->db->from($this->_subpj);
        $this->db->join($this->_indikator, $this->_indikator . '.id_subpj = ' . $this->_subpj . '.id_subpj');
        $this->db->join($this->_target, $this->_target . '.id_indikator = ' . $this->_indikator . '.id_indikator');
        $this->db->join($this->_layanan, $this->_layanan . '.id_layanan = ' . $this->_indikator . '.id_layanan');
        $this->db->join($this->_subkomponen, $this->_subkomponen . '.id_subkom = ' . $this->_layanan . '.id_subkomponen');
        $this->db->join($this->_komponen, $this->_komponen . '.id_komponen = ' . $this->_subkomponen . '.id_komponen');
        $this->db->join($this->_utama, $this->_utama . '.id_target = ' . $this->_target . '.id_target', 'left');
        $this->db->where('tahun', $tahun);
        $this->db->like('nama_subpj', $unit);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTahun()
    {
        $this->db->select('tahun');
        $this->db->distinct();
        $query = $this->db->get($this->_target);
        return $query->result();
    }

    public function getUnit()
    {
        $session = $this->session->userdata('user_logged');
        $role = $session->role;
        $this->db->select('nama_subpj');
        $this->db->from($this->_subpj);
        $this->db->where('id_subpj', $role);
        $query = $this->db->get();
        $row = $query->row();
        $nama_subpj = $row->nama_subpj;
        return $nama_subpj;
    }

    public function getIndikator($id_indikator)
    {
        $this->db->select('*');
        $this->db->from($this->_indikator);
        $this->db->where('id_indikator', $id_indikator);
        $query = $this->db->get();
        return $query->row();
    }

    public function getTarget($id_indikator, $tahun)
    {
        $this->db->select('*');
        $this->db->from($this->_target);
        $this->db->where('tahun', $tahun);
        $this->db->where('id_indikator', $id_indikator);
        $query = $this->db->get();
        return $query->row();
    }

    public function getData($id_data)
    {
        $this->db->select('*');
        $this->db->from($this->_utama);
        $this->db->join($this->_target, $this->_target . '.id_target = ' . $this->_utama . '.id_target');
        $this->db->join($this->_indikator, $this->_indikator . '.id_indikator = ' . $this->_target . '.id_indikator');
        $this->db->where('id_data', $id_data);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_target = $post["id_target"];
        $this->angka_real = $post["angka_real"];
        $this->capaian = $post["capaian"];
        return $this->db->insert($this->_utama, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_data = $post["id_data"];
        $this->id_target = $post["id_target"];
        $this->angka_real = $post["angka_real"];
        $this->capaian = $post["capaian"];
        return $this->db->update($this->_utama, $this, array('id_data' => $post['id_data']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_utama, array("id_data" => $id));
    }
}
