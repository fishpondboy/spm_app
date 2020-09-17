<?php defined('BASEPATH') or exit('No direct script access allowed');

class unitpj_model extends CI_Model
{
    private $_unitpj = 'tbl_unitpj';

    public $id_pj;
    public $nama_pj;

    public function rules()
    {
        return [
            [
                'field' => 'nama_pj',
                'label' => 'nama_pj',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_unitpj)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_unitpj, ["id_pj" => $id])->row();
    }

    public function checkId()
    {
        $this->db->select_max('id_pj');
        $query = $this->db->get($this->_unitpj);
        $hasil = $query->row();
        return $hasil->id_pj;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pj = $post["id_pj"];
        $this->nama_pj = $post["nama_pj"];
        return $this->db->insert($this->_unitpj, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pj = $post["id_pj"];
        $this->nama_pj = $post["nama_pj"];
        return $this->db->update($this->_unitpj, $this, array('id_pj' => $post['id_pj']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_unitpj, array("id_pj" => $id));
    }
}
