<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log_valid') == FALSE) {
			redirect(base_url('auth'));
		}
		if ($this->session->userdata('log_admin') == FALSE) {
			redirect(base_url('member/index'));
		}
		$this->load->model('Admin_model');
	}

	// function index()
	// {
	// 	if ($this->session->userdata('log_admin') == TRUE) {
	// 		$data['page'] 			= 'Dashboard';
	// 		$data['aff'] 			= $this->db->query("SELECT * FROM member WHERE level=1")->num_rows();
	// 		$data['member'] 		= $this->db->query("SELECT * FROM member WHERE level=0")->num_rows();
	// 		$data['t_ok'] 			= $this->db->query("SELECT * FROM transaksi WHERE status=2")->num_rows();
	// 		$data['t_x']			= $this->db->query("SELECT * FROM transaksi WHERE status!=2")->num_rows();

	// 		$data['trans']       	= $this->db->query("	SELECT	status,tgl_checkout,id_affiliate,
	// 																(SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
	// 																(SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
	// 														FROM transaksi ORDER BY tgl_checkout DESC LIMIT 10")->result();
	// 		$this->load->view('admin/dashboard', $data);
	// 	} else {
	// 		redirect(base_url());
	// 	}
	// }

	function index()
	{
		$data['page'] 			= 'Dashboard';
		$data['aff'] 			= $this->db->query("SELECT * FROM member WHERE level=1")->num_rows();
		$data['member'] 		= $this->db->query("SELECT * FROM member WHERE level=0")->num_rows();
		$data['t_ok'] 			= $this->db->query("SELECT * FROM transaksi WHERE status=2")->num_rows();
		$data['t_x']			= $this->db->query("SELECT * FROM transaksi WHERE status!=2")->num_rows();

		$data['trans']       	= $this->db->query("SELECT	status,tgl_checkout,id_affiliate,
															(SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
															(SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
													FROM transaksi ORDER BY tgl_checkout DESC LIMIT 10")->result();
		$this->load->view('admin/dashboard', $data);
	}


	function member($x)
	{
		$data['page'] = 'member';
		if ($x == "list") {
			$data['title'] 	 = 'Daftar Semua Member';
			$data['member']  = $this->db->query("SELECT * FROM member ORDER BY level DESC")->result();
		} elseif ($x == "pending") {
			$data['title'] 	 = 'Daftar Member Pending';
			$data['member']  = $this->db->query("SELECT * FROM member WHERE status=0")->result();
		} elseif ($x == "aktif") {
			$data['title'] 	 = 'Daftar Member Aktif';
			$data['member']  = $this->db->query("SELECT * FROM member WHERE status=1")->result();
		} elseif ($x == "banned") {
			$data['title'] 	 = 'Daftar Member Banned';
			$data['member']  = $this->db->query("SELECT * FROM member WHERE status=2")->result();
		}
		$this->load->view('admin/member/list', $data);
	}

	function member_detail($id)
	{
		$data['page'] 	= 'member';
		$data['member'] = $this->db->query("SELECT * FROM member WHERE id_member='$id'")->result();
		$this->load->view('admin/member/detail', $data);
	}

	function produk($x)
	{
		if ($x == "list") {

			if ($this->session->userdata('log_admin') == TRUE) {
				$data['page'] 	= 'produk';
				$data['title'] 	= 'Daftar Produk';
				$data['produk'] = $this->db->query("SELECT * FROM produk")->result();
				$this->load->view('admin/produk/list', $data);
			} else {
				redirect(base_url());
			}
		} elseif ($x == "act_add") {
			$config['upload_path']      = './assets/upload/produk/';
			$config['allowed_types']    = 'gif|jpg|jpeg|png';
			$config['max_size']         = 1024;
			$config['encrypt_name']     = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('img_1');
			$up = $this->upload->data();

			$data = array(
				'nama_produk'   => $this->input->post('nama_produk'),
				'harga'         => $this->input->post('harga'),
				'harga_'        => $this->input->post('harga_'),
				'keterangan'    => $this->input->post('keterangan'),
				'waktu_input'   => date('Y-m-d H:i:s'),
				'img_1'         => $up['file_name']
			);
			$this->upload->display_errors();
			$this->Admin_model->add_produk($data);
			redirect(base_url('admin/produk/list'));
		}
	}

	function transaksi($x)
	{
		if ($x == "semua") {

			$data['page'] 		= 'Transaksi';
			$data['title'] 		= 'Daftar Transaksi';
			$data['transaksi']  = $this->db->query("SELECT	id_transaksi,total,status,
															(SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
															(SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
															(SELECT email FROM member WHERE id_member=transaksi.id_member) AS email,
															(SELECT no_hp FROM member WHERE id_member=transaksi.id_member) AS no_hp,
															(SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk,
															(SELECT nama_bundle FROM produk_bundle WHERE id_produk_bundle=transaksi.id_produk_bundle) AS produk_bundle
													FROM transaksi ORDER BY tgl_checkout DESC")->result();
		} elseif ($x == "lunas") { }

		$this->load->view('admin/transaksi/list', $data);
	}

	function komisi()
	{
		$data['page'] 		= 'komisi';
		$data['title'] 		= 'Daftar Komisi Affiliasi';
		$data['komisi']     = $this->db->query("SELECT	id_member_komisi,id_transaksi,komisi,status,tgl_cair,
														(SELECT id_member FROM transaksi WHERE id_transaksi=member_komisi.id_transaksi) AS id_aff,
                                                    	(SELECT nama FROM member WHERE id_member=(SELECT id_affiliate FROM transaksi WHERE id_transaksi=member_komisi.id_transaksi)) AS aff,
                                                    	(SELECT nama_produk FROM produk WHERE id_produk=(SELECT id_produk FROM transaksi WHERE id_transaksi=member_komisi.id_transaksi)) AS produk
                                                FROM member_komisi")->result();
		$this->load->view('admin/transaksi/komisi', $data);
	}

	function add($x)
	{
		if ($x == "produk_video") {
			$data = array(
				'id_produk'     => $this->input->post('id_produk'),
				'nama_link' 	=> $this->input->post('nama_link'),
				'link'  		=> $this->input->post('link'),
				'deskripsi'  	=> $this->input->post('deskripsi'),
				'status'  		=> 1
			);

			$this->Admin_model->add('produk_link', $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Video berhasil ditambahkan...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");

			$referred_from = $this->session->userdata('referred_edit_video');
			redirect($referred_from);
		} elseif ($x == "produk_link") {
			$data = array(
				'id_produk'     => $this->input->post('id_produk'),
				'nama_link' => $this->input->post('nama_link'),
				'link'  	=> $this->input->post('link'),
				'status'  		=> 0
			);

			$this->Admin_model->add('produk_link', $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Materi berhasil ditambahkan...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/produk/list'));
		} elseif ($x == "mata_pelajaran") {
			$data = array(
				'nama_mata_pelajaran'   => $this->input->post('nama_mata_pelajaran'),
				'keterangan' 			=> $this->input->post('keterangan')
			);
			$this->Admin_model->add('mata_pelajaran', $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Data Mata Pelajaran berhasil ditambahkan...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/mata_pelajaran/pusat'));
		}
	}

	function edit($x, $y)
	{
		if ($x == "produk") {
			$data['page'] 		= 'produk';
			$data['title'] 		= 'Edit Produk';
			$data['produk'] 	= $this->db->query("SELECT * FROM produk WHERE id_produk='$y'")->result();
			$this->load->view('admin/produk/edit', $data);
		} elseif ($x == "produk_video") {
			$data['page'] 		= 'produk';
			$data['title'] 		= 'Edit Link Video Produk';
			$data['produk'] 	= $this->db->query("SELECT * FROM produk WHERE id_produk='$y'")->result();
			$data['video'] 		= $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,deskripsi,status FROM produk_link WHERE id_produk='$y' AND status=1")->result();
			$this->load->view('admin/produk/video', $data);
		} elseif ($x == "produk_link") {
			$data['page'] 	= 'produk';
			$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$y'")->result();
			$data['link'] 	= $this->db->query("SELECT * FROM produk_link WHERE id_produk='$y' AND status=0")->result();
			$this->load->view('admin/produk/link', $data);
		}
	}

	function report()
	{
		$data['page'] 	= 'report';

		$tgl_1 = $this->input->post('tgl_1');
		$tgl_2 = $this->input->post('tgl_2');
		if (empty($tgl_1 && $tgl_2)) {

			$data['title']	= 'Laporan Penjualan';
			$data['member']	= $this->db->query("SELECT m1.id_member,m1.nama,m1.no_hp,
													(SELECT COUNT(id_transaksi) FROM transaksi WHERE id_affiliate=m1.id_member AND status=2) AS penjualan,
													(SELECT COUNT(*) FROM member m2 WHERE m2.id_upline=m1.id_member AND m2.level=1) AS team,
													(SELECT COUNT(id_transaksi) FROM transaksi WHERE id_affiliate IN (SELECT id_member FROM member WHERE id_upline=m1.id_member) AND status=2) AS penjualan_team
											FROM member m1 WHERE level=1 ORDER BY penjualan DESC,penjualan_team DESC,team DESC")->result();
		} else {
			$data['title']	= 'Laporan Penjualan';
			$data['member']	= $this->db->query("SELECT m1.id_member,m1.nama,m1.no_hp,
													(SELECT COUNT(id_transaksi) FROM transaksi WHERE id_affiliate=m1.id_member AND status=2 AND tgl_checkout BETWEEN '$tgl_1' AND '$tgl_2') AS penjualan,
													(SELECT COUNT(*) FROM member m2 WHERE m2.id_upline=m1.id_member AND m2.level=1 AND tgl_reg BETWEEN '$tgl_1' AND '$tgl_2') AS team,
													(SELECT COUNT(id_transaksi) FROM transaksi WHERE id_affiliate IN (SELECT id_member FROM member WHERE id_upline=m1.id_member) AND status=2  AND tgl_checkout BETWEEN '$tgl_1' AND '$tgl_2') AS penjualan_team					
											FROM member m1 WHERE level=1 ORDER BY penjualan DESC,penjualan_team DESC,team DESC")->result();
			$data['tgl_1']	= $tgl_1;
			$data['tgl_2']	= $tgl_2;
		}
		$this->load->view('admin/report', $data);
	}

	function statistik()
	{
		$data['page']	= 'stat';
		$data['title'] 	= 'Statistik Member';
		$data['member'] = $this->db->query("SELECT id_member,username,nama,no_hp,email,
													(SELECT COUNT(id_transaksi) FROM transaksi WHERE id_affiliate=member.id_member) AS penjualan,
													(SELECT SUM(komisi) FROM member_komisi WHERE id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE id_affiliate=member.id_member)) AS komisi
													FROM member ORDER BY komisi DESC")->result();
		$this->load->view('admin/statistik', $data);
	}

	// function produk_link($id)
	// {
	// 	if ($this->session->userdata('log_admin') == TRUE) {
	// 		$data['page'] 	= 'produk';
	// 		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'")->result();
	// 		$data['link'] 	= $this->db->query("SELECT * FROM produk_link WHERE id_produk='$id' AND status=0")->result();
	// 		$this->load->view('admin/produk/link', $data);
	// 	} else {
	// 		redirect(base_url());
	// 	}
	// }

	// function produk_video($id)
	// {
	// 	if ($this->session->userdata('log_admin') == TRUE) {
	// 		$data['page'] 	= 'produk';
	// 		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'")->result();
	// 		$data['link'] 	= $this->db->query("SELECT * FROM produk_link WHERE id_produk='$id' AND status=1")->result();
	// 		$this->load->view('admin/produk/video', $data);
	// 	} else {
	// 		redirect(base_url());
	// 	}
	// }

	function set($x, $y, $z)
	// $x = modul, $y = status, $z = id
	{
		$data = array('status' => $y);

		if ($x == "member") {
			$this->Admin_model->update($x, array('id_member'  => $z), $data);
			$page = "admin/member/list";
		} elseif ($x == "member_level") {
			$this->db->query("UPDATE member SET level = '$y' WHERE id_member ='$z'");
			$page = "admin/member/list";
		} elseif ($x == "produk") {
			$this->Admin_model->update($x, array('id_produk'  => $z), $data);
			$page = "admin/produk/list";
		} elseif ($x == "transaksi") {

			date_default_timezone_set('Asia/Jakarta');
			$now 		= date("Y-m-d h:i:s");
			$data_trans = array(
				'status' => $y,
				'tgl_bayar' => $now
			);
			$this->Admin_model->update($x, array('id_transaksi'  => $z), $data_trans);
			$this->db->query("UPDATE member SET status = '1' WHERE id_member = (SELECT id_member FROM transaksi WHERE id_transaksi=$z)");
			$page = "admin/transaksi/semua";
		}

		$this->session->set_flashdata("report", "<div class='panel panel-warning'><div class='panel-heading'><div class='panel-title'>Status berhasil diubah...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
		redirect(base_url($page));
	}

	function act($x, $id)
	{
		if ($x == "edit_produk") {
			$data = array(
				'nama_produk'     	=> $this->input->post('nama_produk'),
				'harga'     		=> $this->input->post('harga'),
				'harga_' 			=> $this->input->post('harga_'),
				// 'img_1'  			=> $this->input->post('img_1'),
				// 'img_2'  			=> $this->input->post('img_2'),
				'keterangan'  		=> $this->input->post('keterangan')
			);

			$this->Admin_model->update("produk", array('id_produk'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Data area berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/produk/list'));
		} elseif ($x == "resetpassword") {
			$this->db->query("UPDATE member SET password = 'e10adc3949ba59abbe56e057f20f883e' WHERE id_member='$id'");

			$this->session->set_flashdata("report", "<div class='panel panel-warning'><div class='panel-heading'><div class='panel-title'>Password member area berhasil direset menjadi (123456)...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/member/list'));
		} elseif ($x == "edit_produk_video") {
			$data = array(
				'nama_link'	=> $this->input->post('nama_link'),
				'deskripsi'	=> $this->input->post('deskripsi'),
				'link'    	=> $this->input->post('link')
			);
			$this->Admin_model->update("produk_link", array('id_produk_link'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Video berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");

			$referred_from = $this->session->userdata('referred_edit_video');
			redirect($referred_from);
		} 
	}

	function del($x, $id)
	{
		if ($x == "area") {
			// $where = array('id_area' => $id);
			// $this->Admin_model->del($where, 'area');
			$data = array(
				'status' => 3
			);
			$this->Admin_model->update("area", array('id_area'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Data area berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/area'));
		} elseif ($x == "produk_link") {
			$data = array(
				'status' => 3
			);
			$this->Admin_model->del(array('id_produk_link'  => $id), "produk_link");

			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Video berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			$referred_from = $this->session->userdata('referred_edit_video');
			redirect($referred_from);
		} elseif ($x == "transaksi") {
			$data = array(
				'status' => 3
			);
			$this->Admin_model->del(array('id_transaksi'  => $id), "$x");
			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Transaksi berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/transaksi/semua'));
		} elseif ($x == "member") {
			$this->db->delete($x, array('id_member'  => $id));
			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Member berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/member/list'));
		}
	}




	function pertanyaan($x)
	{
		if ($this->session->userdata('log_admin') == TRUE) {

			$data['page'] = '?';
			if ($x == "semua") {
				$data['title'] 		= 'Daftar Pertanyaan';
				$data['pertanyaan'] = $this->db->query("SELECT  id,id_up,id_produk_link,id_member,komen,waktu,status,
															(SELECT nama FROM member WHERE id_member=produk_link_comment.id_member) AS member,
															(SELECT nama_link FROM produk_link WHERE id_produk_link=produk_link_comment.id_produk_link) AS nama_link
															-- ,(SELECT link FROM produk_link WHERE id_produk_link=produk_link_comment.id_produk_link) AS link
                                                            FROM produk_link_comment")->result();
				$this->load->view('admin/member/pertanyaan', $data);
			} elseif ($x == "jawab") {
				$data['title'] 		= 'Jawab Pertanyaan';
				$data['pertanyaan'] = $this->db->query("SELECT  id,id_up,id_produk_link,id_member,komen,waktu,status,
															(SELECT nama FROM member WHERE id_member=produk_link_comment.id_member) AS member,
															(SELECT nama_link FROM produk_link WHERE id_produk_link=produk_link_comment.id_produk_link) AS nama_link
                                                            FROM produk_link_comment")->result();
				$this->load->view('admin/member/pertanyaan', $data);
			}
		} else {
			redirect(base_url());
		}
	}

	function video($id, $idp)
	{
		if ($this->session->userdata('log_admin') == TRUE) {

			$this->db->query("UPDATE produk_link_comment SET notif_admin = '1' WHERE id='$idp'");
			// $this->db->query("UPDATE produk_link_comment SET notif_member = '1' WHERE id='$idp')");
			$data['page'] 		= '?';
			$data['title'] 		= 'Pertanyaan';
			$data['idp'] 		= $idp;
			$data['video'] 		= $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,deskripsi,status FROM produk_link WHERE id_produk_link='$id'")->result();
			$this->load->view('admin/pertanyaan_video', $data);
		}
	}
}
