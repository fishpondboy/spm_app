<?php defined('BASEPATH') or exit('No direct script access allowed');

class layanan_model extends CI_Model
{
    private $_layanan = 'tbl_layanan';
    private $_subkomponen = 'tbl_subkomponen';

    public $id_layanan;
    public $nama_layanan;
    public $id_subkomponen;

    public function rules()
    {
        return [
            [
                'field' => 'nama_layanan',
                'label' => 'nama_layanan',
                'rules' => 'required'
            ],
            [
                'field' => 'id_subkomponen',
                'label' => 'id_subkomponen',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_layanan);
        $this->db->join($this->_subkomponen, $this->_subkomponen . '.id_subkom = ' . $this->_layanan . '.id_subkomponen', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_layanan);
        $this->db->join($this->_subkomponen, $this->_subkomponen . '.id_subkom = ' . $this->_layanan . '.id_subkomponen', 'left');
        $this->db->where('id_layanan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function checkId()
    {
        $this->db->select_max('id_layanan');
        $query = $this->db->get($this->_layanan);
        $hasil = $query->row();
        return $hasil->id_layanan;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_layanan = $post["id_layanan"];
        $this->nama_layanan = $post["nama_layanan"];
        $this->id_subkomponen = $post["id_subkomponen"];
        return $this->db->insert($this->_layanan, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_layanan = $post["id_layanan"];
        $this->nama_layanan = $post["nama_layanan"];
        $this->id_subkomponen = $post["id_subkomponen"];
        return $this->db->update($this->_layanan, $this, array('id_layanan' => $post['id_layanan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_layanan, array("id_layanan" => $id));
    }
}
