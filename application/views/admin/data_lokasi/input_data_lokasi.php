<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Input Data Lokasi</h1>
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
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                <input type="hidden" value="<?= (isset($prodi['id_prodi'])) ? md5($prodi['id_lokasi']) : ''; ?>" name="id_lokasi"></input>
                                <form action="<?= site_url('admin/save_lokasi') ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Lokasi Aset</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="id_prodi">
                                                <!-- <option>-- Pilih Prodi --</option> -->
                                                <?php foreach ($prodi as $val) { ?>
                                                    <option <?= ($val['id_prodi'] == isset($lokasi['id_prodi'])) ? 'selected' : ''; ?> value="<?= $val['id_prodi']; ?>"> <?= $val['nama_prodi']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Lab Prodi<span class="required"> *</span></label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="lab" id="first-name" required="required" class="form-control" placeholder="Masukkan Nama Lab Prodi" value="<?= (isset($lokasi['nama_lab'])) ? $lokasi['nama_lab'] : ''; ?>">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?= site_url('admin/data_lokasi') ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>




                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>