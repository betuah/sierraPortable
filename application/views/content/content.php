<main class="mn-inner">
    <div class="row">
      <div class="row">
        <div class="card white darken-1">
            <div class="card-content">
              <span class="card-title">Filter</span>
              <div class="row">
                  <form method="post" action="<?php echo base_url().'dash/content/'.$jenjang.'/'.$folder.'/'; ?>" enctype="multipart/form-data"> 
                   <!--  <form method="post" action="<?php echo base_url().'dash/test/'.$jenjang.'/'.$folder.'/'; ?>" enctype="multipart/form-data"> -->
                    <div class="col s12 m7">
                      <label>Pilih Mata Pelajaran</label>
                      <select name="mapel">
                          <option value="" disabled selected>Pilih Opsi</option>
                          <?php foreach ($get_mapel as $mapel): ?>
                             <option value="<?php echo $mapel['id_mapel'] ?>"><?php echo $mapel['nama_mapel'] ?></option>
                          <?php endforeach ?>
                      </select>        
                    </div>
                    <div class="col s12 m2 align-right">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <p><input class="with-gap" type="radio" id="x" name="kelas" value="K1" /><label for="x">Kelas X</label></p>
                        <p><input class="with-gap" type="radio" id="xi" name="kelas" value="K2"/><label for="xi">Kelas XI</label></p>
                        <p><input class="with-gap" type="radio" id="xii" name="kelas" value="K3"/><label for="xii">Kelas XII</label></p>
                    </div>
                    <div class="col s12 m3 right">
                        <button class="waves-effect waves-light cyan darken-1 btn m-b-xs" type="submit" name="button"><i class="material-icons left">dns</i>Filter</button>
                    </div>
                  </form>
              </div>
            </div>
        </div>

        <div class="row">
          <?php foreach ($get_content as $content): ?>            
            <div class="col s12 m3">
              <div class="card">
                <a href="<?php echo base_url().'dash/file/'.$content['id_materi']?>">
                  <div class="card-image">
                      <img src="<?php echo base_url()?>assets/images/bg-content.jpg" alt="" height="130">
                  </div>
                </a>
                <div class="card-action">
                    <a href="<?php echo base_url().'dash/file/'.$content['id_materi']?>"><?php echo $content['judul']; ?></a><br>
                    <p><?php echo $content['nama_folder'].' , '.$content['date']; ?></p>
                </div>
              </div>
            </div>        
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="center">      
      <?php print_r($halaman); ?>
    </div>  
</main>
