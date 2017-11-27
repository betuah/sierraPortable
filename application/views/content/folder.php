<main class="mn-inner">
    <div class="row">
      <div class="row">
        <div class="row">
            <?php foreach ($get_folder as $folder): ?>
              <?php 
                $icon     = '';
                $count    = '';
                $url      = base_url();
                if ($folder['id_folder'] == '2') {
                  $icon   = 'library_books';
                  $count  = $count_buku;
                } elseif ($folder['id_folder'] == '1') {
                  $icon   = 'video_library';
                  $count  = $count_video;
                } elseif ($folder['id_folder'] == '5') {
                  $icon   = 'library_music';
                  $count  = $count_audio;
                } elseif ($folder['id_folder'] == '3') {
                  $icon   = 'assignment';
                  $count  = $count_silabus;
                } elseif ($folder['id_folder'] == '4') {
                  $icon   = 'dns';
                  $count  = $count_lom;
                } else {
                  $icon   = 'dns';
                  $count  = $count_all;
                }
              ?>
              <a href="<?php echo $url.'dash/content/'.$slug.'/'.$folder['id_folder'].'/1' ?>">
                <div class="col s12 m3">
                  <div class="card stats-card">
                      <div class="card-content">
                          <span class="card-title"><i class="material-icons"><?php echo $icon ?></i><?php echo $folder['nama_folder'] ?></span>
                          <span class="stats-counter"><span class="counter"><?php echo $count ?></span><small><?php echo $folder['nama_folder'] ?></small></span>              
                      </div>
                  </div>
                </div> 
              </a>
            <?php endforeach ?>            
        </div>
      </div>
    </div>
    
</main>
