<?php defined('BASEPATH') or exit('No direct script access allowed');

class overview_model extends CI_Model
{
    private $_indikator = "tbl_indikator";
    private $_target = "tbl_target";
    private $_layanan = 'tbl_layanan';
    private $_subkomponen = 'tbl_subkomponen';
    private $_komponen = 'tbl_komponen';

    public $id_indikator;
    public $id_target;
    public $nama_indikator;
    public $target;

    public function getAll($tahun)
    {
        $this->db->select('*');
        $this->db->from($this->_target);
        $this->db->join($this->_indikator, $this->_indikator . '.id_indikator = ' . $this->_target . '.id_indikator', 'right');
        $this->db->join($this->_layanan, $this->_layanan . '.id_layanan = ' . $this->_indikator . '.id_layanan', 'right');
        $this->db->join($this->_subkomponen, $this->_subkomponen . '.id_subkom = ' . $this->_layanan . '.id_subkomponen', 'right');
        $this->db->join($this->_komponen, $this->_komponen . '.id_komponen = ' . $this->_subkomponen . '.id_komponen', 'right');
        $this->db->where('tahun', $tahun);
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
}
