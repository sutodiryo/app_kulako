<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('Auth_model');
	}

	function index()
	{
		$this->load->view('login');
	}

	function forgot_password()
	{
		$this->load->view('forgot.php');
	}

	public function login()
	{
		$username 	= $this->security->xss_clean($this->input->post('username'));
		$password 	= md5($this->security->xss_clean($this->input->post('password')));

		$member     = $this->db->query("SELECT * FROM member WHERE password = '" . $password . "' AND (username= '" . $username . "' OR email = '" . $username . "')");
		$member_cek	= $member->num_rows();
		$member_row	= $member->row();

		$admin		= $this->db->query("SELECT * FROM admin WHERE password = '" . $password . "' AND (username = '" . $username . "' OR email = '" . $username . "')");
		$admin_cek	= $admin->num_rows();
		$admin_row	= $admin->row();

		if ($member_cek == 1) {
			$data_login = array(
				'log_id'        => $member_row->id_member,
				'log_user'      => $member_row->username,
				'log_name'      => $member_row->nama,
				'log_email'  	=> $member_row->email,
				'log_status'    => $member_row->status,
				'log_level'    	=> $member_row->level,
				'log_admin'    	=> false,
				'log_valid'     => true
			);

			$this->session->set_userdata($data_login);
			$login = $this->input->post('login');
			if ($login == "checkout") {
				$referred_from = $this->session->userdata('referred_checkout');
				redirect($referred_from);
			} elseif ($login == "invoice") {
				redirect(base_url('member/transaksi/beli'));
			} else {
				redirect(base_url('member/index'));
			}
		} elseif ($admin_cek == 1) {
			$data_login = array(
				'log_id'        => $admin_row->id_admin,
				'log_user'      => $admin_row->username,
				'log_name'      => $admin_row->name,
				'log_email'  	=> $admin_row->email,
				'log_level'     => $admin_row->level,
				'log_admin'     => true,
				'log_valid'     => true
			);
			$this->session->set_userdata($data_login);
			redirect(base_url('admin'));
		} else {
			$this->session->set_flashdata("report", "<div class='form-login-error' style=\"display: block; height: auto;\"><h3>Invalid login</h3> <p>Username atau Password yang anda masukkan Salah!!.</p></div>");
			redirect(base_url('login'));
		}
	}

	function check_email()
	{
		$email   = $this->input->post('email');
		$row     = $this->db->query("SELECT email FROM member WHERE email='$email'")->num_rows();

		if ($row == 0) {
			return true;
		} else {
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
