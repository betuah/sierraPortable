<?php if ($this->session->userdata('user')) { ?>
<main class="mn-inner">
    <div class="middle-content">
      <div class="row">
        <div class="row">
          <?php foreach ($update as $content): ?>
            <div class="col s12 m4">
              <div class="card">
                  <div class="card-image">
                      <img src="<?php echo base_url()?>assets/images/bg-content.jpg" alt="" height="130">                     
                  </div>
                  <div class="card-action">
                      <a href="#"><?php echo $content['judul']; ?></a><br>
                      <div class="left"><?php echo $content['nama_folder'].', '.$content['file_size'] ?></div><div class="right"><a href="<?php echo base_url().'dash/update/'.$content['remark']?>"><i class="material-icons">get_app</i></a></div><br>
                  </div>
              </div>
            </div>
          <?php endforeach ?>   
        </div>
      </div>
    </div>
</main>
<?php } else { redirect(base_url().'view/dash'); } ?>