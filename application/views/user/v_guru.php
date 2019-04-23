<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-lg-12">
					<h3 class="box-title"><?= $Title ?> Lists</h3>
				</div>
			</div>
			<?= form_open("",array('id' => 'FrmMapel')) ?>
				<div class="box-body">
					<div class="col-lg-6">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Kode</label>
								<?php
									$data = array(
										'id' => 'guru_id',
										'name' => 'guru_id',
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
								<label>Mapel</label>
								<?php
									$data = array(
										'id' => 'mapel_id',
										'name' => 'mapel_id',
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
								<label>Nama Guru</label>
								<?php
									$data = array(
										'id' => 'guru_nama',
										'name' => 'guru_nama',
										'class' => 'form-control',
										'required' => 'true',
										'autocomplete' => 'off'
									);
									echo form_input($data);
								?>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<?php
									$data = array(
										'id' => 'jenis_kelamin',
										'name' => 'jenis_kelamin',
										'class' => 'form-control',
										'required' => 'true',
										'autocomplete' => 'off'
									);
									$options = array(
										'' => '',
										'Pria' => 'Pria',
										'Wanita' => 'Wanita'
									);
									echo form_dropdown($data,$options);
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<?php
									$data = array(
										'id' => 'tanggal_lahir',
										'name' => 'tanggal_lahir',
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
								<label>Agama</label>
								<?php
									$data = array(
										'id' => 'agama',
										'name' => 'agama',
										'class' => 'form-control',
										'required' => 'true',
										'autocomplete' => 'off'
									);
									echo form_input($data);
								?>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Alamat</label>
								<?php
									$data = array(
										'id' => 'alamat',
										'name' => 'alamat',
										'class' => 'form-control',
										'required' => 'true',
										'autocomplete' => 'off'
									);
									echo form_input($data);
								?>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Telepon</label>
								<?php
									$data = array(
										'id' => 'telepon',
										'name' => 'telepon',
										'class' => 'form-control',
										'type' => 'number',
										'min' => '0',
										'required' => 'true',
										'autocomplete' => 'off'
									);
									echo form_input($data);
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Tempat Lahir</label>
								<?php
									$data = array(
										'id' => 'tempat_lahir',
										'name' => 'tempat_lahir',
										'class' => 'form-control',
										'required' => 'true',
										'autocomplete' => 'off'
									);
									echo form_input($data);
								?>
							</div>
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
						<th>User</th>
						<th>Mapel</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('user/js/js_page_guru') ?>