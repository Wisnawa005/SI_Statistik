<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

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
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<tr role="row">
									<th>No</th>
									<th>Kelas Interval</th>
									<th>Nilai Tengah</th>
									<th>Frekwensi</th>
									<th>Frekwensi Relatif</th>
									<th>Persentase</th>


								</tr>
								<?php $no = 1; ?>
								<?php foreach ($dataBergolong as $val) : ?>
									<tr>
										<th><?= $no++ ?></th>
										<th><?= $val['xbawah'] . "-" . $val['xatas']; ?></th>
										<th><?= $val['median']; ?></th>
										<th><?= $val['frekwensi']; ?></th>
										<th><?= $val['frewensi_relatif']; ?></th>
										<th><?= $val['presentase'] . "%"; ?></th>

									</tr>
								<?php endforeach; ?>

							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
