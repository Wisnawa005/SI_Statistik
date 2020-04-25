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
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_prodi()
    {
        $data['title'] = 'Halaman Data Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function data_lokasi()
    {
        $data['title'] = 'Halaman Data Lokasi';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['lokasi'] = $this->M_admin->get_lokasi();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_lokasi', $data);
        $this->load->view('templates/footer');
    }

    public function data_user()
    {
        $data['title'] = 'Halaman Data User';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
    }

    public function pelaporan()
    {
        $data['title'] = 'Halaman Pelaporan';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pelaporan', $data);
        $this->load->view('templates/footer');
    }

    public function aset()
    {
        $data['title'] = 'Halaman Aset';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/aset', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }
}
