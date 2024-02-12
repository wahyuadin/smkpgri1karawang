<div class="container">
	<div class="row">
		<div class="col">
			<h2>Halaman Pendaftaran</h2>
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
	<!-- Modal Tambah-->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?=base_url('daftar/edit')?>">
						<div class="form-group">
							<label for="formGroupExampleInput">Link Google Form</label>
							<input type="text" name="id" value="<?= $content->id?>" hidden>
							<input type="text" name="link" value="<?= $content->link ?>" class="form-control" id="formGroupExampleInput" placeholder="Link Google Form" required>
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
							<th>No</th>
							<th>Link</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><?= $content->link ?></td>
							<td>
								<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addModal"><i class="fas fa fa-edit"></i></button>
							</td>
						</tr>			
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>
