                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <form class="form-horizontal" action="<?=site_url('unsur/proses')?>" method="post">
                        <input type="hidden" name="unsur_id" value="<?= $row->unsur_id?>" class="form-control" placeholder="Unsur">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="unsur_nama" class="col-sm-1 text-right control-label col-form-label">Nama Unsur</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="unsur_nama" value="<?= $row->unsur_nama?>" class="form-control <?=form_error('unsur_nama') ? 'form-control is-invalid' : null?>" placeholder="Unsur">
                                        </div>
                                        <?=form_error('unsur_nama')?>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="unsur_kode" class="col-sm-1 text-right control-label col-form-label">Kode Unsur</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="unsur_kode" value="<?= $row->unsur_kode?>" class="form-control <?=form_error('unsur_kode') ? 'form-control is-invalid' : null?>" placeholder="Unsur">
                                        </div>
                                        <?=form_error('unsur_kode')?>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('unsur')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>                    