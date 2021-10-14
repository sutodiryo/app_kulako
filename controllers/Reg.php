<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Reg extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('Auth_model');
    }

    function reseller()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama belum diisi!']);
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim|is_unique[member.no_hp]', ['required' => 'Nomor Handphone belum diisi!', 'is_unique' => 'Nomor Handphone ini sudah digunakan']);
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[member.username]', ['required' => 'Username belum diisi!', 'is_unique' => 'Username ini sudah digunakan']);
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email belum diisi!', 'valid_email' => 'Format email salah!'], 'required|trim|is_unique[member.email]', ['required' => 'Email belum diisi!', 'is_unique' => 'Email ini sudah digunakan']);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', ['required' => 'Password belum diisi!', 'min_length' => 'Password minimal 6 karakter']);
        // $this->form_validation->set_rules('password2', 'Password Repeat', 'required|trim|matches[password1]', ['required' => 'Ulangi password!', 'matches' => 'Password tidak sama!']);

        $data['user'] = $this->db->get_where('member', ['no_hp' => $this->session->userdata('no_hp')])->row_array();
        // if ($this->session->userdata('username') != null) {
        //     $foto             = $data['user']['photos'];
        //     $id_user          = $data['user']['id_user'];
        // } else {
        //     $foto             = 'default.png';
        //     $id_user          = '0';
        // }
        // $data['foto']       = $foto;
        // $data['id_user']    = $id_user;

        if ($this->form_validation->run() == false) {
            $data['judul']    = 'Daftar Reseller Kulako';
            $this->load->view('_reg', $data);
            // $this->load->view('reseller_ok', $data);
        } else {
            $data = [
                'id_page'      => 1,
                'nama'         => htmlspecialchars($this->input->post('nama', true)),
                'email'        => htmlspecialchars($this->input->post('email', true)),
                'no_hp'        => htmlspecialchars($this->input->post('no_hp', true)),
                'kota_kab'     => htmlspecialchars($this->input->post('kota_kab', true)),
                'alamat'       => htmlspecialchars($this->input->post('alamat', true))
            ];

            $this->db->insert('member', $data);
            // $this->session->set_flashdata('report', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat, Anda bisa masuk sekarang</div>');
            // redirect('reg/reseller_ok');
            redirect('https://api.whatsapp.com/send?phone=628112735515&text=');
        }
    }

    function reseller_ok()
    {
        $this->load->view('reseller_ok');
    }
    // function index()
    // {
    //     $this->affiliate(0);
    // }

    // function affiliate($id)
    // {
    //     $data['id_aff'] = $id;
    //     $this->load->view('reg_affiliate', $data);
    // }

    function add_affiliate()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_error_delimiters('', '');
        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[member.email]');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|is_unique[member.no_hp]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            // To who are you wanting with input value such to insert as 
            // $data['frist_name'] = $this->input->post('fname');
            // $data['last_name'] = $this->input->post('lname');
            // $data['user_name'] = $this->input->post('email');
            // Then pass $data  to Modal to insert bla bla!!


            // $username   = $this->input->post('username');
            $nama       = $this->input->post('nama');
            $id_upline  = $this->input->post('id_upline');
            $email      = $this->input->post('email');
            $no_hp      = $this->input->post('no_hp');
            $password   = md5($this->input->post('password'));

            $this->db->query("INSERT INTO `member` (`id_member`, `id_upline`, `username`, `password`, `nama`, `no_hp`, `email`, `id_bank`, `no_rekening`, `nama_rekening`, `alamat`, `pekerjaan`, `tgl_reg`, `level`, `status`) VALUES (NULL, '$id_upline', '', '$password', '$nama', '$no_hp', '$email', '', '', '', '', '', NOW(), 1, '0')");
            $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Reseller Berhasil!! </strong>Anda dapat login sekarang...</div></div>");
            redirect(base_url('auth'));
        }
    }


    // Register Ber ID
    function p($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama belum diisi!']);
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim|is_unique[member.no_hp]', ['required' => 'Nomor Handphone belum diisi!', 'is_unique' => 'Nomor Handphone ini sudah digunakan']);

        $q = "SELECT * FROM produk_link WHERE id_produk_link='$id'";
        $page = $this->db->query($q)->result();
        $data['page'] = $page;
        foreach ($page as $p) {
            $wa = $p->link_wa;
        }

        if ($this->form_validation->run() == false) {
            if (!empty($page)) {
                $data['title']  = 'Pendaftaran Reseller - Kulako.ID';
                $this->load->view('reg/p_id', $data);
            } else {
                $data['title']  = 'Halaman Tidak Tersedia';
                $this->load->view('reg/not_found', $data);
            }
        } else {
            $data = [
                'id_page'      => $id,
                'nama'         => htmlspecialchars($this->input->post('nama', true)),
                'email'        => htmlspecialchars($this->input->post('email', true)),
                'no_hp'        => htmlspecialchars($this->input->post('no_hp', true)),
                'kota_kab'     => htmlspecialchars($this->input->post('kota_kab', true)),
                'alamat'       => htmlspecialchars($this->input->post('alamat', true))
            ];

            $this->db->insert('member', $data);
            redirect($wa);
        }
    }
    // Register Ber ID


    function affiliate($id)
    {
        $data['id_aff']  = $id;
        $this->load->view('_reg', $data);
    }





    function add_aff()
    {
        // Including Validation Library
        $this->load->library('form_validation');
        $this->load->helper('form');
        // Displaying Errors In Div
        $this->form_validation->set_error_delimiters('<font color="red">', '</font>');
        // Validation For Name Field
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // Validation For Email Field
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[member.email]');
        // Validation For Contact Field
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        // Validation For Address Field
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('_reg');
        } else {
            $nama       = $this->input->post('nama');
            $id_upline  = $this->input->post('id_upline');
            $email      = $this->input->post('email');
            $no_hp      = $this->input->post('no_hp');
            $password   = md5($this->input->post('password'));

            $this->db->query("INSERT INTO `member` (`id_member`, `id_upline`, `username`, `password`, `nama`, `no_hp`, `email`, `id_bank`, `no_rekening`, `nama_rekening`, `alamat`, `pekerjaan`, `tgl_reg`, `level`, `status`) VALUES (NULL, '$id_upline', '', '$password', '$nama', '$no_hp', '$email', '', '', '', '', '', NOW(), 1, '0')");
            $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Reseller Berhasil!! </strong>Anda dapat login sekarang...</div></div>");
            redirect(base_url('auth'));
        }
    }









    public function check_username_availablity()
    {
        $get_result = $this->Auth_model->check_username_availablity();
        if (!$get_result)
            echo '<div class="form-group"><div class="alert alert-danger"><strong>Sayang sekali!</strong> Username sudah dipakai...</div></div>';
        else
            echo '<div class="form-group"><div class="alert alert-success"><strong>Selamat!</strong> Username masih tersedia...</div></div>';
    }

    public function check_email_availablity()
    {
        // $this->load->library('form_validation');
        // $this->load->helper('form');
        $get_result = $this->Auth_model->check_email_availablity();
        if (!$get_result) {
            // echo '<div class="form-group"><div class="alert alert-danger"><strong></strong> Email sudah terdaftar...</div></div><script type="text/javascript">document.getElementById("submit_reg").disabled = true</script>';
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[member.email]');
            echo 'Email sudah terdaftar...<script type="text/javascript">document.getElementById("submit_reg").disabled = true</script>';
        } else {
            // echo '<div class="form-group"><div class="alert alert-success"><strong></strong> Email masih tersedia...</div></div><script type="text/javascript">document.getElementById("submit_reg").disabled = false</script>';
            echo '<script type="text/javascript">document.getElementById("submit_reg").disabled = false</script>';
        }
    }

    function member()
    {
        $username   = $this->input->post('username');
        $nama       = $this->input->post('nama');
        $id_upline  = $this->input->post('id_upline');
        $email      = $this->input->post('email');
        $no_hp      = $this->input->post('no_hp');
        $password   = md5($this->input->post('password'));
        // echo $username, $nama, $id_upline, $email, $no_hp, $password;

        $this->db->query("INSERT INTO `member` (`id_member`, `username`, `password`, `nama`, `no_hp`, `email`, `id_bank`, `no_rekening`, `nama_rekening`, `alamat`, `pekerjaan`, `tgl_reg`, `level`, `status`) VALUES (NULL, '$username', '$password', '$nama', '$no_hp', '$email', '', '', '', '', '', NOW(), 1, '0')");
        // INSERT INTO `member` (`id_member`, `username`, `nama`, `no_ktp`, `alamat`, `kota`, `no_hp`, `email`, `password`, `id_bank`, `no_rekening`, `tgl_daftar`, `id_upline`, `status`) VALUES (NULL, '', '', '', '', '', '', '', '', '0', '', NOW(), '$id_upline', '0')");

        $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Berhasil!! </strong>Anda dapat login sekarang...</div></div>");

        redirect(base_url('auth'));
    }
}
