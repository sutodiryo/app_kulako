<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->p(13, 1);
	}

	function sorder($idp, $idm)
	{
		$data['idp'] = $idp;
		$data['idm'] = $idm;
		$this->load->view('front/affiliate_order', $data);
	}


	//PRODUK(kelas)
	function s($id_produk, $id_aff)
	{
		$data['id_aff'] = $id_aff;
		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'")->result();
		$this->load->view('member/ref/checkout', $data);
	}


	//Produk Bundling Landingpage
	function p($id_aff, $id_bundle) //bundle
	{
		$data['aff'] 	= $this->db->query("SELECT * FROM member WHERE id_member='$id_aff'")->result();
		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk_bundle='$id_bundle'")->result();
		$data['video'] 	= $this->db->query("SELECT * FROM produk_link WHERE id_produk IN (SELECT id_produk FROM produk WHERE id_produk_bundle='$id_bundle') AND status=1")->result();
		$this->load->view('member/ref/landingpage', $data);
	}

	//Produk Bundling checkout
	function b($id_aff, $id_bundle) //bundle
	{
		$data['id_aff'] = $id_aff;
		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk_bundle='$id_bundle'")->result();
		$data['bundle'] = $this->db->query("SELECT 	id_produk_bundle,nama_bundle,harga,harga_,cover,status,
													(SELECT COUNT(link) FROM produk_link WHERE id_produk IN (SELECT id_produk FROM produk WHERE id_produk_bundle=produk_bundle.id_produk_bundle) AND status=1) AS total_video
													FROM produk_bundle WHERE id_produk_bundle='$id_bundle'")->result();
		$this->load->view('member/ref/checkout_bundle', $data);
	}

	function checkout()
	{

		date_default_timezone_set('Asia/Jakarta');
		$now = date("Y-m-d h:i:s");

		if ($this->input->post('submit') == "guest_checkout") {

			$data = array(
				'nama'			=> $this->input->post('nama'),
				'email'			=> $this->input->post('email'),
				'no_hp'			=> $this->input->post('no_hp'),
				'tgl_reg'		=> $now,
				'password'		=> md5($this->security->xss_clean($this->input->post('password')))
			);

			$this->db->insert('member', $data);
			$id_member = $this->db->insert_id();

			$guest_trans = array(
				'id_transaksi'		=> NULL,
				'id_produk_bundle'	=> $this->input->post('id_produk_bundle'),
				'id_affiliate'		=> $this->input->post('id_affiliate'),
				'id_member'			=> $id_member,
				'total'				=> $this->input->post('total'),
				'tgl_checkout'		=> $now,
				'tgl_bayar'			=> NULL,
				'status'			=> 0
			);
			$this->db->insert('transaksi', $guest_trans);
			$this->load->view('guest/invoice');
		} elseif ($this->input->post('submit') == "checkout") {

			$id_member 	= $this->input->post('id_member');
			$aff = $this->db->query("SELECT id_upline FROM member WHERE id_member='$id_member'")->result();
			foreach ($aff as $a) {
				$id_aff = $a->id_upline;
			}

			$trans = array(
				'id_transaksi'		=> NULL,
				'id_produk_bundle'	=> $this->input->post('id_produk_bundle'),
				'id_member'			=> $id_member,
				'id_affiliate'		=> $id_aff,
				'total'				=> $this->input->post('total'),
				'tgl_checkout'		=> $now,
				'tgl_bayar'			=> NULL,
				'status'			=> 0
			);
			$this->db->insert('transaksi', $trans);
			$this->load->view('member/invoice');
		}
	}

	function inv(){
		$this->load->view('member/invoice');
	}


	function process()
	{
		$this->load->model('Auth_model');

		$id_produk		= $this->input->post('id_produk');
		$id_affiliate	= $this->input->post('id_affiliate');
		$total			= $this->input->post('total');

		if ($this->input->post('submit') == "checkout") {

			// $id_member	= $this->input->post('id_member');
			// $this->db->query("INSERT INTO `transaksi`	(`id_transaksi`, `id_produk`, `id_affiliate`, `id_member`, `total`, `tgl_checkout`, `tgl_bayar`, `status`)
			// VALUES 	(NULL, '$id_produk', '$id_affiliate', '$id_member', '$total', NOW(), NULL, '0')");
			date_default_timezone_set('Asia/Jakarta');
			$now 	= date("Y-m-d h:i:s");
			$data 	= array(
				'id_transaksi'	=> NULL,
				'id_produk'		=> $this->input->post('id_produk'),
				'id_affiliate'	=> $this->input->post('id_affiliate'),
				'id_member'		=> $this->input->post('id_member'),
				'total'			=> $this->input->post('total'),
				'tgl_checkout'	=> $now,
				'tgl_bayar'		=> NULL,
				'status'		=> 0
			);

			$this->Auth_model->add('transaksi', $data);
			$this->load->view('member/transaksi/invoice', $data);
		} elseif ($this->input->post('submit') == "guest_checkout") {

			$data = array(
				'id_produk'		=> $this->input->post('id_produk'),
				'id_affiliate'	=> $this->input->post('id_affiliate'),
				'id_member'		=> $this->input->post('id_member'),
				'total'			=> $this->input->post('total'),
				'kode_area'     => $this->input->post('kode_area'),
				'nama_area'     => $this->input->post('nama_area'),
				'alamat_kantor' => $this->input->post('alamat_kantor'),
				'latitude'  	=> $this->input->post('latitude'),
				'longitude'  	=> $this->input->post('longitude'),
				'password'  	=> md5($this->input->post('password')),
				'admin'  		=> $this->input->post('admin')
			);
			$this->Auth_model->add('member', $data);

			$q = $this->db->query("SELECT id_member ")->row();
			$id_member	= "";
			$this->db->query("INSERT INTO `transaksi`	(`id_transaksi`, `id_produk`, `id_affiliate`, `id_member`, `total`, `tgl_checkout`, `tgl_bayar`, `status`)
												VALUES 	(NULL, '$id_produk', '$id_affiliate', '$id_member', '$total', NOW(), NULL, '0')");

			$this->load->view('member/transaksi/invoice', $data);
		}
	}
}
