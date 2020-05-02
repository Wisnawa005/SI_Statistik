                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
                    <p class="mb-4">Data dari Tabel relasi Database</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Date Created</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php $no = 1; ?>
                                    <?php foreach ($user as $val) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <th><?= $val['name']; ?></th>
                                            <th><?= $val['email']; ?></th>
                                            <th><?= $val['jabatan']; ?></th>
                                            <th><?= $val['date_created']; ?></th>
                                            <th><?= $val['image']; ?></th>
                                            <th>
                                                <center>
                                                    <a href="#" class="btn btn-warning btn-circle">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url() . 'admin/delete_user/' . $val['id_user']; ?>" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>