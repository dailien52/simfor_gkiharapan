                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <form class="form-horizontal" action="<?=site_url('ksp/proses')?>" method="post">
                        <input type="hidden" name="ksp_id" value="<?= $row->ksp_id?>" class="form-control" placeholder="KSP">
                        
                        <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ksp_nama" class="col-sm-2 text-left control-label col-form-label">Nama KSP</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="ksp_nama" value="<?= $row->ksp_nama?>" class="form-control <?=form_error('ksp_nama') ? 'form-control is-invalid' : null?>" placeholder="KSP">
                                        </div>
                                        <?=form_error('ksp_nama')?>
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

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('ksp')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>       