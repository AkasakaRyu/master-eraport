<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-lg-12">
					<h3 class="box-title"><?= $Title ?> Lists</h3>
				</div>
			</div>
			<?= form_open("",array('id' => 'FrmKehadiran')) ?>
				<div class="box-body">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Kode</label>
							<?php
								$data = array(
									'id' => 'kehadiran_id',
									'name' => 'kehadiran_id',
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
							<label>Siswa</label>
							<?php
								$data = array(
									'id' => 'siswa_id',
									'name' => 'siswa_id',
									'class' => 'form-control',
									'required' => 'true',
									'autocomplete' => 'off'
								);
								$options = array(
									'' => ''
								);
								echo form_dropdown($data,$options);
							?>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Tanggal Masuk</label>
							<?php
								$data = array(
									'id' => 'tanggal_masuk',
									'name' => 'tanggal_masuk',
									'class' => 'form-control',
									'type' => 'date',
									'required' => 'true',
									'autocomplete' => 'off'
								);
								echo form_input($data);
							?>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Jam Masuk</label>
							<?php
								$data = array(
									'id' => 'jam_masuk',
									'name' => 'jam_masuk',
									'class' => 'form-control',
									'type' => 'time',
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
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $Title ?> Lists</h3>
			</div>
			<div class="box-body">
				<table id="dtTable" class="table table-bordered table-striped">
					<thead>
						<th>Code</th>
						<th>Siswa</th>
						<th>Tanggal Masuk</th>
						<th>Jam Masuk</th>
						<th></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('raport/js/js_page_kehadiran') ?>