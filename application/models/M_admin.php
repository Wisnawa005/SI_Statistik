<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function add_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	//data tunggal\
	public function get_keyword_tunggal($keyword)
	{
		$this->db->select('*');
		$this->db->like('skor', $keyword);
		$datatunggal = $this->db->get('tb_databergolong')->result_array();
		return $datatunggal;
	}
	public function getDataTunggal($limit, $start)
	{
		// $query = "SELECT * FROM tb_skor ORDER BY skor ASC";

		// return $this->db->query($query, $limit, $start)->result_array();

		return $this->db->get('tb_databergolong', $limit, $start)->result_array();
	}
	public function getTunggal()
	{
		return $this->db->get('tb_databergolong')->num_rows();
	}

	//data bergolong
	public function getDataBergolong()
	{
		$query = $this->db->query(
			"SELECT max(skor) as Maksimal, min(skor) as Minimal, count(skor) as Jumlah FROM tb_databergolong"
		);
		return $query->result_array();
	}
	public function getAllDataBergolong()
	{
		return $this->db->get('data_bergolong')->result_array();
	}
}
