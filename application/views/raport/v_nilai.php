<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-lg-12">
					<h3 class="box-title"><?= $Title ?> Lists</h3>
				</div>
			</div>
			<?= form_open("",array('id' => 'FrmNilai')) ?>
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
							<label>Nilai Tugas</label>
							<?php
								$data = array(
									'id' => 'nilai_tugas',
									'name' => 'nilai_tugas',
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
							<label>Nilai Harian</label>
							<?php
								$data = array(
									'id' => 'nilai_harian',
									'name' => 'nilai_harian',
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
							<label>Nilai Portofolio</label>
							<?php
								$data = array(
									'id' => 'nilai_portofolio',
									'name' => 'nilai_portofolio',
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
							<label>Nilai Proyek</label>
							<?php
								$data = array(
									'id' => 'nilai_proyek',
									'name' => 'nilai_proyek',
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
							<label>Nilai Praktek</label>
							<?php
								$data = array(
									'id' => 'nilai_praktek',
									'name' => 'nilai_praktek',
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
							<label>Nilai UTS</label>
							<?php
								$data = array(
									'id' => 'nilai_uts',
									'name' => 'nilai_uts',
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
							<label>Nilai UAS</label>
							<?php
								$data = array(
									'id' => 'nilai_uas',
									'name' => 'nilai_uas',
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
							<label>Observasi</label>
							<?php
								$data = array(
									'id' => 'obs',
									'name' => 'obs',
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
							<label>Penataan Diri</label>
							<?php
								$data = array(
									'id' => 'pd',
									'name' => 'pd',
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
							<label>Penilaian Sejawat</label>
							<?php
								$data = array(
									'id' => 'ps',
									'name' => 'ps',
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
							<label>Jurnal</label>
							<?php
								$data = array(
									'id' => 'jur',
									'name' => 'jur',
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
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $Title ?> Lists</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table id="dtTable" class="table table-bordered table-striped">
						<thead>
							<th>Siswa</th>
							<th>Kelas</th>
							<th>Mapel</th>
							<th>Obs</th>
							<th>Pd</th>
							<th>Ps</th>
							<th>Jur</th>
							<th>Harian</th>
							<th>Tugas</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Praktek</th>
							<th>Proyek</th>
							<th>Portofolio</th>
							<th>Rata</th>
							<th></th>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('raport/js/js_page_nilai') ?>