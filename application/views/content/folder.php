<main class="mn-inner inner-active-sidebar">
    <div class="middle-content">
      <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l4">
            <div class="card stats-card">
                <div class="card-content">
                    <span class="card-title"><i class="material-icons">library_books</i></li>Buku</span>
                    <span class="stats-counter"><span class="counter"><?php echo $count_buku ?></span><small>Buku</small></span>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card stats-card">
                <div class="card-content">
                    <span class="card-title"><i class="material-icons">video_library</i>Video</span>
                    <span class="stats-counter"><span class="counter"><?php echo $count_video ?></span><small>Video</small></span>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card stats-card">
                <div class="card-content">
                    <span class="card-title"><i class="material-icons">dns</i>Semua Data</span>
                    <span class="stats-counter"><span class="counter"><?php echo $count_all ?></span><small>Data</small></span>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="row">
          <?php foreach ($get_m_folder as $folder): ?>
            <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <!-- <img src="<?php echo base_url()?>assets/images/sma.jpg" alt="" height="250"> -->
                    
                </div>
                <div class="card-action row">
                  <?php 
                    $icon = '';
                    $url  = base_url();
                    if ($folder['nama_folder'] == 'Buku') {
                      $icon = 'library_books';
                    } elseif ($folder['nama_folder'] == 'Video') {
                      $icon = 'video_library';
                    } else {
                      $icon = 'dns';
                    }
                  ?>

                  <div class="col s2"><i class="material-icons"><?php echo $icon ?></i></div>
                  <div class="col s2"><a href="<?php echo $url.'content/'.$slug.'/'.$folder['folder'] ?>"><?php echo $folder['nama_folder'] ?></div>                    
                </div>
            </div>
          </div> 
          <?php endforeach ?>     
        </div>
      </div>
    </div>
    <div class="inner-sidebar">
        <span class="inner-sidebar-title">Filter Katagori</span>
        <div class="message-list row">
          <form class="col s12" action="#">
            <div class="col s12">
              <p>Pilih Sekolah</p>
              <div class="col s6">
                <input class="with-gap" name="sekolah" type="radio" id="sma"  />
                <label for="sma">SMA</label>
              </div>
              <div class="col s6">
                <input class="with-gap" name="sekolah" type="radio" id="smk"  />
                <label for="smk">SMK</label>
              </div>
            </div>
            <div class="col s12">
              <br>
              <p>Pilih Jenis</p>
              <p>
                <input type="checkbox" class="filled-in" id="cat1" name="cat" value="buku"/>
                <label for="cat1">Buku (.pdf)</label>
              </p>
              <p>
                <input type="checkbox" class="filled-in" id="cat2" name="cat" value="video"/>
                <label for="cat2">Video (.mp4)</label>
              </p>
              <p>
                <input type="checkbox" class="filled-in" id="cat3" name="cat" value="video"/>
                <label for="cat3">Audio (.mp3)</label>
              </p>
            </div>
            <div class="col s12">
              <br>
              <p>Pilih Jenjang Kelas</p>
              <p>
                <input type="checkbox" class="filled-in" id="k1" name="cat" value="buku"/>
                <label for="k1">Kelas X</label>
              </p>
              <p>
                <input type="checkbox" class="filled-in" id="k2" name="cat" value="video"/>
                <label for="k2">Kelas XI</label>
              </p>
              <p>
                <input type="checkbox" class="filled-in" id="k3" name="cat" value="video"/>
                <label for="k3">Kelas XII</label>
              </p>
            </div>
            <div class="col s12">
              <br>
              <p>Pilih Matapelajaran</p>
                <select>
                    <option value="" disabled selected>Pilih Opsi</option>
                    <option value="1">SMA</option>
                    <option value="2">SMK</option>
                </select>
                <label>Jenjang Sekolah</label>
              <br>
            </div>
            <br>
            <div class="center">
              <br>
              <button class="waves-effect waves-light"><i class="material-icons left">search</i>Filter</button>
            </div>
          </form>
        </div>

    </div>
</main>
