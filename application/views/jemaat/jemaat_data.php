                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="d-flex flex-row">
                        <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?=site_url('jemaat/add')?>">Tambah Data</a>
                                            <a class="dropdown-item" href="<?=site_url('jemaat/print')?>">Cetak Data</a>
                                        </div>
                                    </div>
                        </div> 
                        </div>
                           <div class="card-body">
                           <?=$this->session->flashdata('pesan');?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-display" id="dataTable" width="150%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK Jemaat</th>
                                            <th>Nama Jemaat </th>
                                            <th>Jenis Kelamin</th> 
                                            <th>Alamat</th> 
                                            <th>Tempat dan Tanggal Lahir</th>
                                            <th>Unsur</th>
                                            <th>KSP</th>
                                            <th>Wijk</th>
                                            <th>Status Baptis</th>
                                            <th>Status Sidi</th>
                                            <th>Status Nikah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data->jemaat_nik?></td>
                                            <td><?=$data->jemaat_nama?></td>
                                            <td><?=$data->jemaat_jenis_kelamin?></td>
                                            <td><?=$data->jemaat_alamat?></td>
                                            <td><?=$data->jemaat_tempat_lahir?>, <?=$data->jemaat_tanggal_lahir?></td>
                                            <td><?=$data->unsur_kode?></td>
                                            <td><?=$data->ksp_nama?></td>
                                            <td><?=$data->wijk_nama?></td>
                                            <td><?=$data->jemaat_baptis?></td>
                                            <td><?=$data->jemaat_sidi?></td>
                                            <td><?=$data->jemaat_nikah?></td>
                                              <td>
                                              <a href="<?=site_url('jemaat/edit/'.$data->jemaat_nik)?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="<?=site_url('jemaat/delete/'.$data->jemaat_nik)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data ini ??')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>