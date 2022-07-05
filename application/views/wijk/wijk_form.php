                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <form class="form-horizontal" action="<?=site_url('bahan/proses')?>" method="post">
                        <input type="hidden" name="wijk_id" value="<?= $row->wijk_id?>" class="form-control" placeholder="Bahan">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="wijk_nama" class="col-sm-1 text-right control-label col-form-label">Nama Wijk</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="wijk_nama" value="<?= $row->wijk_nama?>" class="form-control <?=form_error('wijk_nama') ? 'form-control is-invalid' : null?>" placeholder="Nama Wijk">
                                        </div>
                                        <?=form_error('wijk_nama')?>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="wijk_jumlah_ksp" class="col-sm-1 text-right control-label col-form-label">Nama Wijk</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="wijk_jumlah_ksp" value="<?= $row->wijk_jumlah_ksp?>" class="form-control <?=form_error('wijk_jumlah_ksp') ? 'form-control is-invalid' : null?>" placeholder="Jumlah KSP">
                                        </div>
                                        <?=form_error('wijk_jumlah_ksp')?>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('wijk')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>