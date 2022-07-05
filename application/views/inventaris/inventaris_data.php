                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="d-flex flex-row">
                        <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?=site_url('inventaris/add')?>">Tambah Data</a>
                                            <a class="dropdown-item" href="<?=site_url('inventaris/print')?>">Cetak Data</a>
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
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Bahan Baku</th>
                                            <th>Ukuran</th>
                                            <th>Tahun Pembelian</th>
                                            <th>Harga Beli</th>
                                            <th>Jumlah Barang</th>
                                            <th>Keadaan Barang</th>
                                            <th>Ruangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data->inventaris_nama?></td>
                                            <td><?=$data->jenisbarang_nama?></td>
                                            <td><?=$data->bahan_nama?></td>
                                            <td><?=$data->inventaris_ukuran?></td>
                                            <td><?=$data->inventaris_tahunbeli?></td>
                                            <td><?=$data->inventaris_harga?></td>
                                            <td><?=$data->inventaris_jumlah?></td>
                                            <td><?=$data->inventaris_keadaan?></td>
                                            <td><?=$data->ruangan_nama?></td>
                                              <td>
                                              <a href="<?=site_url('inventaris/edit/'.$data->inventaris_id)?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="<?=site_url('inventaris/delete/'.$data->inventaris_id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data ini ??')">
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