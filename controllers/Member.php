<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE) {
            redirect(base_url('login'));
        }
    }

    function index()
    {
        // $data['page']           = 'Dashboard';
        // $id                     = $this->session->userdata('log_id');
        // $data['produk']         = $this->db->query("SELECT * FROM produk")->num_rows();
        // $data['transaksi']      = $this->db->query("SELECT * FROM transaksi WHERE id_member='$id' OR id_affiliate='$id'")->num_rows();
        // $data['penjualan']      = $this->db->query("SELECT * FROM transaksi WHERE id_affiliate='$id'")->num_rows();
        // $data['pembelian']      = $this->db->query("SELECT * FROM transaksi WHERE id_member='$id'")->num_rows();

        // $data['akses']          = $this->db->query("SELECT  id_produk,nama_produk,harga,harga_,img_1,img_2,keterangan,status,
        //                                                     (SELECT COUNT(status) FROM transaksi WHERE id_produk=produk.id_produk AND id_member='$id') AS status_2,
        //                                                     (SELECT tgl_checkout FROM transaksi WHERE id_produk=produk.id_produk AND id_member='$id') AS tgl
        //                                                     FROM produk WHERE status=1 AND (SELECT COUNT(status) FROM transaksi WHERE id_produk=produk.id_produk AND id_member='$id')>0")->result();
        if ($this->session->userdata('log_level') == 1) {
            $this->tutorial();
            // $this->link();
        } else {
            $data['page']   = 'kelas';
            $data['title']  = 'KELAS ONLINE MEMBANGUN BISNIS BERSAMA COACH FJS';
            $id = $this->session->userdata('log_id');
            $data['produk'] = $this->db->query("SELECT  id_produk,nama_produk,harga,harga_,img_1,img_2,keterangan,waktu_input,status,
                                                    (SELECT status FROM transaksi WHERE (id_produk=produk.id_produk OR id_produk_bundle=produk.id_produk_bundle)  AND id_member='$id') AS status_2,
                                                    (SELECT COUNT(link) FROM produk_link WHERE id_produk=produk.id_produk AND status =1) AS total_video,
                                                    (SELECT id_produk_bundle FROM transaksi WHERE id_produk_bundle=produk.id_produk_bundle AND id_member='$id') AS bundle
                                                    FROM produk WHERE status=1")->result();
            $this->load->view('member/index', $data);
        }
    }


    function tutorial(){
        $this->load->view('member/tutorial');
    }

    function affiliate()
    {
        $id = $this->session->userdata('log_id');

        $data = array(
            'level'   => 1
        );
        $this->db->update('member', $data, array('id_member'  => $id));
        // $this->Admin_model->update($x, array('id_produk'  => $id), $data);
        $this->session->set_userdata('log_level', 1);
        redirect('member/index');
    }

    function profile()
    {
        $data['page']       = 'profile';
        $data['title']      = 'Profile';
        $id = $this->session->userdata('log_id');
        $data['profile']    = $this->db->query("SELECT * FROM member WHERE id_member='$id'")->result();
        $this->load->view('member/profile', $data);
    }


    function team($id)
    {
        if ($this->session->userdata('log_id') == $id) {
            $data['page']       = 'team';
            $data['title']      = 'Daftar Team';
            $data['team']        = $this->db->query("SELECT  id_member,nama,no_hp,
                                                        (SELECT COUNT(id_transaksi) FROM transaksi WHERE id_affiliate=member.id_member) AS penjualan
                                                FROM member WHERE level=1 AND id_upline='$id' ORDER BY penjualan DESC")->result();
            $this->load->view('member/team', $data);
        } else {
            redirect('member/index');
        }
    }

    function link()
    {
        $data['page']   = 'link';
        $data['title']  = 'Link Afiliasi';
        $data['produk'] = $this->db->query("SELECT * FROM produk_bundle WHERE status=1")->result();

        $this->load->view('member/link', $data);
    }

    function paket()
    {
        $data['page']   = 'produk';
        $data['title']  = 'Akses Produk';
        $id = $this->session->userdata('log_id');
        $data['produk'] = $this->db->query("SELECT  id_produk,nama_produk,harga,harga_,img_1,img_2,keterangan,waktu_input,status,
                                                    (SELECT status FROM transaksi WHERE (id_produk=produk.id_produk OR id_produk_bundle=produk.id_produk_bundle)  AND id_member='$id') AS status_2,
                                                    (SELECT id_produk_bundle FROM transaksi WHERE id_produk_bundle=produk.id_produk_bundle AND id_member='$id') AS bundle
                                                    FROM produk WHERE status=1")->result();
        $data['trans'] = $this->db->query("SELECT id_transaksi FROM transaksi WHERE id_member='$id' AND status=2")->num_rows();
        $this->load->view('member/produk/paket', $data);
    }

    function ruang_kelas()
    {
        // $data['page']   = 'produk';
        // $data['title']  = 'Akses Produk';
        // $id = $this->session->userdata('log_id');
        // $data['produk'] = $this->db->query("SELECT  id_produk,nama_produk,harga,harga_,img_1,img_2,keterangan,waktu_input,status,
        //                                             (SELECT status FROM transaksi WHERE (id_produk=produk.id_produk OR id_produk_bundle=produk.id_produk_bundle)  AND id_member='$id') AS status_2,
        //                                             (SELECT id_produk_bundle FROM transaksi WHERE id_produk_bundle=produk.id_produk_bundle AND id_member='$id') AS bundle
        //                                             FROM produk WHERE status=1")->result();
        // $this->load->view('member/produk/list', $data);
        $data['page']   = 'kelas';
        $data['title']  = 'KELAS ONLINE MEMBANGUN BISNIS BERSAMA COACH FJS';
        $id = $this->session->userdata('log_id');
        $data['produk'] = $this->db->query("SELECT  id_produk,nama_produk,harga,harga_,img_1,img_2,keterangan,waktu_input,status,
                                                    (SELECT status FROM transaksi WHERE (id_produk=produk.id_produk OR id_produk_bundle=produk.id_produk_bundle)  AND id_member='$id') AS status_2,
                                                    (SELECT COUNT(link) FROM produk_link WHERE id_produk=produk.id_produk AND status =1) AS total_video,
                                                    (SELECT id_produk_bundle FROM transaksi WHERE id_produk_bundle=produk.id_produk_bundle AND id_member='$id') AS bundle
                                                    FROM produk WHERE status=1")->result();

        $data['trans'] = $this->db->query("SELECT * FROM transaksi WHERE id_member='$id'")->num_rows();
        $this->load->view('member/produk/ruang_kelas', $data);
    }

    //KELAS
    function kelas($id)
    {
        $data['page']   = 'kelas';
        $data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'")->result();
        $data['link']   = $this->db->query("SELECT  id_produk_link,id_produk,nama_link,link,status,deskripsi
                                                    -- ,pl.id_produk_link,pl.id_produk,pl.nama_link,pl.link,pl.status,
                                                    -- ENUM(SELECT komen
                                                    -- FROM produk_link_comment plc
                                                    --     WHERE plc.id_produk_link=pl.id_produk_link) AS comment
                                                    -- select  u.usr_id,name,
                                                    --         array(
                                                    --             select tag_id
                                                    --             from tags t
                                                    --             where t.usr_id = u.usr_id
                                                    --             ) as tag_arr
                                                    -- from users u
                                                    
                                                    FROM produk_link WHERE id_produk='$id' AND status=1")->result();

        // $config['per_page'] = 20;

        // $this->pagination->initialize($config);

        // echo $this->pagination->create_links();

        $data['link_comment'] = $this->db->query("SELECT * FROM produk_link_comment WHERE id_produk_link IN (SELECT id_produk_link FROM produk_link WHERE id_produk='$id')")->result();
        $this->load->view('member/kelas2', $data);
    }

    function materi($id)
    {
        $data['page']   = 'produk';
        $data['produk'] = $this->db->query("SELECT * FROM produk_bundle WHERE id_produk_bundle='$id'")->result();
        $data['link']   = $this->db->query("SELECT * FROM produk_link WHERE status=0 AND id_produk IN (SELECT id_produk FROM produk WHERE id_produk_bundle='$id' ORDER BY id_produk_link DESC)")->result();
        $this->load->view('member/produk/materi', $data);
    }

    function k($id)
    {
        $data['page']   = "$id";
        $data['id']     = "$id";
        $data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'")->result();
        $data['link']   = $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,status FROM produk_link WHERE id_produk_link='$id'")->result();
        $this->load->view('member/kelas_l', $data);
    }

    function komentar($id)
    {
        $id_up = $this->input->post('id_up');

        if ($this->session->userdata('log_admin') == TRUE) {
            $this->db->query("UPDATE produk_link_comment SET notif_admin = '2' WHERE id='$id_up'");
            $id_member = -1;
        } else {
            $this->db->query("UPDATE produk_link_comment SET notif_member = '2' WHERE id='$id_up'");
            $id_member = $this->session->userdata('log_id');
        }
        $data = array(
            'id_up'             => $id_up,
            'id_member'         => $id_member,
            'id_produk_link	'   => $id,
            'komen'             => $this->input->post('comment')
        );
        $this->db->insert('produk_link_comment', $data);
        // $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Komentar terkirim...</strong><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");

        $this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Pertanyaan anda telah terkirim...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");

        $referred_from = $this->session->userdata('referred_kelas');
        redirect($referred_from);
    }

    function transaksi($x)
    {
        $id = $this->session->userdata('log_id');
        if ($x == "beli") {
            $data['page']       = 'beli';
            $data['title']      = 'Transaksi Pembelian';
            $data['beli']       = $this->db->query("SELECT  id_transaksi,total,status,tgl_checkout,tgl_bayar,bukti_transfer,
                                                            (SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
                                                            (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                                                            (SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk,
                                                            (SELECT nama_bundle FROM produk_bundle WHERE id_produk_bundle=transaksi.id_produk_bundle) AS produk_bundle
                                                            FROM transaksi WHERE id_member='$id'")->result();
            $this->load->view('member/transaksi/beli', $data);
        } elseif ($x == "jual") {
            $data['page']       = 'jual';
            $data['title']      = 'Transaksi Penjualan';
            $data['jual']       = $this->db->query("SELECT  id_transaksi,total,status,tgl_checkout,tgl_bayar,
                                                            (SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
                                                            (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                                                            (SELECT no_hp FROM member WHERE id_member=transaksi.id_member) AS kontak,
                                                            (SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk,
                                                            (SELECT nama_bundle FROM produk_bundle WHERE id_produk_bundle=transaksi.id_produk_bundle) AS produk_bundle
                                                            FROM transaksi WHERE id_affiliate='$id'")->result();

            $this->load->view('member/transaksi/jual', $data);
        } elseif ($x == "komisi") {
            $data['page']   = 'komisi';
            $data['title']  = 'Komisi Penjualan';

            $id             = $this->session->userdata('log_id');
            $tgl_1          = $this->input->post('tgl_1');
            $tgl_2          = $this->input->post('tgl_2');

            if (empty($tgl_1 && $tgl_2)) {
                // $data['komisi']     = $this->db->query("SELECT  id_member_komisi,id_transaksi,komisi,status,tgl_cair,
                //                                                 (SELECT id_member FROM transaksi WHERE id_transaksi=member_komisi.id_transaksi) AS id_aff,
                //                                                 (SELECT nama FROM member WHERE id_member=(SELECT id_affiliate FROM transaksi WHERE id_transaksi=member_komisi.id_transaksi)) AS aff,
                //                                                 (SELECT nama_produk FROM produk WHERE id_produk=(SELECT id_produk FROM transaksi WHERE id_transaksi=member_komisi.id_transaksi)) AS produk
                //                                                 FROM member_komisi WHERE id_transaksi=(SELECT id_transaksi FROM transaksi WHERE id_affiliate='$id')")->result();
                // $data['total']     = $this->db->query("SELECT SUM(komisi) AS total FROM member_komisi WHERE id_transaksi=(SELECT id_transaksi FROM transaksi WHERE id_affiliate='$id')")->result();

                $data['komisi']     = $this->db->query("SELECT  id_affiliate,
                                                                (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                                                                (SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff
                                                        FROM transaksi
                                                        WHERE status=2 AND (id_affiliate='$id' OR id_affiliate IN (SELECT id_member FROM member WHERE id_upline='$id'))")->result();

                $data['totalk']     = $this->db->query("SELECT id_transaksi FROM transaksi WHERE id_affiliate='$id' AND status=2")->num_rows();
                $data['totalf']     = $this->db->query("SELECT id_transaksi FROM transaksi WHERE id_affiliate IN (SELECT id_member FROM member WHERE id_upline='$id') AND status=2")->num_rows();
            } else {
                $data['komisi']     = $this->db->query("SELECT  id_affiliate,
                                                                (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                                                                (SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff
                                                        FROM transaksi
                                                        WHERE status=2 AND tgl_bayar BETWEEN '$tgl_1' AND '$tgl_2' AND (id_affiliate='$id' OR id_affiliate IN (SELECT id_member FROM member WHERE id_upline='$id'))")->result();

                $data['totalk']     = $this->db->query("SELECT id_transaksi FROM transaksi WHERE id_affiliate='$id' AND status=2 AND tgl_bayar BETWEEN '$tgl_1' AND '$tgl_2'")->num_rows();
                $data['totalf']     = $this->db->query("SELECT id_transaksi FROM transaksi WHERE id_affiliate IN (SELECT id_member FROM member WHERE id_upline='$id') AND status=2 AND tgl_bayar BETWEEN '$tgl_1' AND '$tgl_2'")->num_rows();

                $data['tgl_1']      = $tgl_1;
                $data['tgl_2']      = $tgl_2;
            }

            $this->load->view('member/transaksi/komisi', $data);
        }
    }

    function invoices()
    {
        $this->load->view('member/transaksi/invoice');
    }

    function invoice($id_trans)
    {
        $data['page']       = 'beli';
        $data['title']      = 'Invoice Pembelian';
        $data['beli']       = $this->db->query("SELECT  id_transaksi,total,status,tgl_checkout,tgl_bayar,
                                                        (SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
                                                        (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                                                        (SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
                                                        FROM transaksi WHERE id_member='$id_trans'")->result();

        $this->load->view('member/transaksi/invoice', $data);
    }

    function konfirmasi($id_trans)
    {
        $data['page']       = 'beli';
        $data['title']      = 'Konfirmasi Pembayaran';
        $data['transaksi']  = $this->db->query("SELECT  *
                                                        -- id_transaksi,total,status,tgl_checkout,tgl_bayar,
                                                        -- (SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
                                                        -- (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
                                                        -- (SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
                                                        FROM transaksi WHERE id_transaksi='$id_trans'")->result();

        $this->load->view('member/transaksi/konfirmasi', $data);
    }

    function up_bukti()
    {
        // $data = array(
        //     'nama_mata_pelajaran'   => $this->input->post('nama_mata_pelajaran'),
        //     'keterangan'            => $this->input->post('keterangan')
        // );

        $config['upload_path']      = './assets/upload/bukti/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti_transfer');
        $up = $this->upload->data();

        $data = array(
            'status'            => 1,
            'bukti_transfer'    => $up['file_name']
        );
        $this->upload->display_errors();
        $id_transaksi = $this->input->post('id_transaksi');

        $this->db->update('transaksi', $data, array('id_transaksi'  => $id_transaksi));
        $this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Data Mata Pelajaran berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
        redirect(base_url('member/transaksi/beli'));
    }

    //END of TRANSAKSI


    function act($x, $id)
    {
        if ($x == "edit_area") {
            $data = array(
                'kode_area'     => $this->input->post('kode_area'),
                'nama_area'     => $this->input->post('nama_area'),
                'alamat_kantor' => $this->input->post('alamat_kantor'),
                'latitude'      => $this->input->post('latitude'),
                'longitude'     => $this->input->post('longitude'),
                'member'        => $this->input->post('member')
            );
            $this->member_model->update("area", array('id_area'  => $id), $data);
            $this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Data area berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
            redirect(base_url('member/area'));
        } elseif ($x == "password_member") {

            $data = array(
                'password' => "5f4dcc3b5aa765d61d8327deb882cf99"
            );
            $this->member_model->update("area", array('id_area'  => $id), $data);

            $this->session->set_flashdata("report", "<div class='panel panel-warning'><div class='panel-heading'><div class='panel-title'>Password member area berhasil direset...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
            redirect(base_url('member/area'));
        } elseif ($x == "up_bukti") {

            $data = array(
                'nama_mata_pelajaran'   => $this->input->post('nama_mata_pelajaran'),
                'keterangan'            => $this->input->post('keterangan')
            );
            $this->member_model->update("mata_pelajaran", array('id_mata_pelajaran'  => $id), $data);

            $this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Data Mata Pelajaran berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
            redirect(base_url('member/mata_pelajaran/pusat'));
        }
    }

    function video_comment($id, $idp)
    {
        $this->db->query("UPDATE produk_link_comment SET notif_member = '1' WHERE id='$idp'");
        // $this->db->query("UPDATE produk_link_comment SET notif_member = '1' WHERE id='$idp')");
        $data['page']           = '?';
        $data['title']          = 'Pertanyaan';
        $data['idp']            = $idp;
        $data['video']          = $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,deskripsi,status FROM produk_link WHERE id_produk_link='$id'")->result();
        $this->load->view('_/member/kelas/video_comment', $data);
    }

    function video($id)
    {
        $data['page']         = '?';
        $data['title']         = 'Pertanyaan';
        $data['video']         = $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,deskripsi,status FROM produk_link WHERE id_produk_link='$id'")->result();
        $this->load->view('_/member/kelas/video', $data);
    }

    function cari()
    {
        $keyword        = $this->input->post('cari');
        $data['key']    = $this->input->post('cari');
        $data['page']   = 'cari';
        $data['title']  = 'Pencarian';

        $kelas          = $this->db->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
        $data['kelas']  = $kelas->result();
        $data['kelasr'] = $kelas->num_rows();

        $video          = $this->db->query("SELECT * FROM produk_link WHERE nama_link LIKE '%$keyword%' AND status=1");
        $data['video']  = $video->result();
        $data['videor'] = $video->num_rows();

        $ebook          = $this->db->query("SELECT * FROM produk_link WHERE nama_link LIKE '%$keyword%' AND status=0");
        $data['ebook']  = $ebook->result();
        $data['ebookr'] = $ebook->num_rows();

        $this->load->view('_/member/cari', $data);
    }
}
