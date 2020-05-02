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

    //user
    public function data_user()
    {
        $data['title'] = 'Halaman Data User';
        $data['account'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get_where('tb_user', ['name' => $this->session->userdata('name')])->row_array();
        $data['user'] = $this->db->get('tb_user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
    }

    public function delete_user($id)
    {
        $where = array('id_user' => $id);
        $this->M_admin->delete($where, 'tb_user');
        redirect('admin/data_user');
    }

    //end user

    //data prodi
    public function data_prodi()
    {
        $data['title'] = 'Halaman Data Prodi';
        $data['account'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_prodi', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('jurusan', 'Nama Jurusan', 'required');
        $this->form_validation->set_rules('fakultas', 'Nama Fakultas', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {
            $data = [
                'nama_prodi'   => $this->input->post('nama_prodi'),
                'jurusan'   => $this->input->post('jurusan'),
                'fakultas'   => $this->input->post('fakultas')
            ];

            $this->db->insert('tb_prodi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Lokasi Added!</div>');
            redirect('admin/data_prodi');
        }
    }

    public function delete_prodi($id)
    {
        $where = array('id_prodi' => $id);
        $this->M_admin->delete($where, 'tb_prodi');
        redirect('admin/data_prodi');
    }

    //end data prodi

    // data lokasi 
    public function data_lokasi()
    {
        $data['title'] = 'Halaman Data Lokasi';
        $data['account'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['lokasi'] = $this->M_admin->get_lokasi();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_lokasi/data_lokasi', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_lab', 'Nama Lab', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {
            $data = [
                'id_prodi'   => $this->input->post('id_prodi'),
                'nama_lab'   => $this->input->post('nama_lab')
            ];

            $this->db->insert('tb_lokasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Lokasi Added!</div>');
            redirect('admin/data_lokasi');
        }
    }

    public function delete_lokasi($id)
    {
        $where = array('id_lokasi' => $id);
        $this->M_admin->delete($where, 'tb_lokasi');
        redirect('admin/data_lokasi');
    }
    //end data lokasi

    //data aset
    public function aset()
    {
        $data['title'] = 'Halaman Master Data Aset';
        $data['account'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dataaset'] = $this->M_admin->get_dataaset();
        $data['aset'] = $this->db->get('tb_lokasi')->result_array();

        $this->form_validation->set_rules('id_lokasi', 'Nama Lab', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/aset', $data);
            $this->load->view('templates/footer');
        } else {
            $gambar = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./upload/image')
            );
            $this->load->library('upload', $gambar);
            $this->upload->do_upload('image');
            $data = [
                'id_lokasi'     => $this->input->post('id_lokasi'),
                'nama_barang'   => $this->input->post('nama_barang'),
                'spesifikasi'   => $this->input->post('spesifikasi'),
                'jumlah'        => $this->input->post('jumlah'),
                'satuan'        => $this->input->post('satuan'),
                'keterangan'    => $this->input->post('keterangan'),
                'foto'          => $_FILES['image']['name']

            ];

            $this->db->insert('tb_aset', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Lokasi Added!</div>');
            redirect('admin/aset');
        }
    }

    public function delete_aset($id)
    {
        $where = array('kode_aset' => $id);
        $this->M_admin->delete($where, 'tb_aset');
        redirect('admin/aset');
    }
    //end aset

    //data pelaporan
    public function pelaporan()
    {
        $data['title'] = 'Halaman Pelaporan';
        $data['account'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pelaporan', $data);
        $this->load->view('templates/footer');
    }
    //end data pelaporan

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
}
