<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_lokasi()
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->order_by('nama_prodi', 'desc');
        $lokasi = $this->db->get('tb_lokasi')->result_array();
        return $lokasi;
    }

    function get_lokasi_byId($id)
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->order_by('nama_prodi', 'desc');
        $this->db->where('id_lokasi=', $id);
        $lokasi = $this->db->get('tb_lokasi')->row_array();
        return $lokasi;
    }

    function save_lokasi()
    {
        $data = array(
            'id_prodi' => $_POST['id_prodi'],
            'nama_lab' => $_POST['lab']
        );
        $this->db->insert('tb_lokasi', $data);
    }

    //data aset
    function get_aset_byId($id)
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->where('kode_aset=', $id);
        $aset = $this->db->get('tb_aset')->row_array();
        return $aset;
    }

    function get_dataaset()
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $aset = $this->db->get('tb_aset')->result_array();
        return $aset;
    }
}
