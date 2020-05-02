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
                                            <h5 class="modal-title" id="exampleModalLabel">Input Data Prodi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="<?= site_url('admin/data_prodi') ?>" method="post">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nama Prodi<span class="required"> *</span></label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="nama_prodi" id="nama_prodi" required="required" class="form-control" placeholder="Masukkan Nama Prodi">
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Jurusan<span class="required"> *</span></label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="jurusan" id="jurusan" required="required" class="form-control" placeholder="Masukkan Nama Jurusan">
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Fakultas<span class="required"> *</span></label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" name="fakultas" id="fakultas" required="required" class="form-control" placeholder="Masukkan Nama Fakultas">
                                                    </div>
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prodi</th>
                                    <th>Jurusan</th>
                                    <th>Fakultas</th>
                                    <th>Action</th>
                                </tr>

                                <?php $no = 1; ?>
                                <?php foreach ($prodi as $val) : ?>
                                    <tr>
                                        <th class="sorting_1"><?= $no++ ?></th>
                                        <th><?= $val['nama_prodi']; ?></th>
                                        <th><?= $val['jurusan']; ?></th>
                                        <th><?= $val['fakultas']; ?></th>
                                        <th>
                                            <center>
                                                <a href="#" class="btn btn-warning btn-circle">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url() . 'admin/delete_prodi/' . $val['id_prodi']; ?>" class="btn btn-danger btn-circle">
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