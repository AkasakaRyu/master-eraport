<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-lg-12">
					<h3 class="box-title"><?= $Title ?> Lists</h3>
				</div>
			</div>
			<?= form_open("",array('id' => 'FrmTA')) ?>
				<div class="box-body">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Kode</label>
							<?php
								$data = array(
									'id' => 'tahun_ajaran_id',
									'name' => 'tahun_ajaran_id',
									'class' => 'form-control',
									'readonly' => 'true',
									'autocomplete' => 'off'
								);
								echo form_input($data);
							?>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Tahun Ajaran</label>
							<?php
								$data = array(
									'id' => 'tahun_ajaran',
									'name' => 'tahun_ajaran',
									'class' => 'form-control',
									'required' => 'true',
									'autocomplete' => 'off'
								);
								echo form_input($data);
							?>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="col-lg-12">
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</div>
			<?= form_close() ?>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $Title ?> Lists</h3>
			</div>
			<div class="box-body">
				<table id="dtTable" class="table table-bordered table-striped">
					<thead>
						<th>Code</th>
						<th>Tahun Ajaran</th>
						<th>Status</th>
						<th></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('data/js/js_page_tahun_ajaran') ?>