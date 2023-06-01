<?php


class admin_control extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url_helper');
        $this->load->helper('text');
        $this->load->helper('date');
        $this->load->library('pagination');
        $this->load->model('Admin_model');
    }

    public function index()
    {
    }

    public function update_profile()
    {
        $this->Profile_model->updateProfile();
        $this->session->set_flashdata('success', 'Insert data succes');

        redirect('Profile_control/edit_profile');
    }
}
