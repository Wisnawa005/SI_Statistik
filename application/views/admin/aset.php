<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                        <div class="col-sm-12 col-md-4"><br>

                            <!-- Button trigger modal -->

                            <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Input Data Lokasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <input type="hidden" value="<?= (isset($aset['id_lokasi'])) ? md5($aset['id_lokasi']) : ''; ?>" name="id_lokasi"></input>
                                            <form action="<?= site_url('admin/aset') ?>" method="post">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 ">Lokasi Aset</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <select class="form-control" name="id_lokasi">
                                                            <?php foreach ($aset as $val) { ?>
                                                                <option value="<?= $val['id_lokasi']; ?>"> <?= $val['nama_lab']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nama Barang</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="nama_barang" id="nama_barang" required="required" class="form-control" placeholder="Masukkan Nama Barang">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Spesifikasi</label>
                                                    <textarea type="text" name="spek" id="spek" required="required" class="form-control" placeholder="Masukkan Spesifikasi Barang"></textarea>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="jumlah" id="jumlah" required="required" class="form-control" placeholder="Masukkan Jumlah Barang">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Satuan</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="satuan" id="satuan" required="required" class="form-control" placeholder="Masukkan Satuan Barang">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="keterangan" id="keterangan" required="required" class="form-control" placeholder="Masukkan Keterangan Barang">
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <input type="file" name="image" id="image" class="file-styled" required="required">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-warning" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                    <th>Nama Barang</th>
                                    <th>Spesifikasi</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>

                                <?php $no = 1; ?>
                                <?php foreach ($dataaset as $val) : ?>
                                    <tr>
                                        <th><?= $no++ ?></th>
                                        <th><?= $val['nama_lab']; ?></th>
                                        <th><?= $val['nama_barang']; ?></th>
                                        <th><?= $val['spesifikasi']; ?></th>
                                        <th><?= $val['jumlah']; ?></th>
                                        <th><?= $val['satuan']; ?></th>
                                        <th><?= $val['keterangan']; ?></th>
                                        <th>
                                            <figure img src="<?= base_url("upload/image/" . $val['foto']) ?>" class="gal"><img src="<?= base_url("upload/image/" . $val['foto']) ?>" width="150" height="100"></figure>
                                        </th>
                                        <th>
                                            <center>
                                                <a href="#" class="btn btn-warning btn-circle">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url() . 'admin/delete_aset/' . $val['kode_aset']; ?>" class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                        </th>
                                    </tr>
                                <?php endforeach; ?>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 25 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>