<?php defined('BASEPATH') or exit('No direct script access allowed');

class subkomponen_model extends CI_Model
{
    private $_subkomponen = 'tbl_subkomponen';
    private $_komponen = 'tbl_komponen';

    public $id_subkom;
    public $nama_subkom;
    public $id_komponen;
    public $keterangan;

    public function rules()
    {
        return [
            [
                'field' => 'nama_subkom',
                'label' => 'nama_subkom',
                'rules' => 'required'
            ],
            [
                'field' => 'id_komponen',
                'label' => 'id_komponen',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_subkomponen);
        $this->db->join($this->_komponen, $this->_komponen . '.id_komponen = ' . $this->_subkomponen . '.id_komponen', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_subkomponen);
        $this->db->join($this->_komponen, $this->_komponen . '.id_komponen = ' . $this->_subkomponen . '.id_komponen', 'left');
        $this->db->where('id_subkom', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function checkId()
    {
        $this->db->select_max('id_subkom');
        $query = $this->db->get($this->_subkomponen);
        $hasil = $query->row();
        return $hasil->id_subkom;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_subkom = $post["id_subkom"];
        $this->nama_subkom = $post["nama_subkom"];
        $this->keterangan = $post["keterangan"];
        $this->id_komponen = $post['id_komponen'];
        return $this->db->insert($this->_subkomponen, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_subkom = $post["id_subkom"];
        $this->nama_subkom = $post["nama_subkom"];
        $this->keterangan = $post["keterangan"];
        $this->id_komponen = $post['id_komponen'];
        return $this->db->update($this->_subkomponen, $this, array('id_subkom' => $post['id_subkom']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_subkomponen, array("id_subkom" => $id));
    }
}
