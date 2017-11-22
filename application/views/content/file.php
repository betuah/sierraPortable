<main class="mn-inner inner-active-sidebar">
    <div class="middle-content">
      <div class="row">
        <div class="row">
          <div class="col s12 m12 12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Responsive Embeds</span>
                    <h5 class="center"><?php echo $file['judul']?></h5><br>                    
                      <?php if ($file['nama_folder'] == 'Video') { ?>
                        <div class="video-container">
                          <video class="responsive-video" controls width="100%" height="250">
                            <source src="<?php echo base_url().'content/Video/'.$file['file']; ?>" type="video/mp4">
                          </video>
                        </div><br>
                        <p>Jenis File :  <?php echo $file['nama_folder'].', '.$file['date'] ?> </p>
                      <?php } elseif ($file['nama_folder'] == 'Buku') { ?>
                        <embed src="<?php echo base_url().'content/'.$file['nama_folder'].'/'.$file['file']; ?>" type="application/pdf" width="100%" height="700">
                        <br>
                        <p>Jenis File :  <?php echo $file['nama_folder'].', '.$file['date'] ?>, <a href="<?php echo base_url().'download/'.$file['nama_folder'].'/'.$file['file']?>">Unduh File</a></p>
                      <?php } elseif ($file['nama_folder'] == 'Audio') { ?>
                        <embed class="center" src="<?php echo base_url().'content/'.$file['nama_folder'].'/'.$file['file']; ?>" type="audio/mpeg>"><br>
                         <p>Jenis File :  <?php echo $file['nama_folder'].', '.$file['date'] ?>, <a href="<?php echo base_url().'download/'.$file['nama_folder'].'/'.$file['file']?>">Unduh File</a></p>
                      <?php } elseif ($file['nama_folder'] == 'LOM') { ?>
                        <embed class="center" src="<?php echo base_url().'content/'.$file['nama_folder'].'/'.$file['file']; ?>" ><br>
                         <p>Jenis File :  <?php echo $file['nama_folder'].', '.$file['date'] ?>, <a href="<?php echo base_url().'download/'.$file['nama_folder'].'/'.$file['file']?>">Unduh File</a></p>
                      <?php } else { echo "LOM";?>      
                        <embed class="center" src="<?php echo base_url().'content/'.$file['nama_folder'].'/'.$file['file']; ?>" ><br>
                         <p>Jenis File :  <?php echo $file['nama_folder'].', '.$file['date'] ?>, <a href="<?php echo base_url().'download/'.$file['nama_folder'].'/'.$file['file']?>">Unduh File</a></p>
                      <?php } ?>                                      
                </div>
            </div>
          </div>
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
