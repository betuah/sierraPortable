<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile row">
            <div class="sidebar-profile-image col s4">
                <img src="<?php echo base_url()?>assets/images/seamolec-logo.png" class="circle" alt="">
            </div>
            <div class="sidebar-profile-image col s4">
                <img src="<?php echo base_url()?>assets/images/kemdikbud-logo.png" class="circle" alt="">
            </div>
            <div class="sidebar-profile-image col s4">
                <img src="<?php echo base_url()?>assets/images/jabar-logo.png" class="circle" alt="">
            </div>
        </div>

    <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
        <li class="no-padding"><a class="waves-effect waves-grey active" href="<?php echo base_url(); ?>"><i class="material-icons">assignment</i>Sumber Belajar</a></li>
        <li class="no-padding <?php echo $this->session->userdata('user') ? '' : 'hidden' ?>"><a class="waves-effect waves-grey active" href="<?php echo base_url(); ?>view/update"><i class="material-icons">apps</i>Cek Data Terbaru</a></li>
        <li class="no-padding <?php echo $this->session->userdata('user') ? '' : 'hidden' ?>">
            <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">mode_edit</i>Pengolahan Data<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="<?php echo base_url(); ?>view/add">Content</a></li>
                    <li><a href="<?php echo base_url(); ?>view/add_jur">Jurusan</a></li>
                    <li><a href="<?php echo base_url(); ?>view/add_mapel">Mata Pelajaran</a></li>
                </ul>
            </div>
        </li>
        <li class="no-padding <?php echo $this->session->userdata('user') ? '' : 'hidden' ?>" ><a class="waves-effect waves-grey active" href="<?php echo base_url(); ?>auth_controller/logout"><i class="material-icons">exit_to_app</i>Log Out</a></li>
    </ul>
    <div class="footer">
        <p class="copyright">SIERRA Developer TEAM ©</p>
        <a href="http://seamolec.org">SEAMOLEC</a> @ <a href="http://seamolec.org"><?php echo date('Y') ?></a>
    </div>
    </div>
</aside>
