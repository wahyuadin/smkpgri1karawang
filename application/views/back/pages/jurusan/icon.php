<div class="container">
	<div class="row">
		<div class="col">
			<h2>Agenda Sekolah</h2>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('success') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif ?>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Icon</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($content->result() as $icon) { ?>
						<tr>
							<td>
								<h5><?= $icon->nama ?></h5>
							</td>
							<td>
									<div>
										<img class="" height="100" src="<?= base_url('img/jurusan/'.$icon->nama_icon) ?>" alt="">
									</div>
								</td>
								<td>
									<a href="<?= base_url('icon/edit/' . $icon->id); ?>" class="btn btn-warning btn-sm text-light">
										<i class="fas fa fa-pencil-alt"></i>
									</a>
								</td>
							</tr>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
