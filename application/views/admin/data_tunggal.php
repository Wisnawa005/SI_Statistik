<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<!-- Button trigger modal -->
			<a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#exampleModal">
				<span class="icon text-white-50">
					<i class="fa fa-plus"></i>
				</span>
				<span class="text"> Tambah Data</span>
			</a>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<font style="color: black;">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Input Skor</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?= site_url('admin/data_tunggal') ?>" method="post">
									<div class="form-group row">

										<label class="control-label col-md-3 col-sm-3 ">
											Skor<span class="required"> *</span>
										</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="text" name="skor" id="skor" required="required" class="form-control" placeholder="Masukkan Skor">
										</div>
									</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button class="btn btn-warning" type="reset">Reset</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
							</form>
						</font>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

					<div class="row">
						<div class="col-sm-12">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<tr role="row">
									<th>No</th>
									<th>Skor</th>
									<th>Action</th>

								</tr>
								<?php foreach ($datatunggal as $val) : ?>
									<tr>
										<th><?= ++$start; ?></th>
										<th><?= $val['skor']; ?></th>
										<th>
											<a href="<?= ('edit_tunggal/') . $val['id']; ?>" class="btn btn-warning btn-circle">
												<i class="fas fa-edit"></i>
											</a>
											<a href="<?= ('delete_tunggal/') . $val['id']; ?>" class="btn btn-danger btn-circle">
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
							<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10</div>
						</div>
						<div class="col-sm-12 col-md-7">
							<?= $this->pagination->create_links(); ?>
						</div><br>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
