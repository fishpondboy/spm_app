<?php defined('BASEPATH') or exit('No direct script access allowed');

class target_model extends CI_Model
{
    private $_target = 'tbl_target';
    private $_indikator = 'tbl_indikator';

    public $id_target;
    public $id_indikator;
    public $tahun;
    public $target;

    public function rules()
    {
        return [
            [
                'field' => 'id_indikator',
                'label' => 'id_indikator',
                'rules' => 'required'
            ],
            [
                'field' => 'tahun',
                'label' => 'tahun',
                'rules' => 'required'
            ],
            [
                'field' => 'target',
                'label' => 'target',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_target);
        $this->db->join($this->_indikator, $this->_indikator . '.id_indikator = ' . $this->_target . '.id_indikator', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_target);
        $this->db->join($this->_indikator, $this->_indikator . '.id_indikator = ' . $this->_target . '.id_indikator', 'left');
        $this->db->where('id_target', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_target = "TGT" . substr($post['tahun'], 2, 2) . '' . substr($post['id_indikator'], 2, 3);
        $this->id_indikator = $post["id_indikator"];
        $this->tahun = $post["tahun"];
        $this->target = $post['target'];
        return $this->db->insert($this->_target, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_target = $post["id_target"];
        $this->id_indikator = $post["id_indikator"];
        $this->tahun = $post["tahun"];
        $this->target = $post['target'];
        return $this->db->update($this->_target, $this, array('id_target' => $post['id_target']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_target, array("id_target" => $id));
    }
}
