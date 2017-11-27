<header class="mn-header navbar-fixed">
    <nav class="cyan darken-1">
        <div class="nav-wrapper row">
            <section class="material-design-hamburger navigation-toggle">
                <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                    <span class="material-design-hamburger__layer"></span>
                </a>
            </section>
            <div class="header-title col s3 m3">
                <span class="chapter-title">SIERRA PORTABLE</span>
            </div>
            <form class="left search col s6 hide-on-small-and-down">
                <div class="input-field">
                    <input id="search" type="search" placeholder="Search" autocomplete="off">
                    <label for="search"><i class="material-icons search-icon">search</i></label>
                </div>
                <a href="javascript: void(0)" class="close-search"><i class="material-icons">close</i></a>
            </form>
            <ul class="right col s9 m3 nav-right-menu">
                <li><a class="chat-button show-on-large modal-trigger" href="#login"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- Modal Login -->
<div id="login" class="modal">
  <form method="post" action="<?php echo base_url(); ?>auth_controller/login" enctype="multipart/form-data">
  <!-- <form method="post" action="<?php echo base_url(); ?>auth_controller/signup" enctype="multipart/form-data"> -->
    <div class="row">
        <div class="modal-content">
            <div class="center">
                <h3>Form<b class="teal-text"> Login</b></h3>
            </div>
            <br><hr></b>
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" type="text" class="validate" name="username">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <label for="username">Username</label>
                    </div> 
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>                     
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="">
                <div class="col s2 right"><button class="modal-action modal-close waves-effect waves-teal white-text green btn-flat " type="submit" name="button">Sign In</button></div>
                <div class="col s2 right"><a href="#!" class="modal-action modal-close waves-effect waves-teal grey btn-flat white-text">Tutup</a></div>
            </div>
        </div>
    </div>
  </form>
</div>