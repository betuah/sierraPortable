<main class="mn-inner inner-active-sidebar">
    <div class="middle-content">
      <div class="row">
        <div class="row">
          <?php foreach ($update as $content): ?>
            <div class="col s12 m4">
              <div class="card">
                  <div class="card-image">
                      <img src="<?php echo base_url()?>assets/images/bg-content.jpg" alt="" height="150">
                  </div>
                  <div class="card-action">

                      <a href="<?php echo base_url().'download/'.$content->jen.'/'.$content->id_materi?>"><?php echo $content->judul; ?></a><br>
                      <p><?php echo $content->jen.' , '.$content->date; ?><span class="new badge" data-badge-caption="New"></span></a></p>
                  </div>
              </div>
            </div>
          <?php endforeach ?>  
          <?php foreach ($update as $content): ?>
            <div class="col s12 m4">
              <div class="card">
                  <div class="card-image">
                      <img src="<?php echo base_url()?>assets/images/bg-content.jpg" alt="" height="150">
                  </div>
                  <div class="card-action">
                      <a href=""><?php echo $content->judul ?></a><br>         
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
