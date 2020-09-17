<?php defined('BASEPATH') or exit('No direct script access allowed');

class subpj_model extends CI_Model
{
    private $_subpj = 'tbl_subpj';
    private $_unitpj = 'tbl_unitpj';

    public $id_subpj;
    public $nama_subpj;
    public $id_pj;

    public function rules()
    {
        return [
            [
                'field' => 'nama_subpj',
                'label' => 'nama_subpj',
                'rules' => 'required'
            ],
            [
                'field' => 'id_pj',
                'label' => 'id_pj',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_subpj);
        $this->db->join($this->_unitpj, $this->_unitpj . '.id_pj = ' . $this->_subpj . '.id_pj', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_subpj);
        $this->db->join($this->_unitpj, $this->_unitpj . '.id_pj = ' . $this->_subpj . '.id_pj', 'left');
        $this->db->where('id_subpj', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function checkId()
    {
        $this->db->select_max('id_subpj');
        $query = $this->db->get($this->_subpj);
        $hasil = $query->row();
        return $hasil->id_subpj;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_subpj = $post["id_subpj"];
        $this->nama_subpj = $post["nama_subpj"];
        $this->id_pj = $post['id_pj'];
        return $this->db->insert($this->_subpj, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_subpj = $post["id_subpj"];
        $this->nama_subpj = $post["nama_subpj"];
        $this->id_pj = $post['id_pj'];
        return $this->db->update($this->_subpj, $this, array('id_subpj' => $post['id_subpj']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_subpj, array("id_subpj" => $id));
    }
}
