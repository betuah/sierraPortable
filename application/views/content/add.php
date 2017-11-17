<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Pengolahan Data</div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <div class="col s6">
                      <span class="card-title">Data Content</span>
                    </div>
                    <div class="col s6">
                      <a class="right btn-floating btn-small waves-effect waves-light blue modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
                    </div>
                    <div id="modal1" class="modal modal-fixed-footer">
                      <form method="post" action="<?php echo base_url(); ?>insert/materi" enctype="multipart/form-data">
                        <div class="modal-content">
                            <h3>Pengolahan Data</h3>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="judul" type="text" class="validate" name="judul">
                                        <label for="judul">Judul</label>
                                    </div>
                                    <div class="input-field col s6">
                                      <select id="jenjang" onchange="jur('this.value')" name="jenjang">
                                          <option value="0" disabled selected>Pilih Opsi</option>
                                          <?php foreach ($get_jenjang as $get_j): ?>
                                            <option value="<?php echo $get_j['id_jenjang'] ?>"><?php echo $get_j['ket'] ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <label>Jenjang Sekolah</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select name="kelas" name="kelas">
                                            <option disabled selected>Pilih Opsi</option>
                                            <option value="K1">Kelas X</option>
                                            <option value="K2">Kelas XI</option>
                                            <option value="K3">Kelas XII</option>
                                        </select>
                                        <label>Kelas</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select name="mapel">
                                            <option disabled selected>Pilih Opsi</option>
                                            <?php foreach ($get_mapel as $mapel): ?>
                                              <option value="<?php echo $mapel['id_mapel'] ?>"><?php echo $mapel['nama_mapel'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label>Mata Pelajaran</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select id="jur" name="jur">
                                          <option disabled selected>Pilih Jurusan</option>
                                          <?php foreach ($get_jur as $jur): ?>
                                            <option value="<?php echo $jur['id_jurusan'] ?>"><?php echo $jur['nama_jur'] ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                        <label>Jurusan</label>
                                    </div>
                                    <!-- <div class="input-field col s6">
                                        <select id="folder" name="folder">
                                          <option disabled selected>Pilih Folder</option>
                                          <?php foreach ($get_folder as $fol): ?>                                           
                                            <option value="<?php echo $fol['id_folder'] ?>"><?php echo $fol['nama_folder'] ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                        <label>Folder</label>
                                    </div> -->
                                    <div class="input-field col s12">
                                        <select name="jen">
                                            <option disabled selected>Pilih Opsi</option>
                                            <option value="document">PDF</option>
                                            <option value="video">Video (MP4)</option>
                                            <option value="audio">Audio (MP3)</option>
                                            <option value="lom">LOM</option>
                                            <option value="other">Lainnya</option>
                                        </select>
                                        <label>Jenis File</label>
                                    </div>

                                    <div class="file-field input-field col s12">
                                        <div class="btn teal lighten-1">
                                            <span>File</span>
                                            <input name="file" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input name="file" class="file-path validate" type="text" placeholder="Unggah file Anda di sini dengan format .pdf|rar|zip|mp4|mp3">
                                        </div>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="textarea1" class="materialize-textarea" name="desc"></textarea>
                                        <label for="textarea1">Deskripsi</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="">
                                <div class="col s2"><button class="modal-action modal-close waves-effect waves-teal white-text green btn-flat " type="submit" name="button">Simpan</button></div>
                                <div class="col s2"><a href="#!" class="modal-action modal-close waves-effect waves-teal red btn-flat white-text">Tutup</a></div>
                            </div>
                            
                        </div>
                      </form>
                    </div>
                    <table id="example" class="display responsive-table datatable-example col s12">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Jenis Materi</th>
                                <th>Jenjang</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Jurusan</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Jenis Materi</th>
                                <th>Jenjang</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Jurusan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php foreach ($get_materi as $jur_m): ?>
                            <tr>
                                <td><?php echo $jur_m['judul'] ?></td>
                                <td><?php echo $jur_m['jen'] ?></td>
                                <td><?php echo $jur_m['ket'] ?></td>
                                <td><?php echo $jur_m['kelas'] ?></td>
                                <td><?php echo $jur_m['nama_mapel'] ?></td>
                                <td><?php echo $jur_m['nama_jur'] ?></td>
                                <td><a class="waves-effect waves-light btn red m-b-xs" onclick="del('<?php echo $jur_m['id_materi'] ?>')"><i class="material-icons">delete</i></a></td>                        </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
  function del(ID) {
       if (confirm("Apakah Anda ingin menghapus data ini ?") == true) {
           window.location.href='<?php echo base_url() . "delete/materi/"?>'+ID;
           // alert(ID);
       } else {
           return FALSE;
       }
    }
</script>
