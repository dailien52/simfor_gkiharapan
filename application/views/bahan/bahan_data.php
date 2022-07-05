                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="d-flex flex-row">
                        <a class="btn btn-primary btn-sm" href="<?=site_url('bahan/add')?>">
                                    <i class="fa fa-plus"></i></a>
                        </div> 
                        </div>
                           <div class="card-body">
                           <?=$this->session->flashdata('pesan');?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data->bahan_nama?></td>
                                            <td>
                                                <a href="<?=site_url('bahan/edit/'.$data->bahan_id)?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="<?=site_url('bahan/delete/'.$data->bahan_id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data ini ??')">
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