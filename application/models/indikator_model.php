<?php defined('BASEPATH') or exit('No direct script access allowed');

class indikator_model extends CI_Model
{
    private $_indikator = 'tbl_indikator';
    private $_layanan = 'tbl_layanan';
    private $_subpj = 'tbl_subpj';

    public $id_indikator;
    public $nama_indikator;
    public $ket_satuan;
    public $id_layanan;
    public $id_subpj;

    public function rules()
    {
        return [
            [
                'field' => 'nama_indikator',
                'label' => 'nama_indikator',
                'rules' => 'required'
            ],
            [
                'field' => 'ket_satuan',
                'label' => 'ket_satuan',
                'rules' => 'required'
            ],
            [
                'field' => 'id_layanan',
                'label' => 'id_layanan',
                'rules' => 'required'
            ],
            [
                'field' => 'id_subpj',
                'label' => 'id_subpj',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_indikator);
        $this->db->join($this->_layanan, $this->_layanan . '.id_layanan = ' . $this->_indikator . '.id_layanan', 'left');
        $this->db->join($this->_subpj, $this->_subpj . '.id_subpj = ' . $this->_indikator . '.id_subpj', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_indikator);
        $this->db->join($this->_layanan, $this->_layanan . '.id_layanan = ' . $this->_indikator . '.id_layanan', 'left');
        $this->db->join($this->_subpj, $this->_subpj . '.id_subpj = ' . $this->_indikator . '.id_subpj', 'left');
        $this->db->where('id_indikator', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function checkId()
    {
        $this->db->select_max('id_indikator');
        $query = $this->db->get($this->_indikator);
        $hasil = $query->row();
        return $hasil->id_indikator;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_indikator = $post["id_indikator"];
        $this->nama_indikator = $post["nama_indikator"];
        $this->ket_satuan = $post["ket_satuan"];
        $this->id_layanan = $post['id_layanan'];
        $this->id_subpj = $post['id_subpj'];
        return $this->db->insert($this->_indikator, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_indikator = $post["id_indikator"];
        $this->nama_indikator = $post["nama_indikator"];
        $this->ket_satuan = $post["ket_satuan"];
        $this->id_layanan = $post['id_layanan'];
        $this->id_subpj = $post['id_subpj'];
        return $this->db->update($this->_indikator, $this, array('id_indikator' => $post['id_indikator']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_indikator, array("id_indikator" => $id));
    }
}
