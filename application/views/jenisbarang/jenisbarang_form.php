                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <form class="form-horizontal" action="<?=site_url('jenisbarang/proses')?>" method="post">
                        <input type="hidden" name="jenisbarang_id" value="<?= $row->jenisbarang_id?>" class="form-control" placeholder="Bahan">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jenisbarang_nama" class="col-sm-1 text-right control-label col-form-label">Jenis Barang</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="jenisbarang_nama" value="<?= $row->jenisbarang_nama?>" class="form-control <?=form_error('jenisbarang_nama') ? 'form-control is-invalid' : null?>" placeholder="Bahan">
                                        </div>
                                        <?=form_error('jenisbarang_nama')?>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('jenisbarang')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>