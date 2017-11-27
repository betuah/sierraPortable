<?php if ($this->session->userdata('user')) { ?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Pengolahan Data</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <div class="col s6">
                      <span class="card-title">Data <b class="teal-text">Mata Pelajaran</b></span>
                    </div>
                    <div class="col s6">
                      <a class="right btn-floating btn-small waves-effect waves-light blue modal-trigger" href="#add_jur"><i class="material-icons">add</i></a>
                    </div>
                    
                     <div id="add_jur" class="modal">
                      <form method="post" action="<?php echo base_url(); ?>insert/mapel" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="center"><h3>Pengolahan <b class="teal-text">Mata Pelajaran</b></h3></div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="judul" type="text" class="validate" name="mapel">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <label for="mapel">Nama Mata Pelajaran</label>
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
                                <th>ID Mapel</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Mapel</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php foreach ($get_mapel as $data): ?>
                            <tr>
                                <td width="20%"><?php echo $data['id_mapel'] ?></td>
                                <td><?php echo $data['nama_mapel'] ?></td>
                                <td width="20%">
                                    <a class="waves-effect waves-light btn red m-b-xs center" onclick="del('<?php echo $data['id_mapel'] ?>')"><i class="material-icons">delete</i></a>
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
           window.location.href='<?php echo base_url() . "delete/mapel/"?>'+ID;
           // alert(ID);
       } else {
           return FALSE;
       }
    }
</script>

<?php } else { redirect(base_url().'view/dash'); } ?>