<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Pengolahan Data</div>
        </div>
        <div class="col s12 m12 l6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Data Content</span>
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="judul" type="text" class="validate" name="judul">
                                    <label for="judul">Judul</label>
                                </div>
                                <div class="input-field col s6">
                                  <select onchange="jur(this.value)" name="js">
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
                                      <?php foreach ($get_jur as $jur): ?>
                                        <option value="<?php echo $jur['id_jurusan'] ?>"><?php echo $jur['nama_jur'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <label>Jurusan</label>
                                </div>
                                <div class="input-field col s6">
                                    <select id="folder">
                                      <?php foreach ($get_folder as $fol): ?>
                                        <option value="<?php echo $fol['id_folder'] ?>"><?php echo $fol['nama_folder'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <label>Folder</label>
                                </div>
                                <div class="input-field col s6">
                                    <select name="jen">
                                        <option disabled selected>Pilih Opsi</option>
                                        <option value="pdf">PDF</option>
                                        <option value="video">Video (MP4)</option>
                                        <option value="audio">Audio (MP3)</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                    <label>Jenis File</label>
                                </div>
                                <div class="file-field input-field col s12">
                                    <div class="btn teal lighten-1">
                                        <span>File</span>
                                        <input name="file" type="file" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Unggah file Anda di sini ...">
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Deskripsi</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6">
            <div class="card">
                <div class="card-content">
                    <div class="col s6">
                      <span class="card-title">Data Jurusan</span>
                    </div>
                    <div class="col s6">
                      <a class="right btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                    </div>
                    <table id="example" class="display responsive-table datatable-example col s12">
                        <thead>
                            <tr>
                                <th>Nama Jurusan</th>
                                <th>Jenjang Pendidikan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Jurusan</th>
                                <th>Jenjang Pendidikan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php foreach ($get_jur_t as $jur_t): ?>
                            <tr>
                                <td><?php echo $jur_t['nama_jur'] ?></td>
                                <td><?php echo $jur_t['ket'] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6">
            <div class="card">
                <div class="card-content">
                  <div class="row">
                    <div class="col s6">
                      <span class="card-title">Data Folder</span>
                    </div>
                    <div class="col s6">
                      <a class="right btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                    </div>
                    <table id="tb_folder" class="display responsive-table datatable-example col s12">
                        <thead>
                            <tr>
                                <th>Nama Folder</th>
                                <th>Jenjang Pendidikan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Folder</th>
                                <th>Jenjang Pendidikan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php foreach ($get_folder_t as $folder_t): ?>
                            <tr>
                                <td><?php echo $folder_t['nama_folder'] ?></td>
                                <td><?php echo $folder_t['ket'] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
  function jur(JUR) {
    // alert(JUR);

    $.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api_jur"; ?>',
			data: { "id": JUR, "act":"get"},
			success: function(res) {
        var data = '';
        alert(JUR);
        // for (var i = 0; i < res.length; i++) {
        //   // alert(res[i].nama_jur);
        //   data += '<option value="' + res[i].id_jurusan + '">' + res[i].nama_jur + '</option>';
        // }
        // $('#jur').html(data);
			},
			error: function () {
				alert("Tidak Ada Jurusan");
			}
		});

  }
</script>
