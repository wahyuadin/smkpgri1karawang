<div class="container">
	<div class="row">
		<div class="col">
			<h2>Ekstrakurikullar</h2>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $this->session->flashdata('success') ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php endif ?>
		</div>
	</div>

	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal"><i class="fas fa fa-plus" style="margin-right: 10px;"></i>Tambah Data</button>
	<!-- Modal Tambah-->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?=base_url('ekstrakurikullar/tambah')?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="formGroupExampleInput">Nama</label>
							<input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" id="formGroupExampleInput" placeholder="Nama Eskul" required>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Upload Foto</label>
							<input type="file" name="foto" class="form-control" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal -->
	<div class="row mt-4">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Foto</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($content as $c) { ?>
						<tr>
							<td>
								<p><?= $c->nama?></p>
							</td>
							<td>
								<a href="<?= base_url('img/eskul/' . $c->foto) ?>" target="_blank"><img src="<?= base_url('img/eskul/' . $c->foto) ?>" class="img-responsive" style=" max-width:400px";/></a>
							</td>
							<td>
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $c->id?>"><i class="fas fa fa-pencil-alt"></i></button>
								<a onclick="hapus()" href="<?= base_url('ekstrakurikullar/hapus/' . $c->id); ?>" class="btn btn-danger btn-sm text-light">
									<i class="fas fa fa-trash-alt"></i>
								</a>
							</td>
						</tr>
							<!-- modal edit -->
							<div class="modal fade" id="editModal<?= $c->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="<?=base_url('ekstrakurikullar/edit')?>" enctype="multipart/form-data">
												<div class="form-group">
													<label for="formGroupExampleInput">Nama</label>
													<input type="text" name="id" value="<?= $c->id?>" hidden>
													<input type="text" name="nama" value="<?= $c->nama ?>" class="form-control" id="formGroupExampleInput" placeholder="Nama Eskul" required>
												</div>
												<div class="form-group">
													<label for="formGroupExampleInput2">Upload Foto</label>
													<input type="file" name="foto" class="form-control" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="kirim" class="btn btn-primary">Simpan</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<!-- end modal edit -->
						<?php } ?>			
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>
