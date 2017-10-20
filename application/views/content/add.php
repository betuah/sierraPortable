<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Form Elements</div>
        </div>
        <div class="col s12 m12 l12">

        </div>
        <div class="col s12 m12 l6">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="judul" type="text" class="validate">
                                    <label for="judul">Judul</label>
                                </div>
                                <div class="input-field col s6">
                                  <select onchange="jur(this.value)">
                                      <option value="0" disabled selected>Pilih Opsi</option>
                                      <?php foreach ($get_jenjang as $get_j): ?>
                                        <option value="<?php echo $get_j['id_jenjang'] ?>"><?php echo $get_j['ket'] ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                  <label>Jenjang Sekolah</label>
                                </div>
                                <div class="input-field col s6">
                                    <select>
                                        <option disabled selected>Pilih Opsi</option>
                                        <option value="K1">Kelas X</option>
                                        <option value="K2">Kelas XI</option>
                                        <option value="K3">Kelas XII</option>
                                    </select>
                                    <label>Kelas</label>
                                </div>
                                <div class="input-field col s10">
                                    <select>
                                        <option disabled selected>Pilih Opsi</option>
                                        <?php foreach ($get_mapel as $mapel): ?>
                                          <option value="<?php echo $mapel['id_mapel'] ?>"><?php echo $mapel['nama_mapel'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Mata Pelajaran</label>
                                </div>
                                <div class="input-filed col s2">
                                  <a class="tooltipped waves-effect waves-light btn green" data-position="bottom" data-delay="50" data-tooltip="Tambah Mapel Baru"><i class="material-icons">add</i></a><br>
                                </div>
                                <div class="input-field col s10">
                                    <select>
                                        <option disabled selected>Pilih Opsi</option>

                                    </select>
                                    <label>Jurusan</label>
                                </div>
                                <div class="input-filed col s2">
                                  <a class="tooltipped waves-effect waves-light btn green" data-position="bottom" data-delay="50" data-tooltip="Tambah Jurusan Baru"><i class="material-icons">add</i></a><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                                    <label for="disabled">Disabled</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
