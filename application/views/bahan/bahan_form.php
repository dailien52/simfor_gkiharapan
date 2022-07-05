                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <form class="form-horizontal" action="<?=site_url('bahan/proses')?>" method="post">
                        <input type="hidden" name="bahan_id" value="<?= $row->bahan_id?>" class="form-control" placeholder="Bahan">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="bahan_nama" class="col-sm-1 text-right control-label col-form-label">Nama Bahan</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="bahan_nama" value="<?= $row->bahan_nama?>" class="form-control <?=form_error('bahan_nama') ? 'form-control is-invalid' : null?>" placeholder="Bahan">
                                        </div>
                                        <?=form_error('bahan_nama')?>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('bahan')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>

                    