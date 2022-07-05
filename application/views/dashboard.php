                    <div class="row">

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                            <a href="<?=site_url('user')?>">
                            <h1 class="font-light text-white"><i class="mdi mdi-account-plus"></i></h1>
                                <h6 class="text-white">Jumlah Pengguna</h6>
                                <h6 class="text-white"><?=$this->fungsi->count_user()?></h6>
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                            <a href="<?=site_url('jemaat')?>">
                            <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white">Data Jemaat</h6>
                                <h6 class="text-white"><?=$this->fungsi->count_jemaat()?></h6>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                            <a href="<?=site_url('inventaris')?>">
                                <h1 class="font-light text-white"><i class="mdi mdi-archive"></i></h1>
                                <h6 class="text-white">Data Inventaris</h6>
                                <h6 class="text-white"><?=$this->fungsi->count_inventaris()?></h6>
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-calendar-today"></i></h1>
                                <h6 class="text-white"><?php echo 'Tanggal : ' . date('Y-m-d'); ?></h6>
                                <h6 class="text-white"><?php echo 'Jam : ' . date('H:i:s'); ?></h6>
                            </div>
                        </div>
                    </div>                


                    </div>