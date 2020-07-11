<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
	<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php foreach ($tunggal as $val) : ?>
				<form action="<?= base_url('Admin/update_skor') ?>" method="post">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $val->id ?>">
						<label for="exampleInputEmail1">Skor</label>
						<input type="text" class="form-control" id="skor" name="skor" value="<?php echo $val->skor ?>">
						<small class="form-text text-muted">edit skor yang diperlukan</small>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
		</div>
	<?php endforeach; ?>
	</div>

</div>
