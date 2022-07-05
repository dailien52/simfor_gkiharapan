
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                        <form class="form-horizontal" action="<?=site_url('inventaris/proses')?>" method="post">
                        <input type="hidden" name="inventaris_id" value="<?= $row->inventaris_id?>" class="form-control" placeholder="Inventaris">

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inventaris_nama" class="col-sm-2 text-left control-label col-form-label">Nama Barang</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="inventaris_nama" value="<?= $row->inventaris_nama?>" class="form-control <?=form_error('inventaris_nama') ? 'form-control is-invalid' : null?>" placeholder="Nama Barang">
                                        </div>
                                        <?=form_error('inventaris_nama')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jenis_barang_id" class="col-sm-2 text-left control-label col-form-label">Jenis Barang</label>
                                        <div class="col-sm-4">
                                            <select name="jenisbarang_id" class="form-control <?=form_error('jenisbarang_id') ? 'form-control is-invalid' : null?>">
                                                <option value="">-Jenis Barang-</option>
                                                <?php foreach($jenisbarang_id->result() as $key => $data) { ?>
                                                    <option value="<?=$data->jenisbarang_id?>" <?=$jenisbarang_id_edit == $data->jenisbarang_id ? "selected" : null ?> ><?=$data->jenisbarang_nama?></option>
                                                    <?php } ?>
                                            </select>                                            
                                        </div>
                                        <?=form_error('jenisbarang_id')?>
                                    </div>
                                    </div>

                                    <div class="card-body">
                                    <div class="form-group row">
                                        <label for="bahan_id" class="col-sm-2 text-left control-label col-form-label">Bahan Baku</label>
                                        <div class="col-sm-4">
                                            <select name="bahan_id" class="form-control <?=form_error('bahan_id') ? 'form-control is-invalid' : null?>">
                                                <option value="">-Bahan Baku-</option>
                                                <?php foreach($bahan_id->result() as $key => $data) { ?>
                                                    <option value="<?=$data->bahan_id?>" <?=$bahan_id_edit == $data->bahan_id ? "selected" : null ?> ><?=$data->bahan_nama?></option>
                                                    <?php } ?>
                                            </select>                                            
                                        </div>
                                        <?=form_error('bahan_id')?>
                                    </div>
                                    </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inventaris_ukuran" class="col-sm-2 text-left control-label col-form-label">Ukuran</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="inventaris_ukuran" value="<?= $row->inventaris_ukuran?>" class="form-control <?=form_error('inventaris_ukuran') ? 'form-control is-invalid' : null?>" placeholder="Ukuran">
                                        </div>
                                        <?=form_error('inventaris_ukuran')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inventaris_tahunbeli" class="col-sm-2 text-left control-label col-form-label">Tahun Pembelian</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="inventaris_tahunbeli" value="<?= $row->inventaris_tahunbeli?>" class="form-control <?=form_error('inventaris_tahunbeli') ? 'form-control is-invalid' : null?>" placeholder="Tahun Pembelian">
                                        </div>
                                        <?=form_error('inventaris_tahunbeli')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inventaris_harga" class="col-sm-2 text-left control-label col-form-label">Harga Pembelian</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="inventaris_harga" value="<?= $row->inventaris_harga?>" class="form-control <?=form_error('inventaris_harga') ? 'form-control is-invalid' : null?>" placeholder="Harga Pembelian">
                                        </div>
                                        <?=form_error('inventaris_harga')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inventaris_jumlah" class="col-sm-2 text-left control-label col-form-label">Jumlah Barang</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="inventaris_jumlah" value="<?= $row->inventaris_jumlah?>" class="form-control <?=form_error('inventaris_jumlah') ? 'form-control is-invalid' : null?>" placeholder="Jumlah Barang">
                                        </div>
                                        <?=form_error('inventaris_jumlah')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inventaris_keadaan" class="col-sm-2 text-left control-label col-form-label">Keadaan Barang</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="inventaris_keadaan" value="<?= $row->inventaris_keadaan?>" class="form-control <?=form_error('inventaris_keadaan') ? 'form-control is-invalid' : null?>" placeholder="Keadaan Barang">
                                        </div>
                                        <?=form_error('inventaris_keadaan')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ruangan_id" class="col-sm-2 text-left control-label col-form-label">Ruangan</label>
                                        <div class="col-sm-4">
                                            <select name="ruangan_id" class="form-control <?=form_error('ruangan_id') ? 'form-control is-invalid' : null?>">
                                                <option value="">-Ruangan-</option>
                                                <?php foreach($ruangan_id->result() as $key => $data) { ?>
                                                    <option value="<?=$data->ruangan_id?>" <?=$ruangan_id_edit == $data->ruangan_id ? "selected" : null ?> ><?=$data->ruangan_nama?></option>
                                                    <?php } ?>
                                            </select>                                            
                                        </div>
                                        <?=form_error('ruangan_id')?>
                                    </div>
                                    </div>


                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary ">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('inventaris')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>                   