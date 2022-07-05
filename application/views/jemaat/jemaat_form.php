
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                        <form class="form-horizontal" action="<?=site_url('jemaat/proses')?>" method="post">

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_nik" class="col-sm-2 text-left control-label col-form-label">NIK</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="jemaat_nik" value="<?= $row->jemaat_nik?>" class="form-control <?=form_error('jemaat_nik') ? 'form-control is-invalid' : null?>" placeholder="NIK">
                                        </div>
                                        <?=form_error('jemaat_nik')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_nama" class="col-sm-2 text-left control-label col-form-label">Nama</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="jemaat_nama" value="<?= $row->jemaat_nama?>" class="form-control <?=form_error('jemaat_nama') ? 'form-control is-invalid' : null?>" placeholder="Nama">
                                        </div>
                                        <?=form_error('jemaat_nama')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_jenis_kelamin" class="col-sm-2 text-left control-label col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                        <select name="jemaat_jenis_kelamin" class="form-control"  class="form-control <?=form_error('jemaat_jenis_kelamin') ? 'form-control is-invalid' : null?>">
                                        <option value="<?= $row->jemaat_jenis_kelamin == "Laki-laki" ? "Perempuan" : null ?>">- Pilih -</option>
                                        <option value="Laki-laki" value="<?= $row->jemaat_jenis_kelamin == "Laki-laki" ? "selected" : null ?>">Laki-laki</option>
                                        <option value="Perempuan" value="<?= $row->jemaat_jenis_kelamin == "Perempuan" ? "selected" : null ?>">Perempuan</option>
                                    </select>                                            
                                        </div>
                                        <?=form_error('jemaat_jenis_kelamin')?>
                                    </div>
                                    </div>    

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_alamat" class="col-sm-2 text-left control-label col-form-label">Alamat</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="jemaat_alamat" value="<?= $row->jemaat_alamat?>" class="form-control <?=form_error('jemaat_alamat') ? 'form-control is-invalid' : null?>" placeholder="First Name Here">
                                        </div>
                                        <?=form_error('jemaat_alamat')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_tempat_lahir" class="col-sm-2 text-left control-label col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="jemaat_tempat_lahir" value="<?= $row->jemaat_tempat_lahir?>" class="form-control <?=form_error('jemaat_tempat_lahir') ? 'form-control is-invalid' : null?>" placeholder="First Name Here">
                                        </div>
                                        <?=form_error('jemaat_tempat_lahir')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_tanggal_lahir" class="col-sm-2 text-left control-label col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="jemaat_tanggal_lahir" value="<?= $row->jemaat_tanggal_lahir?>" class="form-control <?=form_error('jemaat_tanggal_lahir') ? 'form-control is-invalid' : null?>" placeholder="First Name Here">
                                        </div>
                                        <?=form_error('jemaat_tanggal_lahir')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="unsur_id" class="col-sm-2 text-left control-label col-form-label">Unsur</label>
                                        <div class="col-sm-4">
                                            <select name="unsur_id" class="form-control <?=form_error('unsur_id') ? 'form-control is-invalid' : null?>">
                                                <option value="">-Unsur-</option>
                                                <?php foreach($unsur_id->result() as $key => $data) { ?>
                                                    <option value="<?=$data->unsur_id?>" <?=$unsur_id_edit == $data->unsur_id ? "selected" : null ?> ><?=$data->unsur_kode?></option>
                                                    <?php } ?>
                                            </select>                                            
                                        </div>
                                        <?=form_error('unsur_id')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ksp_id" class="col-sm-2 text-left control-label col-form-label">KSP</label>
                                        <div class="col-sm-4">
                                            <select name="ksp_id" class="form-control <?=form_error('ksp_id') ? 'form-control is-invalid' : null?>">
                                                <option value="">-Pilih KSP-</option>
                                                <?php foreach($ksp_id->result() as $key => $data) { ?>
                                                    <option value="<?=$data->ksp_id?>" <?=$ksp_id_edit == $data->ksp_id ? "selected" : null ?> ><?=$data->ksp_nama?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <?=form_error('ksp_id')?>
                                    </div>
                                </div>
                        

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="wijk_id" class="col-sm-2 text-left control-label col-form-label">Wijk</label>
                                        <div class="col-sm-4">
                                            <select name="wijk_id" class="form-control <?=form_error('wijk_id') ? 'form-control is-invalid' : null?>">
                                                <option value="">-Pilih Wijk-</option>
                                                <?php foreach($wijk_id->result() as $key => $data) { ?>
                                                    <option value="<?=$data->wijk_id?>" <?=$wijk_id_edit == $data->wijk_id ? "selected" : null ?> ><?=$data->wijk_nama?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <?=form_error('wijk_id')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_baptis" class="col-sm-2 text-left control-label col-form-label">Status Baptis</label>
                                        <div class="col-sm-4">
                                            <select name="jemaat_baptis" class="form-control <?=form_error('jemaat_baptis') ? 'form-control is-invalid' : null?>">
                                                <option value="">- Pilih -</option>
                                                <option value="Sudah Baptis" value="<?= $row->jemaat_baptis == "Sudah Baptis" ? "selected" : null ?>">Sudah Baptis</option>
                                                <option value="Belum Baptis" value="<?= $row->jemaat_baptis == "Belum Baptis" ? "selected" : null ?>">Belum Baptis</option>
                                            </select>
                                        </div>
                                        <?=form_error('jemaat_baptis')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jemaat_sidi" class="col-sm-2 text-left control-label col-form-label">Status Sidi</label>
                                        <div class="col-sm-4">
                                            <select name="jemaat_sidi" class="form-control <?=form_error('jemaat_sidi') ? 'form-control is-invalid' : null?>">
                                                <option value="">- Pilih -</option>
                                                <option value="Sudah Sidi" value="<?= $row->jemaat_sidi == "Sudah Sidi" ? "selected" : null ?>">Sudah Sidi</option>
                                                <option value="Belum Sidi" value="<?= $row->jemaat_sidi == "Belum Sidi" ? "selected" : null ?>">Belum Sidi</option>
                                            </select>
                                        </div>
                                        <?=form_error('jemaat_sidi')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                    <label for="jemaat_nikah" class="col-sm-2 text-left control-label col-form-label">Status Nikah</label>
                                        <div class="col-sm-4">
                                            <select name="jemaat_nikah" class="form-control <?=form_error('jemaat_nikah') ? 'form-control is-invalid' : null?>">
                                                <option value="">- Pilih -</option>
                                                <option value="Sudah Nikah" value="<?= $row->jemaat_nikah == "Sudah Nikah" ? "selected" : null ?>">Sudah Nikah</option>
                                                <option value="Belum Nikah" value="<?= $row->jemaat_nikah == "Belum Nikah" ? "selected" : null ?>">Belum Nikah</option>
                                            </select>
                                        </div>
                                        <?=form_error('jemaat_nikah')?>
                                    </div>

                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary ">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('jemaat')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>                   