<?php defined('BASEPATH') or exit('No direct script access allowed');

class subkomponen_model extends CI_Model
{
    private $_subkomponen = 'tbl_subkomponen';
    private $_komponen = 'tbl_komponen';

    public $id_subkom;
    public $nama_subkom;
    public $id_komponen;

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
        return $this->db->get_where($this->_subkomponen, ["id_subkom" => $id])->row();
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
        $this->id_komponen = $post['id_komponen'];
        return $this->db->insert($this->_komponen, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_komponen = $post["id_komponen"];
        $this->nama_komponen = $post["nama_komponen"];
        return $this->db->update($this->_komponen, $this, array('id_komponen' => $post['id_komponen']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_komponen, array("id_komponen" => $id));
    }
}
