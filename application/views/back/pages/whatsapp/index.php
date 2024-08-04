<div class="container">
	<div class="row">
		<div class="col">
			<h2>Template Chat WhatsApp</h2>
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
					<form method="POST" action="<?=base_url('wa/edit')?>">
						<div class="form-group">
							<label for="formGroupExampleInput">Nomor Wa</label>
							<input type="text" name="id" value="<?= $content->id?>" hidden>
							<input type="number" name="no" value="<?= $content->no ?>" class="form-control" id="formGroupExampleInput" placeholder="Nomor WhatsApp Instansi" required>
							<p style="margin-left: 3px; color:red;">*Contoh : 87672817651 (Tidak usah pakai 0 atau +62. Sudah otomatis region Indonesia</p>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Text Pesan</label>
							<textarea name="text" class="form-control" cols="30" rows="5"><?= $content->text ?></textarea>
							<!-- <input type="text" name="text" value="<?= $content->text ?>" class="form-control" id="formGroupExampleInput" placeholder="Link Google Form" required> -->
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
							<th>Nomor</th>
							<th>text</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><?= $content->no ?></td>
							<td><?= $content->text ?></td>
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
