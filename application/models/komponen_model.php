<?php defined('BASEPATH') or exit('No direct script access allowed');

class komponen_model extends CI_Model
{
    private $_komponen = 'tbl_komponen';

    public $id_komponen;
    public $nama_komponen;

    public function rules()
    {
        return [
            [
                'field' => 'nama_komponen',
                'label' => 'nama_komponen',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_komponen)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_komponen, ["id_komponen" => $id])->row();
    }

    public function checkId()
    {
        $this->db->select_max('id_komponen');
        $query = $this->db->get($this->_komponen);
        $hasil = $query->row();
        return $hasil->id_komponen;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_komponen = $post["id_komponen"];
        $this->nama_komponen = $post["nama_komponen"];
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
