<div class="row">

    <div class="col-md-12 col-sm-8 clearfix">
        <ul class="user-info pull-left pull-none-xsm hidden-xs">
            <li class="profile-info dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo ADMIN_ASSETS ?>upload/profil.jpg" alt="" class="img-circle" width="44" />
                    <?php echo $this->session->userdata('log_name'); ?>
                </a>
                <ul class="dropdown-menu">
                    <li class="caret"></li>
                    <li>
                        <a href="<?php echo base_url() ?>extra-timeline.html">
                            <i class="entypo-user"></i>
                            Edit Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-arrows-ccw"></i>
                            Reset Password
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-clipboard"></i>
                            Tugas
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <?php
        if ($this->session->userdata('log_admin') == TRUE) {
            $q      = $this->db->query("SELECT  id,komen,id_produk_link,
                                                (SELECT nama FROM member WHERE id_member=produk_link_comment.id_member) AS member,
                                                (SELECT nama_link FROM produk_link WHERE id_produk_link=produk_link_comment.id_produk_link) AS video
                                        FROM produk_link_comment WHERE notif_admin=0 AND id_up=0");
        } else {
            $id_m   = $this->session->userdata('log_id');
            $q      = $this->db->query("SELECT  id,komen,id_produk_link,id_member,
                                                (SELECT nama FROM member WHERE id_member=produk_link_comment.id_member) AS member,
                                                (SELECT nama_link FROM produk_link WHERE id_produk_link=produk_link_comment.id_produk_link) AS video
                                        FROM produk_link_comment WHERE notif_member=0 AND id_up IN (SELECT id FROM produk_link_comment WHERE id_member='$id_m')");
        }
        $tp = $q->num_rows();
        $pertanyaan = $q->result();
        ?>
        <ul class="user-info pull-right pull-right-xs pull-right-xsm">

            <!-- <li class="notifications dropdown">
                <a data-toggle="modal" href="#modal_pencarian" aria-expanded="false">
                    <i class="entypo-search"></i>
                    Pencarian
                </a>
            </li> -->
            <!-- 
            <li>
                <a href="#" data-collapse-sidebar="1">
                    <i class="entypo-book"></i>
                    Bonus E-Book
                    <span class="badge badge-success chat-notifications-badge">3</span>
                </a>
            </li>

            <li class="notifications dropdown">
                <a data-toggle="modal" href="#modal_pertanyaan" aria-expanded="false">
                    <i class="entypo-chat"></i>
                    <span class="badge badge-secondary"><?php echo $tp ?></span>
                </a>
            </li> -->

            <?php
            $ebook = $this->db->query("SELECT * FROM produk_link WHERE status=0")->num_rows();
            ?>

            <div class="col-md-12 col-sm-12 clearfix">
                <ul class="list-inline links-list pull-right">
                    <li>
                        <a href="<?php echo base_url('member/materi/1') ?>" data-collapse-sidebar="1">
                            <i class="entypo-book"></i>
                            Bonus E-Book
                            <span class="badge badge-success chat-notifications-badge"><?php echo $ebook ?></span>
                        </a>
                    </li>

                    <li class="sep"></li>

                    <li>
                        <a data-toggle="modal" href="#modal_pertanyaan" aria-expanded="false">
                            <i class="entypo-chat"></i>
                            Komentar
                            <span class="badge badge-secondary"><?php echo $tp ?></span>
                        </a>
                    </li>
                </ul>

            </div>
        </ul>



    </div>

</div>
<hr />
<div class="row">

    <div class="col-md-12 col-sm-8 clearfix">
        <form action="<?php echo base_url();
                        if ($this->session->userdata('log_admin') == TRUE) {
                            echo "admin";
                        } else {
                            echo "member";
                        }
                        ?>/cari" method="POST">
            <div class="input-group">
                <input type="text" class="form-control input-lg" placeholder="Video/materi yang anda cari..." name="cari">

                <span class="input-group-btn">
                    <button class="btn btn-primary btn-lg" type="submit"><i class="entypo-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</div>

<hr />


<div class="modal fade" id="modal_pertanyaan" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Notifikasi Pertanyaan</h4>
            </div>
            <div class="modal-body">

                <?php
                if (empty($pertanyaan)) {
                    echo "Belum ada pemberitahuan";
                }
                foreach ($pertanyaan as $pert) {

                    if ($this->session->userdata('log_admin') == TRUE) {
                        echo  "
                    <div class='row'>
                        <a href='" . base_url() . "admin/video/$pert->id_produk_link/$pert->id/#balas_$pert->id'>
                            <div class='col-md-12'>
                            <div class='alert alert-default'>
                                <span class='line'>
                                    <strong><font color='black'>$pert->member</font></strong>
                                    <br>
                                    <u>Bertanya di $pert->video</u>
                                </span>
                                <br>
                                <span class='line desc small'>";

                        $limit = 120;
                        if (strlen($pert->komen) > $limit) {
                            echo "" . substr("$pert->komen", 0, $limit) . "...";
                        } else {
                            echo $pert->komen;
                        }
                        echo "
                                </span>
                                </div>
                            </div>
                        </a>
                    </div>";
                    } else {

                        echo  "
                    <div class='row'>
                        <a href='" . base_url() . "member/video_comment/$pert->id_produk_link/$pert->id/#balas_$pert->id'>
                            <div class='col-md-12'>
                            <div class='alert alert-default'>
                                <span class='line'>
                                    <strong><font color='black'>";

                        if ($pert->id_member == -1) {
                            echo "Coach Fitra Jaya Saleh";
                        } else {
                            echo "$pert->member";
                        }


                        echo "</font></strong>
                                    <br>
                                    <u>Membalas pertanyaan anda di $pert->video</u>
                                </span>
                                <br>
                                <span class='line desc small'>";

                        $limit = 120;
                        if (strlen($pert->komen) > $limit) {
                            echo "" . substr("$pert->komen", 0, $limit) . "...";
                        } else {
                            echo $pert->komen;
                        }
                        echo "
                                </span>
                                </div>
                            </div>
                        </a>
                    </div>";
                    }
                } ?>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_pencarian" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pencarian</h4>
            </div> -->
            <div class="modal-body">

                <form action="<?php echo base_url();
                                if ($this->session->userdata('log_admin') == TRUE) {
                                    echo "admin";
                                } else {
                                    echo "member";
                                }
                                ?>/cari" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Video/materi yang anda cari..." name="cari">

                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-lg" type="submit"><i class="entypo-search"></i></button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>