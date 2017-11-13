<!DOCTYPE html>
<html lang="en">
    <head>
      <?php $this->load->view('layout/header') ?>
    </head>
    <body>
      <?php $this->load->view('layout/loader') ?>
      <div class="mn-content fixed-sidebar">
          <?php $this->load->view('layout/b_header') ?>
          <?php $this->load->view('layout/sidenav') ?>
          <?php $this->load->view('content/'.$req) ?>
          <?php $this->load->view('layout/b_footer') ?>
      </div>
      <div class="left-sidebar-hover"></div>

      <?php $this->load->view('layout/javascript') ?>
    </body>
</html>
