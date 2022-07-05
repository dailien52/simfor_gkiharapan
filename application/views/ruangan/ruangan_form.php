                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <form class="form-horizontal" action="<?=site_url('ruangan/proses')?>" method="post">
                        <input type="hidden" name="ruangan_id" value="<?= $row->ruangan_id?>" class="form-control" placeholder="Ruangan">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ruangan_nama" class="col-sm-2 text-left control-label col-form-label">Nama Ruangan</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="ruangan_nama" value="<?= $row->ruangan_nama?>" class="form-control <?=form_error('ruangan_nama') ? 'form-control is-invalid' : null?>" placeholder="Ruangan">
                                        </div>
                                        <?=form_error('ruangan_nama')?>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('ruangan')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>                    