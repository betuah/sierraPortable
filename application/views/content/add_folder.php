<?php if ($this->session->userdata('user')) { ?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Pengolahan Data</div>
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
<?php } else { redirect(base_url().'view/dash'); }?>