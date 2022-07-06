                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                    <!-- <form class="form-horizontal" action="<?=site_url('user/proses')?>" method="post"> -->
                    <?php echo form_open_multipart('user/proses'); ?>
                        <input type="hidden" name="user_id" value="<?= $row->user_id?>" class="form-control" placeholder="User">
                        
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 text-left control-label col-form-label">Username</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="username" value="<?= $row->username?>" class="form-control <?=form_error('username') ? 'form-control is-invalid' : null?>" placeholder="Username">
                                        </div>
                                        <?=form_error('username')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 text-left control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="password" value="<?= $row->password?>" class="form-control <?=form_error('password') ? 'form-control is-invalid' : null?>" placeholder="Password">
                                        </div>
                                        <?=form_error('password')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="user_namalengkap" class="col-sm-2 text-left control-label col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="user_namalengkap" value="<?= $row->user_namalengkap?>" class="form-control <?=form_error('user_namalengkap') ? 'form-control is-invalid' : null?>" placeholder="Nama Lengkap">
                                        </div>
                                        <?=form_error('user_namalengkap')?>
                                    </div>
                                </div>

                                <!-- <div class="card-body">
                                    <div class="form-group row">
                                        <label for="user_namalengkap" class="col-sm-2 text-left control-label col-form-label">Foto User</label>
                                        <div class="col-sm-4">
                                        <div class="custom-file">
                                            <input type="file" name="user_namalengkap" value="<?= $row->user_namalengkap?>" class="form-control <?=form_error('user_namalengkap') ? 'form-control is-invalid' : null?>" placeholder="Nama Lengkap">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        </div>
                                        </div>
                                        <?=form_error('user_namalengkap')?>
                                    </div>
                                </div> -->

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="user_level" class="col-sm-2 text-left control-label col-form-label">Level User</label>
                                        <div class="col-sm-4">
                                        <select name="user_level" class="form-control"  class="form-control <?=form_error('user_level') ? 'form-control is-invalid' : null?>">
                                        <option value="">- Pilih -</option>
                                        <option value="1" value="<?= set_value('user_level') == 1 ? "selected" : null ?>">Admin</option>
                                        <option value="2" value="<?= set_value('user_level') == 2 ? "selected" : null ?>">Koordinator Wijk</option>
                                        <option value="3" value="<?= set_value('user_level') == 3 ? "selected" : null ?>">Bendahara Barang</option>
                                    </select>                                            
                                        </div>
                                        <?=form_error('user_level')?>
                                    </div>
                                    </div> 

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="Submit" name="<?=$page?>" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning btn-sm" href="<?=site_url('user')?>">
                                    <i class="fa fa-undo"></i> Kembali</a>
                                    </div>

                                </div>
                                <?php echo form_close() ?>
                            <!-- </form>                        -->
                    </div>