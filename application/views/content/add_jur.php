<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Pengolahan Data</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <div class="col s6">
                      <span class="card-title">Data <b>Jurusan</b></span>
                    </div>
                    <div class="col s6">
                      <a class="right btn-floating btn-small waves-effect waves-light blue modal-trigger" href="#add_jur"><i class="material-icons">add</i></a>
                    </div>
                    
                     <div id="add_jur" class="modal">
                      <form method="post" action="<?php echo base_url(); ?>insert/jur" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="center"><h3>Management <b>Jurusan</b></h3></div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="judul" type="text" class="validate" name="nama_jur">
                                        <label for="nama_jur">Nama Jurusan</label>
                                    </div>
                                    <div class="input-field col s12">
                                      <select id="id_jen" name="id_jen">
                                          <option value="0" disabled selected>Pilih Opsi</option>
                                          <?php foreach ($get_jenjang as $get_j): ?>
                                            <option value="<?php echo $get_j['id_jenjang'] ?>"><?php echo $get_j['ket'] ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <label>Jenjang Sekolah</label>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="">
                                <div class="col s2 right"><button class="modal-action modal-close waves-effect waves-teal white-text green btn-flat " type="submit" name="button">Simpan</button></div>
                                <div class="col s2 right"><a href="#!" class="modal-action modal-close waves-effect waves-teal grey btn-flat white-text">Tutup</a></div>
                            </div>
                            
                        </div>
                      </form>
                    </div>

                    <table id="example" class="display responsive-table datatable-example col s12">
                        <thead>
                            <tr>
                                <th>Nama Jurusan</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Jurusan</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php foreach ($get_jur_t as $jur_t): ?>
                            <tr>
                                <td><?php echo $jur_t['nama_jur'] ?></td>
                                <td><?php echo $jur_t['ket'] ?></td>
                                <td width="10%">
                                    <a class="waves-effect waves-light btn red m-b-xs center" onclick="del('<?php echo $jur_t['id_jurusan'] ?>')"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
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
           window.location.href='<?php echo base_url() . "delete/jur/"?>'+ID;
           // alert(ID);
       } else {
           return FALSE;
       }
    }
</script>