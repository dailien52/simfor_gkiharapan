                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-0">                        
 
                        </div>

                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control <?=form_error('user_id') ? 'form-control is-invalid' : null?>" name="user_id" id="user_id" placeholder="Username" value="<?php echo $user_id; ?>" >
                        
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 text-left control-label col-form-label">Username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control <?=form_error('username') ? 'form-control is-invalid' : null?>" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" >
                                        </div>
                                        <?=form_error('username')?>
                                    </div>
                                </div>
                        
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 text-left control-label col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control <?=form_error('password') ? 'form-control is-invalid' : null?>" name="password" id="password" placeholder="Password" value="" >
                                        </div>
                                        <?=form_error('password')?>
                                    </div>
                                </div>
                        
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="user_namalengkap" class="col-sm-2 text-left control-label col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control <?=form_error('user_namalengkap') ? 'form-control is-invalid' : null?>" name="user_namalengkap" id="user_namalengkap" placeholder="Nama Lengkap" value="<?php echo $user_namalengkap; ?>" >
                                        </div>
                                        <?=form_error('user_namalengkap')?>
                                    </div>
                                </div>
                        
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="user_foto" class="col-sm-2 text-left control-label col-form-label">Foto</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control <?=form_error('user_foto') ? 'form-control is-invalid' : null?>" name="user_foto" id="user_foto" placeholder="Foto" value="<?php echo $user_foto; ?>" >
                                        </div>
                                        <?=form_error('user_foto')?>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="user_level" class="col-sm-2 text-left control-label col-form-label">Level User</label>
                                        <div class="col-sm-4">
                                        <select name="user_level" class="form-control"  class="form-control <?=form_error('user_level') ? 'form-control is-invalid' : null?>">
                                        <?php if($user_level = 1){ ?>
                                            <option value="1" selected>Admin</option>
                                            <option value="2">Koordinator Wijk</option>
                                            <option value="3">Bendahara Barang</option>
                                        <?php } elseif($user_level = 2){ ?>
                                            <option value="1">Admin</option>
                                            <option value="2" selected>Koordinator Wijk</option>
                                            <option value="3">Bendahara Barang</option>
                                        <?php } elseif($user_level = 3){ ?>
                                            <option value="1">Admin</option>
                                            <option value="2">Koordinator Wijk</option>
                                            <option value="3" selected>Bendahara Barang</option>
                                        <?php } else{ ?>
                                            <option value="1">Admin</option>
                                            <option value="2">Koordinator Wijk</option>
                                            <option value="3">Bendahara Barang</option>
                                        <?php }?>
                                    </select>                                            
                                        </div>
                                        <?=form_error('user_level')?>
                                    </div>
                                    </div> 

                                <div class="border-top">
                                    <div class="card-body">
                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                                <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
                                    </div>

                                </div>
                            </form>                       
                    </div>