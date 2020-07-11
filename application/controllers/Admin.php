<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->helper('url');
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data['title'] = 'Halaman Utama Admin';
		$data['account'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'My Profile';
		$data['account'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer');
	}

	//data tunggal
	public function data_tunggal()
	{
		$data['title'] = 'Data Tunggal';
		$data['account'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		//load library
		$this->load->library('pagination');

		//config
		$config['base_url'] = site_url('admin/data_tunggal');
		$config['total_rows'] = $this->M_admin->getTunggal();
		$config['per_page'] = 10;
		$config['num_links'] = 4;

		//styling
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['datatunggal'] = $this->M_admin->getDataTunggal($config['per_page'], $data['start']);

		$this->form_validation->set_rules('skor', 'Skor', 'required');

		if ($this->form_validation->run() == FALSE) {
		} else {
			$data = [
				'skor'   => $this->input->post('skor'),
			];

			$this->db->insert('tb_databergolong', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Skor Added!</div>');
			redirect('admin/data_tunggal');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/data_tunggal', $data);
		$this->load->view('templates/footer');
	}

	public function delete_tunggal($id)
	{
		$where = array('id' => $id);
		$this->M_admin->delete($where, 'tb_databergolong');
		redirect('admin/data_tunggal');
	}

	public function edit_tunggal($id)
	{
		$where = array('id' => $id);
		$data['tunggal'] = $this->M_admin->edit($where, 'tb_databergolong')->result();

		$data['account'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = "Edit Data Tunggal";
		$this->load->view('templates/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit_data_tunggal', $data);
		$this->load->view('templates/footer');
	}

	public function update_skor()
	{
		$id     = $this->input->post('id');
		$skor   = $this->input->post('skor');

		$data = array(
			'skor'     => $skor,
		);

		$where = array(
			'id'       => $id
		);

		$this->M_admin->update($where, $data, 'tb_databergolong');
		redirect('admin/data_tunggal');
	}

	//data bergolong
	public function data_bergolong()
	{
		$this->load->model('M_admin');
		$data = $this->M_admin->getDataBergolong();

		foreach ($data as $val) {

			$maksimum = $val['Maksimal'];
			$minimum = $val['Minimal'];
			$jumlah = $val['Jumlah'];
		}

		$n_r = 0; //rentangan
		$n_r = $maksimum - $minimum; //rentangan
		$n_k = ceil(1 + 3.33 * log10($jumlah)); //kelas
		$n_i = ceil($n_r / $n_k); //interval

		$xatas = 0;
		$xbawah = 0;
		$xbawah = $minimum;
		$nfo = 0;
		$nfrel = 0;
		$ntengah = 0;
		$npersen = 0;

		$this->db->empty_table('data_bergolong');
		for ($i = 0; $i < $n_k; $i++) {
			$xatas = $xbawah + $n_i - 1;
			$data = $this->db->query('SELECT COUNT(skor) AS frekwensi FROM tb_databergolong
				 where ((skor>=' . $xbawah . ') and (skor<=' . $xatas . '))')->row_array();

			$nfo = $data['frekwensi'];
			$ntengah = ($xbawah + $xatas) / 2;
			$npersen = $nfo / $jumlah * 100;
			$nfrel = $nfrel + $nfo;

			$data_insert = array(
				'xatas' => $xatas,
				'xbawah' => $xbawah,
				'median' => $ntengah,
				'frekwensi' => $nfo,
				'frewensi_relatif' => $nfrel,
				'presentase' => $npersen
			);
		}
		//menampilkan data bergolong

		$this->db->insert('data_bergolong', $data_insert);
		$xbawah = $xatas + 1;
		if ($xbawah > $maksimum) {
			return false;
		}
		$data['dataBergolong'] = $this->M_admin->getAllDataBergolong();

		$data['title'] = 'Data Bergolong';
		$data['account'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/data_bergolong', $data);
		$this->load->view('templates/footer');
	}
}
